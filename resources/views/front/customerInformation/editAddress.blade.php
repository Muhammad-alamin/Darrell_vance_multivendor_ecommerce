
@extends('front.layouts.master')
@section('content')

    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">My Account</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html">Home</a></li>
                    <li>My account</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content pt-2">
            <div class="container">
                <div class="tab tab-vertical ">
                    <ul class="nav nav-tabs mb-6" >
                        <li class="link-item">
                            <a href="{{route('customer.dashboard',\Illuminate\Support\Facades\Crypt::encryptString(\Illuminate\Support\Facades\Auth::user()->id))}}" class="">Dashboard</a>
                        </li>
                        <li class="link-item">
                            <a href="{{route('customer.orders')}}" class="">Orders</a>
                        </li>
                        <li class="link-item">
                            <a class="" href="">Account details</a>
                        </li>
                        <li class="link-item">
                            <a href="{{route('customer.address')}}">Address</a>
                        </li>
                        <li class="link-item">
                            <a href="{{route('wishlist')}}">Wishlist</a>
                        </li>
                        <li class="link-item">
                            <a class="" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <em class="icon ni ni-signout"></em><span>Log out</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>

                    <div class="tab-pane" id="account-addresses">
                        <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-map-marker">
                                        <i class="w-icon-map-marker"></i>
                                    </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title mb-0 ls-normal">Addresses</h4>
                            </div>
                        </div>
                        <p>The following addresses will be used on the checkout page
                            by default.</p>
                        <div class="row">
                            <div class="col-sm-12 mb-6">
                                <form action="{{route('customer.address.update',\Illuminate\Support\Facades\Crypt::encryptString($users->id))}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="ecommerce-address billing-address pr-lg-8">
                                        <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>
                                        <div class="row gutter-sm">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>Full name </label>
                                                    <input type="text" class="form-control form-control-md" value="{{old('name', isset($users)?$users->name:null)}}" name="name" id="name">
                                                    @error('name')<i class="text-danger">{{$message}}</i>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gutter-sm">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>Email </label>
                                                    <input type="text" class="form-control form-control-md" value="{{old('email', isset($users)?$users->email:null)}}" name="email" id="email">
                                                    @error('email')<i class="text-danger">{{$message}}</i>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile </label>
                                            <input type="text" placeholder="House number and street name"
                                                   class="form-control form-control-md mb-2" value="{{old('mobile', isset($users)?$users->mobile:null)}}" name="mobile" id="mobile">
                                            @error('mobile')<i class="text-danger">{{$message}}</i>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Country </label>
                                            <div class="select">
                                                <select name="country" id="country" class="form-control form-control-md">
                                                    @if($users->country != null)
                                                        <option value="{{$users->country}}">{{$users->country}}</option>
                                                    @else
                                                        <option value="bangladesh">Bangladesh</option>
                                                        <option value="nepal">Nepal</option>
                                                        <option value="india">India</option>
                                                    @endif
                                                </select>
                                                @error('country')<i class="text-danger">{{$message}}</i>@enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" placeholder="House number and street name"
                                                   class="form-control form-control-md mb-2" value="{{old('city', isset($users)?$users->city:null)}}" name="city" id="city">
                                            @error('city')<i class="text-danger">{{$message}}</i>@enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Address </label>
                                            <input type="text"
                                                   class="form-control form-control-md mb-2" value="{{old('address', isset($users)?$users->address:null)}}" name="address" id="address">
                                            @error('address')<i class="text-danger">{{$message}}</i>@enderror
                                        </div>

                                        <div class="form-group">
                                            <label>State </label>
                                            <input type="text" placeholder="House number and street name"
                                                   class="form-control form-control-md mb-2" value="{{old('state', isset($users)?$users->state:null)}}" name="state" id="state">
                                            @error('state')<i class="text-danger">{{$message}}</i>@enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Zip Code</label>
                                            <input type="text" placeholder="House number and street name"
                                                   class="form-control form-control-md mb-2" value="{{old('zip', isset($users)?$users->zip:null)}}" name="zip" id="zip">
                                            @error('zip')<i class="text-danger">{{$message}}</i>@enderror
                                        </div>
                                        <button type="submit"
                                           class="btn btn-link btn-underline btn-icon-right text-primary">Save Changes<i class="w-icon-long-arrow-right"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->

@endsection
