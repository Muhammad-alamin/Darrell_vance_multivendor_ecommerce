@extends('front.layouts.master')
@section('content')
    <!-- Start of Main -->
<main class="main">
    <!-- Start of Page Header -->
    <div class="page-header">
        <h1 class="page-title">Our Services</h1>
        <h4 class="page-subtitle">Elements</h4>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-10 pb-1">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('Home')}}">Home</a></li>
                <li>Our Services</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content pb-10 mb-2">

        <section class="category-classic-section pt-10 pb-10">
            <div class="container mt-1 mb-2">
                <h2 class="title title-center mb-5">All Service</h2>
                    <div class="swiper-wrapper row cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2">
                        @foreach($services as $category)
                        <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                            <a href="{{route('category.product',encrypt($category->id))}}">
                                <figure class="category-media">
                                    <img src="{{$category->category_image}}" alt="Category"
                                         width="190" height="184" />
                                </figure>
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">{{$category->category_name}}</h4>
                                <a href="{{route('category.product',encrypt($category->id))}}"
                                   class="btn btn-primary btn-link btn-underline">Shop Now</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
            </div>
        </section>
    </div>
    <!-- End of Page Content -->
</main>
<!-- End of Main -->
@endsection
