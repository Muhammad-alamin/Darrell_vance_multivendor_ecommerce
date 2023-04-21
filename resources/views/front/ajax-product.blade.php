@foreach($products as $product)
    <div class="product-wrap">
        <div class="product text-center">
            <figure class="product-media">
                <a href="{{route('product.details',$product->id)}}">
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
                        <a href="{{route('product.details',$product->id)}}" class="btn-product-icon w-icon-hamburger " title="Add to cart">
                        </a>
                    @elseif($product->product_quantity < 1)
                        <a href="{{route('product.details',$product->id)}}" class="btn-product-icon w-icon-hamburger " title="Add to cart">
                        </a>
                    @else
                        <button type="button" class="btn-product-icon btn-cart w-icon-cart updateCart" title="Add to cart"
                                data-productid="{{$product->id}}"
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
                <h4 class="product-name"><a href="{{route('product.details',$product->id)}}">{{$product->product_name}}</a></h4>
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

                            <a href="{{route('product.details',$product->id)}}" class="rating-reviews">({{$relatedRatingCount}} reviews)</a>
                        </div>
                    @else
                        <span href="{{route('product.details',$product->id)}}" class="rating-reviews">No Review</span>
                    @endif
                </div>
                <div class="product-price">
                    @if($product->product_discount_price == null)
                        <ins class="new-price">৳ {{ number_format($product->product_regular_price) }}</ins>
                    @else
                        <ins class="new-price">৳ {{ number_format($product->product_discount_price )}}</ins>
                        <del class="old-price">৳ {{number_format($product->product_regular_price)}}</del>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endforeach
