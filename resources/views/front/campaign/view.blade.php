@extends('front.layouts.master')
@section('content')

    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <h1 class="page-title">Campaign list</h1>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav mb-10 pb-1">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{route('Home')}}">Home</a></li>
                    <li><a href="#">Elements</a></li>
                    <li>Campaign list</li>
                </ul>
            </div>

        </nav>
        <!-- End of Breadcrumb -->
        <!-- Start of Page Content -->
        <div class="page-content pb-10 mb-2">
            <div class="container">
                <section class="category-section category-2cols-simple mb-10 pb-1">
                    <h2 class="title title-center mb-5">Campaign </h2>
                    <div class="swiper-container swiper-theme show-code-action" data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 1,
                            'breakpoints': {
                                '576': {
                                    'slidesPerView': 2
                                },
                                '992': {
                                    'slidesPerView': 3
                                }
                            }
                        }">
                        <div class="swiper-wrapper row cols-lg-3 cols-sm-2 cols-1">
                            @foreach($campaigns as $campaign)
                                @if($campaign->end_date > date('m-d-Y'))
                            <div class="swiper-slide category-wrap">
                                <div class="category category-absolute category-default overlay-zoom">
                                    <a href="{{route('front-campaign-details',encrypt($campaign->id))}}">
                                        <figure>
                                            <img src="{{$campaign->image}}"
                                                 alt="Category Banner" width="400" height="200"
                                                 style="background-color: #423D39;" />
                                        </figure>
                                    </a>
                                    <div class="category-content y-50">
                                        <h4 class="category-title text-white font-weight-bolder">{{$campaign->tittle}}</h4>
                                        <a href="{{route('front-campaign-details',encrypt($campaign->id))}}"
                                           class="btn btn-white btn-link btn-underline" style="color: black">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </section>
                <!-- End of Cateogry Section .category-2cols-simple -->
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->

@endsection
