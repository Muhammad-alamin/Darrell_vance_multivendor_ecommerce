<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from portotheme.com/html/wolmart/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Nov 2021 21:51:39 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Wolmart eCommmerce Marketplace HTML Template</title>

    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">
    <meta name="csrf-token" content="{{csrf_token()}}">

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

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}">

    <link rel="preload" href="{{asset('front/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2')}}" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="{{asset('front/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2')}}" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="{{asset('front/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2')}}" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="{{asset('front/assets/fonts/wolmart87d5.woff?png09e')}}" as="font" type="font/woff" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/vendor/animate/animate.min.css')}}">

    <!-- Plugin CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/vendor/magnific-popup/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/vendor/swiper/swiper-bundle.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/vendor/photoswipe/photoswipe.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/vendor/photoswipe/default-skin/default-skin.min.css')}}">
    <!-- Swiper's CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/vendor/swiper/swiper-bundle.min.css')}}">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/TimeCircles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/readme.css')}}">
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

<body>
<div class="page-wrapper">
    <h1 class="d-none">Wolmart - Responsive Marketplace HTML Template</h1>
    <!-- Start of Header -->
    <header class="header">
        <div class="header-top header-border">
            <div class="container">
                <div class="header-left">
                    <p class="welcome-msg">Welcome to Wolmart Store message or remove it!</p>
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
                        <img src="assets/images/logo.png" alt="logo" width="144" height="45" />
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
                        <a href="#" class="cart-toggle label-down link">
                            <i class="w-icon-cart">
                                <span class="cart-count">{{$cartItem}}</span>
                            </i>
                            <span class="cart-label">Cart</span>
                        </a>
                        <div class="dropdown-box">
                            <div class="cart-header">
                                <span>Shopping Cart</span>
                                <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                            </div>

                            <div class="products">
                                <?php $total_amount = 0; ?>
                                @foreach($userCart as $eachCartItem)
                                <div class="product product-cart">
                                    <div class="product-detail">
                                        <a href="product-default.html" class="product-name">{{$eachCartItem->pro_name}}</a>
                                        <div class="price-box">
                                            <span class="product-quantity">{{$eachCartItem->pro_quantity}}</span>
                                            <span class="product-price">{{$eachCartItem->pro_price}}</span>
                                        </div>
                                    </div>
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{asset('images/products/'.$eachCartItem->image)}}" alt="product" width="84"
                                                 height="94" />
                                        </a>
                                    </figure>
                                    <button class="btn btn-link btn-close" aria-label="button">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                        <?php $total_amount = $total_amount + ($eachCartItem->pro_quantity * $eachCartItem->pro_price) ?>
                                @endforeach
                            </div>
                            <div class="cart-total">
                                <label>Subtotal:</label>
                                <span class="price">{{number_format($total_amount)}}</span>
                            </div>

                            <div class="cart-action">
                                <a href="cart.html" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                                <a href="checkout.html" class="btn btn-primary  btn-rounded">Checkout</a>
                            </div>
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
    <main class="main checkout">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="passed"><a href="{{route('Cart')}}">Shopping Cart</a></li>
                    <li class="active"><a href="{{route('checkout')}}">Checkout</a></li>
                    <li><a href="javascript:void(0)">Order Complete</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->


        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">
                @if(\Illuminate\Support\Facades\Auth::check())
                <form class="form checkout-form" action="{{route('billingAddress.store')}}" method="post">
                    @csrf
                    <div class="row mb-9">
                        <div class="col-lg-7 pr-lg-4 mb-4">
                            <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                                Billing Details
                            </h3>
                            <div class="row gutter-sm">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Full name </label>
                                        <input type="text" class="form-control form-control-md" value="{{old('name', isset($userInformation)?$userInformation->name:null)}}" name="billing_name" id="billing_name"required>
                                        @error('billing_name')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Country / Region *</label>
                                <div class="select-box">
                                    <select name="billing_country" id="billing_country" class="form-control form-control-md"required>
                                        @if($userInformation->country != null)
                                        <option value="{{$userInformation->country}}">{{$userInformation->country}}</option>
                                        @else
                                            <option value="bangladesh">Bangladesh</option>
                                            <option value="nepal">Nepal</option>
                                            <option value="india">India</option>
                                            @endif
                                    </select>
                                    @error('billing_country')<i class="text-danger">{{$message}}</i>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Street address </label>
                                <input type="text" placeholder="House number and street name"
                                       class="form-control form-control-md mb-2" value="{{old('address', isset($userInformation)?$userInformation->address:null)}}" name="billing_address" id="billing_address"required>
                                @error('billing_address')<i class="text-danger">{{$message}}</i>@enderror
                            </div>
                            <div class="row gutter-sm">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Town / City </label>
                                        <input type="text" class="form-control form-control-md" value="{{old('city', isset($userInformation)?$userInformation->city:null)}}" name="billing_city" id="billing_city"required>
                                        @error('billing_city')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label>ZIP </label>
                                        <input type="text" class="form-control form-control-md" value="{{old('zip', isset($userInformation)?$userInformation->zip:null)}}" name="billing_zip" id="billing_zip" required>
                                        @error('billing_zip')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Division</label>
                                        <div class="select-box">
                                            <select name="billing_state" id="billing_state" class="form-control form-control-md" required>
                                                @if($userInformation->state != null)
                                                    <option value="{{$userInformation->state}}">{{$userInformation->state}}</option>
                                                @else
                                                    <option value="bangladesh">Dhaka</option>
                                                    <option value="nepal">Chittagong</option>
                                                    <option value="india">Barisal</option>
                                                    <option value="bangladesh">Khulna</option>
                                                    <option value="nepal">Rajshahi</option>
                                                    <option value="india">Rangpur</option>
                                                    <option value="india">Sylhet</option>
                                                    <option value="india">Mymensingh</option>
                                                @endif
                                            </select>
                                            @error('billing_state')<i class="text-danger">{{$message}}</i>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input type="text" class="form-control form-control-md" value="{{old('mobile', isset($userInformation)?$userInformation->mobile:null)}}" name="billing_mobile" id="billing_mobile" required>
                                        @error('billing_mobile')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-7">
                                <label>Email address *</label>
                                <input type="email" value="{{old('email', isset($userInformation)?$userInformation->email:null)}}" class="form-control form-control-md" name="billing_email" id="billing_email" required>
                                @error('billing_email')<i class="text-danger">{{$message}}</i>@enderror
                            </div>
                            <div class="form-group checkbox pb-2">
                                <input type="checkbox" class="custom-checkbox" id="billtoship" >
                                <label for="shipping-toggle">Shipping Address Same As Billing Address</label>
                            </div>

                            <div class="">
                                <br>
                                <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                                    Shipping Details
                                </h3>
                                <div class="row gutter-sm">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Full name *</label>
                                            <input type="text" class="form-control form-control-md" name="shipping_name" id="shipping_name"
                                                   required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Country / Region *</label>
                                    <div class="select-box">
                                        <select name="shipping_country" id="shipping_country" class="form-control form-control-md">
                                            @if($userInformation->country != null)
                                                <option value="{{$userInformation->country}}">{{$userInformation->country}}</option>
                                            @else
                                                <option value="bangladesh">Bangladesh</option>
                                                <option value="nepal">Nepal</option>
                                                <option value="india">India</option>
                                            @endif
                                        </select>
                                        @error('shipping_country')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Street address *</label>
                                    <input type="text" placeholder="House number and street name"
                                           class="form-control form-control-md mb-2" name="shipping_address" id="shipping_address" required>
                                </div>
                                <div class="row gutter-sm">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Town / City *</label>
                                            <input type="text" class="form-control form-control-md" name="shipping_city" id="shipping_city" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Zip *</label>
                                            <input type="text" class="form-control form-control-md" name="shipping_zip" id="shipping_zip" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Division</label>
                                            <div class="select-box">
                                                <select name="shipping_state" id="shipping_state" class="form-control form-control-md"required>
                                                    @if($userInformation->state != null)
                                                        <option value="{{$userInformation->state}}">{{$userInformation->state}}</option>
                                                    @else
                                                        <option value="bangladesh">Dhaka</option>
                                                        <option value="nepal">Chittagong</option>
                                                        <option value="india">Barisal</option>
                                                        <option value="bangladesh">Khulna</option>
                                                        <option value="nepal">Rajshahi</option>
                                                        <option value="india">Rangpur</option>
                                                        <option value="india">Sylhet</option>
                                                        <option value="india">Mymensingh</option>
                                                    @endif
                                                </select>
                                                @error('shipping_state')<i class="text-danger">{{$message}}</i>@enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control form-control-md" name="shipping_phone" id="shipping_phone" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="order-notes">Order notes (optional)</label>
                                <textarea class="form-control mb-0" id="shipping_notes" name="shipping_notes" cols="30"
                                          rows="4"
                                          placeholder="Notes about your order, e.g special notes for delivery"></textarea>
                            </div>

                        </div>
                        <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                            <div class="order-summary-wrapper sticky-sidebar">
                                <h3 class="title text-uppercase ls-10">Your Order</h3>
                                <div class="order-summary">
                                    <table class="order-table">
                                        <thead>
                                        <tr>
                                            <th colspan="2">
                                                <b>Product</b>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $total_amount = 0; ?>
                                        @foreach($userCart as $cartItem)
                                        <tr class="bb-no">
                                            <td class="product-name">{{$cartItem->pro_name}}<i class="fas fa-times"></i><span class="product-quantity" >{{$cartItem->pro_quantity}}</span></td>

                                            <td class="product-total">${{$cartItem->pro_price*$cartItem->pro_quantity}}</td>
                                        </tr>
                                        <?php $product_amount = $cartItem->pro_price*$cartItem->pro_quantity ?>
                                        <?php $total_amount = $total_amount + ($cartItem->pro_price*$cartItem->pro_quantity); ?>
                                        <?php $category_id = $cartItem->category_id ?>
                                        <?php $brand_id = $cartItem->brand_id ?>
                                        @endforeach
                                        @if(!empty(Session::get('CouponAmount')))
                                        <tr class="bb-no">
                                            <td class="product-name">Cupon Discount<i
                                                    class="fas fa-minus"></i></td>
                                            <td class="product-total">$<?php echo Session::get('CouponAmount'); ?> </td>
                                        </tr>
                                        @else
                                            <tr class="bb-no">
                                                <td class="product-name">Cupon Discount<i
                                                        class="fas fa-minus"></i></td>
                                                <td class="product-total">$ 0</td>
                                            </tr>
                                        @endif
{{--                                        <tr class="bb-no">--}}
{{--                                            <td class="product-name">Shipping charge<i--}}
{{--                                                    class="fas fa-plus"></i></td>--}}
{{--                                            <td class="product-total">${{$delivery_charge}}</td>--}}
{{--                                        </tr>--}}
                                        <tr class="cart-subtotal bb-no">
                                            <td>
                                                <b>Subtotal</b>
                                            </td>
                                            <td>
                                                <b>${{$total = $total_amount - Session::get('CouponAmount')}}</b>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        @if(!empty($delivery_charge))
                                        <tr class="shipping-methods">
                                            <td colspan="2" class="text-left">
                                                <br>
                                                <ul class="shipping-methods mb-2">
                                                    <li>
                                                        <label
                                                            class="shipping-title text-dark font-weight-bold">Shipping Charge</label>
                                                    </li>
                                                    <li>@foreach($delivery_charge as $eachDeliveryCharge)
                                                        <div class="form-check">
                                                            <br>
                                                                <input  class="form-check-input delivery_charge_ajax" type="radio"
                                                                        name="ajax_delivery_charge" data-value="{{$eachDeliveryCharge->delivery_amount}}" total_amount="{{$total}}" value="{{$eachDeliveryCharge->delivery_amount}}" required>
                                                                <label for="" class="form-check-label" >{{$eachDeliveryCharge->delivery_location}}
                                                                    {{$eachDeliveryCharge->delivery_amount}} Taka
                                                                </label>
                                                        </div>
                                                        @endforeach
                                                    </li>
                                                    <br>
                                                </ul>
                                            </td>
                                        </tr>
                                        @endif
                                        <tr class="order-total">
                                            <th>
                                                <b>Total</b>
                                            </th>
                                            <td>
                                                <b class="grand_total">${{$grand_total = $total_amount - Session::get('CouponAmount') }}</b>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>

                                    <div class="payment-methods" id="payment_method">
                                        <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Payment Methods</h4>
                                        <div class="accordion payment-accordion">
                                            <div class="card">
                                                <div class="radio">
                                                    <label><input type="radio" value="cod" name="payment_method" class="mr-2" @if (old('payment_method') == 'cod') checked @endif> Cash on delivery </label>
                                                </div>
                                            </div>
                                            <div class="card p-relative">
                                                <div class="">
                                                    <div class="radio">
                                                        <label><input type="radio" value="card" name="payment_method" class="mr-2" @if (old('payment_method') == 'card') checked @endif> Online Payment </label>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('payment_method')<i class="text-danger">{{$message}}</i>@enderror
                                        </div>
                                    </div>

                                    <div class="form-group place-order pt-6">
                                        <button type="submit" class="btn btn-dark btn-block btn-rounded">Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="{{$brand_id}}" name="brand_id">
                    <input type="hidden" value="{{$category_id}}" name="category_id">
                    <input type="hidden" value="{{$grand_total}}" name="grand_total">
                    <input type="hidden" value="{{$product_amount}}" name="product_price">
                    <input type="hidden" value="{{$delivery_charge}}" name="delivery_charge">
                </form>
                @endif
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
    <!-- Start of Footer -->
    <footer class="footer">
        <div class="footer-newsletter bg-primary pt-6 pb-6" style="background-color: darkgrey">
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
                        <form action="#" method="get" class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                            <input type="email" class="form-control mr-2 bg-white" name="email" id="email"
                                   placeholder="Your E-mail Address" />
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
            <div class="footer-middle">
                <div class="widget widget-category">
                    <div class="category-box">
                        <h6 class="category-name">Consumer Electric:</h6>
                        <a href="#">TV Television</a>
                        <a href="#">Air Condition</a>
                        <a href="#">Refrigerator</a>
                        <a href="#">Washing Machine</a>
                        <a href="#">Audio Speaker</a>
                        <a href="#">Security Camera</a>
                        <a href="#">View All</a>
                    </div>
                    <div class="category-box">
                        <h6 class="category-name">Clothing & Apparel:</h6>
                        <a href="#">Men's T-shirt</a>
                        <a href="#">Dresses</a>
                        <a href="#">Men's Sneacker</a>
                        <a href="#">Leather Backpack</a>
                        <a href="#">Watches</a>
                        <a href="#">Jeans</a>
                        <a href="#">Sunglasses</a>
                        <a href="#">Boots</a>
                        <a href="#">Rayban</a>
                        <a href="#">Acccessories</a>
                    </div>
                    <div class="category-box">
                        <h6 class="category-name">Home, Garden & Kitchen:</h6>
                        <a href="#">Sofa</a>
                        <a href="#">Chair</a>
                        <a href="#">Bed Room</a>
                        <a href="#">Living Room</a>
                        <a href="#">Cookware</a>
                        <a href="#">Utensil</a>
                        <a href="#">Blender</a>
                        <a href="#">Garden Equipments</a>
                        <a href="#">Decor</a>
                        <a href="#">Library</a>
                    </div>
                    <div class="category-box">
                        <h6 class="category-name">Health & Beauty:</h6>
                        <a href="#">Skin Care</a>
                        <a href="#">Body Shower</a>
                        <a href="#">Makeup</a>
                        <a href="#">Hair Care</a>
                        <a href="#">Lipstick</a>
                        <a href="#">Perfume</a>
                        <a href="#">View all</a>
                    </div>
                    <div class="category-box">
                        <h6 class="category-name">Jewelry & Watches:</h6>
                        <a href="#">Necklace</a>
                        <a href="#">Pendant</a>
                        <a href="#">Diamond Ring</a>
                        <a href="#">Silver Earing</a>
                        <a href="#">Leather Watcher</a>
                        <a href="#">Rolex</a>
                        <a href="#">Gucci</a>
                        <a href="#">Australian Opal</a>
                        <a href="#">Ammolite</a>
                        <a href="#">Sun Pyrite</a>
                    </div>
                    <div class="category-box">
                        <h6 class="category-name">Computer & Technologies:</h6>
                        <a href="#">Laptop</a>
                        <a href="#">iMac</a>
                        <a href="#">Smartphone</a>
                        <a href="#">Tablet</a>
                        <a href="#">Apple</a>
                        <a href="#">Asus</a>
                        <a href="#">Drone</a>
                        <a href="#">Wireless Speaker</a>
                        <a href="#">Game Controller</a>
                        <a href="#">View all</a>
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
    <a href="{{route('Home')}}" class="sticky-link active">
        <i class="w-icon-home"></i>
        <p>Home</p>
    </a>
    <a href="{{route('front.shop')}}" class="sticky-link">
        <i class="w-icon-category"></i>
        <p>Shop</p>
    </a>
    @if(auth()->check())
        <a href="{{route('customer.dashboard',\Illuminate\Support\Facades\Crypt::encryptString(\Illuminate\Support\Facades\Auth::user()->id))}}" class="sticky-link">
            <i class="w-icon-account"></i>
            <p>Account</p>
        </a>
    @else
        <a href="{{route('login')}}" class="sticky-link">
            <i class="w-icon-account"></i>
            <p>Account</p>
        </a>
    @endif
    <div class="cart-dropdown dir-up">
        <a href="{{route('Cart')}}" class="sticky-link">
            <i class="w-icon-cart"></i>
            <p>Cart</p>
        </a>
        {{--        <div class="dropdown-box " style="height: 630px; overflow-y: scroll; ">--}}
        {{--            <div class="cart-header" id="cartBox">--}}
        {{--                <span>Shopping Cart</span>--}}
        {{--                <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>--}}
        {{--            </div>--}}
        {{--            <div class=" itemCart align-center cart-empty" style="margin-left: 20px">--}}
        {{--                --}}{{--                                                            <div class="product-detail">--}}
        {{--                --}}{{--                                                                <a href="product-default.html" class="product-name">Beige knitted--}}
        {{--                --}}{{--                                                                    elas<br>tic--}}
        {{--                --}}{{--                                                                    runner shoes</a>--}}
        {{--                --}}{{--                                                                <div class="price-box">--}}
        {{--                --}}{{--                                                                    <span class="product-quantity">1</span>--}}
        {{--                --}}{{--                                                                    <span class="product-price">$25.68</span>--}}
        {{--                --}}{{--                                                                </div>--}}
        {{--                --}}{{--                                                            </div>--}}
        {{--                --}}{{--                                                            <figure class="product-media">--}}
        {{--                --}}{{--                                                                <a href="product-default.html">--}}
        {{--                --}}{{--                                                                    <img src="assets/images/cart/product-1.jpg" alt="product" height="84"--}}
        {{--                --}}{{--                                                                         width="94" />--}}
        {{--                --}}{{--                                                                </a>--}}
        {{--                --}}{{--                                                            </figure>--}}
        {{--                --}}{{--                                                            <button class="btn btn-link btn-close" aria-label="button">--}}
        {{--                --}}{{--                                                                <i class="fas fa-times"></i>--}}
        {{--                --}}{{--                                                            </button>--}}
        {{--            </div>--}}

        {{--            --}}{{--                        <div class="products">--}}
        {{--            --}}{{--                            <div class="cart-total priceCart">--}}
        {{--            --}}{{--                                <label>Subtotal:</label>--}}
        {{--            --}}{{--                                <span class="price gTotal">$58.67</span>--}}
        {{--            --}}{{--                            </div>--}}

        {{--            --}}{{--                            <div class="cart-action">--}}
        {{--            --}}{{--                                <a href="" class="btn btn-dark btn-outline btn-rounded">View Cart</a>--}}
        {{--            --}}{{--                                <a href="checkout.html" class="btn btn-primary  btn-rounded">Checkout</a>--}}
        {{--            --}}{{--                            </div>--}}
        {{--            --}}{{--                        </div>--}}
        {{--        </div>--}}
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
        <form action="{{ route('front.product.search') }}" method="get" class="input-wrapper">
            <input type="text" class="form-control" name="product_search" id="product_search" value="{{ request('product_search') }}"  autocomplete="off"
                   placeholder="Search" required />
            <button class="btn btn-search" name="searchBtn" type="submit">
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
                        <a href="javascript:void(0)">Blogs</a>
                    </li>
                </ul>
            </div>
            <div class="tab-pane" id="categories">
                <ul class="mobile-menu">
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
    </div>
