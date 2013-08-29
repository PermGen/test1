@extends('admin.template.default')

@section('content')
<div class="span12">

    <div class="row-fluid">
        <div class="page-header">
          <h3>Valid Ticket</h3>
        </div>        
    </div>

    <div class="row-fluid">
    @if(Session::has('AdminErrorMessage'))
              <div class="alert alert-error">
                <button class="close" data-dismiss="alert" type="button">&times;</button>
                {{Session::get('AdminErrorMessage')}}
              </div>
    @endif
    </div>
   <div class="row-fluid">
   @if(Session::has('AdminSuccess'))
              <div class="alert alert-success">
                <button class="close" data-dismiss="alert" type="button">&times;</button>
                {{Session::get('AdminSuccess')}}
              </div>
   @endif
    </div>
      @if($each==0)
    <div class="row-fluid">

      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>BUS ID </th>
            <th>BUS TYPE</th>
            <th>BUS CAPACITY</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          @foreach($buses as $bus)
            <tr>             
              <td>{{$bus->busid}}</td>
              <td>{{$bus->bustype}}</td>
              <td>{{$bus->capacity}}</td>
              <td>
              {{Form::open(array('url'=>URL::to('BusTicket'),'method'=>'POST'))}}
              <input type='hidden' name="busid" value="{{$bus->busid}}"> 
              <button class="btn btn-success">View Tickets</button>
              {{Form::close()}}
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
    @else

     <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>No.</th>
            <th>Ticket No </th>
            <th>Client</th>           
          </tr>
        </thead>
        <tbody>{{--*/$count=1/*--}}
          @foreach($buses as $bus)
            <tr>             
              <td>{{$count++}}</td>
              <td>{{$bus->ticketno}}</td>
              <td>{{--*/$db=DB::table('users')->where('user_id',$bus->user_id)->first()/*--}}
                  {{$db->First_Name}} {{$db->Last_Name}} 
              </td>
             
            </tr>
          @endforeach

        </tbody>
      </table>

    @endif  





</div>
@stop