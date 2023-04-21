@extends('front.layouts.master')
@section('content')
    <!-- Start of Main -->
    <main class="main login-page">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Register Account</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="">Home</a></li>
                    <li>Login</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->
        <div class="page-content">
            <div class="container">
                <div class="login-popup">
                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <ul class="nav nav-tabs text-uppercase" role="tablist">
                            <li class="nav-item">
                                <a href="#sign-up" class="nav-link">Sign Up</a>
                            </li>
                        </ul>
                        <div class=" align-items-center">
                            <form method="post" action="{{route('customer.store')}}">
                                @csrf
                                <div class="tab-pane " id="">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" id="username" >
                                        @error('username')<i class="text-danger" style="color: red">{{$message}}</i>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" id="email" >
                                        @error('email')<i class="text-danger" style="color: red">{{$message}}</i>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" class="form-control" name="mobile" id="mobile" >
                                        @error('mobile')<i class="text-danger" style="color: red">{{$message}}</i>@enderror
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" id="password" >
                                        @error('password')<i class="text-danger" style="color: red">{{$message}}</i>@enderror
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Confirmed Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" id="confirmed_password" >
                                    </div>
                                    <div class="form-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-checkbox" id="remember1" name="remember1">
                                        <label for="remember1">Remember me</label>
                                        <a href="{{route('password.request')}}">Forget your password?</a>
                                    </div>
                                    <div class="form-group mb-0">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
                                        @error('g-recaptcha-response')<i class="text-danger" style="color: red">{{$message}}</i>@enderror
                                    </div>
                                    <div class="form-note-s2 text-center pt-4"> You have already an account? <a href="{{route('login')}}">Sign In</a>
                                    </div>
                                    <br>
                                    <button class="btn btn-primary">Sign Up</button>
                                </div>
                            </form>
                        </div>
                        <p class="text-center">Sign in with social account</p>
                        <div class="social-icons social-icon-border-color d-flex justify-content-center">
                            <a href="javascript:void(0)" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="javascript:void(0)" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="javascript:void(0)" class="social-icon social-google fab fa-google"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End of Main -->
@endsection
