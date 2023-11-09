<!-- Start of Footer -->
<footer class="footer">
    <div class="footer-newsletter pt-6 pb-6" style="background-color: darkgrey">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="icon-box icon-box-side text-white">
                        <div class="icon-box-icon d-inline-flex">
                            <i class="w-icon-envelop3"></i>
                        </div>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title text-white text-uppercase mb-0">Subscribe To  Our Newsletter</h4>
                            <p class="text-white">Get all the latest information on Events, Sales and Offers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-9 mt-4 mt-lg-0 ">
                    <form action="#" method="get" class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                        <input type="email" class="form-control mr-2 bg-white" name="email" id="email"
                               placeholder="Your E-mail Address" />
                        <button class="btn btn-dark btn-rounded" type="submit">Subscribe<i
                                class="w-icon-long-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="widget widget-about">
                        <a href="{{ route('Home') }}" class="logo-footer">
                            <img src="{{asset('front/assets/images/logo2.png')}}" alt="logo" />
                        </a>
                        {{-- <div class="widget-body">
                            <p class="widget-about-title">Got Question? Call us 24/7</p>
                            <a href="tel:18005707777" class="widget-about-call">1-800-570-7777</a>
                            <p class="widget-about-desc">Register now to get updates on pronot get up icons
                                & coupons ster now toon.
                            </p>

                            <div class="social-icons social-icons-colored">
                                <a href="javascript:void(0)" class="social-icon social-facebook w-icon-facebook"></a>
                                <a href="javascript:void(0)" class="social-icon social-twitter w-icon-twitter"></a>
                                <a href="javascript:void(0)" class="social-icon social-instagram w-icon-instagram"></a>
                                <a href="javascript:void(0)" class="social-icon social-youtube w-icon-youtube"></a>
                                <a href="javascript:void(0)" class="social-icon social-pinterest w-icon-pinterest"></a>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h3 class="widget-title">Company</h3>
                        <ul class="widget-body">
                            <li><a href="{{ route('aboutUs') }}">About Us</a></li>
                            <li><a href="javascript:void(0)">Team Member</a></li>
                            <li><a href="javascript:void(0)">Career</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li><a href="javascript:void(0)">Affilate</a></li>
                            <li><a href="javascript:void(0)">Order History</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">My Account</h4>
                        <ul class="widget-body">
                            <li><a href="javascript:void(0)">Track My Order</a></li>
                            <li><a href="javascript:void(0)">View Cart</a></li>
                            <li><a href="javascript:void(0)">Sign In</a></li>
                            <li><a href="javascript:void(0)">Help</a></li>
                            <li><a href="javascript:void(0)">My Wishlist</a></li>
                            <li><a href="javascript:void(0)">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Customer Service</h4>
                        <ul class="widget-body">
                            <li><a href="javascript:void(0)">Payment Methods</a></li>
                            <li><a href="javascript:void(0)">Money-back guarantee!</a></li>
                            <li><a href="javascript:void(0)">Product Returns</a></li>
                            <li><a href="javascript:void(0)">Support Center</a></li>
                            <li><a href="javascript:void(0)">Shipping</a></li>
                            <li><a href="javascript:void(0)">Term and Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-left">
                <p class="copyright">Copyright © <script>document.write(new Date().getFullYear());</script> Afribazaar Online Shop. All Rights Reserved.</p>
            </div>
            <div class="widget-body" style="margin-left: 50px">
                {{-- <p class="widget-about-title">Got Question? Call us 24/7</p>
                <a href="tel:18005707777" class="widget-about-call">1-800-570-7777</a>
                <p class="widget-about-desc">Register now to get updates on pronot get up icons
                    & coupons ster now toon.
                </p> --}}

                <div class="social-icons social-icons-colored">
                    <a href="javascript:void(0)" class="social-icon social-facebook w-icon-facebook"></a>
                    <a href="javascript:void(0)" class="social-icon social-twitter w-icon-twitter"></a>
                    <a href="javascript:void(0)" class="social-icon social-instagram w-icon-instagram"></a>
                    <a href="javascript:void(0)" class="social-icon social-youtube w-icon-youtube"></a>
                    <a href="javascript:void(0)" class="social-icon social-pinterest w-icon-pinterest"></a>
                </div>
            </div>
            <div class="footer-right">
                <span class="payment-label mr-lg-8">We're using safe payment for</span>
                <figure class="payment">
                    <img src="{{asset('front/assets/images/ssl-mobile.png')}}" alt="payment" width="350" height="25" />
                </figure>
            </div>
        </div>
    </div>
</footer>
<!-- End of Footer -->
