loadCart();
navCart();

function loadCart() {
    $.ajax({
        method: 'GET',
        url:'/load-cart-data',
        success:function (response) {
            // console.log(response);
            $('.cart-count').html('');
            $('.cart-count').html(response.count);
        }
    })
}

function navCart() {
    $.ajax({
        method: 'GET',
        url:'/ajax-cart-data/',
        dataType: 'json',
        success:function (response) {
            var totalPrice = 0;
            // console.log(response);
            // $('.top-cart').html('');
            // $('.priceCart').html('');
            if (response.cartItem == 0){
                jQuery('.cart-empty').html('<div class="text-center" style="margin-top: 80%"><h3><strong>Your Cart is Empty</strong></h3><i class="cart-empty w-icon-cart font-size-lg"></i><br> <br> <div class="cart-action" style=""><a class="button text-center btn btn-rounded btn-dark" href="'+homeRoute+'">Continue Shopping</a></div></div>')
            }
            else{
                var html = '<div class="products scrollbar" id="style-4" style=" height: 800px; overflow: auto">';
                $.each(response.cartItem, function (key, eachItem) {
                    totalPrice = parseInt(totalPrice)+(parseInt(eachItem.pro_quantity) * parseInt(eachItem.pro_price));
                    // console.log(eachItem.product_name)
                    // $('.top-cart').append();
                    html+='<hr>' +
                        '<div class="product product-cart" style="margin-right: 15px">\n' +
                        '                                <div class="product-detail">\n' +
                        '                                    <a href="javascript:void(0)" class="product-name">'+eachItem.pro_name+'</a>\n' +
                        '                                    <div class="price-box">\n' +
                        '                                        <span class="product-quantity">'+eachItem.pro_quantity+'</span>\n' +
                        '                                        <span class="product-price">£ '+eachItem.pro_price+'</span>\n' +
                        '                                    </div>\n' +
                        '                                </div>\n' +
                        '                                <figure class="product-media">\n' +
                        '                                    <a href="javascript:void(0)">\n' +
                        '                                        <img  src="'+PRODUCT_IMAGE+'/'+eachItem.image+'" alt="product" height="84"' +
                        '                                             width="94" />\n' +
                        '                                    </a>\n' +
                        '                                </figure>\n' +
                        '                                <button type="button" class="btn btn-link btn-close remove-item-cart" data-cart_id="'+eachItem.id+'"  aria-label="button"  >\n' +
                        '                                    <i class="fas fa-times"></i>\n' +
                        '                                </button>\n' +
                        '                            </div>'
                })
                html+='</div>'
                html+='                        <div class="products" >\n' +
                    '                            <div class="cart-total priceCart" style="width: 250px;">\n' +
                    '                                <label>Subtotal:</label>\n' +
                    '                                <span class="price mobile-responsive-price">£ '+totalPrice.toLocaleString()+'</span>\n' +
                    '                            </div>\n' +
                    '\n' +
                    '                            <div class="cart-action">\n' +
                    '                                <a href="'+cartRoute+'" class="btn btn-dark btn-outline btn-rounded">View Cart</a>\n' +
                    '                                <a href="'+checkoutRoute+'" class="btn btn-primary  btn-rounded">Checkout</a>\n' +
                    '                            </div>\n' +
                    '                        </div>';


                jQuery('.itemCart').html(html);
            }
        }
    })
}

$(document).ready(function () {

    $("body").on("click",".remove-item-cart",function(){

        // if(!confirm("Do you really want to do this?")) {
        //     return false;
        // }

        var id = $(this).data("cart_id");
        // var id = $(this).attr('data-id');
        var token = $("meta[name='csrf-token']").attr("content");

        $.ajax(
            {
                url: '/cart-item/delete'+'/'+ id, //or you can use url: "company/"+id,
                method: "POST",
                data: {
                    _token: token,
                    id: id
                },
                success: function (data){
                    // console.log(data);
                    loadCart();
                    navCart();
                }
            });
    });


});




