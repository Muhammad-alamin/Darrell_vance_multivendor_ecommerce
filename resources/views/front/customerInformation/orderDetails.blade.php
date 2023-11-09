
@extends('front.layouts.master')
@section('content')

    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">My Account</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('Home') }}">Home</a></li>
                    <li>My account</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content pt-1">
            <div class="container">
                <div class="tab tab-vertical ">
                    <ul class="nav nav-tabs mb-6" >
                        <li class="link-item">
                            <a href="{{route('customer.dashboard',\Illuminate\Support\Facades\Crypt::encryptString(\Illuminate\Support\Facades\Auth::user()->id))}}" class="">Dashboard</a>
                        </li>
                        <li class="link-item">
                            <a href="{{route('customer.orders')}}" class="">Orders</a>
                        </li>
                        <li class="link-item">
                            <a class="" href="">Account details</a>
                        </li>
                        <li class="link-item">
                            <a class="" href="{{ URL('/chatify')}}" target="_blank">Chat Box</a>
                        </li>
                        <li class="link-item">
                            <a href="{{route('customer.address')}}">Address</a>
                        </li>
                        <li class="link-item">
                            <a href="{{route('wishlist')}}">Wishlist</a>
                        </li>
                        <li class="link-item">
                            <a class="" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <em class="icon ni ni-signout"></em><span>Log out</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>

                    <div class="tab-content mb-12">
                        <div class="row">
                            <div class="col-sm-6 mb-6">
                                <div class="ecommerce-address billing-address pr-lg-8">
                                    <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>
                                    @foreach($order->billingAdd as $billingAdd)
                                    <address class="mb-4">
                                        <table class="address-table">
                                            <tbody>
                                            <tr>
                                                <td>Name:</td>
                                                <td>{{$billingAdd->name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Email:</td>
                                                <td>{{$billingAdd->email}}</td>
                                            </tr>
                                            <tr>
                                                <td>Mobile:</td>
                                                <td>{{$billingAdd->mobile}}</td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td>{{$billingAdd->address}}</td>
                                            </tr>
                                            <tr>
                                                <td>Country:</td>
                                                <td>{{$billingAdd->country}}</td>
                                            </tr>
                                            <tr>
                                                <td>City:</td>
                                                <td>{{$billingAdd->city}}</td>
                                            </tr>
                                            <tr>
                                                <td>State:</td>
                                                <td>{{$billingAdd->state}}</td>
                                            </tr>
                                            <tr>
                                                <td>Zip Code:</td>
                                                <td>{{$billingAdd->zip}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </address>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-6 mb-6">
                                <div class="ecommerce-address shipping-address pr-lg-8">
                                    <h4 class="title title-underline ls-25 font-weight-bold">Shipping Address</h4>
                                    @foreach($order->shippingAdd as $shippingAdd)
                                        <address class="mb-4">
                                            <table class="address-table">
                                                <tbody>
                                                <tr>
                                                    <td>Name:</td>
                                                    <td>{{$shippingAdd->shipping_name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Mobile:</td>
                                                    <td>{{$shippingAdd->shipping_mobile}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Address:</td>
                                                    <td>{{$shippingAdd->shipping_address}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Country:</td>
                                                    <td>{{$shippingAdd->shipping_country}}</td>
                                                </tr>
                                                <tr>
                                                    <td>City:</td>
                                                    <td>{{$shippingAdd->shipping_city}}</td>
                                                </tr>
                                                <tr>
                                                    <td>State:</td>
                                                    <td>{{$shippingAdd->shipping_state}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Zip Code:</td>
                                                    <td>{{$shippingAdd->shipping_zip}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </address>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-12 mb-6">
                                <div class="ecommerce-address shipping-address pr-lg-8">
                                    <h7 class="title title-underline ls-25 font-weight-bold">Shipping Notes</h7>
                                    @foreach($order->shippingAdd as $shippingAdd)
                                        @if($shippingAdd->shipping_notes == null)
                                            <p>No Notes Found</p>
                                        @else
                                            <p>{{$shippingAdd->shipping_notes}}</p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane active order">
                            <div class="order-details-wrapper mb-5">
                                <h4 class="title text-uppercase ls-25 mb-5">Order Details</h4>
                                <table class="order-table">
                                    <thead>
                                    <tr>
                                        <th class="text-dark">Product</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $total_amount = 0; ?>
                                    @foreach($order->order_details as $order)
                                    <tr>
                                        <td>
                                            <a href="#">{{$order->product_name}}</a>&nbsp;<strong>x {{$order->product_qty}}</strong><br>

                                        </td>
                                        <td>{{number_format($order->product_qty * $order->product_price,2)}}</td>
                                    </tr>
                                    <?php $total_amount = $total_amount + ($order->product_price*$order->product_qty); ?>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Subtotal:</th>
                                        <td>{{number_format($total_amount,2)}}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Charge:</th>
                                        <td>{{number_format($orders->delivery_charge,2)}}</td>
                                    </tr>
                                    <tr>
                                        <th>Coupon Amount:</th>
                                        @if($orders->coupon_amount == null)
                                            <td>0.00</td>
                                        @else
                                        <td>{{number_format($orders->coupon_amount,2)}}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Cupon Code:</th>
                                        <td>{{$orders->coupon_code}}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment method:</th>
                                        @if($orders->payment_method == 'cod')
                                            <td>Cash</td>
                                        @else
                                            <td>Online Payment</td>
                                        @endif
                                    </tr>
                                    <tr class="total">
                                        <th class="border-no">Total:</th>
                                        <td class="border-no">{{number_format($total_amount - $orders->coupon_amount + $orders->delivery_charge,2)}}</td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- End of Order Details -->

                            <a href="{{route('customer.orders')}}" class="btn btn-dark btn-rounded btn-icon-left btn-back mt-6 mb-6"><i class="w-icon-long-arrow-left"></i>Back To List</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->

@endsection
