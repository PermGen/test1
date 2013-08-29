@extends('admin.template.defaultlogin')

	@section('content')
	
	
 



	
	<div class="login">

        <div class="login-screen">
			        {{Form::open(array('url'=>URL::to('admin/login'),'method'=>'POST'))}}
			        {{Form::token()}}
			          <div class="login-icon">
			            <img src="../assets/images/login/icon.png" alt="Welcome to Mail App">
			            <h4>Welcome to <small>Admin</small></h4>
			          </div>
			        @if(Session::has('Accnot_found'))
					<div class="alert alert-error">
					<button class="close" type="button" data-dismiss="alert" >&times;</button>
					<strong>ACCOUNT NOT FOUND</strong>
					</div>
					@endif

			          @if($errors->has('Email'))
			         <div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>
			         	{{$errors->has('Email')? $errors->first('Email','<p>:message</p>') : 'Email'}}
			         </div>
			          @endif

			          @if($errors->has('password'))
			         <div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>
			         	{{$errors->has('password')? $errors->first('password','<p>:message</p>') : 'Password'}}
			         </div>
			          @endif
			        
         	 <div class="login-form">
		            <div class="control-group {{$errors->has('Email') ? 'error':''}}">
		              <input name="Email" type="text" class="login-field" placeholder="UserName" id="login-name">
		              <label class="login-field-icon fui-user" for="login-name"></label>
		            </div>
		            

		            <div class="control-group {{$errors->has('password') ? 'error':''}}">
		              <input name="Password" type="password" class="login-field"  placeholder="Password" id="login-pass">
		              <label class="login-field-icon fui-lock" for="login-pass"></label>
		            </div>

          			<button class="btn btn-primary btn-large btn-block">Login</button> 
            		
         	 </div>

          {{Form::close()}}
        </div>
     </div>

@stop