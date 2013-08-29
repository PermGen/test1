@extends('admin.template.default')

	@section('content')
	
	<div class="row-fluid">
		<div class="span5">

		
		@if(Session::has('ErrorMsg'))
			
		@endif
		@if(Session::has('SuccessMsg'))
			<div class="alert alert-success ">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Success</strong>
			</div>
		@endif
		
				{{Form::open(array('url'=>URL::to('Admin/AddRoute'),'class'=>'form-inline','method'=>'POST'))}}
				{{Form::token()}}
		<div class="control-group">
			<div class="control-label">
				<b>Bus ID</b>
			</div>
			<select name="busid">
				@foreach($bus as $b)
					<option value="{{$b->busid}}">{{$b->busid}}</option>
				@endforeach
			</select>
			
		</div>
				
		<div class="control-group {{$errors->has('departure_time')? 'error':''}}">
			<div class="control-label">
				<b>Departure Time</b>
			</div>
			<input type="time" name="departure_time">
			
		</div>

		<div class="control-group {{$errors->has('departure_date')? 'error':''}}">
			<div class="control-label">
				<b>Departure Date</b>
			</div>
			
			<input type="date" name="departure_date">			

		</div>

		<div class="control-group {{$errors->has('amount')? 'error':''}}">
			<div class="control-label">
				<b>Price</b>
			</div>
			
			<input type="text" name="amount">				

		</div>
		<div class="control-group {{$errors->has('leaving_from')? 'error':''}}">
			<div class="control-label">
				<b>Leaving From</b>
			</div>			
			<input type="text" name="leaving_from">		

		</div>
		<div class="control-group {{$errors->has('going_to')? 'error':''}}">
			<div class="control-label">
				<b>Going To</b>
			</div>			
			<input type="text" name="going_to">
		</div>
			<button class="btn btn-primary">Add Routes</button>
		{{Form::close()}}
		</div>
	</div>
 



	

@stop