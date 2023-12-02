<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>ibook - nhà sách trực tuyến</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
        <!-- Favicon
		============================================ -->
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
		<link
		rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
	  />

	  <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
	    <!-- MDB -->
		<link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}" />

		<script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
		<script type="text/javascript"></script>
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
    </head>
    <body class="home-one">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <!-- Add your site or application content here -->
		<!-- header area start -->
	
		@include('components.header')
		<!-- header area end -->
		<!-- start home slider -->
		<section>
			@yield('content');
		</section>
		<!-- Brand Logo Area End -->
		<!-- FOOTER START -->
	@include('components.footer')
		<!-- FOOTER END -->
		
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
		  <script src="{{ asset('js/loadimg.js') }}"></script>
        
   		<!-- wow js
		============================================ -->       
        <script src="{{ asset('js/wow.js') }}"></script>
        <script src="{{ asset('js/getlocation.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
   		<!-- plugins js
		============================================ -->         
        <script src="{{ asset('js/plugins.js') }}"></script>
            <script src="js/vendor/jquery-1.11.3.min.js"></script>

      
        <script src="js/owl.carousel.min.js"></script>
		

        <script src="js/jquery.scrollUp.min.js"></script>
	
		<script src="js/jquery.meanmenu.js"></script>	

        <script src="js/main.js"></script>
   		<!-- main js
		============================================ -->           
        <script src="{{ asset('js/main.js') }}"></script>
		<script src="{{ asset('js/gmap.js') }}"></script>
		<script src="https://kit.fontawesome.com/fbdb677fe0.js" crossorigin="anonymous"></script>
		
    </body>
</html>