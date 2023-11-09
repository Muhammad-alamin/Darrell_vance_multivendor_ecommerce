@extends('front.homeLayouts.master')
@section('content')
    <!-- Start of Main-->
    <main class="main">
        <div class="container pb-2">
            <div class="intro-wrapper mt-4">
                <div class="swiper-container swiper-theme pg-inner animation-slider row cols-1 gutter-no" data-swiper-options="{
                        'autoplay': {
                            'delay': 8000,
                            'disableOnInteraction': false
                        }
                    }">
                    <div class="swiper-wrapper">
                        @foreach($sliders as $slider)
                        <div class="swiper-slide banner  intro-slide intro-slide2 br-sm">
                            <img src="{{$slider->slider_image}}" style="height: 500px; width: 100%;">
                            <div class="banner-content y-50">
                                <div class="slide-animate" data-animation-options="{
                                        'name': 'flipInY', 'duration': '1s'
                                    }">
                                </div>
                            </div>
                        </div>
                    @endforeach
                        <!-- End of Intro Slide 2 -->
                    </div>
                    <div class="swiper-pagination "></div>
                </div>
                <!-- End of Swiper Container -->
            </div>
            <!-- End of Intro Wrapper -->

            <div class="swiper-container swiper-theme icon-box-wrapper appear-animate br-sm mt-6 mb-10"
                 data-swiper-options="{
                    'loop': true,
                    'autoplay': {
                        'delay': 4000,
                        'disableOnInteraction': false
                    },
                    'slidesPerView': 1,
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 2
                        },
                        '768': {
                            'slidesPerView': 3
                        },
                        '992': {
                            'slidesPerView': 3
                        },
                        '1200': {
                            'slidesPerView': 4
                        }
                    }
                }">
                <div class="swiper-wrapper row cols-md-4 cols-sm-3 cols-1">
                    <div class="swiper-slide icon-box icon-box-side text-dark">
                            <span class="icon-box-icon icon-shipping">
                                <i class="w-icon-truck"></i>
                            </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title">Free Shipping & Returns</h4>
                            <p class="text-default">For all orders over $99</p>
                        </div>
                    </div>
                    <div class="swiper-slide icon-box icon-box-side text-dark">
                            <span class="icon-box-icon icon-payment">
                                <i class="w-icon-bag"></i>
                            </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title">Secure Payment</h4>
                            <p class="text-default">We ensure secure payment</p>
                        </div>
                    </div>
                    <div class="swiper-slide icon-box icon-box-side text-dark icon-box-money">
                            <span class="icon-box-icon icon-money">
                                <i class="w-icon-money"></i>
                            </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title">Money Back Guarantee</h4>
                            <p class="text-default">Any back within 30 days</p>
                        </div>
                    </div>
                    <div class="swiper-slide icon-box icon-box-side text-dark icon-box-chat">
                            <span class="icon-box-icon icon-chat">
                                <i class="w-icon-chat"></i>
                            </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title">Customer Support</h4>
                            <p class="text-default">Call or email us 24/7</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-container swiper-theme category-banner-3cols pt-2 pb-10"
                 data-swiper-options="{
                 'loop': true,
                    'autoplay': {
                        'delay': 4000,
                        'disableOnInteraction': false
                    },
                    'spaceBetween': 20,
                    'slidesPerView': 1,
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 2
                        },
                        '992': {
                            'slidesPerView': 3
                        }
                    }
                }">
                <div class="swiper-wrapper row cols-lg-3 cols-sm-2 cols-1">
                    @foreach($marketing_banners as $marketing_banner)
                    <div class="swiper-slide banner banner-fixed category-banner br-sm">
                        <a href="{{route('front.shop')}}">
                        <figure>
                            <img src="{{asset($marketing_banner->banner_image)}}" style="width: 447px; height: 230px" alt="Category Banner" width="447"
                                 height="230" style="background-color: #333" />
                            <div class="slide-animate" data-animation-options="{
                                        'name': 'flipInY', 'duration': '1s'
                                    }">
                            </div>
                        </figure>
                        </a>
{{--                        <div class="banner-content text-center x-50 y-50 w-100 pl-2 pr-2">--}}
{{--                            <h5 class="banner-subtitle text-primary text-capitalize ls-25 font-weight-bold"></h5>--}}
{{--                            <h3 class="banner-title text-white text-uppercase ls-25"></h3>--}}
{{--                            <p><strong class="text-uppercase text-white"></strong></p>--}}
{{--                            <a href="{{route('front.shop')}}"--}}
{{--                               class="btn btn-primary btn-outline btn-rounded btn-icon-right text-white btn-slide-right" style="background-color: black; margin-top: 120px">--}}
{{--                                Shop Now<i class="w-icon-long-arrow-right"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
                    </div>
                @endforeach
                    <!-- End of Category Banner -->
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <!-- End of Swiper Container -->

            <h2 class="title title-center mb-5">Top Categories Of The Month</h2>
            <div class="swiper-container swiper-theme shadow-swiper pb-10"
                 data-swiper-options="{
                 'loop': true,
                    'autoplay': {
                        'delay': 4000,
                        'disableOnInteraction': false
                    },
                    'spaceBetween': 20,
                    'slidesPerView': 2,
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 3
                        },
                        '768': {
                            'slidesPerView': 4
                        },
                        '992': {
                            'slidesPerView': 5
                        },
                        '1200': {
                            'slidesPerView': 6
                        }
                    }
                }">
                <div class="swiper-wrapper row cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2">
                    @foreach($top_categories as $category)
                        <div class="swiper-slide category-wrap">
                            <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                                <a href="shop-banner-sidebar.html" class="category-media">
                                    <img src="{{$category->category_image}}" alt="Category"
                                         width="130" height="130">
                                </a>
                                <div class="category-content">
                                    <h4 class="category-name">{{$category->category_name}}</h4>
                                    <a href="shop-banner-sidebar.html"
                                       class="btn btn-primary btn-link btn-underline">Shop
                                        Now</a>
                                </div>
                            </div>

                        </div>
                    <!-- End of Category Classic -->
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <br>
            <h2 class="title title-center mb-5">Our Top Services</h2>
            <div class="swiper-container swiper-theme shadow-swiper pb-10"
                 data-swiper-options="{
                 'loop': true,
                    'autoplay': {
                        'delay': 4000,
                        'disableOnInteraction': false
                    },
                    'spaceBetween': 20,
                    'slidesPerView': 2,
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 3
                        },
                        '768': {
                            'slidesPerView': 4
                        },
                        '992': {
                            'slidesPerView': 5
                        },
                        '1200': {
                            'slidesPerView': 6
                        }
                    }
                }">
                <div class="swiper-wrapper row cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2">
                    @foreach($top_services as $category)
                        <div class="swiper-slide category-wrap">
                            <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                                <a href="{{ route('category.product', encrypt($category->id)) }}" class="category-media">
                                    <img src="{{$category->category_image}}" alt="Category"
                                         style="width: 190px; height: 184px;">
                                </a>
                                <br>
                                <div class="category-content">
                                    <h4 class="category-name">{{$category->category_name}}</h4>
                                    <a href="{{ route('category.product', encrypt($category->id)) }}"
                                       class="btn btn-primary btn-link btn-underline">Shop
                                        Now</a>
                                </div>
                            </div>

                        </div>
                    <!-- End of Category Classic -->
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
            {{-- <div class="title-link-wrapper pb-1 mb-4">
                <h2 class="title justify-content-center pt-1 ls-normal mb-5">Top Brand</h2>
                <a href="{{route('all.brands')}}" class="font-size-normal  ls-25 mb-0">More
                    Brand<i class="w-icon-long-arrow-right"></i></a>
            </div>
            <div class="swiper-container swiper-theme icon-box-wrapper appear-animate br-sm mt-6 mb-10"
                 data-swiper-options="{
                    'loop': true,
                    'autoplay': {
                        'delay': 4000,
                        'disableOnInteraction': false
                    },
                    'slidesPerView': 3,
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 2
                        },
                        '768': {
                            'slidesPerView': 3
                        },
                        '992': {
                            'slidesPerView': 3
                        },
                        '1200': {
                            'slidesPerView': 4
                        }
                    }
                }">
                <div class="swiper-wrapper row cols-md-4 cols-sm-3 cols-1">
                    @foreach($brands as $brand)
                    <div class="swiper-slide icon-box icon-box-side text-dark">
                        <div class="icon-box-content">
                            <a href="{{route('single.brand', encrypt($brand->id))}}" class="category-media">
                                <img src="{{$brand->brand_image}}" alt="Category" style="height: 50px; width: 80px"
                                     width="100"
                                     height="100" >
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div> --}}
{{--            <section class=" top-category appear-animate">--}}
{{--                <div class="store store-list mt-4">--}}
{{--                    <div class="store-header">--}}
{{--                        <!-- Start of Pgae Contetn -->--}}
{{--                        <div class="page-content mb-4">--}}
{{--                            <div class="container ">--}}
{{--                                <div class="title-link-wrapper pb-1 mb-4">--}}
{{--                                    <h2 class="title justify-content-center pt-1 ls-normal mb-5">Top Brand</h2>--}}
{{--                                    <a href="{{route('all.brands')}}" class="font-size-normal  ls-25 mb-0">More--}}
{{--                                        Brand<i class="w-icon-long-arrow-right"></i></a>--}}
{{--                                </div>--}}
{{--                                <div class="row cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2 bg-grey">--}}
{{--                                    @foreach($brands as $brand)--}}
{{--                                        <div class="vendor-brand-wrap mb-8 text-center">--}}
{{--                                            <div class="vendor-brand bg-white" style="margin-top: 50px">--}}
{{--                                                <a href="vendor-wc-store-product-grid.html">--}}
{{--                                                    <figure class="brand">--}}
{{--                                                        <img src="{{$brand->brand_image}}" alt="Brand" width="150"--}}
{{--                                                             height="150" />--}}
{{--                                                    </figure>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}
{{--            <!-- End of Store Header -->--}}

            <!-- End of Tab Content -->
            <section class="white-section appear-animate">
                <div class="container mb-2">
                    <div class="title-link-wrapper mb-2">
                        <h2 class="title">Featured Products</h2>
                        <a href="{{route('front.shop')}}">More Products<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                    <div class="tab-content product-wrapper appear-animate">
                        <div class="tab-pane active pt-4" id="tab1-1">
                            <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                                @foreach($featured_products as $product)
                                    <div class="product-wrap">
                                        <div class="product text-center">
                                            <figure class="product-media">
                                                <a href="{{route('product.details',encrypt($product->id))}}">
                                                    <img src="{{asset('images/products/'.$product->product_thumbnail_image)}}" alt="Product"
                                                         width="300" height="338" />
                                                </a>
                                                <div class="product-action-horizontal">
                                                    <input type="hidden" value="{{$product->id}}" name="pro_id">
                                                    <input type="hidden" value="{{$product->brand_id}}" name="brand_id">
                                                    <input type="hidden" value="{{$product->category_id}}" name="category_id">
                                                    <input type="hidden" value="{{$product->product_name}}" name="pro_name">
                                                    <input type="hidden" value="{{$product->product_code}}" name="pro_code">
                                                    <input type="hidden" id="price" value="{{$product->product_regular_price}}" name="pro_price">
                                                    <?php $attributes = \App\Model\Attributes::where('product_id',$product->id)->count(); ?>
                                                    @if($attributes > 0 )
                                                        <a href="{{route('product.details',encrypt($product->id))}}" class="btn-product-icon w-icon-hamburger " title="Add to cart">
                                                        </a>
                                                    @elseif($product->product_quantity < 1)
                                                        <a href="{{route('product.details',encrypt($product->id))}}" class="btn-product-icon w-icon-hamburger " title="Add to cart">
                                                        </a>
                                                    @else
                                                        @php($countCartItem = 0 )
                                                        @php($countCartItem = \App\Model\Cart::where(['pro_id' => $product->id, 'session_id' => \Illuminate\Support\Facades\Session::get('session_id') ])->count())
                                                        <button type="button" class="btn-product-icon btn-cart @if($countCartItem > 0)  w-icon-cart @else w-icon-cart @endif updateCart" title="Add to cart"
                                                                data-cart_pro_id="{{$product->id}}"
                                                                @if($product->product_discount_price) data-productprice="{{$product->product_discount_price}}" @else data-productprice="{{$product->product_regular_price}}" @endif
                                                                data-category_id="{{$product->category_id}}"
                                                                data-brand_id="{{$product->brand_id}}"
                                                                data-product_name="{{$product->product_name}}"
                                                                data-product_code="{{$product->product_code}}">
                                                        </button>
                                                    @endif
                                                    @php($countWishlist = 0 )
                                                    @if(\Illuminate\Support\Facades\Auth::check())
                                                        @php($countWishlist = \App\Model\Wishlist::where(['user_id' => auth()->user()->id, 'w_product_id' => $product->id ])->count())
                                                        <button type="button" class="updateWishlist btn-product-icon btn-sm" data-pro_id="{{$product->id}}"> <i class=" @if($countWishlist > 0) w-icon-heart-full @else w-icon-heart @endif ">
                                                            </i>
                                                        </button>
                                                    @else
                                                        <button type="button" class="userLogin btn-product-icon btn-sm"> <i class="w-icon-heart"></i></button>
                                                    @endif

                                                    @php($countComparelist = 0 )
                                                    @php($countComparelist = \App\Model\Compare::where(['product_id' => $product->id, 'session_id' => \Illuminate\Support\Facades\Session::get('session_id') ])->count())
                                                    <button type="button" class="btn-product-icon btn-md btn-icon-left updateCompare" data-product_id="{{$product->id}}"><i class="@if($countComparelist > 0)  w-icon-check-solid @else w-icon-compare @endif"></i></button>
                                                </div>
                                                <div class="product-label-group">
                                                    @if($product->product_discount_percent > 0)
                                                        <label class="product-label label-discount">{{$product->product_discount_percent}}% Off</label>
                                                    @elseif($product->product_discount_amount > 0)
                                                        <label class="product-label label-discount"style="background-color: blueviolet">{{$product->product_discount_amount}} Taka Off</label>
                                                    @endif
                                                    <?php $attr_products = \App\Model\Attributes::where('product_id',$product->id)->count(); ?>

                                                    @if($attr_products > 0)

                                                    @elseif($product->product_quantity < 1)

                                                        <label class="product-label label-discount" style="color: white; background-color: red">Stock Out</label>
                                                    @endif
                                                </div>
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name"><a href="{{route('product.details',encrypt($product->id))}}">{{$product->product_name}}</a></h4>
                                                <div class="ratings-container">
                                                    @if(App\Model\Rating::where('rating_approval','=', 'Approved')
                                                                    ->where('product_id',$product->id)->sum('rating'))
                                                        <?php
                                                        $relatedRatingSum = App\Model\Rating::where('rating_approval','=', 'Approved')
                                                            ->where('product_id',$product->id)->sum('rating');
                                                        $relatedRatingCount = App\Model\Rating::where('rating_approval','=', 'Approved')
                                                            ->where('product_id',$product->id)->count();

                                                        if ($relatedRatingCount>0){
                                                            $relatedAvarageRating = round($relatedRatingSum/$relatedRatingCount,2);
                                                            $relatedAvarageStarRating = round($relatedRatingSum/$relatedRatingCount);
                                                        }else{
                                                            $relatedAvarageStarRating = 0;
                                                            $relatedAvarageRating = 0;
                                                        }
                                                        ?>

                                                        <div class="ratings-container">

                                                            @for($star = 1; $star <= $relatedAvarageStarRating; $star++)

                                                                <i class="fas fa-star" style="color: darkorange"></i>
                                                            @endfor

                                                            @for ($j = $relatedAvarageStarRating+1; $j <= 5; $j++)

                                                                <i class="fas fa-star" style="color: lightgrey"></i>
                                                            @endfor

                                                            <a href="{{route('product.details',encrypt($product->id))}}" class="rating-reviews">({{$relatedRatingCount}} reviews)</a>
                                                        </div>
                                                    @else
                                                        <span href="{{route('product.details',encrypt($product->id))}}" class="rating-reviews">No Review</span>
                                                    @endif
                                                </div>
                                                <div class="product-price">
                                                    @if($product->product_discount_price == null)
                                                        <ins class="new-price">£ {{ number_format($product->product_regular_price) }}</ins>
                                                    @else
                                                        <ins class="new-price">£ {{ number_format($product->product_discount_price )}}</ins>
                                                        <del class="old-price">£ {{number_format($product->product_regular_price)}}</del>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- End of Tab Content -->
                </div>
                <!-- End of Container -->
            </section>
            <!-- End of Grey Section -->
            <section class="white-section appear-animate">
                <div class="container mb-2">
                    <div class="title-link-wrapper mb-2">
                        <h2 class="title">Best Selling </h2>
                        <a href="{{route('front.shop')}}">More Products<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                    <div class="tab-content product-wrapper appear-animate">
                        <div class="tab-pane active pt-4" id="tab1-1">
                            <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                                @foreach($best_selling_products as $product)
                                    <div class="product-wrap">
                                        <div class="product text-center">
                                            <figure class="product-media">
                                                <a href="{{route('product.details',encrypt($product->id))}}">
                                                    <img src="{{asset('images/products/'.$product->product_thumbnail_image)}}" alt="Product"
                                                         width="300" height="338" />
                                                </a>
                                                <div class="product-action-horizontal">
                                                    <input type="hidden" value="{{$product->id}}" name="pro_id">
                                                    <input type="hidden" value="{{$product->brand_id}}" name="brand_id">
                                                    <input type="hidden" value="{{$product->category_id}}" name="category_id">
                                                    <input type="hidden" value="{{$product->product_name}}" name="pro_name">
                                                    <input type="hidden" value="{{$product->product_code}}" name="pro_code">
                                                    <input type="hidden" id="price" value="{{$product->product_regular_price}}" name="pro_price">
                                                    <?php $attributes = \App\Model\Attributes::where('product_id',$product->id)->count(); ?>
                                                    @if($attributes > 0 )
                                                        <a href="{{route('product.details',encrypt($product->id))}}" class="btn-product-icon w-icon-hamburger " title="Add to cart">
                                                        </a>
                                                    @elseif($product->product_quantity < 1)
                                                        <a href="{{route('product.details',encrypt($product->id))}}" class="btn-product-icon w-icon-hamburger " title="Add to cart">
                                                        </a>
                                                    @else
                                                        @php($countCartItem = 0 )
                                                        @php($countCartItem = \App\Model\Cart::where(['pro_id' => $product->id, 'session_id' => \Illuminate\Support\Facades\Session::get('session_id') ])->count())
                                                        <button type="button" class="btn-product-icon btn-cart @if($countCartItem > 0)  w-icon-cart @else w-icon-cart @endif updateCart" title="Add to cart"
                                                                data-cart_pro_id="{{$product->id}}"
                                                                @if($product->product_discount_price) data-productprice="{{$product->product_discount_price}}" @else data-productprice="{{$product->product_regular_price}}" @endif
                                                                data-category_id="{{$product->category_id}}"
                                                                data-brand_id="{{$product->brand_id}}"
                                                                data-product_name="{{$product->product_name}}"
                                                                data-product_code="{{$product->product_code}}">
                                                        </button>
                                                    @endif
                                                    @php($countWishlist = 0 )
                                                    @if(\Illuminate\Support\Facades\Auth::check())
                                                        @php($countWishlist = \App\Model\Wishlist::where(['user_id' => auth()->user()->id, 'w_product_id' => $product->id ])->count())
                                                        <button type="button" class="updateWishlist btn-product-icon btn-sm" data-pro_id="{{$product->id}}"> <i class=" @if($countWishlist > 0) w-icon-heart-full @else w-icon-heart @endif ">
                                                            </i>
                                                        </button>
                                                    @else
                                                        <button type="button" class="userLogin btn-product-icon btn-sm"> <i class="w-icon-heart"></i></button>
                                                    @endif

                                                    @php($countComparelist = 0 )
                                                    @php($countComparelist = \App\Model\Compare::where(['product_id' => $product->id, 'session_id' => \Illuminate\Support\Facades\Session::get('session_id') ])->count())
                                                    <button type="button" class="btn-product-icon btn-md btn-icon-left updateCompare" data-product_id="{{$product->id}}"><i class="@if($countComparelist > 0)  w-icon-check-solid @else w-icon-compare @endif"></i></button>
                                                </div>
                                                <div class="product-label-group">
                                                    @if($product->product_discount_percent > 0)
                                                        <label class="product-label label-discount">{{$product->product_discount_percent}}% Off</label>
                                                    @elseif($product->product_discount_amount > 0)
                                                        <label class="product-label label-discount"style="background-color: blueviolet">{{$product->product_discount_amount}} Taka Off</label>
                                                    @endif
                                                    <?php $attr_products = \App\Model\Attributes::where('product_id',$product->id)->count(); ?>

                                                    @if($attr_products > 0)

                                                    @elseif($product->product_quantity < 1)

                                                        <label class="product-label label-discount" style="color: white; background-color: red">Stock Out</label>
                                                    @endif
                                                </div>
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name"><a href="{{route('product.details',encrypt($product->id))}}">{{$product->product_name}}</a></h4>
                                                <div class="ratings-container">
                                                    @if(App\Model\Rating::where('rating_approval','=', 'Approved')
                                                                    ->where('product_id',$product->id)->sum('rating'))
                                                        <?php
                                                        $relatedRatingSum = App\Model\Rating::where('rating_approval','=', 'Approved')
                                                            ->where('product_id',$product->id)->sum('rating');
                                                        $relatedRatingCount = App\Model\Rating::where('rating_approval','=', 'Approved')
                                                            ->where('product_id',$product->id)->count();

                                                        if ($relatedRatingCount>0){
                                                            $relatedAvarageRating = round($relatedRatingSum/$relatedRatingCount,2);
                                                            $relatedAvarageStarRating = round($relatedRatingSum/$relatedRatingCount);
                                                        }else{
                                                            $relatedAvarageStarRating = 0;
                                                            $relatedAvarageRating = 0;
                                                        }
                                                        ?>

                                                        <div class="ratings-container">

                                                            @for($star = 1; $star <= $relatedAvarageStarRating; $star++)

                                                                <i class="fas fa-star" style="color: darkorange"></i>
                                                            @endfor

                                                            @for ($j = $relatedAvarageStarRating+1; $j <= 5; $j++)

                                                                <i class="fas fa-star" style="color: lightgrey"></i>
                                                            @endfor

                                                            <a href="{{route('product.details',encrypt($product->id))}}" class="rating-reviews">({{$relatedRatingCount}} reviews)</a>
                                                        </div>
                                                    @else
                                                        <span href="{{route('product.details',encrypt($product->id))}}" class="rating-reviews">No Review</span>
                                                    @endif
                                                </div>
                                                <div class="product-price">
                                                    @if($product->product_discount_price == null)
                                                        <ins class="new-price">£ {{ number_format($product->product_regular_price) }}</ins>
                                                    @else
                                                        <ins class="new-price">£ {{ number_format($product->product_discount_price )}}</ins>
                                                        <del class="old-price">£ {{number_format($product->product_regular_price)}}</del>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- End of Tab Content -->
                </div>
                <!-- End of Container -->
            </section>
            <!-- End of Grey Section -->
            <section class="white-section appear-animate">
                <div class="container mb-2">
                    <div class="title-link-wrapper mb-2">
                        <h2 class="title">Popular Products</h2>
                        <a href="{{route('front.shop')}}">More Products<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                    <div class="tab-content product-wrapper appear-animate">
                        <div class="tab-pane active pt-4" id="tab1-1">
                            <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                                @foreach($popular_products as $product)
                                    <div class="product-wrap">
                                        <div class="product text-center">
                                            <figure class="product-media">
                                                <a href="{{route('product.details',encrypt($product->id))}}">
                                                    <img src="{{asset('images/products/'.$product->product_thumbnail_image)}}" alt="Product"
                                                         width="300" height="338" />
                                                </a>
                                                <div class="product-action-horizontal">
                                                    <input type="hidden" value="{{$product->id}}" name="pro_id">
                                                    <input type="hidden" value="{{$product->brand_id}}" name="brand_id">
                                                    <input type="hidden" value="{{$product->category_id}}" name="category_id">
                                                    <input type="hidden" value="{{$product->product_name}}" name="pro_name">
                                                    <input type="hidden" value="{{$product->product_code}}" name="pro_code">
                                                    <input type="hidden" id="price" value="{{$product->product_regular_price}}" name="pro_price">
                                                    <?php $attributes = \App\Model\Attributes::where('product_id',$product->id)->count(); ?>
                                                    @if($attributes > 0 )
                                                        <a href="{{route('product.details',encrypt($product->id))}}" class="btn-product-icon w-icon-hamburger " title="Add to cart">
                                                        </a>
                                                    @elseif($product->product_quantity < 1)
                                                        <a href="{{route('product.details',encrypt($product->id))}}" class="btn-product-icon w-icon-hamburger " title="Add to cart">
                                                        </a>
                                                    @else
                                                        @php($countCartItem = 0 )
                                                        @php($countCartItem = \App\Model\Cart::where(['pro_id' => $product->id, 'session_id' => \Illuminate\Support\Facades\Session::get('session_id') ])->count())
                                                        <button type="button" class="btn-product-icon btn-cart @if($countCartItem > 0)  w-icon-cart @else w-icon-cart @endif updateCart" title="Add to cart"
                                                                data-cart_pro_id="{{$product->id}}"
                                                                @if($product->product_discount_price) data-productprice="{{$product->product_discount_price}}" @else data-productprice="{{$product->product_regular_price}}" @endif
                                                                data-category_id="{{$product->category_id}}"
                                                                data-brand_id="{{$product->brand_id}}"
                                                                data-product_name="{{$product->product_name}}"
                                                                data-product_code="{{$product->product_code}}">
                                                        </button>
                                                    @endif
                                                    @php($countWishlist = 0 )
                                                    @if(\Illuminate\Support\Facades\Auth::check())
                                                        @php($countWishlist = \App\Model\Wishlist::where(['user_id' => auth()->user()->id, 'w_product_id' => $product->id ])->count())
                                                        <button type="button" class="updateWishlist btn-product-icon btn-sm" data-pro_id="{{$product->id}}"> <i class=" @if($countWishlist > 0) w-icon-heart-full @else w-icon-heart @endif ">
                                                            </i>
                                                        </button>
                                                    @else
                                                        <button type="button" class="userLogin btn-product-icon btn-sm"> <i class="w-icon-heart"></i></button>
                                                    @endif

                                                    @php($countComparelist = 0 )
                                                    @php($countComparelist = \App\Model\Compare::where(['product_id' => $product->id, 'session_id' => \Illuminate\Support\Facades\Session::get('session_id') ])->count())
                                                    <button type="button" class="btn-product-icon btn-md btn-icon-left updateCompare" data-product_id="{{$product->id}}"><i class="@if($countComparelist > 0)  w-icon-check-solid @else w-icon-compare @endif"></i></button>
                                                </div>
                                                <div class="product-label-group">
                                                    @if($product->product_discount_percent > 0)
                                                        <label class="product-label label-discount">{{$product->product_discount_percent}}% Off</label>
                                                    @elseif($product->product_discount_amount > 0)
                                                        <label class="product-label label-discount"style="background-color: blueviolet">{{$product->product_discount_amount}} Taka Off</label>
                                                    @endif
                                                    <?php $attr_products = \App\Model\Attributes::where('product_id',$product->id)->count(); ?>

                                                    @if($attr_products > 0)

                                                    @elseif($product->product_quantity < 1)

                                                        <label class="product-label label-discount" style="color: white; background-color: red">Stock Out</label>
                                                    @endif
                                                </div>
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name"><a href="{{route('product.details',encrypt($product->id))}}">{{$product->product_name}}</a></h4>
                                                <div class="ratings-container">
                                                    @if(App\Model\Rating::where('rating_approval','=', 'Approved')
                                                                    ->where('product_id',$product->id)->sum('rating'))
                                                        <?php
                                                        $relatedRatingSum = App\Model\Rating::where('rating_approval','=', 'Approved')
                                                            ->where('product_id',$product->id)->sum('rating');
                                                        $relatedRatingCount = App\Model\Rating::where('rating_approval','=', 'Approved')
                                                            ->where('product_id',$product->id)->count();

                                                        if ($relatedRatingCount>0){
                                                            $relatedAvarageRating = round($relatedRatingSum/$relatedRatingCount,2);
                                                            $relatedAvarageStarRating = round($relatedRatingSum/$relatedRatingCount);
                                                        }else{
                                                            $relatedAvarageStarRating = 0;
                                                            $relatedAvarageRating = 0;
                                                        }
                                                        ?>

                                                        <div class="ratings-container">

                                                            @for($star = 1; $star <= $relatedAvarageStarRating; $star++)

                                                                <i class="fas fa-star" style="color: darkorange"></i>
                                                            @endfor

                                                            @for ($j = $relatedAvarageStarRating+1; $j <= 5; $j++)

                                                                <i class="fas fa-star" style="color: lightgrey"></i>
                                                            @endfor

                                                            <a href="{{route('product.details',encrypt($product->id))}}" class="rating-reviews">({{$relatedRatingCount}} reviews)</a>
                                                        </div>
                                                    @else
                                                        <span href="{{route('product.details',encrypt($product->id))}}" class="rating-reviews">No Review</span>
                                                    @endif
                                                </div>
                                                <div class="product-price">
                                                    @if($product->product_discount_price == null)
                                                        <ins class="new-price">£ {{ number_format($product->product_regular_price) }}</ins>
                                                    @else
                                                        <ins class="new-price">£ {{ number_format($product->product_discount_price )}}</ins>
                                                        <del class="old-price">£ {{number_format($product->product_regular_price)}}</del>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- End of Tab Content -->
                </div>
                <!-- End of Container -->
            </section>
            <!-- End of Grey Section -->
        </div>
        <div class="container">
            <h2 class="title justify-content-center ls-normal mb-4 mt-10 pt-1 appear-animate">Popular Departments
            </h2>
            <div class="tab tab-nav-boxed tab-nav-outline appear-animate">
                <ul class="nav nav-tabs justify-content-center" role="tablist">
                    <?php
                    $cat_loop_count = 1;
                    ?>
                    @foreach($home_categories as $eachCat)
                        <?php
                        $li_class = "";
                        if($cat_loop_count == 1){
                            $li_class = "active";
                            $cat_loop_count++;
                        }
                        ?>
                        <li class="nav-item mr-2 mb-2">
                            <a class="nav-link {{$li_class}} br-sm font-size-md ls-normal" href="#cat{{$eachCat->id}}">{{$eachCat->category_name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- End of Tab -->
            <div class="tab-content product-wrapper appear-animate">
                <?php
                $loop_count = 1;
                ?>
                @foreach($home_categories as $eachCat)
                    <?php
                    $cat_class = "";
                    if($loop_count == 1){
                        $cat_class = "active";
                        $loop_count++;
                    }
                    ?>
                    <div class="tab-pane {{$cat_class}} pt-4" id="cat{{$eachCat->id}}">
                        @if(isset($home_categories_products[$eachCat->id][0]))
                            <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                                @foreach($home_categories_products[$eachCat->id] as $product)
                                    <div class="product-wrap">
                                        <div class="product text-center">
                                            <figure class="product-media">
                                                <a href="{{route('product.details',encrypt($product->id))}}">
                                                    <img src="{{asset('images/products/'.$product->product_thumbnail_image)}}" alt="Product"
                                                         width="300" height="338" />
                                                </a>
                                                <div class="product-action-horizontal">
                                                    <input type="hidden" value="{{$product->id}}" name="pro_id">
                                                    <input type="hidden" value="{{$product->brand_id}}" name="brand_id">
                                                    <input type="hidden" value="{{$product->category_id}}" name="category_id">
                                                    <input type="hidden" value="{{$product->product_name}}" name="pro_name">
                                                    <input type="hidden" value="{{$product->product_code}}" name="pro_code">
                                                    <input type="hidden" id="price" value="{{$product->product_regular_price}}" name="pro_price">
                                                    <?php $attributes = \App\Model\Attributes::where('product_id',$product->id)->count(); ?>
                                                    @if($attributes > 0 )
                                                        <a href="{{route('product.details',encrypt($product->id))}}" class="btn-product-icon w-icon-hamburger " title="Add to cart">
                                                        </a>
                                                    @elseif($product->product_quantity < 1)
                                                        <a href="{{route('product.details',encrypt($product->id))}}" class="btn-product-icon w-icon-hamburger " title="Add to cart">
                                                        </a>
                                                    @else
                                                        @php($countCartItem = 0 )
                                                        @php($countCartItem = \App\Model\Cart::where(['pro_id' => $product->id, 'session_id' => \Illuminate\Support\Facades\Session::get('session_id') ])->count())
                                                        <button type="button" class="btn-product-icon btn-cart @if($countCartItem > 0)  w-icon-cart @else w-icon-cart @endif updateCart" title="Add to cart"
                                                                data-cart_pro_id="{{$product->id}}"
                                                                @if($product->product_discount_price) data-productprice="{{$product->product_discount_price}}" @else data-productprice="{{$product->product_regular_price}}" @endif
                                                                data-category_id="{{$product->category_id}}"
                                                                data-brand_id="{{$product->brand_id}}"
                                                                data-product_name="{{$product->product_name}}"
                                                                data-product_code="{{$product->product_code}}">
                                                        </button>
                                                    @endif
                                                    @php($countWishlist = 0 )
                                                    @if(\Illuminate\Support\Facades\Auth::check())
                                                        @php($countWishlist = \App\Model\Wishlist::where(['user_id' => auth()->user()->id, 'w_product_id' => $product->id ])->count())
                                                        <button type="button" class="updateWishlist btn-product-icon btn-sm" data-pro_id="{{$product->id}}"> <i class=" @if($countWishlist > 0) w-icon-heart-full @else w-icon-heart @endif ">
                                                            </i>
                                                        </button>
                                                    @else
                                                        <button type="button" class="userLogin btn-product-icon btn-sm"> <i class="w-icon-heart"></i></button>
                                                    @endif

                                                    @php($countComparelist = 0 )
                                                    @php($countComparelist = \App\Model\Compare::where(['product_id' => $product->id, 'session_id' => \Illuminate\Support\Facades\Session::get('session_id') ])->count())
                                                    <button type="button" class="btn-product-icon btn-md btn-icon-left updateCompare" data-product_id="{{$product->id}}"><i class="@if($countComparelist > 0)  w-icon-check-solid @else w-icon-compare @endif"></i></button>
                                                </div>
                                                <div class="product-label-group">
                                                    @if($product->product_discount_percent > 0)
                                                        <label class="product-label label-discount">{{$product->product_discount_percent}}% Off</label>
                                                    @elseif($product->product_discount_amount > 0)
                                                        <label class="product-label label-discount"style="background-color: blueviolet">{{$product->product_discount_amount}} Taka Off</label>
                                                    @endif
                                                    <?php $attr_products = \App\Model\Attributes::where('product_id',$product->id)->count(); ?>

                                                    @if($attr_products > 0)

                                                    @elseif($product->product_quantity < 1)

                                                        <label class="product-label label-discount" style="color: white; background-color: red">Stock Out</label>
                                                    @endif
                                                </div>
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name"><a href="{{route('product.details',encrypt($product->id))}}">{{$product->product_name}}</a></h4>
                                                <div class="ratings-container">
                                                    @if(App\Model\Rating::where('rating_approval','=', 'Approved')
                                                                    ->where('product_id',$product->id)->sum('rating'))
                                                        <?php
                                                        $relatedRatingSum = App\Model\Rating::where('rating_approval','=', 'Approved')
                                                            ->where('product_id',$product->id)->sum('rating');
                                                        $relatedRatingCount = App\Model\Rating::where('rating_approval','=', 'Approved')
                                                            ->where('product_id',$product->id)->count();

                                                        if ($relatedRatingCount>0){
                                                            $relatedAvarageRating = round($relatedRatingSum/$relatedRatingCount,2);
                                                            $relatedAvarageStarRating = round($relatedRatingSum/$relatedRatingCount);
                                                        }else{
                                                            $relatedAvarageStarRating = 0;
                                                            $relatedAvarageRating = 0;
                                                        }
                                                        ?>

                                                        <div class="ratings-container">

                                                            @for($star = 1; $star <= $relatedAvarageStarRating; $star++)

                                                                <i class="fas fa-star" style="color: darkorange"></i>
                                                            @endfor

                                                            @for ($j = $relatedAvarageStarRating+1; $j <= 5; $j++)

                                                                <i class="fas fa-star" style="color: lightgrey"></i>
                                                            @endfor

                                                            <a href="{{route('product.details',encrypt($product->id))}}" class="rating-reviews">({{$relatedRatingCount}} reviews)</a>
                                                        </div>
                                                    @else
                                                        <span href="{{route('product.details',encrypt($product->id))}}" class="rating-reviews">No Review</span>
                                                    @endif
                                                </div>
                                                <div class="product-price">
                                                    @if($product->product_discount_price == null)
                                                        <ins class="new-price">£ {{ number_format($product->product_regular_price) }}</ins>
                                                    @else
                                                        <ins class="new-price">£ {{ number_format($product->product_discount_price )}}</ins>
                                                        <del class="old-price">£ {{number_format($product->product_regular_price)}}</del>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center font-size-lg">
                                <p style="color: red"> No Product Found</p>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            <!-- End of Tab Content -->
        </div>
        <!--End of Catainer -->
        <!-- End of Swiper -->
{{--        <!-- End of Container -->--}}
{{--        <section class="category-section top-category pt-10 pb-10 appear-animate">--}}
{{--            <div class="container pb-2">--}}
{{--                <div class="title-link-wrapper mb-2">--}}
{{--                    <h2 class="title">Top Categories</h2>--}}
{{--                    <a href="{{route('all.categories')}}">More Categories<i class="w-icon-long-arrow-right"></i></a>--}}
{{--                </div>--}}
{{--                <div class="swiper">--}}
{{--                    <div class="swiper-container swiper-theme pg-show" data-swiper-options="{--}}
{{--                            'spaceBetween': 20,--}}
{{--                            'slidesPerView': 2,--}}
{{--                            'breakpoints': {--}}
{{--                                '576': {--}}
{{--                                    'slidesPerView': 3--}}
{{--                                },--}}
{{--                                '768': {--}}
{{--                                    'slidesPerView': 5--}}
{{--                                },--}}
{{--                                '992': {--}}
{{--                                    'slidesPerView': 6--}}
{{--                                }--}}
{{--                            }--}}
{{--                        }">--}}
{{--                        <div class="tab-content product-wrapper appear-animate bg-grey">--}}
{{--                            <div class="tab-pane active pt-4" id="tab1-1">--}}
{{--                                <div class="swiper-wrapper row cols-lg-6 cols-md-5 cols-sm-3 cols-2 bg-grey" style="margin-top: 20px;">--}}
{{--                                    @foreach($top_categories as $category)--}}
{{--                                    <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">--}}
{{--                                        <a href="shop-banner-sidebar.html" class="category-media">--}}
{{--                                            <img src="{{$category->category_image}}" alt="Category"--}}
{{--                                                 width="130" height="130">--}}
{{--                                        </a>--}}
{{--                                        <div class="category-content">--}}
{{--                                            <h4 class="category-name">{{$category->category_name}}</h4>--}}
{{--                                            <a href="shop-banner-sidebar.html"--}}
{{--                                               class="btn btn-primary btn-link btn-underline">Shop--}}
{{--                                                Now</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--        <!-- End of .category-section top-category -->--}}
{{--        <div class="container">--}}
{{--            <div class="row category-banner-wrapper appear-animate pt-6 pb-8">--}}
{{--                @foreach($marketing_banners as $marketing_banner)--}}
{{--                <div class="col-md-6 mb-4">--}}
{{--                    <div class="banner banner-fixed br-xs">--}}
{{--                        <figure>--}}
{{--                            <img src="{{asset($marketing_banner->banner_image)}}" alt="Category Banner"--}}
{{--                                 width="610" height="160" style="background-color: #ecedec; width: 610px; height: 160px" />--}}
{{--                        </figure>--}}
{{--                        <div class="banner-content y-50 mt-0">--}}
{{--                            <h3 class="banner-title text-uppercase"><br></h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
    </main>
    <!-- End of Main -->
@endsection
