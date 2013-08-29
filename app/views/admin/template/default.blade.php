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
								<li>	<a class="brand" href="" >ADMIN</a></li>
								<li>	<a href="{{URL::to('admin/logout')}}" >Logout</a></li>
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
			
		
				<div class="span4">
<div class="accordion" id="accordion2">
  <div class="accordion-group">
	    <div class="accordion-heading">
	      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
	        Bus
	      </a>
	    </div>
	    <div id="collapseOne" class="accordion-body collapse in">
	      <div class="accordion-inner">
	     
				  <ul class="nav nav-pills nav-stacked">
				  	<li><a href="{{URL::to('admin/addbus')}}">Add Bus</a></li>
				  	<li><a href="">Edit Bus</a></li>
				   	<li><a href="">Update Bus Status</a></li>
				  </ul>
	      
	      </div>
	    </div>
  </div>
  <div class="accordion-group">
	    <div class="accordion-heading">
	      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
	       Route
	      </a>
	    </div>
	    <div id="collapseTwo" class="accordion-body collapse">
	      <div class="accordion-inner">
	        <ul class="nav nava-pills nav stacked">
	        	<li><a href="{{URL::to('admin/addRoute')}}">Add Route</a></li>
	        	<li><a href="">Edit Route</a></li>
	        </ul>
	      </div>
	    </div>
  </div>

	</div>

  <div class="accordion-group">
	    <div class="accordion-heading">
	      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
	        Reservation
	      </a>
	    </div>
	    <div id="collapseThree" class="accordion-body collapse">
	      <div class="accordion-inner">
	        <ul class="nav nava-pills nav stacked">
	        	<li><a href="{{URL::to('admin/Reservationpayment')}}">Payment</a></li>
	        	<li><a href="{{URL::to('admin/ValidTicket')}}">Search Valid Ticket</a></li>
	        </ul>
	      </div>
	    </div>
  </div>
</div>

				<div class="span8">
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
{{HTML::script('assets/datepicker/js/date.js')}}
{{HTML::script('assets/js/bootstrap.min.js')}}
</body>
</html>