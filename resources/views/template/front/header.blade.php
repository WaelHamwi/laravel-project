<html>
	<head>
		<title>@yield("pageTitle")</title>
		<link rel="styleSheet" type="text/css" href="{{asset("assets/front/css/bootstrap.min.css")}}" />
		<link rel="styleSheet" type="text/css" href="{{asset("assets/front/css/base.css")}}" />
	</head>
	<body>
		<div id="wrapper" class="container">
			<div id="header" class="row">
				<div class="logo col-md-7">
					<h1>
						<a href="#">NEWSPAPER</a>
					</h1>
					<h6 style="float:right">you are welcome <span style="color:brown">{{auth()->user()->name}}</span> </h6>
				</div>
			</div>