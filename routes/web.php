<?php

use App\Model\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');




//google login
Route::get('login/google', 'Auth\LoginController@redirectToGoogle')->name('login.google');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

//facebook login
Route::get('login/facebook', 'Auth\LoginController@redirectToFacebook')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

Route::resource('registration','RegistrationController');

//admin route
Route::middleware(['auth', 'admin','prevent-back-history'])->group(function (){

    //backup Controller
    Route::resource('backups','Admin\BackupController');
    Route::get('backups/download/{file_name}','Admin\BackupController@download')->name('backups.download');
    Route::post('backups/clean','Admin\BackupController@clean')->name('backups.clean');

    //Cache clear
    Route::post('admin/cache-clear','Admin\CacheController@cacheclear')->name('admin.cacheClear');

    //Admin login
    Route::get('/admin/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');

    //admin Profile Information
    Route::get('admin/view-profile','Admin\DashboardController@viewProfile')->name('admin.view.profile');
    Route::get('admin/view-profile-image','Admin\DashboardController@viewProfileImage')->name('profile.image.upload');
    Route::get('admin/profile-info/edit/{id}','Admin\DashboardController@editProInfo')->name('profile.information.edit');
    Route::put('admin/profile-info/update/{id}','Admin\DashboardController@updateProInfo')->name('profile.information.update');
    Route::put('admin/profile-image/store','Admin\DashboardController@proImageStore')->name('profile.image.store');

    // user
    Route::resource('user', 'Admin\UserController');
    Route::get('admin/vendor/delete/{id}', 'Admin\UserController@delete')->name('admin.vendor.delete');

    //Slider
    Route::resource('admin/slider', 'Admin\SliderController');
    Route::get('admin/slider/delete/{id}', 'Admin\SliderController@deleteSlider')->name('admin.slider.delete');

    //Category
    Route::resource('admin/category', 'Admin\CategoryController');
    Route::get('admin/category/delete/{id}', 'Admin\CategoryController@deleteCat')->name('admin.category.delete');

    //Advertisement-banner
    Route::resource('advertisement-banner', 'Admin\BannerController');
    Route::get('advertisement-banner/delete/{id}', 'Admin\BannerController@deleteBanner')->name('advertisement-banner.delete');

    //brand_commission
    Route::resource('brand-commission', 'Admin\BrandCommissionController');
    Route::get('admin/brand-commission/delete/{id}', 'Admin\BrandCommissionController@deleteBrandCommissionList')->name('admin.brandCommission.delete');

    Route::get('/get/user-list/{id}','Admin\BrandCommissionController@getBrand');

    //delivery_charge
    Route::resource('delivery_charge', 'Admin\DeliveryChargeController');
    Route::get('admin/delivery_charge/delete/{id}', 'Admin\DeliveryChargeController@delete')->name('admin.delivery_charge.delete');

    //Sub Category
    Route::resource('sub-category', 'Admin\SubCategoryController');

    //Campaign
    Route::resource('campaign', 'Admin\CampaignController');
    Route::get('admin/campaign/delete/{id}', 'Admin\CampaignController@delete')->name('admin.campaign.delete');


    //brands
    Route::resource('admin/Brand','Admin\CreateBrandController');
    Route::get('admin/Brand/destroy/{id}','Admin\CreateBrandController@delete')->name('admin.brand.delete');

    //Create new products
    Route::get('admin/products/create', 'Admin\CreateProductController@create')->name('admin.products.create');
    Route::post('admin/products/store', 'Admin\CreateProductController@store')->name('admin.products.store');
    Route::get('admin/products/list', 'Admin\CreateProductController@index')->name('admin.products.index');
    Route::get('admin/products/edit/{id}', 'Admin\CreateProductController@edit')->name('admin.products.edit');
    Route::put('admin/products/update/{id}', 'Admin\CreateProductController@update')->name('admin.products.update');
    Route::get('admin/Products/delete/{id}', 'Admin\CreateProductController@delete')->name('admin.products.delete');
    Route::get('admin/Products/details/{id}', 'Admin\CreateProductController@details')->name('admin.product.details');

    //subscriber view
    Route::get('subscriber','Admin\SubscriberController@index')->name('admin.subscriber');
    Route::get('send-message/subscriber/{id}','Admin\SubscriberController@show')->name('sendMessage.subscriber');
    Route::get('subscriber/delete/{id}','Admin\SubscriberController@delete')->name('delete.subscriber');
    Route::post( 'subscribe-send-email','Admin\SubscriberController@sendEmail')->name('subscriber.send.message');

    //brands approval
    Route::get('brand/approval','Admin\BrandController@index')->name('admin.brand.approval');
    Route::get('brand/edit/{id}','Admin\BrandController@edit')->name('admin.brand.edit');
    Route::put('brand/update/{id}','Admin\BrandController@update')->name('admin.brand.update');
    Route::get('brand/delete/{id}','Admin\BrandController@delete')->name('admin.brand.destroy');

    //products
    Route::get('product/approval','Admin\ProductController@index')->name('admin.product.approval');
    Route::get('product/edit/{id}','Admin\ProductController@edit')->name('admin.product.edit');
    Route::put('product/update/{id}','Admin\ProductController@update')->name('admin.product.update');
    Route::get('admin/products/delete/{id}', 'Admin\ProductController@delete')->name('admin.product.delete');
    Route::get('admin/products/details/{id}', 'Admin\ProductController@details')->name('admin.product.details');

    //attributes
    Route::match(['get','post'], '/admin/add/attributes/{id}','Admin\AttributesController@addAttributes')->name('admin.add.attributes');
    Route::get('/admin/delete/attributes/{id}','Admin\AttributesController@deleteAttribute')->name('admin.delete.attributes');
    Route::get('/admin/edit/attributes/{id}','Admin\AttributesController@editAttribute')->name('admin.edit.attributes');
    Route::put('/admin/update/attributes/{id}','Admin\AttributesController@update')->name('admin.update.attribute');

    //stock Update
    Route::get('admin/stock/product/','Admin\CreateProductController@productList')->name('admin.stock.product');
    Route::get('admin/stock/edit/{id}','Admin\CreateProductController@stockEdit')->name('admin.stock.edit');
    Route::put('admin/stock/update/{id}','Admin\CreateProductController@stockUpdate')->name('admin.stock.update');

    //User Management

        // Add new user on admin panel
        Route::get('admin/create-new-user','Admin\UserManageController@addUser')->name('admin.new.user');
        Route::post('admin/new-user-store','Admin\UserManageController@store')->name('admin.store.user');
        Route::get('admin/user-list','Admin\UserManageController@userList')->name('admin.userList');
        Route::get('admin/edit/user/{id}','Admin\UserManageController@editUser')->name('admin.editUser');
        Route::put('admin/update/user/{id}','Admin\UserManageController@updateUser')->name('admin.updateUser');
        Route::get('admin/delete/user/{id}','Admin\UserManageController@deleteUser')->name('admin.deleteUser');

        //customer manage
        Route::get('admin/customer/list','Admin\UserManageController@customerList')->name('admin.customerList');
        Route::get('admin/edit/customer/{id}','Admin\UserManageController@editCustomer')->name('admin.editCustomer');
        Route::put('admin/update/customer/{id}','Admin\UserManageController@updateCustomer')->name('admin.updateCustomer');
        Route::get('admin/delete/customer/{id}','Admin\UserManageController@deleteCustomer')->name('admin.deleteCustomer');
        Route::get('send-message/customer/{id}','Admin\UserManageController@description')->name('sendMessage.customer');
        Route::post( 'customer-send-email','Admin\UserManageController@sendEmail')->name('customer.send.message');


    //seller manage
        Route::get('admin/seller/list','Admin\UserManageController@sellerList')->name('admin.sellerList');
        Route::get('admin/edit/seller/{id}','Admin\UserManageController@editSeller')->name('admin.editSeller');
        Route::put('admin/update/seller/{id}','Admin\UserManageController@updateSeller')->name('admin.updateSeller');
        Route::get('admin/delete/seller/{id}','Admin\UserManageController@deleteSeller')->name('admin.deleteSeller');

    //Coupons Route
    Route::match(['get','post'],'/admin/add-coupon','Admin\CouponsController@addCoupon')->name('add-coupon');
    Route::match(['get','post'],'/admin/view-coupons','Admin\CouponsController@viewCoupons')->name('view-coupons');
    Route::match(['get','post'],'/admin/edit-coupon/{id}','Admin\CouponsController@editCoupon')->name('edit-coupons');
    Route::get('/admin/delete-coupon/{id}','Admin\CouponsController@deleteCoupon')->name('delete-coupon');
    Route::post('/admin/update-coupon-status','Admin\CouponsController@updateStatus')->name('update-coupon-status');

    //customer Rating route
    Route::get('rating/approval','Admin\RatingController@index')->name('admin.rating.approval');
    Route::get('rating/edit/{id}','Admin\RatingController@edit')->name('admin.rating.edit');
    Route::get('rating/details/{id}','Admin\RatingController@details')->name('admin.rating.details');
    Route::put('rating/update/{id}','Admin\RatingController@update')->name('admin.rating.update');
    Route::get('rating/delete/{id}','Admin\RatingController@delete')->name('admin.rating.delete');

    //orderlist
    Route::get('admin/order-list','Admin\OrderController@index')->name('order.index');
    Route::get('admin/order/details/{id}','Admin\OrderController@show' )->name('admin.order.show');
    Route::put('admin/order/{id}/{status}','Admin\OrderController@change_status' )->name('admin.order.change.status');
    Route::get('admin/orders/export/{status}', 'Admin\OrderController@export')->name('admin.order.export');

    //Invoice
    Route::get('invoice/{id}', 'Admin\OrderController@invoice')->name('invoice');

    //Invoice pdf
    Route::get('pdf/{id}','Admin\OrderController@invoicePdf')->name('invoice-pdf');

    //Invoice print
    Route::get('print/{id}','Admin\OrderController@invoicePrint')->name('invoice-print');

    // Sales Report
    Route::get('daily/report','Admin\OrderController@dailyReport')->name('daily.report');
    Route::get('daily/report/details/{id}','Admin\OrderController@salesDetails')->name('admin.sales.details');
    Route::get('monthly/report','Admin\OrderController@monthlyReport')->name('monthly.report');
    Route::get('yearly/report','Admin\OrderController@yearlyReport')->name('yearly.report');

});


