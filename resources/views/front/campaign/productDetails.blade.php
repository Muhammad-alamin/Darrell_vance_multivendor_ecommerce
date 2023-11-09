@extends('front.layouts.master')
@section('content')

    <!-- Start of Main -->
    <main class="main mb-10 pb-1">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav container">

            @if(session('error_message'))
                <div class="alert alert-danger">
                    {{session()->get('error_message')}}
                </div>
            @endif

            <ul class="breadcrumb bb-no">
                <li><a href="demo1.html">Home</a></li>
                <li>Products</li>
            </ul>
            <ul class="product-nav list-style-none">
                <li class="product-nav-prev">
                    <a href="#">
                        <i class="w-icon-angle-left"></i>
                    </a>
                    <span class="product-nav-popup">
                            <img src="assets/images/products/product-nav-prev.jpg" alt="Product" width="110"
                                 height="110" />
                            <span class="product-name">Soft Sound Maker</span>
                        </span>
                </li>
                <li class="product-nav-next">
                    <a href="#">
                        <i class="w-icon-angle-right"></i>
                    </a>
                    <span class="product-nav-popup">
                            <img src="assets/images/products/product-nav-next.jpg" alt="Product" width="110"
                                 height="110" />
                            <span class="product-name">Fabulous Sound Speaker</span>
                        </span>
                </li>
            </ul>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg">
                    <div class="main-content">
                        <form action="{{route('addToCart')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$product->id}}" name="pro_id">
                            <input type="hidden" value="{{$product->brand_id}}" name="brand_id">
                            <input type="hidden" value="{{$product->category_id}}" name="category_id">
                            <input type="hidden" value="{{$product->product_name}}" name="pro_name">
                            <input type="hidden" value="{{$product->product_code}}" name="pro_code">
                            @if($product->product_discount_price == null)
                            <input type="hidden"  value="{{$product->product_regular_price * $campaignProducts->discount/100}}" name="pro_price">
                            @else
                            <input type="hidden" value="{{$product->product_discount_price * $campaignProducts->discount/100}}" name="pro_price">
                            @endif
                            <div class="product product-single row">
                                <div class="col-md-6 mb-6">
                                    <div class="product-gallery product-gallery-sticky">
                                        <div class="swiper-container product-single-swiper swiper-theme nav-inner" data-swiper-options="{
                                                                                    'navigation': {
                                                                                        'nextEl': '.swiper-button-next',
                                                                                        'prevEl': '.swiper-button-prev'
                                                                                    }
                                                                                }">
                                            <div class="swiper-wrapper row cols-1 gutter-no">
                                                <div class="swiper-slide">
                                                    <figure class="product-image">
                                                        <img  src="{{asset('images/products/'.$product->product_thumbnail_image)}}"
                                                              data-zoom-image="{{asset('images/products/'.$product->product_thumbnail_image)}}"
                                                              alt="Electronics Black Wrist Watch" width="400" height="400">
                                                    </figure>
                                                </div>
                                                @php($images = json_decode($product->product_image))
                                                @if($images)
                                                    @foreach($images as $eachimage)
                                                        <div class="swiper-slide">
                                                            <figure class="product-image">
                                                                <img  src="{{asset('images/products/'.$eachimage)}}"
                                                                      data-zoom-image="{{asset('images/products/'.$eachimage)}}"
                                                                      alt="Electronics Black Wrist Watch" width="400" height="400">
                                                            </figure>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <button class="swiper-button-next"></button>
                                            <button class="swiper-button-prev"></button>
                                        </div>
                                        <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                                                                                    'navigation': {
                                                                                        'nextEl': '.swiper-button-next',
                                                                                        'prevEl': '.swiper-button-prev'
                                                                                    }
                                                                                }">
                                            <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                                                <div class="product-thumb swiper-slide">
                                                    <img  src="{{asset('images/products/'.$product->product_thumbnail_image)}}"
                                                          alt="Product Thumb" width="200" height="100">
                                                </div>
                                                @php($images = json_decode($product->product_image))
                                                @if($images)
                                                    @foreach($images as $eachimage)
                                                        <div class="product-thumb swiper-slide">
                                                            <img  src="{{asset('images/products/'.$eachimage)}}"
                                                                  alt="Product Thumb" width="200" height="100">
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <span class="swiper-button-next"></span>
                                            <span class="swiper-button-prev"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 mb-md-6">
                                    <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                        <h1 class="product-title">{{$product->product_name}}</h1>
                                        <div class="product-bm-wrapper">
                                            <figure class="brand">
                                                <img src="{{asset($brandImage->brand_image)}}" alt="Brand"
                                                     width="102" height="48" />
                                            </figure>
                                            <div class="product-meta">
                                                <div class="product-categories">
                                                    Category:
                                                    <span class="product-category"><a href="#">{{$product->category->category_name}}</a></span>
                                                </div>
                                                <div class="product-sku">
                                                    SKU: <span>{{$product->product_sku}}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="product-divider">

                                        <div class="product-price">
                                            @if($product->product_discount_price == null)
                                                <ins class="new-price">£ {{number_format($product->product_regular_price * $campaignProducts->discount/100)}}</ins>
                                                <del class="old-price">£ {{number_format($product->product_regular_price)}}</del>
                                            @else
                                                    <ins class="new-price">£ {{number_format($product->product_discount_price * $campaignProducts->discount/100)}}</ins>
                                                    <del class="old-price">£ {{number_format($product->product_discount_price)}}</del>
                                            @endif
                                        </div>

                                        <?php $attr_pro = \App\Model\Attributes::where('product_id',$product->id)->get();
                                        foreach($attr_pro as $key=>$value){
                                            $pro_size = $value->attributes_size;
                                            $attrStock = \App\Model\Attributes::where(['product_id' => $product->id, 'attributes_size' => $pro_size])->first();

                                        }

                                        ?>
                                        {{--                                        @if(!empty($attrStock))--}}
                                        {{--                                            @if($attrStock->attributes_stock > 0)--}}
                                        {{--                                            <label class="product-label label-discount" style="background-color: green">In stock </label>--}}
                                        {{--                                            @else--}}
                                        {{--                                            <label class="product-label label-discount" style="background-color: red">Stock out</label>--}}
                                        {{--                                            @endif--}}
                                        {{--                                        @elseif($product->product_quantity > 0)--}}
                                        {{--                                            <label class="product-label label-discount" style="background-color: green">In stock </label>--}}
                                        {{--                                        @else--}}
                                        {{--                                            <label class="product-label label-discount" style="background-color: red">Stock out</label>--}}
                                        {{--                                        @endif--}}
                                        @if($product->product_quantity > 0)
                                            <label class="product-label label-discount" style="background-color: green">Stock in</label>
                                            <span class="text-center font-size-md" id="get_stock" style="margin-left: 10px">({{$product->product_quantity}} products available)</span>
                                        @elseif(count($attribute_products) > 0)
                                            <label class="font-size-md" id="stock_check" ></label>
                                            <span class="text-center font-size-md" id="get_stock" style="margin-left: 10px"></span>
                                        @else
                                            <label class="product-label label-discount"  style="background-color: red">Stock out</label>
                                            <span class="text-center font-size-md" id="get_stock" style="margin-left: 10px">({{$product->product_quantity}} products available)</span>
                                        @endif

                                        {{--                                            @if($product->product_discount_price == null)--}}
                                        {{--                                            <div  class="product-price" ><ins class="new-price">£ {{ number_format($product->product_regular_price) }}</ins></div>--}}

                                        {{--                                                @elseif(count($attribute_products) > 0)--}}
                                        {{--                                                <div id="getPrice" class="product-price" ><ins class="new-price">Please Select Varient</ins></div>--}}
                                        {{--                                            @else--}}
                                        {{--                                            <div  class="product-price" ><ins class="new-price"> £ {{ number_format($product->product_discount_price) }}</ins></div>--}}
                                        {{--                                            <div><del class="product-price"><ins class="new-price"> £ {{number_format($product->product_regular_price)}}</ins></del></div>--}}
                                        {{--                                            @endif--}}
                                        @if($avarageStarRating>0)
                                            <div class="ratings-container">
                                                <?php
                                                $star = 1;
                                                while ($star <= $avarageStarRating){ ?>
                                                <span  style="color: orange;  font-size: x-large"><strong>&#9733;</strong></span>
                                                <?php $star++; } ?>

                                                <a href="javascript:void(0)" class="rating-reviews scroll-to" style="padding: 1%; font-size: medium">({{$avarageRating}})</a>
                                                <a href="javascript:void(0)" class="rating-reviews" style="padding: 1%; font-size: small">({{$ratingCount}} Reviews)</a>

                                            </div>
                                        @endif
                                        <hr class="product-divider">
                                        @if(count($attribute_products) > 0)
                                            <div class="product-form product-variation-form product-color-swatch">
                                                <label>Color:</label>
                                                <div class="d-flex align-items-center product-variations">

                                                    <select id="Colour" name="pro_colour" class=" form-control form-control-md">
                                                        <option value="" selected disabled>Select Color</option>
                                                        @foreach($product->attributes as $key=>$value)
                                                            <option value="{{$product->id}}-{{$value->attributes_colour}}" >{{$value->attributes_colour}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="product-form product-variation-form product-size-swatch">
                                                <label class="mb-1">Size:</label>
                                                <div class="flex-wrap d-flex align-items-center product-variations">
                                                    <select id="sellSize" name="pro_size" class=" form-control form-control-md">
                                                        <option value="" selected disabled>Select Size</option>
                                                        @foreach($product->attributes as $key=>$value)
                                                            <option value="{{$product->id}}-{{$value->attributes_size}}"> {{$value->attributes_size}}</option>
                                                            <?php $product_size = $value->attributes_size ?>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="fix-bottom ">
                                            <div class="product-form container">
                                                <div class="product-qty-form">
                                                    <div class="input-group">
                                                        <input type="button" value="-" class="button-minus quantity_minus" data-quantity_minus="-1" data-pro_id="{{$product->id}}" data-field="quantity">
                                                        <input  step="1" min="1" maxlength = "10" value="1" data-value="1" id="quantity_update_ajax" name="quantity" class="quantity-field">
                                                        <input type="button" id="input" value="+"  class="button-plus stock_manage quantity_plus" data-quantity_plus="1" data-pro_id="{{$product->id}}"  data-field="quantity">
                                                    </div>
                                                    @if(count($attribute_products) > 0 )
                                                        <button class="btn btn-primary " id="add_to_cart_button" style="margin-left: 10px" type="submit" disabled>
                                                            <i class="w-icon-cart"></i>
                                                            <span>Add to Cart</span>
                                                        </button>
                                                    @elseif($product->product_quantity < 1)
                                                        <button class="btn btn-primary "  style="margin-left: 10px" type="submit" disabled>
                                                            <i class="w-icon-cart"></i>
                                                            <span>Add to Cart</span>
                                                        </button>
                                                    @else
                                                        <button class="btn btn-primary " style="margin-left: 10px" type="submit">
                                                            <i class="w-icon-cart"></i>
                                                            <span>Add to Cart</span>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="social-links-wrapper">
                                            <div class="social-links">
                                                <div class="social-icons social-no-color border-thin">
                                                    <a href="javascript:void(0)" class="social-icon social-facebook w-icon-facebook"></a>
                                                    <a href="javascript:void(0)" class="social-icon social-twitter w-icon-twitter"></a>
                                                    <a href="javascript:void(0)" class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                                    <a href="javascript:void(0)" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                                    <a href="javascript:void(0)" class="social-icon social-youtube fab fa-linkedin-in"></a>
                                                </div>
                                            </div>
                                            <span class="divider d-xs-show"></span>
                                            <div class="product-link-wrapper d-flex">
                                                @php($countWishlist = 0 )
                                                @if(\Illuminate\Support\Facades\Auth::check())
                                                    @php($countWishlist = \App\Model\Wishlist::where(['user_id' => auth()->user()->id, 'w_product_id' => $product->id ])->count())
                                                    <button type="button" class="updateWishlist btn-product-icon btn-sm" data-pro_id="{{$product->id}}"> <i class=" @if($countWishlist > 0) w-icon-heart-full @else w-icon-heart @endif ">
                                                        </i></button>
                                                @else
                                                    <a  class="btn-product-icon btn-sm w-icon-heart userLogin"><span></span></a>
                                                @endif
                                                @php($countComparelist = 0 )
                                                @php($countComparelist = \App\Model\Compare::where(['product_id' => $product->id, 'session_id' => \Illuminate\Support\Facades\Session::get('session_id') ])->count())
                                                <button type="button" class="btn-product-icon btn-md btn-icon-left updateCompare" data-product_id="{{$product->id}}"><i class="@if($countComparelist > 0)  w-icon-check-solid @else w-icon-compare @endif"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a href="#product-tab-description" class="nav-link active">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-tab-vendor" class="nav-link">Vendor Info</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-tab-reviews" class="nav-link">Customer Reviews </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="product-tab-description">
                                    <div class="row mb-4">
                                        @if($product->video)
                                            <div class="col-md-6 mb-5">
                                                <h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4>
                                                <p class="mb-4">{{$product->product_description}}</p>
                                            </div>
                                            <div class="col-md-6 mb-5">
                                                <video controls href="#" width="450" height="300"
                                                       style="background-color: #bebebe;">
                                                    <source src="{{asset('images/products/video/'.$product->video)}}"
                                                            alt="banner" width="610" height="30"
                                                            style="background-color: #bebebe;">
                                                </video>
                                                <a class="btn-play-video btn-iframe"
                                                   href="{{asset('images/products/video/'.$product->video)}}" width="610" height="300"></a>
                                            </div>
                                        @else
                                            <div class="col-md-10 mb-10">
                                                <h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4>
                                                <p class="mb-4">{{$product->product_description}}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row cols-md-3">
                                        <div class="mb-3">
                                            <h5 class="sub-title font-weight-bold"><span class="mr-3">1.</span>Free
                                                Shipping &amp; Return</h5>
                                            <p class="detail pl-5">We offer free shipping for products on orders
                                                above 50$ and offer free delivery for all orders in US.</p>
                                        </div>
                                        <div class="mb-3">
                                            <h5 class="sub-title font-weight-bold"><span>2.</span>Free and Easy
                                                Returns</h5>
                                            <p class="detail pl-5">We guarantee our products and you could get back
                                                all of your money anytime you want in 30 days.</p>
                                        </div>
                                        <div class="mb-3">
                                            <h5 class="sub-title font-weight-bold"><span>3.</span>Special Financing
                                            </h5>
                                            <p class="detail pl-5">Get 20%-50% off items over 50$ for a month or
                                                over 250$ for a year with our special credit card.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="product-tab-vendor">
                                    <div class="row mb-3">
                                        <div class="col-md-6 mb-4">
                                            <figure class="vendor-banner br-sm">
                                                <img src="{{asset($brandImage->brand_image)}}"
                                                     alt="Vendor Banner" width="610" height="295"
                                                     style="background-color: navajowhite;" />
                                            </figure>
                                        </div>
                                        <div class="col-md-6 pl-2 pl-md-6 mb-4">
                                            <div class="vendor-user">
                                                <figure class="vendor-logo mr-4">
                                                    <a href="{{route('single.brand',encrypt($brandImage->id))}}">
                                                        <img src="{{asset($brandImage->brand_image)}}"
                                                             alt="Vendor Logo" width="80" height="80" />
                                                    </a>
                                                </figure>
                                                <div>
                                                    <div class="vendor-name"><a href="{{route('single.brand',encrypt($brandImage->id))}}">{{$brandImage->brand_name}}</a></div>
                                                </div>
                                            </div>
                                            <ul class="vendor-info list-style-none">
                                                <li class="store-name">
                                                    <label>Store Name:</label>
                                                    <span class="detail">{{$brandImage->brand_name}}</span>
                                                </li>
                                                <li class="store-address">
                                                    <label>Address:</label>
                                                    <span class="detail">{{$brandImage->brand_address}}</span>
                                                </li>
                                                <li class="store-phone">
                                                    <label>Phone:</label>
                                                    <a href="">{{$brandImage->brand_phone}}</a>
                                                </li>
                                            </ul>
                                            <a href="{{route('single.brand',encrypt($brandImage->id))}}"
                                               class="btn btn-dark btn-link btn-underline btn-icon-right">Visit
                                                Store<i class="w-icon-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="product-tab-reviews">
                                    <div class="row mb-4">
                                        @if($avarageStarRating>0)
                                            <div class="col-xl-4 col-lg-5 mb-4">
                                                <div class="ratings-wrapper">
                                                    <div class="avg-rating-container">
                                                        <h4 class="avg-mark font-weight-bolder ls-50">{{number_format($avarageRating,2)}}</h4>
                                                    </div>
                                                </div>
                                                <div class="avg-rating">
                                                    <p class="text-dark mb-1">Average Rating</p>
                                                    <div class="ratings-container">
                                                        <?php
                                                        $star = 1;
                                                        while ($star <= $avarageStarRating){ ?>
                                                        <span  style="color: orange; font-size: x-large"><strong>&#9733;</strong></span>
                                                        <?php $star++; } ?>
                                                        <a href="#" style=" font-size: large" class="rating-reviews">({{$ratingCount}} Reviews)</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-xl-8 col-lg-7 mb-4">
                                            <div class="review-form-wrapper">
                                                <h3 class="title tab-pane-title font-weight-bold mb-1">Submit Your
                                                    Review</h3>
                                                <p class="mb-3">Your email address will not be published. Required
                                                    fields are marked *</p>
                                                <form action="{{route('rating.store')}}" method="post" class="review-form" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{$product->id}}" name="pro_id">
                                                    <div class="rating-form">
                                                        <label for="rating">Your Rating Of This Product :</label>
                                                        <span class="rating-stars" name="rating">
                                                                <a class="star-1" href="#">1</a>
                                                                <a class="star-2" href="#">2</a>
                                                                <a class="star-3" href="#">3</a>
                                                                <a class="star-4" href="#">4</a>
                                                                <a class="star-5" href="#">5</a>
                                                            </span>
                                                        <select name="rating" id="rating" required=""
                                                                style="display: none;">
                                                            <option value="5">Perfect</option>
                                                            <option value="4">Good</option>
                                                            <option value="3">Average</option>
                                                            <option value="2">Not that bad</option>
                                                            <option value="1">Very poor</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label class="form-label" for="rating">Select Image</label>
                                                        <input type="file" multiple name="image[]" class="form-control" id="customFile" />
                                                    </div>
                                                    <textarea cols="30" rows="6"
                                                              placeholder="Write Your Review Here..."  class="form-control"
                                                              id="review" name="review"></textarea>
                                                    <button type="submit" class="btn btn-dark">Submit
                                                        Review</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
                                        <!-- Modal HTML embedded directly into document -->
                                        <div id="ex1" class="modal">
                                            <div class="tab-content">
                                                @if(count($AllRatings)>0)
                                                    @foreach($AllRatings as $rating)
                                                        <div class="tab-pane active" id="show-all">
                                                            <ul class="comments list-style-none">
                                                                <li class="comment">
                                                                    <div class="comment-body">
                                                                        <div class="comment-content">
                                                                            <h4 class="comment-author">
                                                                                <a href="#">{{$rating['users'] ['name']}}</a>
                                                                                <span class="comment-date">{{date("d-m-Y H:i:s", strtotime($rating ['created_at']))}}</span>
                                                                            </h4>
                                                                            <div class="ratings-container comment-rating">
                                                                                <?php
                                                                                $count = 1;
                                                                                while ($count <= $rating['rating']){ ?>
                                                                                <span style="color: orange; font-size: large "><strong>&#9733;</strong></span>
                                                                                <?php $count++; } ?>

                                                                            </div>
                                                                            <p>{{$rating['review']}}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        @if($rating->rating_image)
                                                                            <div class="profile-ud wider">
                                                                                @php($images = json_decode($rating->rating_image))
                                                                                @foreach($images as $eachimage)
                                                                                    <img src="{{asset('images/rating/images/'.$eachimage)}}" class="img-fluid " alt="" style="height: 80px; width: 80px;"
                                                                                         data-zoom-image="{{asset('images/rating/images/'.$eachimage)}}" width="400" height="400">
                                                                                @endforeach
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @endforeach
                                                    <hr>
                                                @else
                                                    <br>
                                                    <h4 class="alert-title text-center text-danger">
                                                        <i class="w-icon-exclamation-triangle"></i> Reviews are not available for this product!</h4>
                                                @endif
                                            </div>
                                            <a href="#" rel="modal:close">Close</a>
                                        </div>

                                        <!-- Link to open the modal -->
                                        <div class="text-center">
                                            <a href="#ex1"  class="btn btn-small btn-success btn-outline btn-ellipse"  rel="modal:open">All Reviews</a>
                                        </div>
                                        <br>
                                        <div class="tab-content">
                                            @if(count($ratings)>0)
                                                @foreach($ratings as $rating)
                                                    <div class="tab-pane active" id="show-all">
                                                        <ul class="comments list-style-none">
                                                            <li class="comment">
                                                                <div class="comment-body">
                                                                    <div class="comment-content">
                                                                        <h4 class="comment-author">
                                                                            <a href="#">{{$rating['users'] ['name']}}</a>
                                                                            <span class="comment-date">{{date("d-m-Y H:i:s", strtotime($rating ['created_at']))}}</span>
                                                                        </h4>
                                                                        <div class="ratings-container comment-rating">
                                                                            <?php
                                                                            $count = 1;
                                                                            while ($count <= $rating['rating']){ ?>
                                                                            <span style="color: orange; font-size: large "><strong>&#9733;</strong></span>
                                                                            <?php $count++; } ?>

                                                                        </div>
                                                                        <p>{{$rating['review']}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="profile-ud-item">
                                                                    <div class="profile-ud wider">
                                                                        @if($rating->rating_image)
                                                                            @php($images = json_decode($rating->rating_image))
                                                                            @foreach($images as $eachimage)

                                                                                <img src="{{asset('images/rating/images/'.$eachimage)}}" class="img-fluid " alt="" style="height: 100px; width: 100px;"
                                                                                     data-zoom-image="{{asset('images/rating/images/'.$eachimage)}}" width="400" height="400">

                                                                            @endforeach
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endforeach
                                                <hr>
                                            @else
                                                <h4 class="alert-title text-center text-danger">
                                                    <i class="w-icon-exclamation-triangle"></i> Reviews are not available for this product!</h4>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="vendor-product-section">
                            <div class="title-link-wrapper mb-4">
                                <h4 class="title text-left">More Products From This Vendor</h4>
                                <a href="{{route('single.brand',encrypt($brandImage->id))}}" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
                                    Products<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                            @if(count($brand_products) >0 )
                                <div class="swiper-container swiper-theme" data-swiper-options="{
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
                                            'slidesPerView': 3
                                        }
                                    }
                                }">
                                    <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                                        @foreach($brand_products as $brand_product)
                                            <div class="swiper-slide product">
                                                <figure class="product-media">
                                                    <a href="{{route('product.details',encrypt($brand_product->id))}}">
                                                        <img src="{{asset('images/products/'.$brand_product->product_thumbnail_image)}}" alt="Product"
                                                             width="300" height="338" />
                                                        <img src="{{asset('images/products/'.$brand_product->product_thumbnail_image)}}" alt="Product"
                                                             width="300" height="338" />
                                                    </a>
                                                    <div class="product-action-horizontal">
                                                        <input type="hidden" value="{{$brand_product->id}}" name="pro_id">
                                                        <input type="hidden" value="{{$brand_product->brand_id}}" name="brand_id">
                                                        <input type="hidden" value="{{$brand_product->category_id}}" name="category_id">
                                                        <input type="hidden" value="{{$brand_product->product_name}}" name="pro_name">
                                                        <input type="hidden" value="{{$brand_product->product_code}}" name="pro_code">
                                                        <input type="hidden" id="price" value="{{$brand_product->product_regular_price}}" name="pro_price">
                                                            <?php $attributes = \App\Model\Attributes::where('product_id',$brand_product->id)->count(); ?>
                                                        @if($attributes > 0 )
                                                            <a href="{{route('product.details',encrypt($brand_product->id))}}" class="btn-product-icon w-icon-hamburger " title="Add to cart">
                                                            </a>
                                                        @elseif($brand_product->product_quantity < 1)
                                                            <a href="{{route('product.details',encrypt($brand_product->id))}}" class="btn-product-icon w-icon-hamburger " title="Add to cart">
                                                            </a>
                                                        @else
                                                            @php($countCartItem = 0 )
                                                            @php($countCartItem = \App\Model\Cart::where(['pro_id' => $brand_product->id, 'session_id' => \Illuminate\Support\Facades\Session::get('session_id') ])->count())
                                                            <button type="button" class="btn-product-icon btn-cart @if($countCartItem > 0)  w-icon-cart @else w-icon-cart @endif updateCart" title="Add to cart"
                                                                    data-cart_pro_id="{{$brand_product->id}}"
                                                                    @if($brand_product->product_discount_price) data-productprice="{{$brand_product->product_discount_price}}" @else data-productprice="{{$brand_product->product_regular_price}}" @endif
                                                                    data-category_id="{{$brand_product->category_id}}"
                                                                    data-brand_id="{{$brand_product->brand_id}}"
                                                                    data-product_name="{{$brand_product->product_name}}"
                                                                    data-product_code="{{$brand_product->product_code}}">
                                                            </button>
                                                        @endif
                                                        @php($countWishlist = 0 )
                                                        @if(\Illuminate\Support\Facades\Auth::check())
                                                            @php($countWishlist = \App\Model\Wishlist::where(['user_id' => auth()->user()->id, 'w_product_id' => $brand_product->id ])->count())
                                                            <button type="button" class="updateWishlist btn-product-icon btn-sm" data-pro_id="{{$brand_product->id}}"> <i class=" @if($countWishlist > 0) w-icon-heart-full @else w-icon-heart @endif ">
                                                                </i></button>
                                                        @else
                                                            <a  class="btn-product-icon btn-sm w-icon-heart userLogin"><span></span></a>
                                                        @endif

                                                        @php($countComparelist = 0 )
                                                        @php($countComparelist = \App\Model\Compare::where(['product_id' => $brand_product->id, 'session_id' => \Illuminate\Support\Facades\Session::get('session_id') ])->count())
                                                        <button type="button" class="btn-product-icon btn-md btn-icon-left updateCompare" data-product_id="{{$brand_product->id}}"><i class="@if($countComparelist > 0)  w-icon-check-solid @else w-icon-compare @endif"></i></button>
                                                    </div>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="product-cat">
                                                        <a href="{{route('product.details',encrypt($brand_product->id))}}">{{$brand_product->category_name}}</a>
                                                    </div>
                                                    <h3 class="product-name">
                                                        <a href="{{route('product.details',encrypt($brand_product->id))}}">{{$brand_product->product_name}}</a>
                                                    </h3>
                                                    <div class="ratings-container">
                                                        @if(App\Model\Rating::where('rating_approval','=', 'Approved')
                                                                        ->where('product_id',$brand_product->id)->sum('rating'))
                                                                <?php
                                                                $relatedRatingSum = App\Model\Rating::where('rating_approval','=', 'Approved')
                                                                    ->where('product_id',$brand_product->id)->sum('rating');
                                                                $relatedRatingCount = App\Model\Rating::where('rating_approval','=', 'Approved')
                                                                    ->where('product_id',$brand_product->id)->count();

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

                                                                <a href="product-default.html" class="rating-reviews">({{$relatedRatingCount}} reviews)</a>
                                                            </div>
                                                        @else
                                                            <span href="#" class="rating-reviews">No Review</span>
                                                        @endif
                                                    </div>
                                                    <div class="product-price">
                                                        @if($brand_product->product_discount_price == null)
                                                            <ins class="new-price">£ {{ number_format($brand_product->product_regular_price) }}</ins>
                                                        @else
                                                            <ins class="new-price">£ {{ number_format($brand_product->product_discount_price )}}</ins>
                                                            <del class="old-price">£ {{number_format($brand_product->product_regular_price)}}</del>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            @else
                                <h4 class="alert-title text-center text-danger">
                                    <i class="w-icon-exclamation-triangle"></i> No Product From This vendor!</h4>
                            @endif
                        </section>
                        <section class="related-product-section">
                            <div class="title-link-wrapper mb-4">
                                <h4 class="title">Related Products</h4>
                                <a href="{{route('category.product',encrypt($related_productsId->id))}}" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
                                    Products<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                            @if(count($related_products) > 0 )
                                <div class="swiper-container swiper-theme" data-swiper-options="{
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
                                            'slidesPerView': 3
                                        }
                                    }
                                }">
                                    <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                                        @foreach($related_products as $related_product)
                                            <div class="swiper-slide product">
                                                <figure class="product-media">
                                                    <a href="{{route('product.details',encrypt($related_product->id))}}">
                                                        <img src="{{asset('images/products/'.$related_product->product_thumbnail_image)}}" alt="Product"
                                                             width="300" height="338" />
                                                    </a>
                                                    <div class="product-action-horizontal">
                                                        <input type="hidden" value="{{$related_product->id}}" name="pro_id">
                                                        <input type="hidden" value="{{$related_product->brand_id}}" name="brand_id">
                                                        <input type="hidden" value="{{$related_product->category_id}}" name="category_id">
                                                        <input type="hidden" value="{{$related_product->product_name}}" name="pro_name">
                                                        <input type="hidden" value="{{$related_product->product_code}}" name="pro_code">
                                                        <input type="hidden" id="price" value="{{$related_product->product_regular_price}}" name="pro_price">
                                                            <?php $attributes = \App\Model\Attributes::where('product_id',$related_product->id)->count(); ?>
                                                        @if($attributes > 0 )
                                                            <a href="{{route('product.details',encrypt($related_product->id))}}" class="btn-product-icon w-icon-hamburger " title="Add to cart">
                                                            </a>
                                                        @elseif($related_product->product_quantity < 1)
                                                            <a href="{{route('product.details',encrypt($related_product->id))}}" class="btn-product-icon w-icon-hamburger " title="Add to cart">
                                                            </a>
                                                        @else
                                                            @php($countCartItem = 0 )
                                                            @php($countCartItem = \App\Model\Cart::where(['pro_id' => $related_product->id, 'session_id' => \Illuminate\Support\Facades\Session::get('session_id') ])->count())
                                                            <button type="button" class="btn-product-icon btn-cart @if($countCartItem > 0)  w-icon-cart @else w-icon-cart @endif updateCart" title="Add to cart"
                                                                    data-cart_pro_id="{{$related_product->id}}"
                                                                    @if($related_product->product_discount_price) data-productprice="{{$related_product->product_discount_price}}" @else data-productprice="{{$related_product->product_regular_price}}" @endif
                                                                    data-category_id="{{$related_product->category_id}}"
                                                                    data-brand_id="{{$related_product->brand_id}}"
                                                                    data-product_name="{{$related_product->product_name}}"
                                                                    data-product_code="{{$related_product->product_code}}">
                                                            </button>
                                                        @endif
                                                        @php($countWishlist = 0 )
                                                        @if(\Illuminate\Support\Facades\Auth::check())
                                                            @php($countWishlist = \App\Model\Wishlist::where(['user_id' => auth()->user()->id, 'w_product_id' => $related_product->id ])->count())
                                                            <button type="button" class="updateWishlist btn-product-icon btn-sm" data-pro_id="{{$related_product->id}}"> <i class=" @if($countWishlist > 0) w-icon-heart-full @else w-icon-heart @endif ">
                                                                </i></button>
                                                        @else
                                                            <a  class="btn-product-icon btn-sm w-icon-heart userLogin"><span></span></a>
                                                        @endif

                                                        @php($countComparelist = 0 )
                                                        @php($countComparelist = \App\Model\Compare::where(['product_id' => $related_product->id, 'session_id' => \Illuminate\Support\Facades\Session::get('session_id') ])->count())
                                                        <button type="button" class="btn-product-icon btn-md btn-icon-left updateCompare" data-product_id="{{$related_product->id}}"><i class="@if($countComparelist > 0)  w-icon-check-solid @else w-icon-compare @endif"></i></button>
                                                    </div>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="product-cat">
                                                        <a href="{{route('product.details',encrypt($related_product->id))}}">{{$related_product->category_name}}</a>
                                                    </div>
                                                    <h3 class="product-name">
                                                        <a href="{{route('product.details',encrypt($related_product->id))}}">{{$related_product->product_name}}</a>
                                                    </h3>
                                                    <div class="ratings-container">
                                                        @if(App\Model\Rating::where('rating_approval','=', 'Approved')
                                                                        ->where('product_id',$related_product->id)->sum('rating'))
                                                                <?php
                                                                $relatedRatingSum = App\Model\Rating::where('rating_approval','=', 'Approved')
                                                                    ->where('product_id',$related_product->id)->sum('rating');
                                                                $relatedRatingCount = App\Model\Rating::where('rating_approval','=', 'Approved')
                                                                    ->where('product_id',$related_product->id)->count();

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

                                                                <a href="product-default.html" class="rating-reviews">({{$relatedRatingCount}} reviews)</a>
                                                            </div>
                                                        @else
                                                            <span href="#" class="rating-reviews">No Review</span>
                                                        @endif
                                                    </div>
                                                    <div class="product-price">
                                                        @if($related_product->product_discount_price == null)
                                                            <ins class="new-price">£ {{ number_format($related_product->product_regular_price) }}</ins>
                                                        @else
                                                            <ins class="new-price">£ {{ number_format($related_product->product_discount_price )}}</ins>
                                                            <del class="old-price">£ {{number_format($related_product->product_regular_price)}}</del>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <h4 class="alert-title text-center text-danger">
                                    <i class="w-icon-exclamation-triangle"></i> No Product From This vendor!</h4>
                            @endif
                        </section>
                    </div>
                    <!-- End of Main Content -->
                    <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                        <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                        <div class="sidebar-content scrollable">
                            <div class="sticky-sidebar">
                                <div class="widget widget-icon-box mb-6">
                                    <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-truck"></i>
                                            </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Free Shipping & Returns</h4>
                                            <p>For all orders over $99</p>
                                        </div>
                                    </div>
                                    <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-bag"></i>
                                            </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Secure Payment</h4>
                                            <p>We ensure secure payment</p>
                                        </div>
                                    </div>
                                    <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-money"></i>
                                            </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Money Back Guarantee</h4>
                                            <p>Any back within 30 days</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Widget Icon Box -->

                                <div class="widget widget-banner mb-9">
                                    @foreach($marketing_banners as $marketing_banner)
                                        <div class="banner banner-fixed br-sm">
                                            <figure>
                                                <img src="{{asset($marketing_banner->banner_image)}}" alt="Banner" width="266"
                                                     height="220" style="background-color: white;" />
                                            </figure>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- End of Widget Banner -->
                                <!-- End of Widget Banner -->

                                <div class="widget widget-products">
                                    <div class="title-link-wrapper mb-2">
                                        <h4 class="title title-link font-weight-bold">Feature Products</h4>
                                    </div>

                                    @if(count($featured_products) > 0 )
                                        <div class="swiper nav-top">
                                            <div class="swiper-container swiper-theme nav-top" data-swiper-options = "{
                                                'slidesPerView': 1,
                                                'spaceBetween': 20,
                                                'navigation': {
                                                    'prevEl': '.swiper-button-prev',
                                                    'nextEl': '.swiper-button-next'
                                                }
                                            }">
                                                <div class="swiper-wrapper">
                                                    @foreach($featured_products as $eachProduct)
                                                        <div class="widget-col swiper-slide">
                                                            <div class="product product-widget">
                                                                <figure class="product-media">
                                                                    <a href="{{route('product.details',encrypt($eachProduct->id))}}">
                                                                        <img src="{{asset('images/products/'.$eachProduct->product_thumbnail_image)}}" alt="Product"
                                                                             width="100" height="113" />
                                                                    </a>
                                                                </figure>
                                                                <div class="product-details">
                                                                    <h4 class="product-name">
                                                                        <a href="{{route('product.details',encrypt($eachProduct->id))}}">{{$eachProduct->product_name}}</a>
                                                                    </h4>
                                                                    @if(App\Model\Rating::where('rating_approval','=', 'Approved')
                                                                        ->where('product_id',$eachProduct->id)->sum('rating'))
                                                                            <?php
                                                                            $relatedRatingSum = App\Model\Rating::where('rating_approval','=', 'Approved')
                                                                                ->where('product_id',$eachProduct->id)->sum('rating');
                                                                            $relatedRatingCount = App\Model\Rating::where('rating_approval','=', 'Approved')
                                                                                ->where('product_id',$eachProduct->id)->count();

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

                                                                            <a href="{{route('product.details',encrypt($eachProduct->id))}}" class="rating-reviews">({{$relatedRatingCount}} reviews)</a>
                                                                        </div>
                                                                    @else
                                                                        <span href="#" class="rating-reviews">No Review</span>
                                                                    @endif
                                                                    <div class="product-pa-wrapper">
                                                                        <div class="product-price">
                                                                            @if($eachProduct->product_discount_price == null)
                                                                                <ins class="new-price">£ {{number_format($eachProduct->product_regular_price)}}</ins>
                                                                            @else
                                                                                <ins class="new-price">£ {{number_format($eachProduct->product_discount_price)}}</ins>
                                                                                <del class="old-price">£ {{number_format($eachProduct->product_regular_price)}}</del>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <button class="swiper-button-next"></button>
                                                <button class="swiper-button-prev"></button>
                                            </div>
                                        </div>
                                    @else
                                        <h4 class="alert-title text-center text-danger">
                                            <i class="w-icon-exclamation-triangle"></i> No Feature Product</h4>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </aside>
                    <!-- End of Sidebar -->
                </div>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->

    {{--    <script>--}}
    {{--        //Replace main image with Alternate image--}}
    {{--        $(document).ready(function () {--}}
    {{--            $("#changeImage").click(function () {--}}
    {{--                var image = $(this).attr('src');--}}
    {{--                $("#mainImage").attr('src',image);--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}


@endsection

