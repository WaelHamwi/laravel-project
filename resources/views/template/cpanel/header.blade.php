<html>
	<head>
		<title>@yield("pageTitle")</title>
		<link rel="styleSheet" type="text/css" href="{{asset("assets/cpanel/css/bootstrap.min.css")}}" />
		<link rel="styleSheet" type="text/css" href="{{asset("assets/cpanel/css/base.css")}}" />
	</head>
	<body>
		<div id="wrapper" class="container">
			<div id="header" class="row">
				<div class="logo col-md-7">
					<h1>
						<a href="{{url("cpanel/home/index")}}">DASHBOARD</a>
					</h1>
				</div>
				<div class="logout col-md-5">
					<h6>
						welcome mr/mrs ____ to logout
						<a href="#">click here</a>
					</h6>
				</div>
			</div>