//vendor route
Route::middleware(['auth', 'vendor','prevent-back-history'])->group(function (){

    //Seller Message
    Route::get('customer-message','Vendor\CustomerMessageController@index')->name('vendor.customerMessage');
    Route::get('send-message/customer/{id}','Vendor\CustomerMessageController@show')->name('sendMessage.customer');
    Route::get('message/details/{id}', 'Vendor\CustomerMessageController@details')->name('customerMessage.details');
//    Route::get('customer/delete/{id}','Admin\CustomerMessageController@delete')->name('delete.customer.message');
    Route::post( 'customer-send-email','Vendor\CustomerMessageController@sendEmail')->name('customer.send.message');

    //Cache clear
    Route::post('vendor/cache-clear','Vendor\CacheController@cacheclear')->name('vendor.cacheClear');


    Route::resource('vendor/information', 'Vendor\InformationController');
    Route::get('vendor/dashboard', 'Vendor\DashboardController@index')->name('vendor.dashboard');

    //admin Profile Information
    Route::get('vendor/view-profile','Vendor\DashboardController@viewProfile')->name('vendor.view.profile');
    Route::get('vendor/view-profile-image','Vendor\DashboardController@viewProfileImage')->name('vendor.profile.image.upload');
    Route::get('vendor/profile-info/edit/{id}','Vendor\DashboardController@editProInfo')->name('vendor.profile.information.edit');
    Route::put('vendor/profile-info/update/{id}','Vendor\DashboardController@updateProInfo')->name('vendor.profile.information.update');
    Route::put('vendor/profile-image/store','Vendor\DashboardController@proImageStore')->name('vendor.profile.image.store');

    //brands
    Route::resource('brand','Vendor\BrandController');
    Route::get('vendor/brand/delete/{id}','Vendor\BrandController@delete')->name('vendor.brand.delete');


    //Campaign
    Route::get('vendor-campaign-list','Vendor\CampaignController@list')->name('vendor.campaign.list');
    Route::get('all-products','Vendor\CampaignController@allProducts')->name('vendor.campaign.allProduct');
    Route::get('add/campaign/{id}','Vendor\CampaignController@addcampaign')->name('vendor.add.campaign');
    Route::post('add/product/campaign/store','Vendor\CampaignController@addProductcampaign')->name('addProduct.campaign');
    Route::get('campaign/product/list','Vendor\CampaignController@campaignProList')->name('campaign.product.list');

    //products
    Route::resource('vendor/products', 'Vendor\ProductController');
    Route::get('vendor/products/delete/{id}', 'Vendor\ProductController@delete')->name('products.delete');
    Route::get('vendor/products/details/{id}', 'Vendor\ProductController@details')->name('vendor.product.details');

    //attributes
    Route::match(['get','post'], '/add/attributes/{id}','Vendor\AttributesController@addAttributes')->name('add.attributes');
    Route::get('/delete/attributes/{id}','Vendor\AttributesController@deleteAttribute')->name('delete.attributes');
    Route::get('/edit/attributes/{id}','Vendor\AttributesController@editAttribute')->name('edit.attributes');
    Route::put('/update/attributes/{id}','Vendor\AttributesController@update')->name('update.attribute');

//    //Gallery Image
//    Route::match(['get','post'], '/add/gallery-image/{id}','Vendor\GalleryImageController@addimage')->name('add.image');
//    Route::get('/delete/gallery-image/{id}','Vendor\GalleryImageController@deleteimage')->name('delete.image');
//    Route::get('/edit/gallery-image/{id}','Vendor\GalleryImageController@editimage')->name('edit.image');
//    Route::put('/update/gallery-image/{id}','Vendor\GalleryImageController@update')->name('update.image');

    //stock Update
    Route::get('stock/product/','Vendor\ProductController@productList')->name('stock.product');
    Route::get('stock/edit/{id}','Vendor\ProductController@stockEdit')->name('stock.edit');
    Route::put('stock/update/{id}','Vendor\ProductController@stockUpdate')->name('stock.update');

    //order
    Route::get('vendor/order-list','Vendor\OrderController@index')->name('vendor.order.index');
    Route::get('vendor/order/details/{id}','Vendor\OrderController@show' )->name('vendor.order.show');

    // Sales Report
    Route::get('vendor/daily/report','Vendor\OrderController@dailyReport')->name('vendor.daily.report');
    Route::get('vendor/monthly/report','Vendor\OrderController@monthlyReport')->name('vendor.monthly.report');
    Route::get('vendor/yearly/report','Vendor\OrderController@yearlyReport')->name('vendor.yearly.report');

    //withdraw
    Route::get('pay-out/info','Vendor\WithdrawController@info')->name('vendor.payout.info');

});

