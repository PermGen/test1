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
					
						

							<div class="container">
								<div class="span2">

								</div>

								<div class="span8">
									<ul class="nav">
									<li><a href="{{URL('/')}}">Home</a></li>
									<li><a href="">Gallery</a></li>
									<li><a href="{{URL::to('history')}}">History</a></li>
									<li><a href="{{URL('Reservation')}}">Routes</a></li>									
									<li><a href="">Location</a></li>
									<li><a href="">Contact us</a></li>
									</ul>
								</div>

								<div class="span2">


								</div>
							</div>



					
				</div>
		</div>
		<br><br>
	</div>
	
	<div class="row-fluid">
		<div class="container-fluid">
			
							
		

							@yield('content')
						
				
			</div>

				
			
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
{{HTML::script('assets/js/bootstrap.min.js')}}
{{HTML::script('assets/retina/retina.js')}}

</body>
</html>