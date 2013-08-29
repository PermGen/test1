@extends('template.default')

@section('content')

<div class="row-fluid">
	<div class="page-header">
		<h3>My Reservation</h3>	
	</div>
	@if(Session::has('cancel_message'))
		<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Successfully</strong> Cancelled the Reservation
		</div>
	@endif
<table class="table table-bordered table-hover">	
	<thead>
		<tr>
			<th>Seat No</th>
			<th>Date of Reservation</th>
			<th>View Bus</th>
			<th>Reservation</th>
			
		</tr>
	</thead>
	<tbody>
	{{--*/$cancel=0/*--}}
		@foreach($myreserve as $res)
		<tr>
			<td>{{$res->seatno}}</td>
			<td>{{$res->created_at}}</td>			
				<!-- start here -->
			<td>   <a href="#myModal{{$res->bus_resvid}}" role="button" class="btn btn-primary" data-toggle="modal">View Reservation</a>
			<td>
				
					@if($res->status=="RESERVED")
						<a href="#myModal{{++$cancel}}" role="button" class="btn btn-info" data-toggle="modal">Cancel Reservation</a>

				<div id="myModal{{$cancel}}" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
					{{Form::open(array('url'=>URL::to('cancelresrvation'),'class'=>'form-inline','method'=>'POST'))}}           
				    {{Form::token()}}       
					            <div class="modal-header">
					              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					             <h3 id="myModalLabel">Bus Reservation</h3>
					            </div>
					            <input name="seatno" value="{{$res->seatno}}" type="hidden">	
					            <div class="modal-body">
					            <h3>Are you sure you want to cancel Reservation?</h3>
					            </div>

					            <div class="modal-footer">
					              <button class="btn btn-success" type="submit">Ok</button>
					              <button class="btn" data-dismiss="modal">Close</button>
					            </div>
					 {{Form::close()}}
           

					          </div>
					          @else
					        <span class="label label-important">CANCELED</span>
					@endif



			</td>
					 <div id="myModal{{$res->bus_resvid}}" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
					            {{Form::open(array('url'=>URL::to('Routes/Reserve'),'class'=>'form-inline','method'=>'POST'))}}
		                  	    {{Form::token()}}
					          
					            <div class="modal-header">
					              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					              <h3 id="myModalLabel">Bus Reservation</h3>
					            </div>

					            <div class="modal-body">
					              
					       		{{--*/$seat=explode("-",$res->seatno)/*--}}
					       	
					            @for($i=1;$i<=40;$i++)
					            		
						            	@if($i==$seat[0])
						            	<image class="bookedseats"></image>
						            	@else
						            	<image class="available"></image>
						            	@endif
						            	@if( $i!=0 && $i%10==0)
						            				@if($i%20==0)
						            				</br>
						            				@endif
						            				</br>
						            	@endif

					            @endfor
				                         
		                  			

					            </div>
					            <div class="modal-footer">
					              <button class="btn" data-dismiss="modal">Close</button>
					              
					            </div>
					             {{Form::close()}}
					          </div>
			</td>
			<!-- ends here	 -->	
		</tr>
		@endforeach
	</tbody>
	
</table>
	
</div>

@stop