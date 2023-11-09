@extends('front.layouts.master')
@section('content')
     <!-- Start of Main -->
     <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">About Us</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{  route('Home') }}">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content pt-2">
            <div class="container">
                <div class="tab tab-vertical row gutter-lg">
                    <ul class="nav nav-tabs mb-6">
                        <li class="link-item">
                            <a href="javascript:void(0)" class="">Terms & Condition</a>
                        </li>
                        <li class="link-item">
                            <a href="javascript:void(0)" class=" active">Returns</a>
                        </li>
                        <li class="link-item">
                            <a href="javascript:void(0)" class="">Shipping</a>
                        </li>
                        <li class="link-item">
                            <a href="javascript:void(0)" class="">Paymnet Method</a>
                        </li>
                        <li class="link-item">
                            <a href="javascript:void(0)" class="">How to Sell</a>
                        </li>
                        <li class="link-item">
                            <a href="{{ route('aboutUs') }}" class="">About Us</a>
                        </li>
                    </ul>

                    <div class="tab-content mb-6">
                        <div class="tab-pane active in" id="account-dashboard">
                            <p class="mb-4">AfriBazaar will be an online selling platform and aims to bridge cultures, foster economic growth, showcasing the richness, diversity, and quality of African products. AfriBazaar aim to create a platform that celebrates African culture, empowers local businesses, and connects customers with authentic African experiences right at their fingertips and celebrate the diversity of Africa through e-commerce. AfriBazaar is a thriving African e-commerce platform that celebrates African culture and connects UK customers with authentic products from Africa. With a diverse array of fashion, accessories, home decor, beauty products, art, and more, AfriBazaar offers a unique shopping experience. By empowering African entrepreneurs through vendor support and personalized services, AfriBazaar not only promotes economic growth but also fosters cultural exchange and understanding between Africa and the UK. With a commitment to quality, sustainability, and customer satisfaction, AfriBazaar continues to thrive as a leading destination for those seeking the richness and diversity of African heritage.

                            </p>
                            <p class="mb-4">AfriBazaar has a goal of extending the array of African origin products and services options available to customers. He is an aspiring entrepreneur, dedicated corporate executive with in depth understanding of the industry and an expert on contemporary marketing strategies, having earned a reputation and committed to promote wellbeing of hardworking professionals through innovative venture in the UK market. Being an innovative African origin product and services provider, the company is projected to carve out a considerable chunk of this business space. Having physical presence of the key personnel in UK, the company would be able to capture the market and augment the growth and revolutionize the way people explore the world.

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!-- End of Main -->
@endsection
