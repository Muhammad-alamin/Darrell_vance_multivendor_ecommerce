@extends('admin.layouts.master')

@section('content')

    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
{{--                    <div class="nk-block-head">--}}
{{--                        <div class="nk-block-between g-3">--}}
{{--                            <div class="nk-block-head-content">--}}
{{--                                <a href="{{route('admin.order.show',encrypt($invoices->order_id))}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>--}}
{{--                                <a href="{{route('admin.order.show',encrypt($invoices->order_id))}}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div><!-- .nk-block-head -->--}}
                    <div class="nk-block">
                        <div class="invoice">
                            <div class="invoice-action">
                                <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" style="margin-right: 5px;" href="{{route('invoice-print',\Illuminate\Support\Facades\Crypt::encryptString($invoices->id))}}" target="_blank"><em class="icon ni ni-printer-fill"></em></a>
                                <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" href="javascript:void(0)" target="_blank"><em class="icon ni ni-download"></em></a>
{{--                                <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" href="{{route('invoice-pdf',\Illuminate\Support\Facades\Crypt::encryptString($invoices->id))}}" target="_blank"><em class="icon ni ni-download"></em></a>--}}
                            </div><!-- .invoice-actions -->

                            <div class="invoice-wrap">
                                <div class="invoice-brand text-center">
                                    <img src="{{asset('front/assets/images/logo2.png')}}" srcset="{{asset('front/assets/images/logo2.png')}} 1x" style="max-height: 150px;" alt="">
                                </div>
                                <div class="invoice-head">
                                    <div class="invoice-contact">
                                        <span class="overline-title">Invoice To</span>
                                        <div class="invoice-contact-info">
                                            <h4 class="title">{{$invoices->full_name}}</h4>
                                            <ul class="list-plain">
                                                <li><em class="icon ni ni-map-pin-fill"></em><span>{{$invoices->address}}<br>{{$invoices->city.' '.$invoices->zip.' '.$invoices->country}}</span></li>
                                                <li><em class="icon ni ni-call-fill"></em><span>{{$invoices->phone}}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="invoice-desc">
                                        <h3 class="title">Invoice</h3>
                                        <ul class="list-plain">
                                            <li class="invoice-id"><span>Invoice ID</span>:<span>{{time()}}</span></li>
                                            <li class="invoice-date"><span>Date</span>:<span>{{date('d-m-Y')}}</span></li>
                                        </ul>
                                    </div>
                                </div><!-- .invoice-head -->
                                <div class="invoice-bills">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Colour</th>
                                                <th></th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $total_amount = 0; ?>
                                            @foreach($invoices->order_details as $invoice)
                                            <tr>
                                                <td>{{$invoice->product_name}} @if ($invoice->product_size == null) @else{{$invoice->product_size}} @endif </td>
                                                @if($invoice->product_color == null)
                                                <td></td>
                                                @else
                                                <td>{{$invoice->product_color}}</td>
                                                @endif
                                                <td ></td>
                                                <td>{{number_format($invoice->product_price)}}</td>
                                                <td>{{$invoice->product_qty}}</td>
                                                <td>{{number_format($invoice->product_price*$invoice->product_qty)}}</td>
                                            </tr>
                                            <?php $total_amount = $total_amount + ($invoice->product_price*$invoice->product_qty); ?>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="4"></td>
                                                <td colspan="1">Subtotal</td>
                                                <td>{{number_format($total_amount)}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"></td>
                                                <td colspan="1">Delivery fee</td>
                                                <td>{{number_format($invoices->delivery_charge)}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"></td>
                                                <td colspan="1">Coupon Amount</td>
                                                @if($invoices->coupon_amount == null)
                                                <td>0.00</td>
                                                @else
                                                    <td>{{number_format($invoices->coupon_amount)}}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td colspan="4"></td>
                                                <td colspan="1">Grand Total</td>
                                                <td>{{number_format($total_amount - $invoices->coupon_amount + $invoices->delivery_charge)}}</td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                        <div class="nk-notes ff-italic fs-12px text-soft"> Invoice was created on a computer and is valid without the signature and seal. </div>
                                    </div>
                                </div><!-- .invoice-bills -->
                            </div><!-- .invoice-wrap -->

                        </div><!-- .invoice -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->

@endsection
