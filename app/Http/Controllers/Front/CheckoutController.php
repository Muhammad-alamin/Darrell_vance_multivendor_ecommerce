<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\OrderSuccessNotificationCustomer;
use App\Mail\OrderSuccessNotificationSeller;
use App\Model\Attributes;
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
use Illuminate\Support\Facades\Mail;
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
            $order->payment_method = 'card';
            $order->grand_total = $main_total;
            $order->delivery_charge = $data['ajax_delivery_charge'];
            $order->order_date = date('d/m/Y');
            $order->order_month = date('F');
            $order->order_year = date('Y');
            if ($request->payment_method != 'card') {
                $order->status = Order::STATUS_PENDING;
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

            // if (isset($pro->pro_size)){
            //     DB::table('attributes')->where('product_id',$pro->pro_id)
            //         ->where('attributes_size',$pro->pro_size)
            //         ->update(['attributes_stock' => DB::raw('attributes_stock -' . $pro->pro_quantity)]);
            // }else{
            //     DB::table('products')->where('id',$pro->pro_id)
            //         ->update(['product_quantity' => DB::raw('product_quantity -' . $pro->pro_quantity)]);
            // }

            // $vendor_profit = new VendorProfit();
            // $vendor_profit->brand_id = $pro->product->brand_id;
            // $vendor_profit->vendor_id = $vendor_id->user_id;
            // $vendor_profit->order_id = $order->id;
            // $vendor_profit->order_details_id = $cartPro->id;
            // $vendor_profit->profit_amount = ($pro->pro_quantity * $pro->pro_price) - $cartPro->vendor_profit;
            // $vendor_profit->save();
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

        // Set your Stripe API key
        Stripe::setApiKey(config('services.stripe.secret'));

        // stripe line items products fetch from loop

        // $product = [];

        // $catProducts = Cart::with('product')->where(['session_id' =>$session_id])->get();

        // foreach($catProducts as $pro){
        //     $product[] = [
        //         'price_data' => [
        //           'currency' => 'usd',
        //           'product_data' => ['name' => $pro->pro_name],
        //           'unit_amount' => $pro->pro_price * 100,
        //         ],
        //         'quantity' => $pro->pro_quantity,
        //     ];

        // }

        // // Create a new Stripe Checkout Session
        // $session = \Stripe\Checkout\Session::create(
        //     [
        //         'shipping_address_collection' => ['allowed_countries' => ['US', 'CA',]],
        //         'shipping_options' => [
        //           [
        //             'shipping_rate_data' => [
        //               'type' => 'fixed_amount',
        //               'fixed_amount' => ['amount' => $data['ajax_delivery_charge'] * 100, 'currency' => 'usd'],
        //               'display_name' => 'Cost of shipping',
        //             ],
        //           ],
        //         ],

        //         'metadata' => ['order_id' =>  $order->order_id],
        //         'line_items' => [$product],
        //         'mode' => 'payment',
        //         'success_url' => route('success'),
        //         'cancel_url' => route('cancel'),
        //       ]
        // );
            $encryptedOrderId = encrypt($order->id); // Encrypt the order ID
            // Calculate the total amount after applying the coupon
            $totalAmountAfterCoupon = ($data['grand_total']);
            // ...

            // Create a new Stripe Checkout Session
            $session = \Stripe\Checkout\Session::create([
                'shipping_address_collection' => ['allowed_countries' => ['US', 'CA']],
                'shipping_options' => [
                    [
                        'shipping_rate_data' => [
                            'type' => 'fixed_amount',
                            'fixed_amount' => ['amount' => $data['ajax_delivery_charge'] * 100, 'currency' => 'gbp'],
                            'display_name' => 'Cost of shipping',
                        ],
                    ],
                ],
                'metadata' => ['order_id' => $order->order_id],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'gbp',
                            'product_data' => ['name' => 'Your Product Amount'],
                            'unit_amount' => $totalAmountAfterCoupon * 100, // Amount after applying the coupon
                        ],
                        'quantity' => 1, // Adjust the quantity if necessary
                    ],
                ],

                'metadata' => [
                    'order_id' =>  $order->order_id,

                ],

                'payment_intent_data' => [
                    'metadata' => [
                        'order_id' =>  $order->order_id,
                    ]
                ],

                'mode' => 'payment',
                'success_url' => route('success',['order' => $encryptedOrderId]),
                'cancel_url' => route('cancel'),
            ]);

        // Redirect the user to the Stripe Checkout page
        return redirect()->away($session->url);

    }

    public function success(Request $request, $encryptedOrderId){
        $d_id = decrypt($encryptedOrderId);

        // Update the order status to "paid" in the database
        $order = Order::find($d_id);
        if ($order) {
            $order->status = 'Processing';
            $order->save();
        }

        // Retrieve the order details
        $order = Order::with('order_details')->where('id', $d_id)->first();

        foreach ($order->order_details as $detail) {

            if (isset($detail->product_size)){
                DB::table('attributes')->where('product_id',$detail->product_id)
                    ->where('attributes_size',$detail->product_size)
                    ->update(['attributes_stock' => DB::raw('attributes_stock -' . $detail->product_qty)]);
            }else{
                DB::table('products')->where('id',$detail->product_id)
                    ->update(['product_quantity' => DB::raw('product_quantity -' . $detail->product_qty)]);
            }

            $vendor_profit = new VendorProfit();
            $vendor_profit->brand_id = $order->brand_id;
            $vendor_profit->vendor_id = $order->vendor_id;
            $vendor_profit->order_id = $order->id;
            $vendor_profit->order_details_id = $detail->id;
            $vendor_profit->profit_amount = ($detail->product_qty * $detail->product_price) - $detail->vendor_profit;
            $vendor_profit->save();
        }


        Session::put('order_id',$order->order_id);
        Session::put('status',$order->status);
        Session::put('date',date('d/m/Y'));
        Session::put('grand_total',$order['grand_total']);
        Session::put('payment_method','card');
        Session::forget('session_id');

        // Assuming you have the necessary email addresses for the customer and seller
        $customerEmail = User::where('id',$order->user_id)->first();
        $sellerEmail = User::where('id',$order->vendor_id)->first();

        // Sending email to the customer
        Mail::to($customerEmail)->send(new OrderSuccessNotificationCustomer($order));

        // Sending email to the seller
        Mail::to($sellerEmail)->send(new OrderSuccessNotificationSeller($order));

        return view('front.success');
    }


    public function cancel(){
        return view('front.cancel');
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
