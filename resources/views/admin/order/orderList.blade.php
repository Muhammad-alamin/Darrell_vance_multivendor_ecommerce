@extends('admin.layouts.master')

@section('content')


    <!-- content @s -->
    <div class="nk-content ">

        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Order List</h4>
                                    <div class="nk-block-des">
                                    </div>
                                </div>
                            </div>
                            <!-- /.content-header -->
                                <div class="card">
                                    <div class="card-body">
                                        <form action="" method="">
                                            <div class="row">
                                                <div class="col-md-4 mb-2">
                                                    <input type="text" value="{{request('client_information')}}" name="client_information" placeholder="Search by customer information" class="form-control">
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <input type="text" value="{{request('order_id')}}" id="order_id" name="order_id" placeholder="Search by Order id" class="form-control">
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <select name="status" class="form-control">
                                                        <option value="" >Select by status</option>
                                                        <option {{(request('status')==\App\Model\Order::STATUS_PENDING? 'selected':null)}} value="{{\App\Model\Order::STATUS_PENDING}}" >{{\App\Model\Order::STATUS_PENDING}}</option>
                                                        <option {{(request('status')==\App\Model\Order::STATUS_PROCESSING?'selected':null)}}value="{{\App\Model\Order::STATUS_PROCESSING}}" >{{\App\Model\Order::STATUS_PROCESSING}}</option>
                                                        <option {{(request('status')==\App\Model\Order::STATUS_SHIPPED?'selected':null)}} value="{{\App\Model\Order::STATUS_SHIPPED}}" >{{\App\Model\Order::STATUS_SHIPPED}}</option>
                                                        <option {{(request('status')==\App\Model\Order::STATUS_DELIVERED?'selected':null)}} value="{{\App\Model\Order::STATUS_DELIVERED}}" >{{\App\Model\Order::STATUS_DELIVERED}}</option>
                                                        <option {{(request('status')==\App\Model\Order::STATUS_CANCELED?'selected':null)}} value="{{\App\Model\Order::STATUS_CANCELED}}" >{{\App\Model\Order::STATUS_CANCELED}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 col-lg-2 mb-2">
                                                    <button type="submit" class="form-control btn btn-primary text-center">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            <div class="card card-preview">
                                <div class="card-inner">
                                    <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                        <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span class="sub-text">Order id</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Customer name</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Address</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Phone</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Status</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Price</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $key=>$order)
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="user-info">
                                                            <span class="tb-lead">{{$order->order_id}}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                                    <span>{{$order->full_name}}</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-md">
                                                    <span>{{$order->address}}</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                                    <span>{{$order->phone}}</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg">
                                                    <span>{{$order->status}}</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-lead">৳ {{number_format( $order->grand_total)}}</span>
                                                </td>
                                                <td class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="{{route('admin.order.show',encrypt($order->id))}}"><em class="icon ni ni-edit"></em><span>Details</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr><!-- .nk-tb-item  -->
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- .card-preview -->
                        </div> <!-- nk-block -->
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->

@endsection
