@extends('front.layouts.master')
@section('content')
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title">Compare</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav mb-2">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html">Home</a></li>
                    <li>Compare</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content mb-10 pb-2">
            <div class="container">
                @if(count($compares) > 0)
                <div class="compare-table">
                        <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-products">
                            <div class="compare-col compare-field">Product</div>
                            @foreach($compares as $eachCompareProduct)
                            <div class="compare-col compare-product">
                                <form action="{{route('delete.compare.product',encrypt($eachCompareProduct->id))}}" onclick="return confirm('Are You Confirm to Delete?')" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="btn remove-product"><i class="w-icon-times-solid"></i></button>
                                </form>
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{route('product.details',$eachCompareProduct->product->id)}}">
                                            <img src="{{asset('images/products/'.$eachCompareProduct->product->product_thumbnail_image)}}" alt="Product" width="228"
                                                 height="257" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <input type="hidden" value="{{$eachCompareProduct->product->id}}" name="pro_id">
                                            <input type="hidden" value="{{$eachCompareProduct->product->brand_id}}" name="brand_id">
                                            <input type="hidden" value="{{$eachCompareProduct->product->category_id}}" name="category_id">
                                            <input type="hidden" value="{{$eachCompareProduct->product->product_name}}" name="pro_name">
                                            <input type="hidden" value="{{$eachCompareProduct->product->product_code}}" name="pro_code">
                                            <input type="hidden" id="price" value="{{$eachCompareProduct->product->product_regular_price}}" name="pro_price">
                                            <?php $attributes = \App\Model\Attributes::where('product_id',$eachCompareProduct->product->id)->count(); ?>
                                            @if($attributes > 0 )
                                                <a href="{{route('product.details',$eachCompareProduct->product->id)}}" class="btn-product-icon w-icon-hamburger " title="Add to cart">
                                                </a>
                                            @elseif($eachCompareProduct->product->product_quantity < 1)
                                                <a href="{{route('product.details',$eachCompareProduct->product->id)}}" class="btn-product-icon w-icon-hamburger " title="Add to cart">
                                                </a>
                                            @else
                                                <button type="button" class="btn-product-icon btn-cart w-icon-cart updateCart" title="Add to cart"
                                                        data-cart_pro_id="{{$eachCompareProduct->product->id}}"
                                                        @if($eachCompareProduct->product->product_discount_price) data-productprice="{{$eachCompareProduct->product->product_discount_price}}" @else data-productprice="{{$eachCompareProduct->product->product_regular_price}}" @endif
                                                        data-category_id="{{$eachCompareProduct->product->category_id}}"
                                                        data-brand_id="{{$eachCompareProduct->product->brand_id}}"
                                                        data-product_name="{{$eachCompareProduct->product->product_name}}"
                                                        data-product_code="{{$eachCompareProduct->product->product_code}}">
                                                </button>
                                            @endif
                                            @php($countWishlist = 0 )
                                            @if(\Illuminate\Support\Facades\Auth::check())
                                                @php($countWishlist = \App\Model\Wishlist::where(['user_id' => auth()->user()->id, 'w_product_id' => $eachCompareProduct->product->id ])->count())
                                                <button type="button" class="updateWishlist btn-product-icon btn-sm" data-pro_id="{{$eachCompareProduct->product->id}}"> <i class=" @if($countWishlist > 0) w-icon-heart-full @else w-icon-heart @endif ">
                                                    </i>
                                                </button>
                                            @else
                                                <button type="button" class="userLogin btn-product-icon btn-sm"> <i class="w-icon-heart"></i></button>
                                            @endif
                                        </div>
                                    <div class="product-details">
                                        <h3 class="product-name"><a href="product-default.html">{{$eachCompareProduct->product->product_name}}</a></h3>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- End of Compare Products -->
                        <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-price">
                            <div class="compare-col compare-field">Price</div>
                            @foreach($compares as $eachCompareProduct)
                            <div class="compare-col compare-value">
                                <div class="product-price">
                                    @if($eachCompareProduct->product->product_discount_price == null)
                                        <ins class="new-price">৳ {{number_format($eachCompareProduct->product->product_regular_price)}}</ins>

                                    @else
                                        <ins class="new-price">৳ {{number_format($eachCompareProduct->product->product_discount_price)}}</ins>
                                        <del class="old-price">৳ {{number_format($eachCompareProduct->product->product_regular_price)}}</del>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- End of Compare Price -->
                        <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-availability">
                            <div class="compare-col compare-field">Availability</div>
                            @foreach($compares as $eachCompareProduct)
                                @if($eachCompareProduct->product->product_quantity > 0)
                                    <div class="compare-col compare-value" style="color: green">In stock</div>
                                @else
                                    <div class="compare-col compare-value" style="color: red">Stock out</div>
                                @endif
                            @endforeach
                        </div>
                        <!-- End of Compare Availability -->

                        <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-reviews">
                            <div class="compare-col compare-field">Ratings &amp; Reviews</div>
                            @foreach($compares as $eachCompareProduct)
                                <?php $product_id = $eachCompareProduct->product->id; ?>
                                @if(App\Model\Rating::where('rating_approval','=', 'Approved')
                                            ->where('product_id',$product_id)->sum('rating'))
                                    <?php
                                            $product_id = $eachCompareProduct->product->id;
                                                $ratingSum = \App\Model\Rating::where('rating_approval','=', 'Approved')
                                                    ->where('product_id',$product_id)->sum('rating');
                                                $ratingCount = \App\Model\Rating::where('rating_approval','=', 'Approved')
                                                    ->where('product_id',$product_id)->count();

                                                if ($ratingCount>0){
                                                    $avarageRating = round($ratingSum/$ratingCount,2);
                                                    $avarageStarRating = round($ratingSum/$ratingCount);
                                                }else{
                                                    $avarageRating = 0;
                                                    $avarageStarRating = 0;
                                                }
                                        ?>
                                        <div class="compare-col compare-rating">
                                            <div class="ratings-container">
                                                @for($star = 1; $star <= $avarageStarRating; $star++)

                                                    <i class="fas fa-star" style="color: darkorange"></i>
                                                @endfor

                                                @for ($j = $avarageStarRating+1; $j <= 5; $j++)

                                                    <i class="fas fa-star" style="color: lightgrey"></i>
                                                @endfor

                                                <a href="{{route('product.details',$eachCompareProduct->product->id)}}" class="rating-reviews">({{$ratingCount}} reviews)</a>
                                            </div>
                                        </div>
                                @else
                                        <div class="compare-col compare-rating">
                                            <div class="ratings-container">
                                                <span href="{{route('product.details',$eachCompareProduct->product->id)}}" class="rating-reviews">No Review</span>
                                            </div>
                                        </div>
                                @endif
                            @endforeach
                        </div>
                        <!-- End of Compare Reviews -->

                        <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-color">
                            <div class="compare-col compare-field">Color</div>
                            @foreach($compares as $eachCompareProduct)
                                @php($colour = \App\Model\Attributes::where(['product_id' => $eachCompareProduct->product->id])->get())
                                        <div class="compare-col compare-value">
                                            @foreach($colour as $eachColour)
                                                <span class="swatch" style="padding: 15px" title="Red">{{$eachColour->attributes_colour}},</span>
                                            @endforeach

                                        </div>
                            @endforeach
                        </div>
                        <!-- End of Compare Color -->
                        <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-size">
                            <div class="compare-col compare-field">Size</div>
                            @foreach($compares as $eachCompareProduct)
                                @php($colour = \App\Model\Attributes::where(['product_id' => $eachCompareProduct->product->id])->get())
                                <div class="compare-col compare-value">
                                    @foreach($colour as $eachColour)
                                        <span class="swatch" style="padding: 15px" title="Red">{{$eachColour->attributes_size}},</span>
                                    @endforeach

                                </div>
                            @endforeach
                        </div>
                </div>
                @else
                    <div class="text-center" style="text-align: center; justify-items: center">
                        <h4 class="text-danger text-center font-size-lg">Your comparison list is empty</h4>
                        <br>
                        <a class="button text-center btn btn-rounded btn-dark" href="{{route('front.shop')}}">Continue Shopping</a>
                    </div>
                @endif
            </div>
            <!-- End of Compare Table -->
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->
@endsection
