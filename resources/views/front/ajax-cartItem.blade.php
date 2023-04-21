<div class="container">
    @if(count($carts) > 0)
        <div class="row gutter-lg mb-10">
            <div class="col-lg-8 pr-lg-4 mb-6">
                <table class="shop-table cart-table">
                    <thead>
                    <tr>
                        <th class="product-name"><span>Product</span></th>
                        <th></th>
                        <th class="product-price"style="padding-left: 0px;"><span>Price</span></th>
                        <th class="product-quantity"><span>Quantity</span></th>
                        <th class="product-subtotal"><span>Total</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $total_amount = 0; ?>
                    @foreach($carts as $cart)
                        <tr>
                            <td class="product-thumbnail">
                                <div class="p-relative">
                                    <a href="{{route('product.details',encrypt($cart->pro_id))}}">
                                        <figure>
                                            <img src="{{asset('images/products/'.$cart->image)}}" alt="product"
                                                 width="200" height="70">
                                        </figure>
                                    </a>
                                </div>
                            </td>
                            <td class="product-name">
                                <a href="{{route('product.details',encrypt($cart->pro_id))}}">
                                    {{$cart->pro_name}}
                                </a>
                            @if(isset($cart->pro_size))
                                    <span>
                                        [{{$cart->pro_size}}]
                                    </span>
                                @endif
                                @if(isset($cart->pro_colour))
                                    <span>
                                       [{{$cart->pro_colour}}]
                                    </span>
                                @endif
                            </td>
                            <td class="product-price" style="padding-left: 40px"><span class="amount  mobile-view">৳ {{number_format($cart->pro_price)}}</span></td>
                            @php $attr_stock = \App\Model\Attributes::where('product_id',$cart->pro_id)->orWhere('attributes_size' ,$cart->pro_size)->first() @endphp
                            {{--                                    <td class="product-quantity">--}}
                            {{--                                        <div class="input-group">--}}
                            {{--                                            <a href="{{url('/update/quantity/decrement/'.$cart->id.'/-1')}}" class="btn btn-sm quantity-minus w-icon-minus" style="border-left-width: 1px;--}}
                            {{--                                            padding-left: 15.2;--}}
                            {{--                                            margin-left: 0px;--}}
                            {{--                                            margin-bottom: 6px;--}}
                            {{--                                            border-right-width: 1px;"></a>--}}

                            {{--                                            <input type="number" step="1" min="1" max="10" value="{{$cart->pro_quantity}}" name="quantity" class="quantity-field" style="left: 0px;--}}
                            {{--                                            border-left-width: 0px;--}}
                            {{--                                            margin-right: 1px;">--}}
                            {{--                                                                                        @if($attrStock['attributes_stock'] > $cart->pro_quantity )--}}
                            {{--                                                                                            <a href="{{url('/update/quantity/'.$cart->id.'/1')}}"  class="btn btn-sm quantity-plus w-icon-plus" style="border-left-width: 1px;--}}
                            {{--                                                                                                padding-left: 15.2;--}}
                            {{--                                                                                                margin-left: 0px;--}}
                            {{--                                                                                                margin-bottom: 6px;--}}
                            {{--                                                                                                border-right-width: 1px;">--}}

                            {{--                                                                                            </a>--}}
                            {{--                                                                                        @elseif($cart->product_quantity > $cart->pro_quantity)--}}
                            {{--                                                                                        <a href="{{url('/update/quantity/'.$cart->id.'/1')}}"  class="btn btn-sm quantity-plus w-icon-plus" style="border-left-width: 1px;--}}
                            {{--                                                                                                padding-left: 15.2;--}}
                            {{--                                                                                                margin-left: 0px;--}}
                            {{--                                                                                                margin-bottom: 6px;--}}
                            {{--                                                                                                border-right-width: 1px;">--}}

                            {{--                                            </a>--}}
                            {{--                                                                                        @else--}}
                            {{--                                            <a href="{{url('/update/quantity/increment/'.$cart->id.'/1')}}"  class="btn btn-sm quantity-plus w-icon-plus" style="border-left-width: 1px;--}}
                            {{--                                                    padding-left: 15.2;--}}
                            {{--                                                    margin-left: 0px;--}}
                            {{--                                                    margin-bottom: 6px;--}}
                            {{--                                                    border-right-width: 1px;">--}}
                            {{--                                            </a>--}}
                            {{--                                                                                        @endif--}}
                            {{--                                        </div>--}}
                            {{--                                    </td>--}}
                            <td class="product-quantity" style="padding-left: 20px">
                                <div class="input-group">
                                    <input class=" form-control" type="number" value="{{$cart->pro_quantity}}">
                                    <button class="quantity-plus w-icon-plus qtyPlus btnItemUpdate"  data-cartId="{{$cart->id}}"></button>
                                    <button class="quantity-minus w-icon-minus qtyMinus btnItemUpdate" data-cartId="{{$cart->id}}"></button>
                                </div>
                            </td>
                            <td class="product-subtotal">
                                <span class="amount" style="padding-left: 40px">৳ {{number_format($cart->pro_price*$cart->pro_quantity)}} </span>
                            </td>
                            <td>
                                <button  type="submit" class="remove-item-cart" data-cart_id="{{$cart->id}}"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <?php $total_amount = $total_amount + ($cart->pro_price*$cart->pro_quantity); ?>
                    @endforeach
                    </tbody>
                </table>
                <div class="cart-action mb-6">
                    <a href="{{route('front.shop')}}" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                    <form action="{{route('deleteAll.cartItem')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-rounded btn-default btn-clear" name="clear_cart" value="Clear Cart">Clear Cart</button>
                    </form>
                </div>

{{--                <form class="coupon" id="applyCoupon" action="" method="post" @if(\Illuminate\Support\Facades\Auth::check()) user="1" @endif>--}}
{{--                    @csrf--}}
{{--                    <h5 class="title coupon-title font-weight-bold text-uppercase">Coupon Discount</h5>--}}
{{--                    <input type="text" class="form-control mb-4" id="coupon_code" placeholder="Enter coupon code here..." name="coupon_code" required />--}}
{{--                    <button class="btn btn-dark btn-outline btn-rounded" type="submit">Apply Coupon</button>--}}
{{--                </form>--}}
                <form class="coupon"  action="{{route('cart.applyCoupon.php')}}" method="post">
                    @csrf
                    <h5 class="title coupon-title font-weight-bold text-uppercase">Coupon Discount</h5>
                    <input type="text" class="form-control mb-4" id="coupon_code" placeholder="Enter coupon code here..." name="coupon_code" required />
                    <button class="btn btn-dark btn-outline btn-rounded" type="submit">Apply Coupon</button>
                </form>
            </div>
            <div class="col-lg-4 sticky-sidebar-wrapper">
                @if(!empty(Session::get('CouponAmount')))
                    <div class="sticky-sidebar">
                        <div class="cart-summary mb-4">
                            <form action="{{route('checkout')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h3 class="cart-title text-uppercase">Cart Totals</h3>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">Subtotal</label>
                                    <span>৳ <?php echo number_format($total_amount); ?> </span>
                                </div>
                                <br>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">Cupon Discount</label>
                                    <span><?php echo Session::get('CouponAmount'); ?> </span>
                                </div>

                                <hr class="divider mb-6">
                                <div class="order-total d-flex justify-content-between align-items-center">
                                    <label>Total</label>
                                    <span class="ls-50">৳ <?php echo number_format($total_amount - Session::get('CouponAmount')); ?></span>
                                </div>
                                <button type="submit"
                                        class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                    Proceed to checkout<i class="w-icon-long-arrow-right"></i>
                                </button>
                            </form>
                            @else
                                <form action="{{route('checkout')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <h3 class="cart-title text-uppercase">Cart Totals</h3>
                                    <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                        <label class="ls-25">Subtotal</label>
                                        <span>৳ <?php echo number_format($total_amount); ?></span>
                                    </div>

                                    <hr class="divider mb-6">
                                    <div class="order-total d-flex justify-content-between align-items-center">
                                        <label>Total</label>
                                        <span class="ls-50" id="addDelCharge">৳ <?php echo number_format($total_amount); ?></span>
                                    </div>
                                    @if(\Illuminate\Support\Facades\Auth::check())
                                        <button type="submit"
                                                class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                            Proceed to checkout<i class="w-icon-long-arrow-right"></i>
                                        </button>
                                    @else
                                        <a href="#ex1" rel="modal:open" class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                            Proceed to checkout<i class="w-icon-long-arrow-right"></i>
                                        </a>
                                    @endif
                                </form>
                            @endif
                        </div>
                    </div>
            </div>
        </div>
    @else
        <div class="text-center" style="text-align: center; justify-items: center">

            <h4 class="text-danger text-center font-size-lg"><i class="w-icon-cart font-weight-bold"></i> Your Cart is empty</h4>
            <br>
            <a class="button text-center btn btn-rounded btn-dark" href="{{route('front.shop')}}">Continue Shopping</a>
        </div>
    @endif
    <br>
</div>
