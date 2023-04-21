@extends('front.layouts.master')
@section('content')

    <!-- Start of Main -->
    <main class="main cart">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="active"><a href="{{route('front.shop')}}">Shopping Cart</a></li>
                    @if(count($carts) > 0)
                    @if(auth()->check())
                    <li><a href="{{route('checkout')}}">Checkout</a></li>
                    @else
                        <li><a href="javascript:void(0)">Checkout</a></li>
                    @endif
                    @endif
                    <li><a href="javascript:void(0)">Order Complete</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content" id="appendCartItem">
            @include('front.ajax-cartItem')
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
    <!-- Modal -->
        <!-- Modal -->
        <div id="ex1" class="modal">
            <div id="err" style="color: red"></div>
            <form method="POST" id="handleAjax">
                <div class="tab-content">
                    <div class="tab-pane active" id="sign-in">
                        <div class="form-group">
                            <label>Email address </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror " name="email" id="login_email"   value="{{ old('email') }}" required autocomplete="email" autofocus >
                            @error('email')
                            <span  class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <label>Password </label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror " name="password" id="login_password"  required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                            @enderror
                        </div>
                        <div class="form-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >
                            <label for="remember1">Remember me</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">Forget your password?</a>
                            @endif
                        </div>
                        <div class="form-note-s2 text-center pt-4"> New on our platform? <a href="#ex2" rel="modal:open">Create an account</a>
                        </div>
                        <br>
                        <div class="form-group mb-0">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                            @error('g-recaptcha-response')<i class="text-danger" style="color: red">{{$message}}</i>@enderror
                        </div>
                        <button  class="btn btn-primary">Sign In</button>
                    </div>
                </div>
            </form>
            <a href="#" rel="modal:close">Close</a>
        </div>

    <div id="ex2" class="modal" style="margin-top: 40px; margin-bottom: 20px">
        <div id="save_msgList"></div>
        <form method="post" id="registerAjax" >
            @csrf
            <div class="tab-pane " id="">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="register_username" name="user_name">
                    @error('user_name')<i class="text-danger">{{$message}}</i>@enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="register_email" name="email">
                    @error('email')<i class="text-danger">{{$message}}</i>@enderror
                </div>
                <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" class="form-control" name="mobile" id="register_mobile" >
                    @error('mobile')<i class="text-danger">{{$message}}</i>@enderror
                </div>
                <div class="form-group mb-0">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="register_password" >
                    @error('password')<i class="text-danger">{{$message}}</i>@enderror
                </div>
                <div class="form-checkbox d-flex align-items-center justify-content-between">
                    <input type="checkbox" class="custom-checkbox" id="remember1" name="remember1">
                    <label for="remember1">Remember me</label>
                    <a href="{{route('password.request')}}">Forget your password?</a>
                </div>
                <div class="form-note-s2 text-center pt-4"> You have already an account? <a href="#ex1" rel="modal:open">Sign In</a>
                </div>
                <br>
                <div class="form-group mb-0">
                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}
                    @error('g-recaptcha-response')<i class="text-danger" style="color: red">{{$message}}</i>@enderror
                </div>
                <button type="submit" value="submit" class="btn btn-primary">Sign Up</button>
            </div>
        </form>
        <a href="#" rel="modal:close">Close</a>
    </div>
@endsection
