@extends('front.layouts.master')
@section('content')
    <!-- Start of Main -->
<main class="main">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb mb-8">
                <li><a href="{{route('Home')}}">Home</a></li>
                <li><a href="javascript:void(0)">Brand</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Pgae Contetn -->
    <div class="page-content mb-4">
        <div class="container">
            <div class="row cols-xl-5 cols-lg-5 cols-md-4 cols-sm-3 cols-2">
                @foreach($brands as $brand)
                <div class="vendor-brand-wrap mb-8">
                    <div class="vendor-brand">
                        <a href="{{route('single.brand', encrypt($brand->id))}}">
                            <figure class="brand">
                                <img src="{{$brand->brand_image}}" alt="Brand" width="80"
                                     height="80" />
                            </figure>
                            <h4 class="vendor-name">{{$brand->brand_name}}</h4>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</main>
<!-- End of Main -->
@endsection
