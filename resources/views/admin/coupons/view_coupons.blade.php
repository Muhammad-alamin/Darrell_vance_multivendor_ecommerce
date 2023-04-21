@extends('admin.layouts.master')
@section('title','View Coupons')

@section('content')

{{--<!-- Content Wrapper. Contains page content -->--}}
{{--<div class="content-wrapper">--}}
{{--    <!-- Content Header (Page header) -->--}}
{{--    <section class="content-header">--}}
{{--       <div class="header-icon">--}}
{{--          <i class="fa fa-eye"></i>--}}
{{--       </div>--}}
{{--       <div class="header-title">--}}
{{--          <h1>View Coupons</h1>--}}
{{--          <small>Coupons</small>--}}
{{--       </div>--}}
{{--    </section>--}}
{{--    @if(Session::has('flash_message_error'))--}}
{{--    <div class="alert alert-danger alert-block">--}}
{{--        <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--        </button>--}}
{{--    <strong>{{ session('flash_message_error') }}</strong>--}}
{{--    </div>--}}
{{--    @endif--}}
{{--    @if(Session::has('flash_message_success'))--}}
{{--    <div class="alert alert-success alert-block">--}}
{{--        <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--        </button>--}}
{{--    <strong>{{ session('flash_message_success') }}</strong>--}}
{{--    </div>--}}
{{--    @endif--}}

{{--    <div id="message_success" style="display:none;" class="alert alert-sm alert-success">Status Enabled</div>--}}
{{--    <div id="message_error" style="display:none;" class="alert alert-sm alert-danger">Status Disabled</div>--}}
{{--    <!-- Main content -->--}}
{{--    <section class="content">--}}
{{--       <div class="row">--}}
{{--          <div class="col-sm-12">--}}
{{--             <div class="panel panel-bd lobidrag">--}}
{{--                <div class="panel-heading">--}}
{{--                   <div class="btn-group" id="buttonexport">--}}
{{--                      <a href="#">--}}
{{--                         <h4>View Coupons</h4>--}}
{{--                      </a>--}}
{{--                   </div>--}}
{{--                </div>--}}
{{--                <div class="panel-body">--}}
{{--                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->--}}
{{--                   <div class="btn-group">--}}
{{--                      <div class="buttonexport" id="buttonlist">--}}
{{--                      <a class="btn btn-add" href="{{url('admin/add-coupon')}}"> <i class="fa fa-plus"></i> Add Coupon--}}
{{--                         </a>--}}
{{--                      </div>--}}

{{--                   </div>--}}
{{--                   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->--}}
{{--                   <div class="table-responsive">--}}
{{--                      <table id="table_id" class="table table-bordered table-striped table-hover">--}}
{{--                         <thead>--}}
{{--                            <tr class="info">--}}
{{--                                <th>Coupon ID</th>--}}
{{--                                <th>Coupon Code</th>--}}
{{--                                <th>Amount</th>--}}
{{--                                <th>Amount Type</th>--}}
{{--                                <th>Expiry Date</th>--}}
{{--                                <th>Created Date</th>--}}
{{--                                <th>Status</th>--}}
{{--                                <th>Actions</th>--}}
{{--                            </tr>--}}
{{--                         </thead>--}}
{{--                         <tbody>--}}
{{--                            @foreach($coupons as $coupon)--}}
{{--                            <tr>--}}
{{--                            <td>{{ $coupon->id }}</td>--}}
{{--                            <td>{{ $coupon->coupon_code }}</td>--}}
{{--                            <td>--}}
{{--                            {{ $coupon->amount }}--}}
{{--                            @if($coupon->amount_type == "Percentage") % @else PKR @endif--}}
{{--                            </td>--}}
{{--                            <td>{{ $coupon->amount_type }}</td>--}}
{{--                            <td>{{ $coupon->expiry_date }}</td>--}}
{{--                            <td>{{ $coupon->created_at }}</td>--}}
{{--                            <td>--}}
{{--                                <input type="checkbox" class="CouponStatus btn btn-success" rel="{{$coupon->id}}" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger"--}}
{{--                                @if($coupon['status']=="1") checked @endif>--}}
{{--                                <div id="myElem" style="display:none" class="alert alert-success">Status Enabled</div>--}}
{{--                              </td>--}}
{{--                            <td>--}}
{{--                            <a href="{{url('/admin/edit-coupon/'.$coupon->id)}}" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></a>--}}
{{--                            <a  href="{{url('/admin/delete-coupon/'.$coupon->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </a>--}}
{{--                            </td>--}}
{{--                            </tr>--}}
{{--                            @endforeach--}}
{{--                         </tbody>--}}
{{--                      </table>--}}
{{--                   </div>--}}
{{--                </div>--}}
{{--             </div>--}}
{{--          </div>--}}
{{--       </div>--}}
{{--    </section>--}}
{{--    <!-- /.content -->--}}
{{-- </div>--}}
{{-- <!-- /.content-wrapper -->--}}

<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Coupon List</h4>
                                <div class="nk-block-des">
                                </div>
                            </div>
                        </div>
                        @if(Session::has('flash_message_error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ session('flash_message_error') }}</strong>
                            </div>
                        @endif
                        @if(Session::has('flash_message_success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ session('flash_message_success') }}</strong>
                            </div>
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ session('error') }}</strong>
                            </div>
                        @endif

                        <div id="message_success" style="display:none;" class="alert alert-sm alert-success">Status Enabled</div>
                        <div id="message_error" style="display:none;" class="alert alert-sm alert-danger">Status Disabled</div>
                        <!-- Main content -->

                        <div class="card card-preview">
                            <div class="card-inner">
                                <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                    <thead>
                                    <tr class="nk-tb-item nk-tb-head">
                                        <th class="nk-tb-col"><span class="sub-text">Coupon Code</span></th>
                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Amount</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Amount Type</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Expiry Date</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($coupons as $coupon)
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-info">
                                                        <span class="tb-lead">{{ $coupon->coupon_code }}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                                @if($coupon->amount_type == "Percentage")
                                                        <span>{{$coupon->amount}} % </span  >
                                                    @else
                                                        <span>{{$coupon->amount}} taka </span>
                                                    @endif
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{$coupon->amount_type}}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{$coupon->expiry_date}}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                @if($coupon->status == 1)
                                                <span class="text-success">Active</span>
                                                @else
                                                <span class="text-danger">In active</span>
                                                @endif
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="{{url('/admin/edit-coupon/'.encrypt($coupon->id))}}"><em class="icon ni ni-edit"></em><span>Edit Coupon</span></a></li>
                                                                    <li><a href="{{url('/admin/delete-coupon/'.encrypt($coupon->id))}}" onclick="return confirm('Are You Confirm to Delete?')"><em class="icon ni ni-trash"></em><span>Remove Coupon</span></a></li>
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