//front route

Route::get('/','Front\HomeController@index')->name('Home');

Route::get('shop','Front\HomeController@fetch_all_product')->name('front.shop');
Route::get('category-product/{id}','Front\HomeController@fetch_category_product')->name('category.product');
Route::get('/product/details/{id}/','Front\HomeController@productDetails')->name('product.details');
Route::get('campaign/product/details/{id}/','Front\CampaignController@campaignProductDetails')->name('campaign.product.details');
Route::get('vendor/details/{id}','Front\HomeController@vendorDetails')->name('vendor.details');
Route::get('get-product-price','Front\HomeController@getprice')->name('get.price');
Route::get('get-product-stock','Front\HomeController@getstock')->name('get.stock');


//add to cart with php
Route::post( '/add-to-cart','Front\CartController@addCart')->name('addToCart');
Route::match(['get','post'], '/cart','Front\CartController@Cart')->name('Cart');
Route::post( '/cart/delete-products/{id}','Front\CartController@delete')->name('delete.cart.product');
Route::get( '/update/quantity/increment/{id}/{quantity}','Front\CartController@increment')->name('cart.quantity.increment');
Route::get( '/update/quantity/decrement/{id}/{quantity}','Front\CartController@decrement')->name('cart.quantity.decrement');

//coupon apply in ajax
//Route::post('/cart/apply-coupon','Front\CuponsController@applyCoupon');

