{{--<!-- Plugin JS File -->--}}
{{--<script src="{{asset('front/assets/vendor/jquery/jquery.min.js')}}"></script>--}}
{{--<script src="{{asset('front/assets/vendor/sticky/sticky.min.js')}}"></script>--}}
{{--<script src="{{asset('front/assets/vendor/jquery.plugin/jquery.plugin.min.js')}}"></script>--}}
{{--<script src="{{asset('front/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>--}}
{{--<script src="{{asset('front/assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>--}}
{{--<script src="{{asset('front/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>--}}
{{--<script src="{{asset('front/assets/vendor/zoom/jquery.zoom.js')}}"></script>--}}
{{--<script src="{{asset('front/assets/vendor/photoswipe/photoswipe.min.js')}}"></script>--}}
{{--<script src="{{asset('front/assets/vendor/photoswipe/photoswipe-ui-default.min.js')}}"></script>--}}
{{--<script src="{{asset('front/assets/js/main.min.js')}}"></script>--}}


<!-- Plugin JS File -->
<script src="{{asset('front/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('front/assets/vendor/sticky/sticky.js')}}"></script>
<script src="{{asset('front/assets/vendor/jquery.plugin/jquery.plugin.min.js')}}"></script>
<script src="{{asset('front/assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('front/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('front/assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('front/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('front/assets/vendor/zoom/jquery.zoom.js')}}"></script>
<script src="{{asset('front/assets/vendor/photoswipe/photoswipe.min.js')}}"></script>
<script src="{{asset('front/assets/vendor/photoswipe/photoswipe-ui-default.min.js')}}"></script>
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<!-- Swiper JS -->
<script src="{{asset('front/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


<!-- Main JS File -->
<script src="{{asset('front/assets/js/main.min.js')}}"></script>
<script src="{{asset('front/assets/js/TimeCircles.js')}}"></script>

<script>

    $(document).ready(function() {
        $('#summernote').summernote();
    });

    $(document).ready(function (){
        $("#sort").on('change',function (){
            this.form.submit();
        })
    })

    $(document).ready(function () {

        $('.increment-btn').click(function (e) {
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value<10){
                value++;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }

        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });

    });


    $(document).on('click','.btnItemUpdate',function () {

        if($(this).hasClass('qtyMinus')){
            var quantity = $(this).prev().prev().val();
            if(quantity <= 1){
                Command: toastr["error"]("item quantity must be 1 or greater!")

                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "3000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                return false;
            }
            else{
                new_qty = parseInt(quantity)-1;
            }
        }
        if($(this).hasClass('qtyPlus')){
            var quantity = $(this).prev().val();
                new_qty = parseInt(quantity)+1;
        }
        var cartId = $(this).data('cartid');
        $.ajax({
            data:{
                "cartid": cartId,
                "qty": new_qty,
                "_token": "{{ csrf_token() }}",
            },
            url:'/update-cart-item-qty-ajax',
            type: 'post',
            success:function (resp) {
                // alert(data);
                // $('#appendCartItem').html(resp.item);
                if(resp.status == false){

                    Command: toastr["error"]("product stock not available")

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
                $('#appendCartItem').html(resp.item);
                loadCart();
                navCart();
            },
            error:function () {
                alert("Error");
            }
        })
    });

    $(document).on('click','.remove-item-cart',function () {

        var cartId = $(this).data("cart_id");
        // var cartId = $(this).data('cartid');
        // var result = confirm("want to delete this cart item");
            $.ajax({
                data:{
                    "cartid": cartId,
                    "_token": "{{ csrf_token() }}",
                },
                url:'/delete-cart-item-ajax',
                type: 'post',
                success:function (resp) {
                    $('#appendCartItem').html(resp.item);
                    loadCart();
                    navCart();
                },
                error:function () {
                    alert("Error");
                }
            })
    });

    //apply coupon in ajax
    {{--$('#applyCoupon').on('submit',function(e){--}}
    {{--    e.preventDefault();--}}
    {{--    var user = $(this).attr("user");--}}
    {{--   if(user == 1){--}}

    {{--   }--}}
    {{--   else {--}}
    {{--    alert("please login to apply coupon");--}}
    {{--    return false;--}}
    {{--   }--}}
    {{--   var coupon_code = $("#coupon_code").val();--}}
    {{--    $.ajax({--}}
    {{--        data:{--}}
    {{--            "coupon_code": coupon_code,--}}
    {{--            "_token": "{{ csrf_token() }}",--}}
    {{--        },--}}
    {{--        url:'/cart/apply-coupon',--}}
    {{--        type: 'post',--}}
    {{--        success:function (resp) {--}}
    {{--            if (resp.message!=""){--}}
    {{--                alert(resp.message);--}}
    {{--            }--}}
    {{--            $('#appendCartItem').html(resp.item);--}}
    {{--            loadCart();--}}
    {{--            navCart();--}}
    {{--        },--}}
    {{--        error:function () {--}}
    {{--            alert("Error");--}}
    {{--        }--}}
    {{--    })--}}
    {{--})--}}

    $(".userLogin").click(function () {
        Command: toastr["warning"]("Login to add products in your Wishlist")

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    });
    $(".updateWishlist").click(function () {
        var product_id = $(this).data('pro_id');
        $.ajax({
            type: 'post',
            url:'/update-wish-list',
            data:{
                "_token": "{{ csrf_token() }}",
                'product_id':product_id
                },
            success:function (resp) {
               if(resp.action== 'add'){
                    $('button[data-pro_id='+product_id+']').html('<i class="w-icon-heart-full"></i>');
                   Command: toastr["success"]("Product added wishlist")

                   toastr.options = {
                       "closeButton": false,
                       "debug": false,
                       "newestOnTop": false,
                       "progressBar": true,
                       "positionClass": "toast-top-right",
                       "preventDuplicates": false,
                       "onclick": null,
                       "showDuration": "300",
                       "hideDuration": "1000",
                       "timeOut": "3000",
                       "extendedTimeOut": "1000",
                       "showEasing": "swing",
                       "hideEasing": "linear",
                       "showMethod": "fadeIn",
                       "hideMethod": "fadeOut"
                   }
               }else if (resp.action== 'remove'){
                   $('button[data-pro_id='+product_id+']').html('<i class="w-icon-heart"></i>');
                   Command: toastr["error"]("Product remove from wishlist")

                   toastr.options = {
                       "closeButton": false,
                       "debug": false,
                       "newestOnTop": false,
                       "progressBar": true,
                       "positionClass": "toast-top-right",
                       "preventDuplicates": false,
                       "onclick": null,
                       "showDuration": "300",
                       "hideDuration": "1000",
                       "timeOut": "3000",
                       "extendedTimeOut": "1000",
                       "showEasing": "swing",
                       "hideEasing": "linear",
                       "showMethod": "fadeIn",
                       "hideMethod": "fadeOut"
                   }
               }
            },error:function () {
                alert('error');
            }
        })
    });

    $(".updateCompare").click(function () {
        var product_id = $(this).data('product_id');
        $.ajax({
            type: 'post',
            url:'/update-compare-list',
            data:{
                "_token": "{{ csrf_token() }}",
                'product_id':product_id
            },
            success:function (resp) {
                if(resp.action== 'add') {
                    $('button[data-product_id=' + product_id + ']').html('<i class="w-icon-check-solid"></i>');
                    Command: toastr["success"]("Product added compare list")

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
                // else if (resp.action== 'remove'){
                //     $('a[data-productid='+product_id+']').html('');
                // }
            },error:function () {
                alert('error');
            }
        })
    });

    $(".updateCart").click(function () {
        var product_id = $(this).data('cart_pro_id');
        var product_price = $(this).data('productprice');
        var category_id = $(this).data('category_id');
        var brand_id = $(this).data('brand_id');
        var product_name = $(this).data('product_name');
        var product_code = $(this).data('product_code');
        $.ajax({
            type: 'post',
            url:'/add-cart-item',
            data:{
                "_token": "{{ csrf_token() }}",
                'product_id':product_id,
                'product_price':product_price,
                'category_id':category_id,
                'brand_id':brand_id,
                'product_name':product_name,
                'product_code':product_code,
                'product_qty':1,
            },
            success:function (resp) {
                if(resp.action== 'add') {
                    $('button[data-cart_pro_id=' + product_id + ']').html('');
                    Command: toastr["success"]("Item added to your cart")

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
                else{
                        Command: toastr["error"]("The product has already added into cart")

                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "3000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                }
                loadCart();
                navCart()
                // else if (resp.action== 'remove'){
                //     $('a[data-productid='+product_id+']').html('');
                // }
            },error:function () {
            }
        })
    });

    $("#cart").click(function(){
    });

    $("#billtoship").click(function(){
        if(this.checked){
            $("#shipping_name").val($("#billing_name").val());
            $("#shipping_country").val($("#billing_country").val());
            $("#shipping_address").val($("#billing_address").val());
            $("#shipping_city").val($("#billing_city").val());
            $("#shipping_zip").val($("#billing_zip").val());
            $("#shipping_state").val($("#billing_state").val());
            $("#shipping_phone").val($("#billing_mobile").val());
            $("#shipping_email").val($("#billing_email").val());
        }else{
            $("#shipping_name").val('');
            $("#shipping_country").val('');
            $("#shipping_address").val('');
            $("#shipping_city").val('');
            $("#shipping_zip").val('');
            $("#shipping_state").val('');
            $("#shipping_phone").val('');
        }

    });

    //calculate shipping charges and update grand total without ajax
    // $("input[name=delivery_charge]").bind('change',function () {
    //     var shipping_charge = $(this).data("shipping_charge");
    //     var total_price = $(this).attr("total_amount");
    //     var grand_total = parseInt(total_price) + parseInt(shipping_charge);
    //     $(".grand_total").html("$" +grand_total);
    // });

    //calculate shipping charges and update grand total with ajax
    $(document).ready(function () {

        $("body").on("click",".delivery_charge_ajax",function(){

            // if(!confirm("Do you really want to do this?")) {
            //     return false;
            // }

            var delicharge = $(this).data("value");
            // var id = $(this).attr('data-id');
            var token = $("meta[name='csrf-token']").attr("content");

            $.ajax(
                {
                    method: 'POST',
                    url:'/del-charge-ajax',
                    data: {
                        _token: token,
                        delivery_Charge: delicharge,
                    },
                    success: function (data){
                        // console.log(data);

                    }
                });

            var shipping_charge = $(this).data("value");
            var total_price = $(this).attr("total_amount");
            var grand_total = parseInt(total_price) + parseInt(shipping_charge);
            $(".grand_total").html("$" +grand_total);

        });


    });
    //
    // function loadMoreProduct(page) {
    //     $.ajax({
    //         type: "get",
    //         url: "?page=" + page,
    //         beforeSend: function (response) {
    //             $('#ajax-load-more-product').show();
    //             // $('#ajax-load-more-product').hide();
    //
    //         }
    //     })
    //
    //         .done(function (data) {
    //             if (data.products == " "){
    //                 $('#ajax-load-more-product').html('No More Product Found');
    //                 return;
    //             }
    //
    //             $('#ajax-load-more-product').hide();
    //
    //             $('#load-products').append(data.products);
    //         })
    //
    //         .fail(function () {
    //             alert('Something Went Wrong')
    //         })
    //
    // }
    // var page = 1;
    // $(window).scroll(function () {
    //     if($(window).scrollTop() + 100 + $(window).height() >= $(document).height()){
    //         page ++ ;
    //         loadMoreProduct(page);
    //     }
    // });

    $(document).ready(function () {

        // var endTime = $('[data-countdown]').data("countdown");
        // // console.log(endTime);
        // $('#getting-started').countdown('12/10/2022', function(event) {
        //     $(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
        // });
        $(".example").TimeCircles({ time: {
                Days: { color: "#C0C8CF" },
                Hours: { color: "#C0C8CF" },
                Minutes: { color: "#C0C8CF" },
                Seconds: { color: "#C0C8CF" }
            }});
    });

    $('#subscriber').on('submit',function (e) {
        e.preventDefault();
        var data = $('#subscribe_email').val();

        var token = $("meta[name='csrf-token']").attr("content");

        $.ajax(
            {
                method: 'POST',
                url:'/subscribe-newsletter',
                data: {
                    _token: token,
                    email: data,
                },
                success: function (response){
                    // console.log(response.status);
                    if (response.status == 200) {
                        Command: toastr["success"]("Thanks for subscription")

                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "3000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        $('#subscribe_email').val("");
                        $('button[data-cart_pro_id=' + product_id + ']').html('');
                    }
                },error:function () {
                    Command: toastr["error"]("The email has already been taken")

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    $('#subscribe_email').val("");
                    $('button[data-cart_pro_id=' + product_id + ']').html('');
                }
            });
    });

    $(document).on("submit","#handleAjax",function(e) {
        e.preventDefault();

        var email = $('#login_email').val();
        var pass = $('#login_password').val();
        var token = $("meta[name='csrf-token']").attr("content");

        $.ajax(
            {
                method: 'POST',
                url:'/login-ajax',
                dataType: 'json',
                data: {
                    _token: token,
                    email: email,
                    pass: pass,
                },
                success: function (response){
                    // console.log(data);
                    // console.log(response);
                    if(response == 1)
                    {
                        Command: toastr["success"]("Login successfully")

                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "3000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        window.location.replace('{{route('Cart')}}');
                    }
                    else if(response == 3)
                    {
                        $("#err").hide().html("Username or Password  Incorrect or please select captcha . Please Check").fadeIn('slow');
                    }
                }
            });
    });

    $(document).on("submit","#registerAjax",function(e) {
        e.preventDefault();
        var name = $('#register_username').val();
        var email = $('#register_email').val();
        var mobile = $('#register_mobile').val();
        var pass = $('#register_password').val();
        var token = $("meta[name='csrf-token']").attr("content");

        $.ajax(
            {
                method: 'POST',
                url:'/register-ajax',
                // dataType: 'json',
                data: {
                    _token: token,
                    name: name,
                    mobile: mobile,
                    email: email,
                    password: pass,
                },
                success: function (response){
                    // console.log(response);
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<div style="color: red">' + err_value + '</div>');
                        });
                    } else {
                        Command: toastr["success"]("Registration successfully done")

                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "3000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        $('#save_msgList').html("");
                        window.location.replace('{{route('Cart')}}');
                    }
                }
            });
    });
</script>

