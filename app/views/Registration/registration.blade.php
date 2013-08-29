@extends('template.default')


@section('content')

<div class="row-fluid">



{{Form::open(array('url'=>'Register','class'=>'form-inline','method'=>'POST'))}}
{{Form::token()}}
<div class="span5">
	
		<div class="control-group {{$errors->has('First_Name') ? 'error':''}}">
			<label class="control-label">{{$errors->has('First_Name') ? $errors->first('First_Name','<p>:message</p>') : 'First Name'}} </label>
				
			<input  class="span2" name="First_Name" value="{{Input::old('First_Name')}}" type='text' placeholder="First Name">

		</div>



		<div class="control-group {{$errors->has('Email') ? 'error':''}}">
			<label class="control-label">{{$errors->has('Email') ? $errors->first('Email','<p>:message</p>') : 'Email'}} </label>
				
			<input  class="span2" name="Email" value="{{Input::old('Email')}}" type='text' placeholder="Email address">

		</div>


		<div class="control-group {{$errors->has('Password') ? 'error':''}}">
			<label class="control-label">{{$errors->has('Password') ? $errors->first('Password','<p>:message</p>') : 'Password'}} </label>
				
			<input  class="span2" name="Password"  type='password' placeholder="Password">

		</div>





		<div class="control-group {{$errors->has('Mailing_Address') ? 'error':''}}">
		<label class="control-label">{{$errors->has('Mailing_Address') ? $errors->first('Mailing_Address','<p>:message</p>') : 'Mailing Address'}} </label>
				
			<input  class="span2" name="Mailing_Address" value="{{Input::old('Mailing_Address')}}" type='text' placeholder="Mailing Address">

		</div>

	

		<div class="control-group {{$errors->has('Street_Address') ? 'error':''}}">

			<label class="control-label">{{$errors->has('Street_Address') ? $errors->first('Street_Address','<p>:message</p>') : 'Street Address'}} </label>			

			

			<input  class="span2" type='text' name="Street_Address" value="{{Input::old('Street_Address')}}" placeholder="Street Address">

		</div>

		<button class="btn btn-primary" type="submit">Submit</button>



		



</div>

<div class="span6">
	
		<div class="control-group {{$errors->has('Last_Name') ? 'error' : ''}}">
					<label class="control-label">{{$errors->has('Last_Name') ? $errors->first('Last_Name','<p>:message</p>') : 'LastName'}} </label>			
			<input  class="span2" name="Last_Name" value="{{Input::old('Last_Name')}}" type='text' placeholder="Last Name">

		</div>
		<div class="control-group {{$errors->has('Phone_Number') ? 'error' : ''}} ">
			<label class="control-label">{{$errors->has('Phone_Number') ? $errors->first('Phone_Number','<p>:message</p>') : 'Phone Number'}} </label>

				
			<input  class="span2" name="Phone_Number" value="{{Input::old('Phone_Number')}}" type='text' placeholder="Phone Number">

		</div>



		<div class="control-group {{$errors->has('Password_confirmation') ? 'error' : ''}}">
			<label class="control-label">{{$errors->has('Password_confirmation') ? $errors->first('Password_confirmation','<p>:message</p>') : 'Password Confirmation'}} </label>
				
			<input  class="span2" name="Password_confirmation" type='password' placeholder="Password Confirmation">

		</div>

		<div class="control-group">
			
			{{HTML::image(Captcha::img(),'Captcha Image')}}

		</div>

		<div class="control-group {{$errors->has('captcha') ? 'error' : '' }}">
			<label class="control-label">{{$errors->has('captcha') ? $errors->first('captcha','<p>:message</p>') : 'Enter Captcha'}} </label>
				<input type="text" name="captcha">
		</div>
		
</div>
{{Form::close()}}







</div>



@stop