//coupon apply in php
Route::post('/cart/apply-coupon/php','Front\CuponsController@applyCouponPhp')->name('cart.applyCoupon.php');

//update cart quantity with ajax
Route::post( '/update-cart-item-qty-ajax','Front\CartController@updateCartQtyAjax');
//delete cart item with ajax
Route::post( '/delete-cart-item-ajax','Front\CartController@deleteCartItem');

Route::post('/rating-store','Front\RatingController@addRating')->name('rating.store');
Route::post('/update-wish-list','Front\HomeController@updateWishlist');
Route::get('/wishlist','Front\WishlistController@index')->name('wishlist');
Route::post( 'delete-wishlist-product/{id}','Front\WishlistController@delete')->name('delete.wishlist.product');
Route::post('/update-compare-list','Front\HomeController@updateComparelist');
Route::get('/compare-list','Front\HomeController@compareList')->name('compares');
Route::post( 'delete-compare-product/{id}','Front\HomeController@compareProductDelete')->name('delete.compare.product');
Route::post('/billing-address','Front\CheckoutController@store')->name('billingAddress.store');


//cart add Product with ajax
Route::post( '/add-cart-item','Front\CartController@ajaxCart')->name('add-cart-ajax');

//cart details with ajax
Route::get( '/cart-item-details','Front\CartController@cart');

