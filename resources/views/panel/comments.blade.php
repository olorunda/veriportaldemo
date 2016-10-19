<?php
$totalApplicants = $applicantsTotal;
$notRated = $totalApplicants - $rated;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Interview - Comments</title>

	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-multiselect.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/pace.green.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/ladda.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/neon-forms.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">

	<style>
		html, body {
			background-color: #fff;
			color: #636b6f;
			font-family: 'Roboto';
			height: 100vh;
			margin: 0;
		}
	</style>

	<!-- Scripts -->
	<script>
		window.Laravel = <?php echo json_encode([
			'csrfToken' => csrf_token(),
			]); ?>
		</script>
		<script type="text/javascript" src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('/js/bootstrap-multiselect.js') }}"></script>
		<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
		<script type="text/javascript" data-pace-options='{ "ajax": true }' src="{{asset('js/pace.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/spin.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/ladda.min.js')}}"></script>
		<script src="/js/neon-login.js"></script>
		<script src="/js/jquery.validate.min.js"></script>
	</head>
    <!--<div id="data">
            
</div>-->
<body class="ash">
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">

				<!-- Collapsed Hamburger -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
					<span class="sr-only">Interview</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- Branding Image -->
				<a class="navbar-brand" href="{{ url('/') }}">
					{{ config('app.name', 'Interview') }}
				</a>
			</div>

			<div class="collapse navbar-collapse" id="app-navbar-collapse">
				<!-- Left Side Of Navbar -->
				<ul class="nav navbar-nav">
					&nbsp;
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="/dashboard">Interview</a></li>
					<li><a href="/rate2">Rating Table</a></li>
					<li><a href="/panelists">Panelists</a></li>
					<li class="active"><a href="/comments">Comments</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
									<i class="fa fa-power-off"></i> Logout
								</a>
								<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-2 pull-right">
					<img src="">
				</div>
			</div>
		</div>
	</div>
</body>
</html>