@extends('front.layouts.master')
@section('content')

    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <h1 class="page-title">Order status</h1>
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
                            <h5 class="banner-title">Order Status :  {{$order_num->status}}</h5>
                            <p class="text-center text-success">Note:  please login your account and check details. Thank you</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->

@endsection