//remove cart item with ajax
Route::post( 'cart-item/delete/{id}','Front\CartController@item')->name('remove-cart-item');

//cart item count with ajax
Route::get( 'load-cart-data','Front\CartController@cartCount');

//cart item display topNav with ajax
Route::get( '/ajax-cart-data','Front\CartController@ajaxCartDataTopNav');

//delivery charge with ajax
Route::post( '/del-charge-ajax','Front\CartController@ajaxDelCharge');

//success route
Route::get('success','Front\CheckoutController@success')->name('success');
Route::get('online/payment','Front\CheckoutController@onlinePayment')->name('online_payment');

//front cusstomer reg/login
Route::resource('customer','Front\CustomerController');

//Customer Account information
Route::middleware('auth','prevent-back-history')->group(function (){
    Route::match(['get','post'],'/checkout','Front\CheckoutController@index')->name('checkout');
    Route::get('dashboard/{id}','Front\DashboardController@index')->name('customer.dashboard');
    Route::get('/orders','Front\DashboardController@orders')->name('customer.orders');
    Route::get('/orders/details/{id}','Front\DashboardController@details')->name('customer.orders.details');
    Route::get('/address','Front\DashboardController@address')->name('customer.address');
    Route::get('/edit-address/{id}','Front\DashboardController@edit')->name('customer.edit.address');
    Route::post('/address/update/{id}','Front\DashboardController@update')->name('customer.address.update');
});

//Product Search
Route::match(['get','post'],'/search','Front\HomeController@search')->name('front.product.search');
Route::get('/all-categories','Front\HomeController@categories')->name('all.categories');
Route::get('/all-brands','Front\HomeController@brands')->name('all.brands');
Route::get('/single-brand/{id}','Front\HomeController@singleBrand')->name('single.brand');
Route::post('/contact-vendor','Front\HomeController@contactVendor')->name('contact.vendor');
Route::post('/load-more-data','Front\HomeController@loadMoreData')->name('load-more-data');
//Route::post('/load-more-data-ajax','Front\HomeController@loadMoreProduct')->name('load-more-product');

//Campaign list display frontend
Route::get('campaign-list','Front\CampaignController@show')->name('front-campaign-lst');
Route::get('campaign-details/{id}','Front\CampaignController@details')->name('front-campaign-details');

//track order
Route::get('track-order','Front\HomeController@trackOrderView')->name('trackOrder');
Route::get('track/order/status','Front\HomeController@trackOrder')->name('track.order.search');

//subscribe-newsletter
Route::post( '/subscribe-newsletter','Front\HomeController@addSubscriber');

Route::post( '/login-ajax','Front\HomeController@login');
Route::post( '/register-ajax','Front\HomeController@register');

//delete all cartItem
Route::post('delete-all-cartItem','Front\CartController@delAllCartItem')->name('deleteAll.cartItem');

