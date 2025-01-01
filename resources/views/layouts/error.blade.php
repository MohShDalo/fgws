<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>
		@yield('title')
	</title>
	<script src="{{ asset('js/app.js') }}" defer></script>
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<style>
		.rtl .dropdown-item{
			text-align:right
		}
		.error-code{
			font-size:9rem;
			text-align:center;
			background-image: linear-gradient(45deg, #0000FFAA,#0000FF11);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent; 
			line-height:220px;
		}
		.error-message{
			font-size:24px
		}
	</style>
</head>

<?php $isDarkMode = true;$is_RTL=!false; ?>
<body dir="{{$is_RTL?'rtl':'ltr'}}" class="{{$is_RTL?'rtl':'ltr'}}">
	
	<div class="container mt-5 pt-4">
		<div class="row justify-content-center mt-5 pt-5">
			<div class="col-xl-6 col-xl-8 col-lg-10 col-md-8 col-sm-10 col-12 ">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-xl-6 col-lg-7">
								<div class="error-code ">{{$code}}</div>
							</div>
							<div class="col-xl-6 col-lg-5 ">
								<div class="row justify-content-center">
									<div class="col-8 mb-3">
										<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/11/Test-Logo.svg/783px-Test-Logo.svg.png?20150906031702" alt="" width="100%">
									</div>
									<div class="col-12">
										<div class="error-message">{{$message}}</div>
									</div>
									<div class="col-12">
										@yield('content')
									</div>
									<div class="col-12"><a href="{{route('home')}}">Go Home</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>