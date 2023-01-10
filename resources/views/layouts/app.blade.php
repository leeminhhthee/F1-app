<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
		{{-- <base href="{{ asset('/') }}"> --}}
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>VuRoT | @yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
        <!-- Favicon
		============================================ -->
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo_title.png') }}">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		
		{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}
		<!-- Fonts
		============================================ -->
		<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
		
 		<!-- CSS  --> 
		
		<!-- Bootstrap CSS
		============================================ -->      
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        
		<!-- owl.carousel CSS
		============================================ -->      
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
        
		<!-- owl.theme CSS
		============================================ -->      
        <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}">
           	
		<!-- owl.transitions CSS
		============================================ -->      
        <link rel="stylesheet" href="{{ asset('css/owl.transitions.css') }}">
        
		<!-- font-awesome.min CSS
		============================================ -->      
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
		
		<!-- font-icon CSS
		============================================ -->      
        <link rel="stylesheet" href="{{ asset('fonts/font-icon.css') }}">
		
		<!-- jquery-ui CSS
		============================================ -->
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
		
		<!-- mobile menu CSS
		============================================ -->
		<link rel="stylesheet" href="{{ asset('css/meanmenu.min.css') }}">
		
		<!-- nivo slider CSS
		============================================ -->
		<link rel="stylesheet" href="{{ asset('custom-slider/css/nivo-slider.css') }}" type="text/css" />
		<link rel="stylesheet" href="{{ asset('custom-slider/css/preview.css') }}" type="text/css" media="screen" />
        
 		<!-- animate CSS
		============================================ -->         
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        
 		<!-- normalize CSS
		============================================ -->        
        <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
   
        <!-- main CSS
		============================================ -->          
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        
        <!-- style CSS
		============================================ -->          
        <link rel="stylesheet" href="{{ asset('style.css') }}">
        
        <!-- responsive CSS
		============================================ -->          
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

        <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>

		<style>
		#zoom {
			transition: all 1s ease;
			-webkit-transition: all 1s ease;
			-moz-transition: all 1s ease;
			-o-transition: all 1s ease;
		}

		#zoom:hover {
			transform: scale(1.5,1.5);
			-webkit-transform: scale(1.5,1.5);
			-moz-transform: scale(1.5,1.5);
			-o-transform: scale(1.5,1.5);
			-ms-transform: scale(1.5,1.5);
		}
		#scrollUp {
			bottom: 150px !important;
		}
		.error-text {
			color: red;
			font-style: italic;
			font-size: 13px;
		}
		#error {
			width: 310px; 
			background-color: rgb(250, 103, 103);
			color: white;
		}
		#success {
			width: 230px; 
			background-color: #31AF8C;
			color: white;
		}
		.internet {
			font-size: 15px;
			position: fixed;
			bottom: 50px;
			right: 50px;
			font-family: system-ui !important;
			display: block;
			border-radius: 10px;
			animation: showAlert 0.5s ease-in-out 1;
			display: none;
			z-index: inherit;
            z-index: 3;
		}
		.success, .error{
			font-size: small;
		}
		.internet .close {
			top: -10px !important;
		}
		@keyframes showAlert{
			from{
				opacity: 0;
				transform: translate(0, 100px);
			} to {
				opacity: 1;
				transform: translate(0, 0);
			}
		}
		</style>
    </head>
    <body class="home-one">

        @include('components.header')

		@if (Session::has('success'))
		<div class="alert alert-success alert-dismissible" style="position: fixed; right: 20px;top: 20px; left: 50%; transform: translateX(-50%);z-index: 9999999999999;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-bottom: 3px">&times;</a>
			<strong>Success! </strong> {{ Session::get('success') }}
		</div>
		@endif
		@if (Session::has('danger'))
		<div class="alert alert-danger alert-dismissible" style="position: fixed; right: 20px;top: 20px; left: 50%; transform: translateX(-50%);z-index: 9999999999999;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-bottom: 3px">&times;</a>
			<strong>Error! </strong> {{ Session::get('danger') }}
		</div>
        @endif
		@if (Session::has('warning'))
		<div class="alert alert-warning alert-dismissible" style="position: fixed; right: 20px;top: 20px; left: 50%; transform: translateX(-50%);z-index: 9999999999999;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-bottom: 3px">&times;</a>
			<strong>Warning! </strong> {{ Session::get('warning') }}
		</div>
        @endif

		<div class="alert alert-danger alert-dismissible internet" id="error">
			<strong><i class="fa fa-exclamation-triangle"></i> Internet disconnect!</strong> <br>
			<span class="error">&emsp;&nbsp;&nbsp;The website may contain some errors. </span>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="alert alert-success alert-dismissible internet" id="success">
			<i class="fa fa-wifi"></i><strong> Internet connected!</strong><br>
			<span class="success">&emsp;&nbsp;&nbsp;Connected successfull!!</span>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>

        @yield('content')

		<script>
			window.addEventListener('offline', function(){
				document.getElementById('success').style.display = 'none';
				document.getElementById('error').style.display = 'block';
			});
			window.addEventListener('online', function(){
				document.getElementById('error').style.display = 'none';
				document.getElementById('success').style.display = 'block';
			});
		</script>

		<!--Start of Tawk.to Script-->
		<script type="text/javascript">
			var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
			(function(){
			var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
			s1.async=true;
			s1.src='https://embed.tawk.to/6370ab16b0d6371309cebf9e/1gho1ol72';
			s1.charset='UTF-8';
			s1.setAttribute('crossorigin','*');
			s0.parentNode.insertBefore(s1,s0);
			})();
		</script>
		<!--End of Tawk.to Script-->

        @include('components.footer')

        <!-- JS -->
 		<!-- jquery-1.11.3.min js
		============================================ -->         
        <script src="{{ asset('js/vendor/jquery-1.11.3.min.js') }}"></script>
 		<!-- bootstrap js
		============================================ -->         
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<!-- Nivo slider js
		============================================ --> 		
		<script src="{{ asset('custom-slider/js/jquery.nivo.slider.js') }}" type="text/javascript"></script>
		<script src="{{ asset('custom-slider/home.js') }}" type="text/javascript"></script>
   		<!-- owl.carousel.min js
		============================================ -->       
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
		<!-- jquery scrollUp js 
		============================================ -->
        <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
		<!-- price-slider js
		============================================ --> 
        <script src="{{ asset('js/price-slider.js') }}"></script>
		<!-- elevateZoom js 
		============================================ -->
		<script src="{{ asset('js/jquery.elevateZoom-3.0.8.min.js') }}"></script>
		<!-- jquery.bxslider.min.js
		============================================ -->       
        <script src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
		<!-- mobile menu js
		============================================ -->  
		<script src="{{ asset('js/jquery.meanmenu.js') }}"></script>	
   		<!-- wow js
		============================================ -->       
        <script src="{{ asset('js/wow.js') }}"></script>
   		<!-- plugins js
		============================================ -->         
        <script src="{{ asset('js/plugins.js') }}"></script>
   		<!-- main js
		============================================ -->           
        <script src="{{ asset('js/main.js') }}"></script>
		@yield('script')
		@yield('scripts')
    </body>
</html>