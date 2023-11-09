@extends('front.layouts.master')
@section('content')

    <!-- Start of Main -->
    <main class="main wishlist-page">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Wishlist</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav mb-10">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{route('Home')}}">Home</a></li>
                    <li>Wishlist</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->
        @if(session('success'))
            <div class="alert alert-danger">
                {{session()->get('success')}}
            </div>
        @endif

            <!-- Start of PageContent -->
            <div class="page-content">
                <div class="container">
                    <h3 class="wishlist-title">My wishlist</h3>
                    <table class="shop-table wishlist-table">
                        <thead>
                        <tr>
                            <th class="product-name"><span>Product</span></th>
                            <th></th>
                            <th class="product-price" style="padding-right: 148px"><span>Price</span></th>
                            <th class="product-stock-status" style="padding-right: 148px"><span>Stock Status</span></th>
                            <th class="wishlist-action" style="padding-right: 50px">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($wishlist as $eachWishlist)
                        <tr>
                            <td class="product-thumbnail">
                                <div class="p-relative">
                                    <a href="product-default.html">
                                        <figure>
                                            <img src="{{asset('images/products/'.$eachWishlist->product->product_thumbnail_image)}}" alt="product" width="600"
                                                 height="338" style="height: 100px">
                                        </figure>
                                    </a>
                                </div>
                            </td>
                            <td class="product-name">
                                <a href="product-default.html">
                                    {{$eachWishlist->product->product_name}}
                                </a>
                            </td>
                            <td class="product-price" style="font-size: 18px;">
                                @if($eachWishlist->product->product_discount_price == null)
                                    <ins class="new-price">£ {{ number_format($eachWishlist->product->product_regular_price) }}</ins>
                                @else
                                    <ins class="new-price">£ {{ number_format($eachWishlist->product->product_discount_price )}}</ins>
                                    <del class="old-price">£ {{number_format($eachWishlist->product->product_regular_price)}}</del>
                                @endif
                            </td>
                            <td class="product-stock-status">
                                @php($attrPro = \App\Model\Attributes::where('product_id',$eachWishlist->product->id)->count())
                                @if($eachWishlist->product->product_quantity > 0)
                                    <label class="product-label label-discount" style="background-color: green">Stock in</label>
                                @elseif($attrPro > 0)
                                    <label class="product-label label-discount" style="background-color: rebeccapurple">Variant Product</label>
                                @else
                                    <label class="product-label label-discount"  style="background-color: red">Stock out</label>
                                @endif
                            </td>
                            <td class="wishlist-action">
                                <div class="d-lg-flex">
                                    <a href="{{route('product.details',$eachWishlist->product->id)}}"
                                       class="btn btn-quickview btn-outline btn-default btn-rounded btn-sm mb-2 mb-lg-0">View Details</a>
                                    <form action="{{route('delete.wishlist.product',$eachWishlist->id)}}" onclick="return confirm('Are You Confirm to Delete?')" method="post" enctype="multipart/form-data">
                                        @csrf
                                    <button type="submit" class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart">Remove</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="social-links">
                        <label>Share On:</label>
                        <div class="social-icons social-no-color border-thin">
                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                            <a href="#" class="social-icon social-email far fa-envelope"></a>
                            <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of PageContent -->
    </main>
    <!-- End of Main -->

@endsection
