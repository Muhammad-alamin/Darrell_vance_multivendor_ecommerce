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
                <div>
                    <img src="{{asset('front/assets/images/banner.png')}}" style="width: 1240px">
                </div>
                <br>
                <!-- End of Shop Banner -->

                <!-- Start of Shop Content -->
                <div class="shop-content row gutter-lg mb-10 ">
                    <!-- Start of Sidebar, Shop Sidebar -->
                    <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed ">
                        <!-- Start of Sidebar Overlay -->
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                        <!-- Start of Sidebar Content -->
                        <div class="sidebar-content scrollable">
                            <!-- Start of Sticky Sidebar -->
                            <div class="sticky-sidebar">
                                <div class="filter-actions">
                                    <label>Filter :</label>
                                    <a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
                                </div>
                                <!-- Start of Collapsible widget -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><label>All Categories</label></h3>
                                    <ul class="widget-body filter-items search-ul" style="height: 300px; overflow-y: scroll;">
                                        @foreach($categories as $category)
                                            <li>
                                                <a href="{{route('category.product', encrypt($category->id))}}">
                                                    {{$category->category_name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- End of Collapsible Widget -->

                                <!-- Start of Collapsible Widget -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><label>Price</label></h3>
                                    <div class="widget-body">
                                        <form class="price-range" action="{{ route('front.shop') }}" method="GET">
                                            <input type="number" name="min_price" value="" class="min_price text-center" placeholder="Min">
                                            <span class="delimiter">-</span>
                                            <input type="number" name="max_price" value="" class="max_price text-center" placeholder="Max">
                                            <button type="submit" class="btn btn-primary btn-rounded">Go</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- End of Collapsible Widget -->

                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><label>All Services</label></h3>
                                    <ul class="widget-body filter-items search-ul" style="height: 300px; overflow-y: scroll;">
                                        @foreach($services as $category)
                                            <li>
                                                <a href="{{route('category.product', encrypt($category->id))}}">
                                                    {{$category->category_name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <!-- Start of Collapsible Widget -->
                                {{-- <form action="{{route('front.shop')}}" method="GET" enctype="multipart/form-data">
                                    <div class="widget widget-collapsible ">
                                        <h3 class="widget-title"><span>Brand</span></h3>
                                        <div class="widget-body">
                                            <span>Filter: </span>
                                            <button type="submit" class="btn btn-sm btn-primary" style="margin-left: 70px"> Filter </button>
                                        </div>
                                        <ul class="widget-body myclass font-size-lg" style="height: 300px; overflow-y: scroll;">
                                            @foreach($brand as $eachbrand)
                                                @php
                                                    $checked = [];
                                                    if (isset($_GET['brandFilter']))
                                                    {
                                                        $checked = $_GET['brandFilter'];
                                                    }
                                                @endphp
                                            <li style="margin-top: 10px;"><input type="checkbox" name="brandFilter[]" value="{{$eachbrand->id}}" @if(in_array($eachbrand->id,$checked)) checked @endif">
                                                <span style="font-size: 17px;">{{$eachbrand->brand_name}}</span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </form> --}}
                                <!-- End of Collapsible Widget -->

                            </div>
                            <!-- End of Sidebar Content -->
                        </div>
                        <!-- End of Sidebar Content -->
                    </aside>
                    <!-- End of Shop Sidebar -->

                    <!-- Start of Shop Main Content -->
                    <div class="main-content">
                        <nav class="toolbox sticky-toolbox sticky-content fix-top">
                            <div class="toolbox-left">
                                <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle
                                        btn-icon-left d-block d-lg-none"><i
                                        class="w-icon-category"></i><span>Filters</span>
                                </a>
                                <div class="toolbox-item toolbox-sort text-dark"></div>
                            </div>
                            <div class="toolbox-right" style="margin-bottom: 20px">
{{--                                <div class="">--}}
{{--                                    <label>Sort By :</label>--}}
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
{{--                                    <span class="font-weight-bold " style="color: black !important; font-size: 15px; padding: 10px;">--}}
{{--                                        <a href="{{route('front.shop')}}" style="padding: 10px;color: black !important;font-size: 15px;">All</a>--}}
{{--                                        <a href="{{ route('front.shop')."?sort=price_asc"}}" style="padding: 10px;color: black !important;font-size: 15px;">price: low to high</a>--}}
{{--                                        <a href="{{route('front.shop')."?sort=price_desc"}}" style="padding: 10px;color: black !important;font-size: 15px;">price: high to low</a>--}}
{{--                                        <a href="{{route('front.shop')."?sort=latest"}}" style="padding: 10px;color: black !important;font-size: 15px;">Latest</a>--}}
{{--                                        <a href="" style="padding: 10px;color: black !important;font-size: 15px;">Popularity</a>--}}
{{--                                    </span>--}}
{{--                                </div>--}}
                            </div>
                        </nav>
                        <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
                            @foreach($products as $eachProduct)
                                <div class="product-wrap">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="{{route('product.details',encrypt($eachProduct->id))}}">
                                                <img src="{{asset('images/products/'.$eachProduct->product_thumbnail_image)}}" alt="Product" width="300"
                                                     height="338" />
                                            </a>
                                            <div class="product-action-horizontal">
                                                <input type="hidden" value="{{$eachProduct->id}}" name="pro_id">
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
                                                    @php($countWishlist = \App\Model\Wishlist::where(['user_id' => auth()->user()->id, 'w_product_id' => $eachProduct->id ])->count())
                                                    <button type="button" class="updateWishlist btn-product-icon btn-sm" data-pro_id="{{$eachProduct->id}}"> <i class=" @if($countWishlist > 0) w-icon-heart-full @else w-icon-heart @endif ">
                                                        </i></button>
                                                @else
                                                    <a  class="btn-product-icon btn-sm w-icon-heart userLogin" title="Add to wishlist"><span></span></a>
                                                @endif

                                                @php($countComparelist = 0 )
                                                @php($countComparelist = \App\Model\Compare::where(['product_id' => $eachProduct->id, 'session_id' => \Illuminate\Support\Facades\Session::get('session_id') ])->count())
                                                <button type="button" class="btn-product-icon btn-md btn-icon-left updateCompare" data-product_id="{{$eachProduct->id}}" title="Add to compare list"><i class="@if($countComparelist > 0)  w-icon-check-solid @else w-icon-compare @endif"></i></button>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <div class="product-cat">
                                                <a href="{{route('product.details',encrypt($eachProduct->id))}}">{{$eachProduct->category_name}}</a>
                                            </div>
                                            <h3 class="product-name">
                                                <a href="{{route('product.details',encrypt($eachProduct->id))}}">{{$eachProduct->product_name}}</a>
                                            </h3>
                                            <div class="ratings-container">
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

                                                        <a href="product-default.html" class="rating-reviews">({{$relatedRatingCount}} reviews)</a>
                                                    </div>
                                                @else
                                                    <span href="#" class="rating-reviews">No Review</span>
                                                @endif
                                            </div>
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
                                </div>
                            @endforeach
                        </div>
                        @if(isset($_GET['sort']) && !empty($_GET['sort']))
                            <span>{{ $products->appends(["sort"=>$_GET['sort']])->links('front.pagination.custom')}}</span>
                        @else
                            <span>{{ $products->links('front.pagination.custom')}}</span>
                        @endif
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
