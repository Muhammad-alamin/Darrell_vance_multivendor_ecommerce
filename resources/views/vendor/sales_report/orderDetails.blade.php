@extends('vendor.layouts.master')

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
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->

    <div class="content-header" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if(session('success'))
                        <div class="alert alert-success">Order Status Changed Successfully</div>
                    @endif
                    <div class="card">
                        <div class="card-body table-responsive p-15">
                            <div class="row">
                                <div class="col-4">
                                    <table>
                                        <tr>
                                            <th>Order Id : </th>
                                            <td>{{$order->order_id}}</td>
                                        </tr>
                                        <tr>
                                            <th>Total amount : </th>
                                            <td>{{ number_format($order->grand_total,2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status : </th>
                                            <td>{{$order->status}}</td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="col-8">
                                    <table>
                                        <tr>
                                            <th>Client Name : </th>
                                            <td>{{$order->full_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Client address : </th>
                                            <td>{{$order->adress}}</td>
                                        </tr>
                                        <tr>
                                            <th>Client email : </th>
                                            <td>{{$order->user_email}}</td>
                                        </tr>
                                        <tr>
                                            <th>Client phone no : </th>
                                            <td>{{$order->phone}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <div class="content-header" >
        <div class="container-fluid">
            <div class="row">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
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
                                <td>{{++ $key}}</td>
                                <td>{{$order_deatail->product_name}}</td>
                                <td>{{ number_format( $order_deatail->product_price,2)}}</td>
                                <td>{{$order_deatail->product_qty}}</td>
                                <td>{{ number_format( $order_deatail->product_price * $order_deatail->product_qty,2)}}</td>
                                @if(isset($order_deatail->brandCommission->percentage))
                                <td>{{ number_format($totalProPrice * $order_deatail->brandCommission->percentage/100 ,2)}}</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

@endsection
