@extends('template.default')

@section('content')

<div class="row-fluid">
	<div class="page-header">
		<h3>My Cancel</h3>	
	</div>

<table class="table table-bordered table-hover">	
	<thead>
		<tr>
			<th>Seat No</th>
			<th>Date of Reservation</th>
			<th>View Bus</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach($mycancel as $res)
		<tr>
			<td>{{$res->seatno}}</td>
			<td>{{$res->time}}</td>
				<!-- start here -->
			<td>   <a href="#myModal{{$res->cancelid}}" role="button" class="btn" data-toggle="modal">View Bus</a>
					 <div id="myModal{{$res->cancelid}}" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
						            	<image class="cancelseats"></image>
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