@extends('admin.layouts.master')
@section('content')

{{--  <!-- Content Wrapper. Contains page content -->--}}
{{--  <div class="content-wrapper">--}}
{{--    <!-- Content Header (Page header) -->--}}
{{--    <section class="content-header">--}}
{{--       <div class="header-icon">--}}
{{--          <i class="fa fa-product-hunt"></i>--}}
{{--       </div>--}}
{{--       <div class="header-title">--}}
{{--          <h1>Edit Coupon</h1>--}}
{{--          <small>Edit Coupons</small>--}}
{{--       </div>--}}
{{--    </section>--}}
{{--    @if(Session::has('flash_message_error'))--}}
{{--   <div class="alert alert-sm alert-danger alert-block" role="alert">--}}
{{--      <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--      <span aria-hidden="true">&times;</span>--}}
{{--      </button>--}}
{{--      <strong>{!! session('flash_message_error') !!}</strong>--}}
{{--   </div>--}}
{{--   @endif--}}
{{--   --}}
{{--   @if(Session::has('flash_message_success'))--}}
{{--   <div class="alert alert-sm alert-success alert-block" role="alert">--}}
{{--      <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--      <span aria-hidden="true">&times;</span>--}}
{{--      </button>--}}
{{--      <strong>{!! session('flash_message_success') !!}</strong>--}}
{{--   </div>--}}
{{--   @endif--}}
{{--    <!-- Main content -->--}}
{{--    <section class="content">--}}
{{--       <div class="row">--}}
{{--          <!-- Form controls -->--}}
{{--          <div class="col-sm-12">--}}
{{--             <div class="panel panel-bd lobidrag">--}}
{{--                <div class="panel-heading">--}}
{{--                   <div class="btn-group" id="buttonlist"> --}}
{{--                      <a class="btn btn-add " href="{{url('admin/view-coupons')}}"> --}}
{{--                      <i class="fa fa-eye"></i>  View Coupons </a>  --}}
{{--                   </div>--}}
{{--                </div>--}}
{{--                <div class="panel-body">--}}
{{--                <form class="col-sm-6" enctype="multipart/form-data" action="{{url('/admin/edit-coupon/'.$couponDetails->id)}}" method="post" name="edit_coupon" id="edit_coupon"> {{csrf_field()}}--}}
{{--                     --}}
{{--                      <div class="form-group">--}}
{{--                         <label>Coupon Code</label>--}}
{{--                         <input type="text" class="form-control" value="{{$couponDetails->coupon_code}}" name="coupon_code" id="coupon_code" required>--}}
{{--                      </div>--}}
{{--                      <div class="form-group">--}}
{{--                         <label>Amount</label>--}}
{{--                         <input type="text" class="form-control" value="{{$couponDetails->amount}}" name="coupon_amount" id="coupon_amount" required>--}}
{{--                      </div>--}}
{{--                      <div class="form-group">--}}
{{--                        <label>Amount Type</label>--}}
{{--                        <select name="amount_type" id="amount_type" class="form-control">--}}
{{--                        <option  @if($couponDetails->amount_type=="Percentage") selected @endif value="Percentage">Percentage</option>--}}
{{--                        <option  @if($couponDetails->amount_type=="Fixed") selected @endif value="Fixed">Fixed</option>--}}
{{--                        </select>--}}

{{--                     </div>--}}
{{--                      <div class="form-group">--}}
{{--                         <label>Expiry Date</label>--}}
{{--                         <input type="text" value="{{$couponDetails->expiry_date}}" class="form-control" name="expiry_date" id="datepicker" required>--}}
{{--                      </div>--}}
{{--                      --}}
{{--                      <div class="reset-button">--}}
{{--                         <input type="submit" class="btn btn-success" value="Edit Coupon">--}}
{{--                      </div>--}}
{{--                   </form>--}}
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
                          @if(Session::has('flash_message_error'))
                              <div class="alert alert-sm alert-danger alert-block" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                  <strong>{!! session('flash_message_error') !!}</strong>
                              </div>
                          @endif

                          @if(Session::has('flash_message_success'))
                              <div class="alert alert-sm alert-success alert-block" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                  <strong>{!! session('flash_message_success') !!}</strong>
                              </div>
                          @endif
                          <div class="col-lg-8">
                              <div class="card">
                                  <div class="card-inner">
                                      <form action="{{url('/admin/edit-coupon/'.encrypt($couponDetails->id))}}" method="post" class="gy-3" enctype="multipart/form-data" name="add_coupon" id="add_coupon">
                                          @csrf
                                          <div class="form-group">
                                              <label>Coupon Code</label>
                                              <input type="text" class="form-control" value="{{$couponDetails->coupon_code}}" name="coupon_code" id="coupon_code" required>
                                          </div>
                                          <div class="form-group">
                                              <label>Amount</label>
                                              <input type="text" class="form-control" value="{{$couponDetails->amount}}" name="coupon_amount" id="coupon_amount" required>
                                          </div>
                                          <div class="form-group">
                                              <label>Amount Type</label>
                                              <select name="amount_type" id="amount_type" class="form-control">
                                                  <option  @if($couponDetails->amount_type=="Percentage") selected @endif value="Percentage">Percentage</option>
                                                  <option  @if($couponDetails->amount_type=="Fixed") selected @endif value="Fixed">Fixed</option>
                                              </select>

                                          </div>
                                          <div class="form-group">
                                              <label>Expiry Date</label>
                                              <input type="text" value="{{$couponDetails->expiry_date}}" class="form-control" name="expiry_date" id="datepicker" required>
                                          </div>
                                          <div class="reset-button">
                                              <input type="submit" class="btn btn-success" value="Edit Coupon">
                                          </div>
                                      </form>
                                  </div>
                              </div><!-- card -->
                          </div>
                      </div><!-- .nk-block -->
                  </div><!-- .components-preview -->
              </div>
          </div>
      </div>
  </div>
  <!-- content @e -->

@endsection
