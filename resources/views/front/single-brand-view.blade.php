@extends('front.layouts.master')
@section('content')

    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb bb-no">
                    <li><a href="{{route('Home')}}">Home</a></li>
                    <li><a href="{{route('all.brands')}}">Brand</a></li>
                    <li><a href="javascript:void(0)">Product</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Pgae Contetn -->
        <div class="page-content mb-8">
            <div class="container">
                <div class="row gutter-lg">
                    <aside class="sidebar left-sidebar vendor-sidebar sticky-sidebar-wrapper sidebar-fixed">
                        <!-- Start of Sidebar Overlay -->
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                        <div class="sidebar-content">
                            <div class="sticky-sidebar">
                                <div class="widget widget-collapsible widget-wcmp-contact">
                                    <h3 class="widget-title"><span>Contact Vendor</span></h3>
                                    <form action="{{route('contact.vendor')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="widget-body">
                                            <input type="text" class="form-control" name="name" id="name"
                                                   placeholder="Name" />
                                            <input type="text" class="form-control" name="subject" id="subject"
                                                   placeholder="Subject" />
                                            <input type="text" class="form-control" name="email" id="email"
                                                   placeholder="Email" />
                                            <input type="text" class="form-control" name="phone" id="phone"
                                                   placeholder="Phone" />
                                            <textarea name="message" maxlength="1000" cols="25" rows="6"
                                                      placeholder="Message" class="form-control"
                                                      required="required"></textarea>
                                            <button type="submit" class="btn btn-dark btn-rounded">Submit</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Start of Collapsible Widget -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><label>Price</label></h3>
                                    <div class="widget-body">
                                        <form class="price-range" action="{{URL::current()}}" method="GET">
                                            <input type="number" name="min_price" value="" class="min_price text-center" placeholder="Min">
                                            <span class="delimiter">-</span>
                                            <input type="number" name="max_price" value="" class="max_price text-center" placeholder="Max">
                                            <button type="submit" class="btn btn-primary btn-rounded">Go</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- End of Collapsible Widget -->

                                <!-- End of Widget -->
                                <div class="widget widget-collapsible widget-products">
                                    <h3 class="widget-title"><span>Vendor On Sale Products</span></h3>
                                    <div class="widget-body">
                                        @foreach($data as $eachProduct)
                                        <div class="product product-widget">
                                            <figure class="product-media">
                                                <a href="{{route('product.details',encrypt($eachProduct->id))}}">
                                                    <img src="{{asset('images/products/'.$eachProduct->product_thumbnail_image)}}" alt="Product" width="100"
                                                         height="106" />
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name">
                                                    <a href="{{route('product.details',encrypt($eachProduct->id))}}">{{$eachProduct->product_name}}</a>
                                                </h4>
                                                <div class="product-price">
                                                    @if($eachProduct->product_discount_price == null)
                                                        <ins class="new-price">£ {{ number_format($eachProduct->product_regular_price) }}</ins>
                                                    @else
                                                        <ins class="new-price">£ {{ number_format($eachProduct->product_discount_price )}}</ins>
                                                        <del class="old-price">£ {{number_format($eachProduct->product_regular_price)}}</del>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- End of Widget -->
                            </div>
                        </div>
                    </aside>
                    <!-- End of Sidebar -->

                    <div class="main-content">

                        <div class="store store-wcmp-banner">
                            <figure class="store-media">
                                <img src="{{asset($brand->brand_thumbnail_image)}}" alt="Vendor" width="930" height="390"
                                     style="background-color: #ECE7E3;" />
                            </figure>
                            <div class="store-content">
                                <figure class="seller-brand bg-white">
                                    <img src="{{asset($brand->brand_image)}}" alt="Brand" width="100"
                                         height="100"  style="object-fit: contain"/>
                                </figure>
                                <h4 class="store-title">{{$brand->brand_name}}</h4>
                                <div class="seller-info-list">
                                    <div class="store-address">
                                        <i class="w-icon-map-marker"></i>
                                        {{$brand->brand_address}}
                                    </div>
                                    <div class="store-phone">
                                        <a href="tel:123456789">
                                            <i class="w-icon-phone"></i>
                                            {{$brand->brand_phone}}
                                        </a>
                                    </div>
                                </div>
                                <div class="social-icons social-icons-colored border-thin">
                                    <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                    <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                    <a href="#" class="social-icon social-linkedin fab fa-linkedin"></a>
                                    <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                                    <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                </div>
                            </div>
                        </div>
                        <!-- End of Store WCMP Banner -->

                        <div class="tab tab-nav-underline tab-nav-boxed type2 tab-vendor-products">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#tab-1" class="nav-link active">Products</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-1">
                                    <nav class="toolbox sticky-toolbox sticky-content fix-top">
                                        <div class="toolbox-left">
                                            <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle
                                        btn-icon-left d-block d-lg-none"><i
                                                    class="w-icon-category"></i><span>Filters</span>
                                            </a>
                                            <div class="toolbox-item toolbox-sort text-dark"></div>
                                        </div>
                                        <div class="toolbox-right" style="margin-bottom: 20px">
                                            <form name="sortProducts" id="shortProducts">
                                                <div class="toolbox-item toolbox-sort select-box text-dark">
                                                    <label>Sort By :</label>
                                                    <select name="sort" id="sort" class="form-control">
                                                        <option value="default" selected="selected">All</option>
                                                        <option value="popularity" @if(isset($_GET['sort']) && $_GET['sort']== "popularity") selected="selected" @endif>Sort by popularity</option>
                                                        <option value="latest"@if(isset($_GET['sort']) && $_GET['sort']== "latest") selected="selected" @endif>Sort by latest</option>
                                                        <option value="price_asc"@if(isset($_GET['sort']) && $_GET['sort']== "price_asc") selected="selected" @endif>Sort by pric: low to high</option>
                                                        <option value="price_desc"@if(isset($_GET['sort']) && $_GET['sort']== "price_desc") selected="selected" @endif>Sort by price: high to low</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                    </nav>
                                    <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
                                        @foreach($products as $product)
                                        <div class="product-wrap ">
                                            <div class="carousel-box">
                                            <div class="product text-center">
                                                <figure class="product-media">
                                                    <a href="{{route('product.details',encrypt($product->id))}}">
                                                        <img src="{{asset('images/products/'.$product->product_thumbnail_image)}}" alt="Product"
                                                            style="width: 250px; height: 250px" />
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
                                        </div>
                                        @endforeach
                                            @if(isset($_GET['sort']) && !empty($_GET['sort']))
                                                <span>{{ $products->appends(["sort"=>$_GET['sort']])->links('front.pagination.custom')}}</span>
                                            @else
                                                <span>{{ $products->links('front.pagination.custom')}}</span>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Main Content -->
                </div>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->


@endsection
