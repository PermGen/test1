@extends('template.homedeafault')

@section('content')
<br><br>
<div class="span1">
	
</div>
	<div class="row-fluid well span9" >
				<center><h3>Routes & Schedule</h3></center>

				<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>From</th>
					<th>To</th>
					<th>Departure Date</th>
				</tr>
			</thead>
			<tbody>
				@foreach($route as $r)
					<tr>
					<td>{{$r->leaving_from}}</td>
					<td>{{$r->going_to}}</td>
					<td>{{$r->departure_date}}
					{{$r->departure_time}}</td>
					</tr>
				@endforeach
			</tbody>

		</table>
			
	</div>
<br><br><br><br>
@stop