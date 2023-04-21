<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Register | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset('assets/css/dashlite.css')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('assets/css/theme.css')}}">
</head>

<body class="nk-body bg-white npc-default pg-auth">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- wrap @s -->
        <div class="nk-wrap nk-wrap-nosidebar">
            <!-- content @s -->
            <div class="nk-content ">
                <div class="nk-block nk-block-middle nk-auth-body wide-xs">
                    <div class="brand-logo pb-4 text-center">
                        <a href="html/index.html" class="logo-link">
                            <h4 class="nk-block-title">Seller Registration Form</h4>
                        </a>
                    </div>
                    <div class="card bg-dark-dim">
                        <div class="card-inner card-inner-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Register</h4>
                                    <div class="nk-block-des">
                                        <p>Create New Seller Account</p>
                                    </div>
                                </div>
                            </div>
                            <form action="{{route('registration.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control form-control-lg" id="name" value="{{old('name', isset($user)?$user->name:null)}}" placeholder="Enter User Name">
                                    @error('name')<i class="text-danger">{{$message}}</i>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control form-control-lg" id="email" value="{{old('email', isset($user)?$user->email:null)}}" placeholder="Enter User Email">
                                    @error('email')<i class="text-danger">{{$message}}</i>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="form-label">Mobile No</label>
                                    <input type="text" name="mobile" class="form-control form-control-lg" id="mobile" value="{{old('mobile', isset($user)?$user->mobile:null)}}" placeholder="Enter Your Valid Mobile No">
                                    @error('mobile')<i class="text-danger">{{$message}}</i>@enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="form-control-wrap">
                                        <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter User password">
                                        @error('password')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="password">Confirm Password</label>
                                    <div class="form-control-wrap">
                                        <input type="password" name="password_confirmation" class="form-control form-control-lg" id="password_confirmation" placeholder="Confirm password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-control-xs custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox" required>
                                        <label class="custom-control-label" for="checkbox">I agree to Dashlite <a href="#">Privacy Policy</a> &amp; <a href="#"> Terms.</a></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!}
                                    @error('g-recaptcha-response')<i class="text-danger" style="color: red">{{$message}}</i>@enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-lg btn-primary btn-block">Register</button>
                                </div>
                            </form>
                            <div class="form-note-s2 text-center pt-4"> Already have an account? <a href="{{route('login')}}"><strong>Sign in instead</strong></a>
                            </div>
                            <div class="text-center pt-4 pb-3">
                                <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                            </div>
                            <ul class="nav justify-center gx-4 mb-0">
                                <li class="nav-item" ><a href="{{route('login.facebook')}}" class="btn btn-md btn-block facebook" style="background-color: royalblue"> <span style="color: white">Login with Facebook</span> <i class="fa fa-facebook"></i> </a></li>
                                <li class="nav-item" style="margin-top: 3px"><a href="{{route('login.google')}}" class="btn btn-danger btn-block google-plus"> Login with Google <i class="fa fa-google-plus"></i> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="nk-footer nk-auth-footer-full">
                    <div class="container wide-lg">
                        <div class="row g-3">
                            <div class="col-lg-6 order-lg-last">
                                <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Terms & Condition</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Privacy Policy</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Help</a>
                                    </li>
                                    <li class="nav-item dropup">
                                        <a class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-toggle="dropdown" data-offset="0,10"><span>English</span></a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="language-list">
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="./images/flags/english.png" alt="" class="language-flag">
                                                        <span class="language-name">English</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="./images/flags/spanish.png" alt="" class="language-flag">
                                                        <span class="language-name">Español</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="./images/flags/french.png" alt="" class="language-flag">
                                                        <span class="language-name">Français</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="./images/flags/turkey.png" alt="" class="language-flag">
                                                        <span class="language-name">Türkçe</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <div class="nk-block-content text-center text-lg-left">
                                    <p class="text-soft">&copy; 2019 CryptoLite. All Rights Reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- wrap @e -->
        </div>
        <!-- content @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="{{asset('assets/js/bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>

</html>
