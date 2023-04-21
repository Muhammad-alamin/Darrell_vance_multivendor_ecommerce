@extends('front.layouts.master')
@section('content')
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb bb-no">
                    <li><a href="demo1.html">Home</a></li>
                    <li>Shop</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <!-- Start of Shop Banner -->
                <div class="shop-default-banner banner d-flex align-items-center mb-5 br-xs text-center">
                    <figure class="product-media mobileResponsive">
                        <a href="">
                            <img src="{{asset($single_campaign->image)}}" alt="Product" width="100"
                                 height="100"  style="width: 1024px; height: 300px;"/>
                        </a>
                        <div class="banner-content ">
                                <div class="example responsive-timer" data-date="{{$single_campaign->end_date}}"><span><h2 id="mobResponsive390px" style="margin-top: 50px;">{{$single_campaign->title}}</h2></span></div>
                        </div>
                    </figure>
                </div>
                <!-- End of Shop Banner -->

                <!-- Start of Shop Content -->
                <div class="shop-content">
                    <!-- Start of Shop Main Content -->
                    <div class="main-content">
                        <div class="product-wrapper row cols-lg-5 cols-md-4 cols-sm-3 cols-2">
                            @foreach($products as $key=>$eachProduct)
                                @if($eachProduct->product_status == 'Active' && $eachProduct->product_approval == 'Approved')
                                <div class="product-wrap">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="{{route('campaign.product.details',$eachProduct->product_id)}}">
                                                <img src="{{asset('images/products/'.$eachProduct->image)}}" alt="Product" width="300"
                                                     height="338" />
                                            </a>
                                            <div class="product-action-horizontal">
                                                <input type="hidden" value="{{$eachProduct->product_id}}" name="pro_id">
                                                <input type="hidden" value="{{$eachProduct->brand_id}}" name="brand_id">
                                                <input type="hidden" value="{{$eachProduct->category_id}}" name="category_id">
                                                <input type="hidden" value="{{$eachProduct->product_name}}" name="pro_name">
                                                <input type="hidden" value="{{$eachProduct->product_code}}" name="pro_code">
                                                <input type="hidden" id="price" value="{{$eachProduct->product_regular_price}}" name="pro_price">
                                                    <?php $attributes = \App\Model\Attributes::where('product_id',$eachProduct->id)->count(); ?>
                                                @if($attributes > 0 )
                                                    <a href="{{route('product.details',encrypt($eachProduct->id))}}" class="btn-product-icon w-icon-hamburger " title="Add to cart">
                                                    </a>
                                                @elseif($eachProduct->product_quantity < 1)
                                                    <a href="{{route('product.details',encrypt($eachProduct->id))}}" class="btn-product-icon w-icon-hamburger " title="Add to cart">
                                                    </a>
                                                @else
                                                    @php($countCartItem = 0 )
                                                    @php($countCartItem = \App\Model\Cart::where(['pro_id' => $eachProduct->id, 'session_id' => \Illuminate\Support\Facades\Session::get('session_id') ])->count())
                                                    <button type="button" class="btn-product-icon btn-cart @if($countCartItem > 0)  w-icon-cart @else w-icon-cart @endif updateCart" title="Add to cart"
                                                            data-cart_pro_id="{{$eachProduct->id}}"
                                                            @if($eachProduct->product_discount_price) data-productprice="{{$eachProduct->product_discount_price}}" @else data-productprice="{{$eachProduct->product_regular_price}}" @endif
                                                            data-category_id="{{$eachProduct->category_id}}"
                                                            data-brand_id="{{$eachProduct->brand_id}}"
                                                            data-product_name="{{$eachProduct->product_name}}"
                                                            data-product_code="{{$eachProduct->product_code}}">
                                                    </button>
                                                @endif
                                                @php($countWishlist = 0 )
                                                @if(\Illuminate\Support\Facades\Auth::check())
                                                    @php($countWishlist = \App\Model\Wishlist::where(['user_id' => auth()->user()->id, 'w_product_id' => $eachProduct->product_id ])->count())
                                                    <button type="button" class="updateWishlist btn-product-icon btn-sm" data-pro_id="{{$eachProduct->product_id}}"> <i class=" @if($countWishlist > 0) w-icon-heart-full @else w-icon-heart @endif ">
                                                        </i></button>
                                                @else
                                                    <a  class="btn-product-icon btn-sm w-icon-heart userLogin" title="Add to wishlist"><span></span></a>
                                                @endif

                                                @php($countComparelist = 0 )
                                                @php($countComparelist = \App\Model\Compare::where(['product_id' => $eachProduct->product_id, 'session_id' => \Illuminate\Support\Facades\Session::get('session_id') ])->count())
                                                <button type="button" class="btn-product-icon btn-md btn-icon-left updateCompare" data-product_id="{{$eachProduct->product_id}}" title="Add to compare list"><i class="@if($countComparelist > 0)  w-icon-check-solid @else w-icon-compare @endif"></i></button>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <div class="product-cat">
                                                <a href="{{route('campaign.product.details',$eachProduct->product_id)}}">{{$eachProduct->category_name}}</a>
                                            </div>
                                            <h3 class="product-name">
                                                <a href="{{route('campaign.product.details',$eachProduct->product_id)}}">{{$eachProduct->product_name}}</a>
                                            </h3>
                                            <div class="ratings-container">
                                                @if(\App\Model\Rating::where('rating_approval','=', 'Approved')
                                                                ->where('product_id',$eachProduct->product_id)->sum('rating'))
                                                    <?php
                                                    $relatedRatingSum = App\Model\Rating::where('rating_approval','=', 'Approved')
                                                        ->where('product_id',$eachProduct->product_id)->sum('rating');
                                                    $relatedRatingCount = App\Model\Rating::where('rating_approval','=', 'Approved')
                                                        ->where('product_id',$eachProduct->product_id)->count();

                                                    if ($relatedRatingCount>0){
                                                        $relatedAvarageRating = round($relatedRatingSum/$relatedRatingCount,2);
                                                        $relatedAvarageStarRating = round($relatedRatingSum/$relatedRatingCount);
                                                    }else{
                                                        $relatedAvarageStarRating = 0;
                                                        $relatedAvarageRating = 0;
                                                    }
                                                    ?>
{{--                                                @elseif($relatedAvarageStarRating>0)--}}
                                                    <div class="ratings-container">

                                                        @for($star = 1; $star <= $relatedAvarageStarRating; $star++)
{{--                                                                                                                    <span  style="color: orange;  font-size: large"><strong>&#9733;</strong></span>--}}
                                                            <i class="fas fa-star" style="color: darkorange"></i>
                                                        @endfor

                                                        @for ($j = $relatedAvarageStarRating+1; $j <= 5; $j++)
{{--                                                                                                                        <span  style="color: black;  font-size: large"><strong>&#9733;</strong></span>--}}
                                                            <i class="fas fa-star" style="color: lightgrey"></i>
                                                        @endfor

                                                        <a href="product-default.html" class="rating-reviews">({{$relatedRatingCount}} reviews)</a>
                                                    </div>
                                                @else
                                                    <span href="#" class="rating-reviews">No Review</span>
                                                @endif

                                            </div>
                                            <div class="product-pa-wrapper">
                                                <div class="product-price">
                                                    @if($eachProduct->product_discount_price == null)
                                                        <ins class="new-price">৳ {{number_format($eachProduct->product_regular_price * $single_campaign->discount /100)}}</ins>
                                                        <del class="old-price">৳ {{number_format($eachProduct->product_regular_price)}}</del>
                                                    @else
                                                        <ins class="new-price">৳ {{number_format($eachProduct->product_discount_price * $single_campaign->discount /100)}}</ins>
                                                        <del class="old-price">৳ {{number_format($eachProduct->product_discount_price)}}</del>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                        <span>{{ $products->render() }}</span>
                    </div>
                    <!-- End of Shop Main Content -->
                </div>
                <!-- End of Shop Content -->
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->
@endsection
