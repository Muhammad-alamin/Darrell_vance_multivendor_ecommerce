<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from portotheme.com/html/wolmart/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Nov 2021 21:54:13 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Multivendor E-commerce</title>

    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.png">

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
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/style.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Remember to include jQuery :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script><!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"></script>
    <script>
        var PRODUCT_IMAGE = "{{asset('images/products/')}}";
        var cartRoute = "{{route('Cart')}}";
        var homeRoute = "{{route('Home')}}";
        var checkoutRoute = "{{route('checkout')}}";
    </script>
    <script src="{{asset('front/assets/js/custom.js')}}"></script>
</head>

<body>
<div class="page-wrapper">

    <!-- Start of Header -->
    <header class="header">
        <div class="header-top">
            <div class="container">
                <div class="header-left">
                    <p class="welcome-msg">Multi vendor E-commerce marketplace</p>
                </div>
                <div class="header-right">
                    <!-- End of DropDown Menu -->

                    <!-- End of Dropdown Menu -->
                    <span class="divider d-lg-show"></span>
                    <a href="blog.html" class="d-lg-show">Blog</a>
                    <a href="contact-us.html" class="d-lg-show">Contact Us</a>
                    @if (Route::has('login'))
                        @auth()
                            <a href="{{route('customer.dashboard',\Illuminate\Support\Facades\Crypt::encryptString(\Illuminate\Support\Facades\Auth::user()->id))}}" class="d-lg-show">My Account</a>
                            <a href="" class="d-lg-show">{{auth()->user()->name}}</a>
                            <a class="" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                <em class="icon ni ni-signout"></em><span>Sign out</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @else
                            <a href="{{route('login')}}" class=""><i
                                    class="w-icon-account"></i>Sign In</a>
                            <span class="delimiter d-lg-show">/</span>
                            <a href="{{route('customer.create')}}" class="ml-0">Register</a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
        <!-- End of Header Top -->

        <div class="header-middle">
            <div class="container">
                <div class="header-left mr-md-4">
                    <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
                    </a>
                    <a href="{{ route('Home') }}" class="logo ml-lg-0">
                        <img src="{{asset('front/assets/images/logo.png')}}" alt="logo" width="300" height="45" />
                    </a>
                    <form method="get" action="{{ route('front.product.search') }}" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">

                        <input type="text" class="form-control" name="product_search" id="product_search"
                               placeholder="Search in..." value="{{ request('product_search') }}" required />
                        <button class="btn btn-search" name="searchBtn" type="submit"><i class="w-icon-search"></i>
                        </button>
                    </form>
                </div>
                <div class="header-right ml-4">
                    <div class="header-call d-xs-show d-lg-flex align-items-center">
                        <a href="tel:#" class="w-icon-call"></a>
                        <div class="call-info d-lg-show">
                            <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                                <a href="mailto:#" class="text-capitalize">Live Chat</a> or :</h4>
                            <a href="tel:#" class="phone-number font-weight-bolder ls-50">0(800)123-456</a>
                        </div>
                    </div>
                    <a class="wishlist label-down link d-xs-show" href="{{route('wishlist')}}">
                        <i class="w-icon-heart"></i>
                        <span class="wishlist-label d-lg-show">Wishlist</span>
                    </a>
                    <a class="compare label-down link d-xs-show" href="{{route('compares')}}">
                        <i class="w-icon-compare"></i>
                        <span class="compare-label d-lg-show">Compare</span>
                    </a>
                    <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                        <div class="cart-overlay"></div>
                        <a href="javascript:void(0)" class="cart-toggle label-down link">
                            <i class="w-icon-cart">
                                <span class="cart-count">0</span>
                            </i>
                            <span class="cart-label">Cart</span>
                        </a>
                        <div class="dropdown-box " style="height: 630px; overflow-y: scroll; ">
                            <div class="cart-header" id="cartBox">
                                <span>Shopping Cart</span>
                                <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                            <div class=" itemCart align-center cart-empty" style="margin-left: 20px">
                                {{--                                                            <div class="product-detail">--}}
                                {{--                                                                <a href="product-default.html" class="product-name">Beige knitted--}}
                                {{--                                                                    elas<br>tic--}}
                                {{--                                                                    runner shoes</a>--}}
                                {{--                                                                <div class="price-box">--}}
                                {{--                                                                    <span class="product-quantity">1</span>--}}
                                {{--                                                                    <span class="product-price">$25.68</span>--}}
                                {{--                                                                </div>--}}
                                {{--                                                            </div>--}}
                                {{--                                                            <figure class="product-media">--}}
                                {{--                                                                <a href="product-default.html">--}}
                                {{--                                                                    <img src="assets/images/cart/product-1.jpg" alt="product" height="84"--}}
                                {{--                                                                         width="94" />--}}
                                {{--                                                                </a>--}}
                                {{--                                                            </figure>--}}
                                {{--                                                            <button class="btn btn-link btn-close" aria-label="button">--}}
                                {{--                                                                <i class="fas fa-times"></i>--}}
                                {{--                                                            </button>--}}
                            </div>

                            {{--                        <div class="products">--}}
                            {{--                            <div class="cart-total priceCart">--}}
                            {{--                                <label>Subtotal:</label>--}}
                            {{--                                <span class="price gTotal">$58.67</span>--}}
                            {{--                            </div>--}}

                            {{--                            <div class="cart-action">--}}
                            {{--                                <a href="" class="btn btn-dark btn-outline btn-rounded">View Cart</a>--}}
                            {{--                                <a href="checkout.html" class="btn btn-primary  btn-rounded">Checkout</a>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                        </div>
                        <!-- End of Dropdown Box -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Header Middle -->

        <div class="header-bottom sticky-content fix-top sticky-header">
            <div class="container">
                <div class="inner-wrap">
                    <div class="header-left">
                        <div class="dropdown category-dropdown has-border" data-visible="true">
                            <a href="#" class="category-toggle" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="true" data-display="static"
                               title="Browse Categories">
                                <i class="w-icon-category"></i>
                                <span>Browse Categories</span>
                            </a>

                            <div class="dropdown-box text-default">
                                <ul class="menu vertical-menu category-menu">
                                    @foreach(mainNavCategories() as $category)
                                        <li>
                                            <a href="{{route('category.product', encrypt($category->id))}}">
                                                {{$category->category_name}}
                                            </a>
                                        </li>
                                    @endforeach
                                    <li>
                                        <a href="{{ route('front.shop') }}" class="font-weight-bold text-uppercase ls-25">
                                            View All Categories<i class="w-icon-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <nav class="main-nav">
                            <ul class="menu">
                                <li class="active">
                                    <a href="{{ route('Home') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('front.shop') }}">Shop</a>

                                </li>
                                <li>
                                    <a href="{{route('all.brands')}}">All Brands</a>
                                </li>
                                <li>
                                    <a href="{{route('all.categories')}}">All Categories</a>
                                </li>
                                <li>
                                    <a href="{{route('front-campaign-lst')}}">Campaign</a>
                                </li>
                                <li>
                                    <a href="{{route('registration.create')}}">Become seller</a>
                                </li>
                                <li>
                                    <a href="elements.html">Blogs</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-right">
                        <a href="{{route('trackOrder')}}" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track Order</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End of Header -->

    <!-- Start of Main -->
    <main class="main login-page">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Login</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="">Home</a></li>
                    <li>Login</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <div class="page-content">
            <div class="container">
                <div class="login-popup">
                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <ul class="nav nav-tabs text-uppercase" role="tablist">
                            <li class="nav-item">
                                <a href="#sign-in" class="nav-link active">Sign In</a>
                            </li>
                        </ul>
                        <form method="POST"  action="{{url('login')}}">
                            @csrf
                            <div class="tab-content">
                                <div class="tab-pane active" id="sign-in">
                                    <div class="form-group">
                                        <label>Email address </label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror " name="email" id="email"   value="{{ old('email') }}" required autocomplete="email" autofocus >
                                        @error('email')
                                            <span class="invalid-feedback" role="alert" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Password </label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror " name="password" id="password"  required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >
                                        <label for="remember1">Remember me</label>
                                        @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">Forget your password?</a>
                                            @endif
                                    </div>
                                    <div class="form-group mb-0">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
                                        @error('g-recaptcha-response')<i class="text-danger" style="color: red">{{$message}}</i>@enderror
                                    </div>
                                    <div class="form-note-s2 text-center pt-4"> New on our platform? <a href="{{route('customer.create')}}">Create an account</a>
                                    </div>
                                    <br>
                                    <button  class="btn btn-primary">Sign In</button>
                                </div>
                            </div>
                        </form>
                        <input type="hidden" id="hiddenAdminEmail"value="alamin5230@yahoo.com.sg">
                        <input type="hidden" id="hiddenAdminPass" value="12345678">
                        <input type="hidden" id="hiddenSellerEmail"value="rahim@gmail.com">
                        <input type="hidden" id="hiddenSellerPass" value="12345">
                        <input type="hidden" id="hiddenCustomerEmail"value="karim@gmail.com">
                        <input type="hidden" id="hiddenCustomerPass" value="12345">
                        <br>
                        <br>
                        <table class="table table-bordered mb-0 responsive-center">
                            <tbody class="text-center table-responsive">
                            <tr>
                                <td><p><strong style="color: darkgreen; font-size: 16px">Admin Account :</strong></p></td>
                                <td><p><button type="button" id="adminCredential" class="btn btn-primary btn-sm btn-ellipse">Copy credential</button></p></td>
                            </tr>
                            <tr>
                                <td><p><strong style="color: hotpink; font-size: 16px">Seller Account :</strong></p></td>
                                <td><p><button type="button" id="sellerCredential" class="btn btn-secondary btn-sm btn-ellipse">Copy credential</button></p></td>
                            </tr>
                            <tr>
                                <td><p><strong style="color: darkslateblue; font-size: 16px">Customer Account :</strong></p></td>
                                <td><p><button type="button" id="customerCredential" class="btn btn-success btn-sm btn-ellipse">Copy credential</button></p></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End of Main -->


    <!-- Start of Footer -->
    <footer class="footer">
        <div class="footer-newsletter pt-6 pb-6" style="background-color: darkgrey">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-5 col-lg-6">
                        <div class="icon-box icon-box-side text-white">
                            <div class="icon-box-icon d-inline-flex">
                                <i class="w-icon-envelop3"></i>
                            </div>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title text-white text-uppercase mb-0">Subscribe To  Our Newsletter</h4>
                                <p class="text-white">Get all the latest information on Events, Sales and Offers.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6 col-md-9 mt-4 mt-lg-0 ">
                        <form id="subscriber" action="#" method="get" class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                            <input type="email" class="form-control mr-2 bg-white" name="email" id="subscribe_email"
                                   placeholder="Your E-mail Address"/>
                            <button class="btn btn-dark btn-rounded" type="submit">Subscribe<i
                                    class="w-icon-long-arrow-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="widget widget-about">
                            <a href="demo1.html" class="logo-footer">
                                <img src="assets/images/logo_footer.png" alt="logo-footer" width="144"
                                     height="45" />
                            </a>
                            <div class="widget-body">
                                <p class="widget-about-title">Got Question? Call us 24/7</p>
                                <a href="tel:18005707777" class="widget-about-call">1-800-570-7777</a>
                                <p class="widget-about-desc">Register now to get updates on pronot get up icons
                                    & coupons ster now toon.
                                </p>

                                <div class="social-icons social-icons-colored">
                                    <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                    <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                    <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                    <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                                    <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget">
                            <h3 class="widget-title">Company</h3>
                            <ul class="widget-body">
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="#">Team Member</a></li>
                                <li><a href="#">Career</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                                <li><a href="#">Affilate</a></li>
                                <li><a href="#">Order History</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget">
                            <h4 class="widget-title">My Account</h4>
                            <ul class="widget-body">
                                <li><a href="#">Track My Order</a></li>
                                <li><a href="cart.html">View Cart</a></li>
                                <li><a href="login.html">Sign In</a></li>
                                <li><a href="#">Help</a></li>
                                <li><a href="wishlist.html">My Wishlist</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget">
                            <h4 class="widget-title">Customer Service</h4>
                            <ul class="widget-body">
                                <li><a href="#">Payment Methods</a></li>
                                <li><a href="#">Money-back guarantee!</a></li>
                                <li><a href="#">Product Returns</a></li>
                                <li><a href="#">Support Center</a></li>
                                <li><a href="#">Shipping</a></li>
                                <li><a href="#">Term and Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-left">
                    <p class="copyright">Copyright © 2021 Wolmart Store. All Rights Reserved.</p>
                </div>
                <div class="footer-right">
                    <span class="payment-label mr-lg-8">We're using safe payment for</span>
                    <figure class="payment">
                        <img src="assets/images/payment.png" alt="payment" width="159" height="25" />
                    </figure>
                </div>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
</div>
<!-- End of Page Wrapper -->

<!-- Start of Sticky Footer -->
<div class="sticky-footer sticky-content fix-bottom">
    <a href="demo1.html" class="sticky-link active">
        <i class="w-icon-home"></i>
        <p>Home</p>
    </a>
    <a href="shop-banner-sidebar.html" class="sticky-link">
        <i class="w-icon-category"></i>
        <p>Shop</p>
    </a>
    <a href="my-account.html" class="sticky-link">
        <i class="w-icon-account"></i>
        <p>Account</p>
    </a>
    <div class="cart-dropdown dir-up">
        <a href="cart.html" class="sticky-link">
            <i class="w-icon-cart"></i>
            <p>Cart</p>
        </a>
        <div class="dropdown-box">
            <div class="products">
                <div class="product product-cart">
                    <div class="product-detail">
                        <h3 class="product-name">
                            <a href="product-default.html">Beige knitted elas<br>tic
                                runner shoes</a>
                        </h3>
                        <div class="price-box">
                            <span class="product-quantity">1</span>
                            <span class="product-price">$25.68</span>
                        </div>
                    </div>
                    <figure class="product-media">
                        <a href="#">
                            <img src="assets/images/cart/product-1.jpg" alt="product" height="84"
                                 width="94" />
                        </a>
                    </figure>
                    <button class="btn btn-link btn-close" aria-label="button">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="product product-cart">
                    <div class="product-detail">
                        <h3 class="product-name">
                            <a href="https://www.portotheme.com/html/wolmart/product.html">Blue utility pina<br>fore
                                denim dress</a>
                        </h3>
                        <div class="price-box">
                            <span class="product-quantity">1</span>
                            <span class="product-price">$32.99</span>
                        </div>
                    </div>
                    <figure class="product-media">
                        <a href="#">
                            <img src="assets/images/cart/product-2.jpg" alt="product" width="84"
                                 height="94" />
                        </a>
                    </figure>
                    <button class="btn btn-link btn-close" aria-label="button">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="cart-total">
                <label>Subtotal:</label>
                <span class="price">$58.67</span>
            </div>

            <div class="cart-action">
                <a href="cart.html" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                <a href="checkout.html" class="btn btn-primary  btn-rounded">Checkout</a>
            </div>
        </div>
        <!-- End of Dropdown Box -->
    </div>

    <div class="header-search hs-toggle dir-up">
        <a href="#" class="search-toggle sticky-link">
            <i class="w-icon-search"></i>
            <p>Search</p>
        </a>
        <form action="#" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off"
                   placeholder="Search" required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
    </div>
</div>
<!-- End of Sticky Footer -->

<!-- Start of Scroll Top -->
<a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="w-icon-angle-up"></i> <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70"> <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35" r="34" style="stroke-dasharray: 16.4198, 400;"></circle> </svg> </a>
<!-- End of Scroll Top -->

<!-- Start of Mobile Menu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay"></div>
    <!-- End of .mobile-menu-overlay -->

    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
    <!-- End of .mobile-menu-close -->

    <div class="mobile-menu-container scrollable">
        <form action="#" method="get" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off"
                   placeholder="Search" required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="#main-menu" class="nav-link active">Main Menu</a>
                </li>
                <li class="nav-item">
                    <a href="#categories" class="nav-link">Categories</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="main-menu">
                <ul class="mobile-menu">
                    <li><a href="demo1.html">Home</a></li>
                    <li>
                        <a href="shop-banner-sidebar.html">Shop</a>
                        <ul>
                            <li>
                                <a href="#">Shop Pages</a>
                                <ul>
                                    <li><a href="shop-banner-sidebar.html">Banner With Sidebar</a></li>
                                    <li><a href="shop-boxed-banner.html">Boxed Banner</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Full Width Banner</a></li>
                                    <li><a href="shop-horizontal-filter.html">Horizontal Filter<span class="tip tip-hot">Hot</span></a></li>
                                    <li><a href="shop-off-canvas.html">Off Canvas Sidebar<span class="tip tip-new">New</span></a></li>
                                    <li><a href="shop-infinite-scroll.html">Infinite Ajax Scroll</a></li>
                                    <li><a href="shop-right-sidebar.html">Right Sidebar</a></li>
                                    <li><a href="shop-both-sidebar.html">Both Sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Shop Layouts</a>
                                <ul>
                                    <li><a href="shop-grid-3cols.html">3 Columns Mode</a></li>
                                    <li><a href="shop-grid-4cols.html">4 Columns Mode</a></li>
                                    <li><a href="shop-grid-5cols.html">5 Columns Mode</a></li>
                                    <li><a href="shop-grid-6cols.html">6 Columns Mode</a></li>
                                    <li><a href="shop-grid-7cols.html">7 Columns Mode</a></li>
                                    <li><a href="shop-grid-8cols.html">8 Columns Mode</a></li>
                                    <li><a href="shop-list.html">List Mode</a></li>
                                    <li><a href="shop-list-sidebar.html">List Mode With Sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Product Pages</a>
                                <ul>
                                    <li><a href="product-variable.html">Variable Product</a></li>
                                    <li><a href="product-featured.html">Featured &amp; Sale</a></li>
                                    <li><a href="product-accordion.html">Data In Accordion</a></li>
                                    <li><a href="product-section.html">Data In Sections</a></li>
                                    <li><a href="product-swatch.html">Image Swatch</a></li>
                                    <li><a href="product-extended.html">Extended Info</a>
                                    </li>
                                    <li><a href="product-without-sidebar.html">Without Sidebar</a></li>
                                    <li><a href="product-video.html">360<sup>o</sup> &amp; Video<span class="tip tip-new">New</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Product Layouts</a>
                                <ul>
                                    <li><a href="product-default.html">Default<span class="tip tip-hot">Hot</span></a></li>
                                    <li><a href="product-vertical.html">Vertical Thumbs</a></li>
                                    <li><a href="product-grid.html">Grid Images</a></li>
                                    <li><a href="product-masonry.html">Masonry</a></li>
                                    <li><a href="product-gallery.html">Gallery</a></li>
                                    <li><a href="product-sticky-info.html">Sticky Info</a></li>
                                    <li><a href="product-sticky-thumb.html">Sticky Thumbs</a></li>
                                    <li><a href="product-sticky-both.html">Sticky Both</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="vendor-dokan-store.html">Vendor</a>
                        <ul>
                            <li>
                                <a href="#">Store Listing</a>
                                <ul>
                                    <li><a href="vendor-dokan-store-list.html">Store listing 1</a></li>
                                    <li><a href="vendor-wcfm-store-list.html">Store listing 2</a></li>
                                    <li><a href="vendor-wcmp-store-list.html">Store listing 3</a></li>
                                    <li><a href="vendor-wc-store-list.html">Store listing 4</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Vendor Store</a>
                                <ul>
                                    <li><a href="vendor-dokan-store.html">Vendor Store 1</a></li>
                                    <li><a href="vendor-wcfm-store-product-grid.html">Vendor Store 2</a></li>
                                    <li><a href="vendor-wcmp-store-product-grid.html">Vendor Store 3</a></li>
                                    <li><a href="vendor-wc-store-product-grid.html">Vendor Store 4</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blog.html">Blog</a>
                        <ul>
                            <li><a href="blog.html">Classic</a></li>
                            <li><a href="blog-listing.html">Listing</a></li>
                            <li>
                                <a href="https://www.portotheme.com/html/wolmart/blog-grid.html">Grid</a>
                                <ul>
                                    <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                    <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                    <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                    <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Masonry</a>
                                <ul>
                                    <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                    <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                    <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                    <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Mask</a>
                                <ul>
                                    <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                    <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="post-single.html">Single Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="about-us.html">Pages</a>
                        <ul>

                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="become-a-vendor.html">Become A Vendor</a></li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="faq.html">FAQs</a></li>
                            <li><a href="error-404.html">Error 404</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="my-account.html">My Account</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="elements.html">Elements</a>
                        <ul>
                            <li><a href="element-products.html">Products</a></li>
                            <li><a href="element-titles.html">Titles</a></li>
                            <li><a href="element-typography.html">Typography</a></li>
                            <li><a href="element-categories.html">Product Category</a></li>
                            <li><a href="element-buttons.html">Buttons</a></li>
                            <li><a href="element-accordions.html">Accordions</a></li>
                            <li><a href="element-alerts.html">Alert &amp; Notification</a></li>
                            <li><a href="element-tabs.html">Tabs</a></li>
                            <li><a href="element-testimonials.html">Testimonials</a></li>
                            <li><a href="element-blog-posts.html">Blog Posts</a></li>
                            <li><a href="element-instagrams.html">Instagrams</a></li>
                            <li><a href="element-cta.html">Call to Action</a></li>
                            <li><a href="element-vendors.html">Vendors</a></li>
                            <li><a href="element-icon-boxes.html">Icon Boxes</a></li>
                            <li><a href="element-icons.html">Icons</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="tab-pane" id="categories">
                <ul class="mobile-menu">
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-tshirt2"></i>Fashion
                        </a>
                        <ul>
                            <li>
                                <a href="#">Women</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">New Arrivals</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Best Sellers</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Trending</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Clothing</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Shoes</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Bags</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Accessories</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Jewlery &
                                            Watches</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Sale</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Men</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">New Arrivals</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Best Sellers</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Trending</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Clothing</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Shoes</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Bags</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Accessories</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Jewlery &
                                            Watches</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-home"></i>Home & Garden
                        </a>
                        <ul>
                            <li>
                                <a href="#">Bedroom</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Beds, Frames &
                                            Bases</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Dressers</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Nightstands</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Kid's Beds &
                                            Headboards</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Armoires</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Living Room</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Coffee Tables</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Chairs</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Tables</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Futons & Sofa
                                            Beds</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Cabinets &
                                            Chests</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Office</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Office Chairs</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Desks</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Bookcases</a></li>
                                    <li><a href="shop-fullwidth-banner.html">File Cabinets</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Breakroom
                                            Tables</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Kitchen & Dining</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Dining Sets</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Kitchen Storage
                                            Cabinets</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Bashers Racks</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Dining Chairs</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Dining Room
                                            Tables</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Bar Stools</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-electronics"></i>Electronics
                        </a>
                        <ul>
                            <li>
                                <a href="#">Laptops &amp; Computers</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Desktop
                                            Computers</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Monitors</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Laptops</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Hard Drives &amp;
                                            Storage</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Computer
                                            Accessories</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">TV &amp; Video</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">TVs</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Home Audio
                                            Speakers</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Projectors</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Media Streaming
                                            Devices</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Digital Cameras</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Digital SLR
                                            Cameras</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Sports & Action
                                            Cameras</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Camera Lenses</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Photo Printer</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Digital Memory
                                            Cards</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Cell Phones</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Carrier Phones</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Unlocked Phones</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Phone & Cellphone
                                            Cases</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Cellphone
                                            Chargers</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-furniture"></i>Furniture
                        </a>
                        <ul>
                            <li>
                                <a href="#">Furniture</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Sofas & Couches</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Armchairs</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Bed Frames</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Beside Tables</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Dressing Tables</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Lighting</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Light Bulbs</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Lamps</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Celling Lights</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Wall Lights</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Bathroom
                                            Lighting</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Home Accessories</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Decorative
                                            Accessories</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Candals &
                                            Holders</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Home Fragrance</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Mirrors</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Clocks</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Garden & Outdoors</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Garden
                                            Furniture</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Lawn Mowers</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Pressure
                                            Washers</a></li>
                                    <li><a href="shop-fullwidth-banner.html">All Garden
                                            Tools</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Outdoor Dining</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-heartbeat"></i>Healthy & Beauty
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-gift"></i>Gift Ideas
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-gamepad"></i>Toy & Games
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-ice-cream"></i>Cooking
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-ios"></i>Smart Phones
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-camera"></i>Cameras & Photo
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-ruby"></i>Accessories
                        </a>
                    </li>
                    <li>
                        <a href="shop-banner-sidebar.html" class="font-weight-bold text-primary text-uppercase ls-25">
                            View All Categories<i class="w-icon-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Mobile Menu -->
<!-- Plugin JS File -->
<script src="{{asset('front/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('front/assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/main.min.js')}}"></script>
<!-- Plugin JS File -->
<script src="{{asset('front/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('front/assets/vendor/sticky/sticky.js')}}"></script>
<script src="{{asset('front/assets/vendor/jquery.plugin/jquery.plugin.min.js')}}"></script>
<script src="{{asset('front/assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('front/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('front/assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('front/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('front/assets/vendor/zoom/jquery.zoom.js')}}"></script>
<script src="{{asset('front/assets/vendor/photoswipe/photoswipe.min.js')}}"></script>
<script src="{{asset('front/assets/vendor/photoswipe/photoswipe-ui-default.min.js')}}"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<!-- Swiper JS -->
<script src="{{asset('front/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>


<!-- Main JS File -->
<script src="{{asset('front/assets/js/main.min.js')}}"></script>
<script src="{{asset('front/assets/js/TimeCircles.js')}}"></script>

<script>

    $(document).ready(function () {

        $('.increment-btn').click(function (e) {
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value<10){
                value++;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }

        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });

    });


    $(document).on('click','.btnItemUpdate',function () {

        if($(this).hasClass('qtyMinus')){
            var quantity = $(this).prev().prev().val();
            if(quantity <= 1){
                Command: toastr["error"]("item quantity must be 1 or greater!")

                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "3000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                return false;
            }
            else{
                new_qty = parseInt(quantity)-1;
            }
        }
        if($(this).hasClass('qtyPlus')){
            var quantity = $(this).prev().val();
            new_qty = parseInt(quantity)+1;
        }
        var cartId = $(this).data('cartid');
        $.ajax({
            data:{
                "cartid": cartId,
                "qty": new_qty,
                "_token": "{{ csrf_token() }}",
            },
            url:'/update-cart-item-qty-ajax',
            type: 'post',
            success:function (resp) {
                // alert(data);
                // $('#appendCartItem').html(resp.item);
                if(resp.status == false){

                    Command: toastr["error"]("product stock not available")

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
                $('#appendCartItem').html(resp.item);
                loadCart();
                navCart();
            },
            error:function () {
                alert("Error");
            }
        })
    });

    $(document).on('click','.remove-item-cart',function () {

        var cartId = $(this).data("cart_id");
        // var cartId = $(this).data('cartid');
        // var result = confirm("want to delete this cart item");
        $.ajax({
            data:{
                "cartid": cartId,
                "_token": "{{ csrf_token() }}",
            },
            url:'/delete-cart-item-ajax',
            type: 'post',
            success:function (resp) {
                $('#appendCartItem').html(resp.item);
                loadCart();
                navCart();
            },
            error:function () {
                alert("Error");
            }
        })
    });

    //apply coupon in ajax
    {{--$('#applyCoupon').on('submit',function(e){--}}
    {{--    e.preventDefault();--}}
    {{--    var user = $(this).attr("user");--}}
    {{--   if(user == 1){--}}

    {{--   }--}}
    {{--   else {--}}
    {{--    alert("please login to apply coupon");--}}
    {{--    return false;--}}
    {{--   }--}}
    {{--   var coupon_code = $("#coupon_code").val();--}}
    {{--    $.ajax({--}}
    {{--        data:{--}}
    {{--            "coupon_code": coupon_code,--}}
    {{--            "_token": "{{ csrf_token() }}",--}}
    {{--        },--}}
    {{--        url:'/cart/apply-coupon',--}}
    {{--        type: 'post',--}}
    {{--        success:function (resp) {--}}
    {{--            if (resp.message!=""){--}}
    {{--                alert(resp.message);--}}
    {{--            }--}}
    {{--            $('#appendCartItem').html(resp.item);--}}
    {{--            loadCart();--}}
    {{--            navCart();--}}
    {{--        },--}}
    {{--        error:function () {--}}
    {{--            alert("Error");--}}
    {{--        }--}}
    {{--    })--}}
    {{--})--}}

    $(".userLogin").click(function () {
        Command: toastr["warning"]("Login to add products in your Wishlist")

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    });
    $(".updateWishlist").click(function () {
        var product_id = $(this).data('pro_id');
        $.ajax({
            type: 'post',
            url:'/update-wish-list',
            data:{
                "_token": "{{ csrf_token() }}",
                'product_id':product_id
            },
            success:function (resp) {
                if(resp.action== 'add'){
                    $('button[data-pro_id='+product_id+']').html('<i class="w-icon-heart-full"></i>');
                    Command: toastr["success"]("Product added wishlist")

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }else if (resp.action== 'remove'){
                    $('button[data-pro_id='+product_id+']').html('<i class="w-icon-heart"></i>');
                    Command: toastr["error"]("Product remove from wishlist")

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
            },error:function () {
                alert('error');
            }
        })
    });

    $(".updateCompare").click(function () {
        var product_id = $(this).data('product_id');
        $.ajax({
            type: 'post',
            url:'/update-compare-list',
            data:{
                "_token": "{{ csrf_token() }}",
                'product_id':product_id
            },
            success:function (resp) {
                if(resp.action== 'add') {
                    $('button[data-product_id=' + product_id + ']').html('<i class="w-icon-check-solid"></i>');
                    Command: toastr["success"]("Product added compare list")

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
                // else if (resp.action== 'remove'){
                //     $('a[data-productid='+product_id+']').html('');
                // }
            },error:function () {
                alert('error');
            }
        })
    });

    $(".updateCart").click(function () {
        var product_id = $(this).data('cart_pro_id');
        var product_price = $(this).data('productprice');
        var category_id = $(this).data('category_id');
        var brand_id = $(this).data('brand_id');
        var product_name = $(this).data('product_name');
        var product_code = $(this).data('product_code');
        $.ajax({
            type: 'post',
            url:'/add-cart-item',
            data:{
                "_token": "{{ csrf_token() }}",
                'product_id':product_id,
                'product_price':product_price,
                'category_id':category_id,
                'brand_id':brand_id,
                'product_name':product_name,
                'product_code':product_code,
                'product_qty':1,
            },
            success:function (resp) {
                if(resp.action== 'add') {
                    $('button[data-cart_pro_id=' + product_id + ']').html('');
                    Command: toastr["success"]("Item added to your cart")

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
                else{
                    Command: toastr["error"]("The product has already added into cart")

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
                loadCart();
                navCart()
                // else if (resp.action== 'remove'){
                //     $('a[data-productid='+product_id+']').html('');
                // }
            },error:function () {
            }
        })
    });

    $("#cart").click(function(){
        alert(cart());
    });

    $("#billtoship").click(function(){
        if(this.checked){
            $("#shipping_name").val($("#billing_name").val());
            $("#shipping_country").val($("#billing_country").val());
            $("#shipping_address").val($("#billing_address").val());
            $("#shipping_city").val($("#billing_city").val());
            $("#shipping_zip").val($("#billing_zip").val());
            $("#shipping_state").val($("#billing_state").val());
            $("#shipping_phone").val($("#billing_mobile").val());
            $("#shipping_email").val($("#billing_email").val());
        }else{
            $("#shipping_name").val('');
            $("#shipping_country").val('');
            $("#shipping_address").val('');
            $("#shipping_city").val('');
            $("#shipping_zip").val('');
            $("#shipping_state").val('');
            $("#shipping_phone").val('');
        }

    });

    //calculate shipping charges and update grand total without ajax
    // $("input[name=delivery_charge]").bind('change',function () {
    //     var shipping_charge = $(this).data("shipping_charge");
    //     var total_price = $(this).attr("total_amount");
    //     var grand_total = parseInt(total_price) + parseInt(shipping_charge);
    //     $(".grand_total").html("$" +grand_total);
    // });

    //calculate shipping charges and update grand total with ajax
    $(document).ready(function () {

        $("body").on("click",".delivery_charge_ajax",function(){

            // if(!confirm("Do you really want to do this?")) {
            //     return false;
            // }

            var delicharge = $(this).data("value");
            // var id = $(this).attr('data-id');
            var token = $("meta[name='csrf-token']").attr("content");

            $.ajax(
                {
                    method: 'POST',
                    url:'/del-charge-ajax',
                    data: {
                        _token: token,
                        delivery_Charge: delicharge,
                    },
                    success: function (data){
                        // console.log(data);

                    }
                });

            var shipping_charge = $(this).data("value");
            var total_price = $(this).attr("total_amount");
            var grand_total = parseInt(total_price) + parseInt(shipping_charge);
            $(".grand_total").html("$" +grand_total);

        });


    });

    function loadMoreProduct(page) {
        $.ajax({
            type: "get",
            url: "?page=" + page,
            beforeSend: function (response) {
                $('#ajax-load-more-product').show();
                // $('#ajax-load-more-product').hide();

            }
        })

            .done(function (data) {
                if (data.products == " "){
                    $('#ajax-load-more-product').html('No More Product Found');
                    return;
                }

                $('#ajax-load-more-product').hide();

                $('#load-products').append(data.products);
            })

            .fail(function () {
                alert('Something Went Wrong')
            })

    }
    var page = 1;
    $(window).scroll(function () {
        if($(window).scrollTop() + 100 + $(window).height() >= $(document).height()){
            page ++ ;
            loadMoreProduct(page);
        }
    });

    $(document).ready(function () {

        // var endTime = $('[data-countdown]').data("countdown");
        // // console.log(endTime);
        // $('#getting-started').countdown('12/10/2022', function(event) {
        //     $(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
        // });
        $(".example").TimeCircles({ time: {
                Days: { color: "#C0C8CF" },
                Hours: { color: "#C0C8CF" },
                Minutes: { color: "#C0C8CF" },
                Seconds: { color: "#C0C8CF" }
            }});
    });

    $('#subscriber').on('submit',function (e) {
        e.preventDefault();
        var data = $('#subscribe_email').val();

        var token = $("meta[name='csrf-token']").attr("content");

        $.ajax(
            {
                method: 'POST',
                url:'/subscribe-newsletter',
                data: {
                    _token: token,
                    email: data,
                },
                success: function (response){
                    // console.log(response.status);
                    if (response.status == 200) {
                        Command: toastr["success"]("Thanks for subscription")

                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "3000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        $('#subscribe_email').val("");
                        $('button[data-cart_pro_id=' + product_id + ']').html('');
                    }
                },error:function () {
                    Command: toastr["error"]("The email has already been taken")

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    $('#subscribe_email').val("");
                    $('button[data-cart_pro_id=' + product_id + ']').html('');
                }
            });
    });

    $(document).on("submit","#handleAjax",function(e) {
        e.preventDefault();

        var email = $('#login_email').val();
        var pass = $('#login_password').val();
        var token = $("meta[name='csrf-token']").attr("content");

        $.ajax(
            {
                method: 'POST',
                url:'/login-ajax',
                // dataType: 'json',
                data: {
                    _token: token,
                    email: email,
                    pass: pass,
                },
                success: function (response){
                    // console.log(data);
                    console.log(response);
                    if(response == 1)
                    {
                        window.location.replace('{{route('Cart')}}');
                        Command: toastr["success"]("Login successfully")

                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "3000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                    else if(response == 3)
                    {
                        $("#err").hide().html("Username or Password  Incorrect. Please Check").fadeIn('slow');
                    }
                }
            });
    });

    $(document).on("submit","#registerAjax",function(e) {
        e.preventDefault();
        var name = $('#register_username').val();
        var email = $('#register_email').val();
        var mobile = $('#register_mobile').val();
        var pass = $('#register_password').val();
        var token = $("meta[name='csrf-token']").attr("content");

        $.ajax(
            {
                method: 'POST',
                url:'/register-ajax',
                // dataType: 'json',
                data: {
                    _token: token,
                    name: name,
                    mobile: mobile,
                    email: email,
                    password: pass,
                },
                success: function (response){
                    // console.log(response);
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<div style="color: red">' + err_value + '</div>');
                        });
                    } else {
                        $('#save_msgList').html("");
                        window.location.replace('{{route('Cart')}}');
                        Command: toastr["success"]("Registration successfully done")

                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "3000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                }
            });

    });

    // $("#adminCredential").click(function () {
    //     var email = $(this).data("email");
    //     var pass = $(this).data("pass");
    //     $("#email").val($('email').val());
    //     $("#password").val($('pass').val());
    // });

    $("#adminCredential").click(function(){

            $("#email").val($("#hiddenAdminEmail").val());
            $("#password").val($("#hiddenAdminPass").val());

    });

    $("#sellerCredential").click(function(){

        $("#email").val($("#hiddenSellerEmail").val());
        $("#password").val($("#hiddenSellerPass").val());

    });

    $("#customerCredential").click(function(){

        $("#email").val($("#hiddenCustomerEmail").val());
        $("#password").val($("#hiddenCustomerPass").val());

    });

</script>
</body>

<!-- Mirrored from portotheme.com/html/wolmart/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Nov 2021 21:54:13 GMT -->
</html>
