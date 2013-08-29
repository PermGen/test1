@extends('admin.template.default')

@section('content')
<div class="span12">


<div class="span5">
    @if(Session::has('messages') && Session::get('messages')==1)
 <div class="row-fluid">
  <div class="alert alert-success">
    <button class="close" data-dismiss="alert" type="button">&times;</button> 
    Susccess Fully Added   
  </div>
  </div>
    @endif

    @if($errors->has('BusType'))
  <div class="row-fluid">
    <div class="alert alert-error">
      <button class="close" data-dismiss="alert" type="button">&times;</button> 
      {{$errors->has('BusType') ? $errors->first('BusType','<p>:message</p>') : 'Bus Type'}}   
    </div>
  </div>
    @endif

    @if($errors->has('BusCapacity'))
 <div class="row-fluid">
    <div class="alert alert-error">
      <button class="close" data-dismiss="alert" type="button">&times;</button> 
      {{$errors->has('BusCapacity') ? $errors->first('BusCapacity','<p>:message</p>') : 'Bus Capacity'}}   
    </div>
  </div>
    @endif

    @if($errors->has('busplate_no'))
 <div class="row-fluid">
    <div class="alert alert-error">
      <button class="close" data-dismiss="alert" type="button">&times;</button> 
      {{$errors->has('busplate_no') ? $errors->first('busplate_no','<p>:message</p>') : 'Bus Plate No'}}   
    </div>
  </div>
    @endif
{{Form::open(array('url'=>URL::to('Admin/AddBus'),'class'=>'form-inline','method'=>'POST'))}}
{{Form::token()}}
      <div class="row-fluid">
        <div class="control-label">
          <label><b>Bus Type</b></label>
        </div>
        <div class="control-group {{$errors->has('BusType')?'error':''}}">
        <input name="BusType" type="text" class="login-field" placeholder="Bus Type">
        </div>
      </div>

      <div class="row-fluid">
      <div class="control-label}">
          <label><b>Capacity</b></label>
        </div>
        <div class="control-group {{$errors->has('BusCapacity')?'error':''}}">
        <input name="BusCapacity" type="text" class="login-field" placeholder="Capacity">
        </div>
      </div>

      <div class="row-fluid">
          <div class="control-label">
          <label><b>Plate No</b></label>
          </div>
        <div class="control-group {{$errors->has('busplate_no')?'error':''}}">
        <input name="busplate_no" type="text" class="login-field" placeholder="Plate No">
        </div>
        <button  class="btn btn-primary">ADD</button> 
      </div>  
    </div>
{{Form::close()}}
   

</div>
@stop