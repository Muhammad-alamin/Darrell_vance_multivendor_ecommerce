<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from portotheme.com/html/wolmart/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Nov 2021 21:51:58 GMT -->
@include('front.homeLayouts._head')

<body class="my-account">
<div class="page-wrapper">

@include('front.homeLayouts._mainNav')

@yield('content')

    @include('front.homeLayouts._footer')
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

@include('front.homeLayouts._jsScript')
{!! Toastr::message() !!}
</body>


<!-- Mirrored from portotheme.com/html/wolmart/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Nov 2021 21:51:59 GMT -->
</html>
