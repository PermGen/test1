<html>
<head>

	<title></title>
	{{HTML::style('assets/bootstrap/css/bootstrap.min.css')}}
	{{HTML::style('assets/css/flat-ui.css')}}
	{{HTML::style('assets/datepicker/css/datepicker.css')}}
	{{HTML::style('assets/css/img.css')}}
	{{HTML::style('assets/css/docs.css')}}

</head>
<body style="background:#FFFFFF;padding-top:27px">

	<div class="row-fluid">
		<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					
						

							<div class="container">
								<div class="span2">

								</div>

								<div class="span8">
									<ul class="nav">
									
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
		<div class="container">
			
		
					@yield('content')						

						
			
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
</body>
</html>