</div>
<!-- End of Mobile Menu -->


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

<!-- Swiper JS -->
<script src="{{asset('front/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>


<!-- Main JS File -->
<script src="{{asset('front/assets/js/main.min.js')}}"></script>
<script src="{{asset('front/assets/js/TimeCircles.js')}}"></script>

<script>

    $(".userLogin").click(function () {
        alert("Login to add products in your Wishlist");
    });
    $(".updateWishlist").click(function () {
        var product_id = $(this).data('productid');
        $.ajax({
            type: 'post',
            url:'/update-wish-list',
            data:{
                "_token": "{{ csrf_token() }}",
                'product_id':product_id
            },
            success:function (resp) {
                if(resp.action== 'add'){
                    $('button[data-productid='+product_id+']').html('<i class="w-icon-heart-full"></i>');
                }else if (resp.action== 'remove'){
                    $('button[data-productid='+product_id+']').html('<i class="w-icon-heart"></i>');
                }
            },error:function () {
                alert('error');
            }
        })
    });

    $(".updateCompare").click(function () {
        var product_id = $(this).data('productid');
        $.ajax({
            type: 'post',
            url:'/update-compare-list',
            data:{
                "_token": "{{ csrf_token() }}",
                'product_id':product_id
            },
            success:function (resp) {
                if(resp.action== 'add') {
                    $('button[data-productid=' + product_id + ']').append('<i class="w-icon-check-solid"></i>');
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
        var product_id = $(this).data('productid');
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
                    $('button[data-productid=' + product_id + ']').html('<i class="w-icon-cart"></i>');

                }
                loadCart();
                navCart()
                // else if (resp.action== 'remove'){
                //     $('a[data-productid='+product_id+']').html('');
                // }
            },error:function () {
                alert('error');
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
                success: function (data){
                    // console.log(data);

                }
            });
    });

</script>
</body>


<!-- Mirrored from portotheme.com/html/wolmart/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Nov 2021 21:51:40 GMT -->
</html>
