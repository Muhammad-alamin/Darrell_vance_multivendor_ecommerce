<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Multi vendor E-commerce</title>

    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('assets/favicon.png')}}">

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: { families: ['Poppins:400,500,600,700'] }
        };
        ( function ( d ) {
            var wf = d.createElement( 'script' ), s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore( wf, s );
        } )( document );
    </script>

    <link rel="preload" href="{{asset('front/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2')}}" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="{{asset('front/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2')}}" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="{{asset('front/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2')}}" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="{{asset('front/assets/fonts/wolmart87d5.woff?png09e')}}" as="font" type="font/woff" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/vendor/swiper/swiper-bundle.min.css')}}">

    <!-- Plugin CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/vendor/magnific-popup/magnific-popup.min.css')}}">


    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/demo1.min.css')}}">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/TimeCircles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/readme.css')}}">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Remember to include jQuery :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <script>
        var PRODUCT_IMAGE = "{{asset('images/products/')}}";
        var cartRoute = "{{route('Cart')}}";
        var homeRoute = "{{route('Home')}}";
        var checkoutRoute = "{{route('checkout')}}";
    </script>

    <script src="{{asset('front/assets/js/custom.js')}}"></script>
</head>
