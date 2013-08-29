@extends('admin.template.default')

@section('content')
<div class="span12">

    <div class="row-fluid">
        <div class="page-header">
          <h3>Reservations</h3>
        </div>        
    </div>
    <div class="row-fluid">
    @if(Session::has('AdminErrorMessage'))
              <div class="alert alert-error">
                <button class="close" data-dismiss="alert" type="button">&times;</button>
                {{Session::get('AdminErrorMessage')}}
              </div>
    @endif

   @if(Session::has('AdminSuccess'))
              <div class="alert alert-success">
                <button class="close" data-dismiss="alert" type="button">&times;</button>
                {{Session::get('AdminSuccess')}}
              </div>
    @endif
      @if(Session::has('admineachdetails'))
          <div>
          <div class="row-fluid">
            <h3>{{$Name}}</h3>
          </div>

      {{Form::open(array('url'=>URL::to('admin/payReservation'),'method'=>'POST'))}}
        {{Form::token()}}
        <input type="hidden" name="userid" value="{{$userid}}">
           <table class="table table-bordered table-hover">
           <thead>
             <tr>
               <th>Seat No</th>
               <th>Leaving From</th>
               <th>Going To</th>
               <th>Pay</th>
               <th>Discounted</th>
               <th>Price</th>
             </tr>
           </thead> 
           <tbody>
            {{--*/$price=0/*--}}
             @foreach($Reservations as $reserv)
              <tr>
              {{--*/$ticket=DB::table('bus_routes')->where('route_id','=',$reserv->route_id)->first()/*--}}
              <input type='hidden' name="routeid[]" value="{{$reserv->route_id}}-{{$reserv->seatno}}">
                <td>{{$reserv->seatno}}</td>
                <td>{{$ticket->leaving_from}}</td>
                <td>{{$ticket->going_to}}</td>
                <td><input type="checkbox" name="pay[]" value="{{$reserv->seatno}}-{{$ticket->amount}}"></td>
                <td><input type="checkbox" name="discounted[]" value="{{$reserv->seatno}}-{{$ticket->amount}}"></td>
                <td>{{$ticket->amount}}</td>

              </tr>
               {{--*/$price+=$ticket->amount/*--}}
               
             @endforeach
             <tr>
               <td colspan="6">
                <b>Original Total Price</b> {{$price}}
               </td>
               </tr>
           </tbody>


         
       
            </table>
            <button class='btn btn-primary'>Submit</button>
          {{Form::close()}}
            <div class="row-fluid">
              
            </div>
          </div>
      @else
        <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Seat No</th>
            <th>Name</th>
            <th>View Reservation</th>
          </tr>

          <tbody>
                @foreach($Reservations as $reserve)

            <tr>
             <td>{{ $reserve->seatno}}</td>
             <td>   {{--*/$user=DB::table('users')->where('user_id','=',$reserve->user_id)->first()/*--}}

                    {{$user->First_Name.' '.$user->Last_Name}}

             </td>
             <td>{{Form::open(array('url'=>URL::to('admin/viewdetails'),'class'=>'form-inline','method'=>'POST'))}}
                  {{Form::token()}}
                  <button class="btn btn-primary" type="submit" name="reserve" value="{{$reserve->user_id}}">View Details</button>
                 {{Form::close()}}
             </td>
             
            </tr>
                @endforeach
          </tbody>
        </thead>
      </table>
      @endif
    </div
</div>
@stop