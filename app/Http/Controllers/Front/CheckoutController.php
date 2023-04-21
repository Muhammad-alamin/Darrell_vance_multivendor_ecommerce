<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\BillingAddress;
use App\Model\Brand;
use App\Model\BrandCommission;
use App\Model\Cart;
use App\Model\Category;
use App\Model\DeliveryCharge;
use App\Model\Order;
use App\Model\OrderDetails;
use App\Model\Product;
use App\Model\ShippingAddress;
use App\User;
use App\VendorProfit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function index(Request $request){
            $data = $request->all();
//        echo "<pre>";print_r($data);die;
        $session_id = Session::get('session_id');
        if (Auth::check()){
            $user_id = Auth::user()->id;
            $userInformation = User::findorFail($user_id);
//            $delivery_charge = $request['delivery_charge'];
            $delivery_charge = DeliveryCharge::all();;
            $user_email = Auth::user()->email;
            $userDetails = User::find($user_id);
            $userCart = DB::table('carts')->where(['session_id' =>$session_id])->get();
            $cartItem = Cart::where('session_id',$session_id)->sum('pro_quantity');
            foreach($userCart as $key=>$product){
                $productDetails = Product::where('id',$product->pro_id)->first();
                $userCart[$key]->image = $productDetails->product_thumbnail_image;
            }
           // return view('wayshop.products.order_review')->with(compact('userDetails','shippingDetails','userCart'));
            return view('front.checkout')->with(compact('userInformation','userDetails','userCart','delivery_charge','cartItem') );
        }
        else{
            return view('front.checkout');
        }
    }

    public function store(Request $request){
//        $request->validate([
//            'billing_name' => 'required',
//            'billing_email' => 'required',
//            'billing_mobile' => 'required',
//            'billing_address' => 'required',
//            'billing_city' => 'required',
//            'billing_state' => 'required',
//            'billing_zip' => 'required',
//
//            'shipping_name' => 'required',
//            'shipping_mobile' => 'required',
//            'shipping_address' => 'required',
//            'shipping_city' => 'required',
//            'shipping_state' => 'required',
//            'shipping_zip' => 'required',
//        ]);

            $data = $request->all();
            $user_email = Auth::user()->email;
//        echo "<pre>";print_r($data);die;


            $billingAddress = new BillingAddress();

            $billingAddress->user_id = Auth::user()->id;
            $billingAddress->name = $request->billing_name;
            $billingAddress->email = $request->billing_email;
            $billingAddress->mobile = $request->billing_mobile;
            $billingAddress->address = $request->billing_address;
            $billingAddress->city = $request->billing_city;
            $billingAddress->state = $request->billing_state;
            $billingAddress->zip = $request->billing_zip;
            $billingAddress->save();

            $shippingAddress = new ShippingAddress();
            $shippingAddress->user_id = Auth::user()->id;
            $shippingAddress->shipping_name = $request->shipping_name;
            $shippingAddress->shipping_country = $request->shipping_country;
            $shippingAddress->shipping_mobile = $request->shipping_phone;
            $shippingAddress->shipping_address = $request->shipping_address;
            $shippingAddress->shipping_city = $request->shipping_city;
            $shippingAddress->shipping_state = $request->shipping_state;
            $shippingAddress->shipping_zip = $request->shipping_zip;
            $shippingAddress->shipping_notes = $request->shipping_notes;
            $shippingAddress->save();

            $user_id = Auth::user()->id;
            $user_email = Auth::user()->email;
            $vendor_id  = Brand::where('id',$data['brand_id'])->first();
            //Get Shipping Details of Users
            $shippingDetails = ShippingAddress::where(['user_id' => $user_id])->first();
            if (empty(Session::get('CouponCode'))) {
                $coupon_code = 'Not Used';
            } else {
                $coupon_code = Session::get('CouponCode');
            }
            if (empty(Session::get('CouponAmount'))) {
                $coupon_amount = '0';
            } else {
                $coupon_amount = Session::get('CouponAmount');
            }

            $main_total = $data['grand_total'] + $data['ajax_delivery_charge'];

            // echo "<pre>";print_r($data);
            $order = new Order();
            $order->order_id = 'O-' . time();
            $order->user_id = $user_id;
            $order->brand_id = $data['brand_id'];
            $order->vendor_id = $vendor_id->user_id;
            $order->category_id = $data['category_id'];
            $order->invoice_id = time();
            $order->user_email = $user_email;
            $order->full_name = $shippingDetails->shipping_name;
            $order->address = $shippingDetails->shipping_address;
            $order->city = $shippingDetails->shipping_city;
            $order->state = $shippingDetails->shipping_state;
            $order->zip = $shippingDetails->shipping_zip;
            $order->country = $shippingDetails->shipping_country;
            $order->phone = $shippingDetails->shipping_mobile;
            $order->notes = $shippingDetails->shipping_notes;
            $order->coupon_code = $coupon_code;
            $order->coupon_amount = $coupon_amount;
            $order->product_price = $data['product_price'];
            $order->payment_method = $data['payment_method'];
            $order->grand_total = $main_total;
            $order->delivery_charge = $data['ajax_delivery_charge'];
            $order->order_date = date('d/m/Y');
            $order->order_month = date('F');
            $order->order_year = date('Y');
            if ($request->payment_method != 'card') {
                $order->status = Order::STATUS_PROCESSING;
            }
        $order->Save();

        $session_id = Session::get('session_id');

        $catProducts = Cart::with('product')->where(['session_id' =>$session_id])->get();

        foreach($catProducts as $pro){
            $cartPro = new OrderDetails();
            $cartPro->order_id = $order->id;
            $cartPro->user_id = $user_id;
            $cartPro->brand_id = $pro->product->brand_id;
            $cartPro->category_id = $pro->product->category_id;
            $cartPro->product_id = $pro->pro_id;
            $cartPro->bran_commission_percentage = $pro->bran_commission_percentage;
            $cartPro->product_code = $pro->pro_code;
            $cartPro->product_name = $pro->pro_name;
            $cartPro->product_color = $pro->pro_colour;
            $cartPro->product_size = $pro->pro_size;
            $cartPro->product_price = $pro->pro_price;
            $cartPro->product_qty = $pro->pro_quantity;
            $cartPro->vendor_profit = ($pro->pro_quantity * $pro->pro_price) * $pro->bran_commission_percentage/100;
            $cartPro->save();

            if (isset($pro->pro_size)){
                DB::table('attributes')->where('product_id',$pro->pro_id)
                    ->where('attributes_size',$pro->pro_size)
                    ->update(['attributes_stock' => DB::raw('attributes_stock -' . $pro->pro_quantity)]);
            }else{
                DB::table('products')->where('id',$pro->pro_id)
                    ->update(['product_quantity' => DB::raw('product_quantity -' . $pro->pro_quantity)]);
            }

            $vendor_profit = new VendorProfit();
            $vendor_profit->brand_id = $pro->product->brand_id;
            $vendor_profit->vendor_id = $vendor_id->user_id;
            $vendor_profit->order_id = $order->id;
            $vendor_profit->order_details_id = $cartPro->id;
            $vendor_profit->profit_amount = ($pro->pro_quantity * $pro->pro_price) * $pro->bran_commission_percentage/100;
            $vendor_profit->save();
        }

        // $commission = OrderDetails::with('brandCommission')->get();

        // foreach($catProducts as $pro){
        //     $cartPro = new VendorProfit();
        //     $cartPro->order_id = $order->id;
        //     $cartPro->user_id = $user_id;
        //     $cartPro->brand_id = $pro->product->brand_id;
        //     $cartPro->product_id = $pro->pro_id;
        //     $cartPro->product_qty = $pro->pro_quantity;
        //     $cartPro->save();

        // }

        $billingAddress = new BillingAddress();

        $billingAddress->user_id = Auth::user()->id;
        $billingAddress->order_id = $order->id;
        $billingAddress->name = $request->billing_name;
        $billingAddress->email = $request->billing_email;
        $billingAddress->mobile = $request->billing_mobile;
        $billingAddress->address = $request->billing_address;
        $billingAddress->city = $request->billing_city;
        $billingAddress->state = $request->billing_state;
        $billingAddress->zip = $request->billing_zip;
        $billingAddress->save();

        $shippingAddress = new ShippingAddress();
        $shippingAddress->user_id = Auth::user()->id;
        $shippingAddress->order_id = $order->id;
        $shippingAddress->shipping_name = $request->shipping_name;
        $shippingAddress->shipping_country = $request->shipping_country;
        $shippingAddress->shipping_mobile = $request->shipping_phone;
        $shippingAddress->shipping_address = $request->shipping_address;
        $shippingAddress->shipping_city = $request->shipping_city;
        $shippingAddress->shipping_state = $request->shipping_state;
        $shippingAddress->shipping_zip = $request->shipping_zip;
        $shippingAddress->shipping_notes = $request->shipping_notes;
        $shippingAddress->save();

        // if($data['payment_method']=="cod"){
        //     Session::put('order_id',$order->order_id);
        //     Session::put('status',$order->status);
        //     Session::put('date',date('d/m/Y'));
        //     Session::put('grand_total',$data['grand_total']);
        //     Session::put('payment_method',$data['payment_method']);

        //     return redirect()->route('success');
        // }else{
        //     return redirect()->route('online_payment');
        // }

        // Set your Stripe API key
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));


        // stripe line items products fetch from loop

        $product = [];

        $catProducts = Cart::with('product')->where(['session_id' =>$session_id])->get();

        foreach($catProducts as $pro){
            $product[] = [
                'price_data' => [
                  'currency' => 'usd',
                  'product_data' => ['name' => $pro->pro_name],
                  'unit_amount' => $pro->pro_price * 100,
                ],
                'quantity' => $pro->pro_quantity,
            ];

        }


        // Create a new Stripe Checkout Session
        $session = \Stripe\Checkout\Session::create(
            [
                'shipping_address_collection' => ['allowed_countries' => ['US', 'CA',]],
                'shipping_options' => [
                  [
                    'shipping_rate_data' => [
                      'type' => 'fixed_amount',
                      'fixed_amount' => ['amount' => $data['ajax_delivery_charge'] * 100, 'currency' => 'usd'],
                      'display_name' => 'Cost of shipping',
                    ],
                  ],
                ],

                'metadata' => ['order_id' =>  $order->order_id],
                'line_items' => [$product],
                'mode' => 'payment',
                'success_url' => 'https://example.com/success',
                'cancel_url' => 'https://example.com/cancel',
              ]
        );

        // Redirect the user to the Stripe Checkout page
        return redirect()->away($session->url);

    }

    public function success(){
        return view('front.success');
    }

    public function onlinePayment(){
        $session_id = Session::get('session_id');
        if (Auth::check()){
            $user_id = Auth::user()->id;
            $userInformation = User::findorFail($user_id);
//            $delivery_charge = $request['delivery_charge'];
            $delivery_charge = DeliveryCharge::all();;
            $user_email = Auth::user()->email;
            $userDetails = User::find($user_id);
            $userCart = DB::table('carts')->where(['session_id' =>$session_id])->get();
            $cartItem = Cart::where('session_id',$session_id)->sum('pro_quantity');
            foreach($userCart as $key=>$product){
                $productDetails = Product::where('id',$product->pro_id)->first();
                $userCart[$key]->image = $productDetails->product_thumbnail_image;
            }
            // return view('wayshop.products.order_review')->with(compact('userDetails','shippingDetails','userCart'));
            return view('front.online-payment')->with(compact('userInformation','userDetails','userCart','delivery_charge','cartItem') );
        }
        else{
            return view('front.checkout');
        }
    }

}
