<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('assets/favicon.png')}}">
    <!-- Page Title  -->
    <title>Invoice Print | Multi vendor E-commerce</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset('./assets/gc-css/dashlite.css?ver=2.2.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('./assets/gc-css/theme.css?ver=2.2.0')}}">
</head>

<body class="bg-white" onload="printPromot()">
<div class="nk-block">
    <div class="invoice invoice-print">
        <div class="invoice-wrap">
            <div class="invoice-brand text-center">
                <img src="{{asset('front/assets/images/logo.png')}}" srcset="{{asset('front/assets/images/logo.png')}} 1x" alt="">
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
<script>
    function printPromot() {
        window.print();
    }
</script>
</body>

</html>
