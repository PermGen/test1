<html>
<head>

	<title></title>

	{{HTML::style('assets/bootstrap/css/bootstrap.min.css')}}
	{{HTML::style('assets/bootstrap/css/bootstrap-responsive.css')}}
	{{HTML::style('assets/css/flat-ui.css')}}
	{{HTML::style('assets/datepicker/css/datepicker.css')}}
	{{HTML::style('assets/css/img.css')}}
	{{HTML::style('assets/css/mystyle.css')}}


</head>
<body class="background">

	<div class="row-fluid">
		<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					
						

						
								<div class="span2">

								</div>

								<div class="span8">
									<ul class="nav">
									<li><a href="{{URL('/')}}">Home</a></li>
									<li><a href="">Gallery</a></li>
									<li><a href="{{URL::to('history')}}">History</a></li>
									<li><a href="{{URL::to('route')}}">Routes</a></li>									
									<li><a href="">Location</a></li>
									<li><a href="{{URL::to('contactus')}}">Contact us</a></li>

									</ul>
							

							
								@if(Auth::check())
			     	<ul class="nav">

									<!-- g -->
					<li >
                      <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->First_Name}} {{Auth::user()->Last_Name}} <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                        
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{URL::to('logout')}}">Logout</a></li>
                      </ul>
                    </li>
                    </ul>
									<!-- m -->
						        @endif			

							
							</div>



					
				</div>
		</div>
		<br><br>
	</div>
	
	<div class="row-fluid">
		<div class="container-fluid">
	@if(Auth::check())		
	<div class="span3">

				<div class="well">
	
<div class="accordion" id="accordion2">
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
        Reservations
      </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse in">
      <div class="accordion-inner">
     
			  <ul class="nav nav-pills nav-stacked">
			  	<li><a href="myreservation">My Reserve Seats</a></li>
			  	<li><a href="mycancel">My Cancels</li>
			  </ul>
      
      </div>
    </div>
  </div>
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
        Collapsible Group Item #2
      </a>
    </div>
    <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
        Anim pariatur cliche...
      </div>
    </div>
  </div>
</div>

				</div>
				@endif
			</div>
					

			@if(Request::segment(1)=="Reservation")
			<div class="{{Auth::check()?'span9': 'span3'}}">
			{{!Auth::check()?'<br><br><br>':''}}
				<div class="well">

							@yield('content')
						
				</div>
			</div>

			@else
			{{!Auth::check()?'<br><br><br>':''}}
			<div class="{{Auth::check()?'span9': 'span6'}}">

				<div class="well">

							@yield('content')
						
				</div>
			</div>
			@endif
				
			
		</div>
	</div>

	<div class="row-fluid">
		<div class="navbar navbar-inverse navbar-fixed-bottom">

				
					<div class="navbar-inner">
							<div class="container">
						<ul class="nav">
							<li><a href="">&copy; Coded By Dev Tulio</a>
							</li>
						</ul>
							</div>
					</div>	

		</div>

	</div>
</div>

{{HTML::script('assets/js/jquery.js')}}
{{HTML::script('assets/datepicker/js/datepicker.js')}}
{{HTML::script('assets/datepicker/js/date.js')}}
{{HTML::script('assets/js/bootstrap.min.js')}}
{{HTML::script('assets/retina/retina.js')}}


</body>
</html>