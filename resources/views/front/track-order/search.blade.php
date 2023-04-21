@extends('front.layouts.master')
@section('content')

    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <h1 class="page-title">Track Order</h1>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav mb-10 pb-1">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html">Home</a></li>
                    <li><a href="#">Elements</a></li>
                    <li>Call To Action</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content mb-10 pb-2">
            <div class="container">
                <section class="cta-section mb-10 pt-1">
                    <div class="banner banner-newsletter show-code-action">
                        <div class="banner-content text-center">
                            <h3 class="banner-title">Check Your Order Status
                            </h3>
                            <p></p>
                            <form action="{{route('track.order.search')}}" method="get" class="input-wrapper input-wrapper-inline justify-content-center">
                                <input class="form-control mb-4" type="text" name="order_num"
                                       placeholder="Your order number" autocomplete="off" />
                                <button type="submit" class="btn btn-dark btn-rounded mb-4">Track order
                                    <i class="w-icon-long-arrow-right"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->

@endsection
