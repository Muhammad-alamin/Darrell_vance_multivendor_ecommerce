@extends('front.layouts.master')
@section('content')
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title">Wishlist</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav mb-2">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html">Home</a></li>
                    <li>Wishlist</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content mb-10 pb-2">
            <div class="container">
                <div class="text-center" style="text-align: center; justify-items: center">
                    <h4 class="text-danger text-center font-size-lg">Your  Wishlist is empty</h4>
                    <br>
                    <a class="button text-center btn btn-rounded btn-dark" href="{{route('front.shop')}}">Continue Shopping</a>
                </div>
            </div>
            <!-- End of Compare Table -->
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->
@endsection
