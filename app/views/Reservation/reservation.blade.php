@extends('template.default')

@section('content')

<div class="row-fluid">

@if(Session::has('Search'))
		@if(!$isFound)	
			<div class="row-fluid">
	<div class="page-header">
			<h3>Search For Departure date {{Session::get('test')['searchDate']}} Not Found</h3>
	</div>
			</div>
		@endif
@endif

	<div class="span12">



				@if(Auth::check())
					 	{{Form::open(array('url'=>URL::to('Routes/search'),'class'=>'form-inline','method'=>'POST'))}}
					 		{{Form::token()}}
					 		@if(Session::has('ReserveError'))
					 			<div class="alert alert-error">
					 					<button type="button" class="close" data-dismiss="alert" >&times;</button>
					 					{{Session::get('ReserveError')}}

					 			</div>
					 		@endif
					 		@if(Session::has('message'))
					 			<div class="alert alert-success">
					 					<button type="button" class="close" data-dismiss="alert" >&times;</button>
					 					{{Session::get('message')}}

					 			</div>
					 		@endif
						<div class="control-label">							
								<b>Search Departure Date</b>
						</div>
						<div class="row-fluid">
							<div class="control-group" style="padding:12px">								
								 <div class="span4">
								 	 <input name="DepartureDate" id="appendedInputButton" type="date">									
								 </div>													
							</div>
						</div>
						<div class="row-fluid">
							<div class="control-group" style="padding:12px">
								<div class="span4">

									<select name="LeavingFrom">
											@foreach($Routes as $route)
												<option>{{$route->leaving_from}}</option>
											@endforeach							


									</select>								
								</div>							
							</div>
						</div>
						<div class="row-fluid">
							<div class="control-group" style="padding:12px">
								<div class="span4">
									<select name="GoingTo">
											@foreach($Routes as $route)
												<option>{{$route->going_to}}</option>
											@endforeach

									</select>										
								</div>							
							</div>
						</div>
						 <div class="row-fluid">
						 	<div class="control-group" style="padding:12px">
						 		 <button class="btn btn-primary" >Search</button>
						 	</div>
						 </div>
						{{Form::close()}}

								@if(Session::has('Search') && $isFound)

							<table width="100px" class="table table-bordered">
				              <thead>
				                <tr>
				                  <th width="25%">Bus Type</th>
				                  <th width="25%">Departure Time</th>
				                  <th width="25%">Available Seats</th>
				                  <th width="25%">Fare</th>
				                </tr>
				              </thead>
				              <tbody>

				              	
				             		@foreach($results as $result)
				             	{{--*/$seatCount=0/*--}}


				                <tr>
				                  <td>{{$result->bustype}}</td>
				                  <td>{{$result->departure_time}}</td>
				                  <td>{{$result->availableseats}}</td>
				                  <td>
				                  <div class="row-fluid">
				                  {{$result->amount}}
				                  </div>

				                  <a href="#myModal{{$result->busid}}" role="button" class="btn" data-toggle="modal">Reservation Details</a>

				                <div id="myModal{{$result->busid}}" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
					            {{Form::open(array('url'=>URL::to('Routes/Reserve'),'class'=>'form-inline','method'=>'POST'))}}
		                  	    {{Form::token()}}
		                  	    <input type="hidden" value="{{$field['LeavingFrom']}}" name="LeavingFrom">
		                  	    <input type="hidden" value="{{$field['searchGoingTo']}}" name="GoingTo">


					            <div class="modal-header">
					              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					              <h3 id="myModalLabel">Bus Reservation</h3>
					            </div>
					            <div class="modal-body">
					              <h4>Choose Seats</h4>

				                         
		                  				 <input type="hidden" name="busid" value="{{$result->busid}}">

		                  		 @foreach(DB::table('seats')->where('busid','=',$result->busid)->get() as $each)
		                   				{{--*/$seatCount++/*--}}
										@if(count(DB::table('bus_reservations')->where('seatno','=',$each->seatno)->where('status','!=','CANCEL')->get())<=0)

					       			 <input type="checkbox"  style="padding:10px" name="seats[]" value="{{$each->seatno}}">&nbsp;<img class="available"></img>
					       			  @elseif(count(DB::table('bus_reservations')->where('seatno','=',$each->seatno)->where('status','!=','CANCEL')->get())>0)
					       			  <input type="checkbox"  style="padding:10px" name="seats[]" value="{{$each->seatno}}">&nbsp;<img class="available"></img>
					              	  @else
					              	 		@foreach(DB::table('bus_reservations')->where('seatno','=',$each->seatno)->get() as $each2)
					                    @if($each2->status=='RESERVED'||$each2->status=='PAID')
					        		 <input type="checkbox"  style="padding:10px" disabled="" value="{{$each->seatno}}">&nbsp;</img><img class="booked"></img>
					              	 	@endif
					              	 		@endforeach
					              	   @endif

					              	 @if($seatCount%10==0)
					              	 		<br>
					              	 			@if($seatCount%20==0)
					              	 				<br><br>
					              	 			@endif
					              	 @endif
					                
					              	 
					              @endforeach
					              <div class="row-fluid">
					             <br><br>
					              <!-- 	<button class="btn btn-primary">Submit<button> -->
					              </div>
					         


					            <div class="modal-footer">
					              <button class="btn" data-dismiss="modal">Close</button>
					              <button class="btn btn-primary" type="submit">Save changes</button>
					            </div>
					             {{Form::close()}}
					          </div>
				                  </td>
				                </tr>
				         		   @endforeach




				              </tbody>
				            </table>





						@endif


				@elseif(!(Auth::check()))

					{{Form::open(array('url'=>'login','class'=>'form-inline','method'=>'POST'))}}
					{{Form::token()}}

					@if(Session::has('AccountNotFound'))

						<div class="alert alert-error">
								<button  type="button" class="close" data-dismiss="alert">&times;</button>
									{{Session::get('AccountNotFound')}}
						</div>	

					@endif
						<div class="{{Auth::check()? 'span5':'span12'}}">
								@if($errors->has('Email'))
								<div class="alert alert-error">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									{{$errors->has('Email')? $errors->first('Email','<p>:message</p>') : 'Email'}}
								</div>
								@endif

								@if($errors->has('password'))
								<div class="alert alert-error">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									{{$errors->has('password')? $errors->first('password','<p>:message</p>') : 'Email'}}
								</div>
								@endif

						<label class="control-label">Email</label>
						<div class="control-group {{$errors->has('Email')? 'error':''}}">
							<input type="text" value="{{Input::old('Email')}}" placeholder="Email"  name="Email">				
						</div>
						<label class="control-label">Password</label>
						<div class="control-group {{$errors->has('password')? 'error': ''}}">
							<input type="password" placeholder="Password" name="Password">				
						</div>

						<button class="btn btn-primary">Submit</button>
						<a href="{{URL('Registration')}}">Not yet Registered?</a>

						</div>

					{{Form::close()}}

				@endif


	</div>

</div>


@stop