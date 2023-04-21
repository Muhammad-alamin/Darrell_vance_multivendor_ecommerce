@extends('admin.layouts.master')

@section('content')

    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Order Details</h3>
                                <div class="nk-block-des text-soft">
                                </div>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>Export File</span></a></li>
                                            <li class="nk-block-tools-opt"><a href="{{route('invoice',\Illuminate\Support\Facades\Crypt::encryptString($order->id))}}" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>Generate Invoice</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->

    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    @if(session('success'))
                        <div class="alert alert-success">Order Status Changed Successfully</div>
                    @endif
                    <br>
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Order / <strong class="text-primary small">Details</strong></h3>
                            </div>
                            <div class="nk-block-head-content">
                                <a href="{{route('order.index')}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                <a href="{{route('order.index')}}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-aside-wrap">
                                <div class="card-content">
                                    <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                        <li class="nav-item">
                                            <a class="nav-link active"><em class="icon ni ni-product-circle"></em><span>Details</span></a>
                                        </li>
                                    </ul><!-- .nav-tabs -->
                                    <div class="card-inner">
                                        <div class="nk-block">
                                            <div class="nk-block-head">
                                                <h5 class="title">Order Details</h5>
                                                <p></p>
                                            </div><!-- .nk-block-head -->
                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Order Id</span>
                                                        <span class="profile-ud-value">{{$order->order_id}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Total amount</span>
                                                        <span class="profile-ud-value">{{ number_format($order->grand_total,2) }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Status</span>
                                                        <span class="profile-ud-value">{{$order->status}}</span>
                                                    </div>
                                                </div>
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                    </div><!-- .card-inner -->
                                </div><!-- .card-content -->
                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                        <div class="nk-block">
                            <div class="card card-bordered">
                                <div class="card-aside-wrap">
                                    <div class="card-content">
                                        <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                            <li class="nav-item">
                                                <a class="nav-link active"><em class="icon ni ni-product-circle"></em><span>Details</span></a>
                                            </li>
                                        </ul><!-- .nav-tabs -->
                                        <div class="card-inner">
                                            <div class="nk-block">
                                                <div class="nk-block-head">
                                                    <h5 class="title">Customer Details</h5>
                                                    <p></p>
                                                </div><!-- .nk-block-head -->
                                                <div class="profile-ud-list">
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Customer Name</span>
                                                            <span class="profile-ud-value">{{$order->full_name}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Address</span>
                                                            <span class="profile-ud-value">{{$order->address}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Email</span>
                                                            <span class="profile-ud-value">{{$order->user_email}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Phone no</span>
                                                            <span class="profile-ud-value">{{$order->phone}}</span>
                                                        </div>
                                                    </div>
                                                </div><!-- .profile-ud-list -->
                                            </div><!-- .nk-block -->
                                        </div><!-- .card-inner -->
                                    </div><!-- .card-content -->
                                </div><!-- .card-aside-wrap -->
                            </div><!-- .card -->
                        </div><!-- .nk-block -->
                        <div class="nk-block">
                            <div class="card card-bordered">
                                <div class="card-aside-wrap">
                                    <div class="card-content">
                                        <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                            <li class="nav-item">
                                                <a class="nav-link active"><em class="icon ni ni-product-circle"></em><span>Change order status</span></a>
                                            </li>
                                        </ul><!-- .nav-tabs -->
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="" method="">
                                                    <div class="row">
                                                        <div class="col-md-1.5 mb-2">
                                                            <form action="{{route('admin.order.change.status',[$order->id, \App\Model\Order::STATUS_PROCESSING])}}" method="post">
                                                                @csrf
                                                                @method('put')
                                                                <button type="submit" class="btn btn-warning" onclick="return confirm('Are you confirm to Processing this order')" >Processing</button>
                                                            </form>                                                        </div>
                                                        <div class="col-md-1.5 mb-2">
                                                            <form action="{{route('admin.order.change.status',[$order->id, \App\Model\Order::STATUS_SHIPPED])}}"method="post">
                                                                @csrf
                                                                @method('put')
                                                                <button type="submit" class="btn btn-info" onclick="return confirm('Are you confirm to Shipped this order')" >Shipped</button>
                                                            </form>                                                        </div>
                                                        <div class="col-md-1.5 mb-2">
                                                            <form action="{{route('admin.order.change.status',[$order->id,\App\Model\Order::STATUS_DELIVERED])}}"method="post">
                                                                @csrf
                                                                @method('put')
                                                                <button type="submit" class="btn btn-success" onclick="return confirm('Are you confirm to Delivered this order')" >Delivered</button>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-1.5 mb-2">
                                                            <form action="{{route('admin.order.change.status',[$order->id, \App\Model\Order::STATUS_CANCELED])}}"method="post">
                                                                @csrf
                                                                @method('put')
                                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you confirm to Canceled this order')" >Canceled</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </div><!-- .card-content -->
                                </div><!-- .card-aside-wrap -->
                            </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
    <!-- content @e -->
    <br>
    <div class="content-header" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive p-15">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Product name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Sub total</th>
                                    <th>Profit</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->order_details as $key=>$order_deatail)
                                    <?php $totalProPrice = $order_deatail->product_price * $order_deatail->product_qty ?>
                                    <tr>
                                        <td>{{$order_deatail->product_name}}</td>
                                        <td>৳ {{ number_format( $order_deatail->product_price)}}</td>
                                        <td>{{$order_deatail->product_qty}}</td>
                                        <td>৳ {{ number_format( $order_deatail->product_price * $order_deatail->product_qty)}}</td>
                                        @if(isset($order_deatail->brandCommission->percentage))
                                            <td>৳ {{ number_format($totalProPrice * $order_deatail->brandCommission->percentage/100)}}</td>
                                        @else
                                            <td class="text-danger">Commission not set</td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

@endsection
