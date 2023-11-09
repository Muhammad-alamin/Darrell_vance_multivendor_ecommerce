<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Attributes;
use App\Model\Banner;
use App\Model\Brand;
use App\Model\Campaign;
use App\Model\CampaignProduct;
use App\Model\Cart;
use App\Model\Category;
use App\Model\Compare;
use App\Model\ContactUs;
use App\Model\GalleryImage;
use App\Model\Order;
use App\Model\Product;
use App\Model\Rating;
use App\Model\Slider;
use App\Model\Subscribe;
use App\Model\VendorContact;
use App\Model\Wishlist;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{
   public function index(Request $request){
       $data['brands'] = Brand::all();
       $data['sliders'] = Slider::all();
       $data['featured_products'] = Product::where('product_approval','=','Approved')->
           where( 'product_status','=','Active')->where('featured_products',1)->limit(5)->get();

       $data['best_selling_products'] = Product::where('product_approval','=','Approved')->
           where( 'product_status','=','Active')->where('best_selling_products',1)->limit(5)->get();

       $data['popular_products'] = Product::where('product_approval','=','Approved')->
           where( 'product_status','=','Active')->where('popular_products',1)->limit(5)->get();

       $products = Product::where('product_approval','=','Approved')->
       where( 'product_status','=','Active')->orderBy('id','DESC')->paginate(5);


       $popular_products = Product::where('popular_products','=','1')->where('product_approval','=','Approved')->
       where( 'product_status','=','Active')->orderBy('id','DESC')->paginate(5);

       $data['categories'] = Category::limit(11)->get();

       $data['top_categories'] = Category::limit(6)->where('types','=','product')->get();

       $data['top_services'] = Category::limit(6)->where('types','=','service')->get();


       $data['marketing_banners'] = Banner::orderBy('id','DESC')->limit(3)->get();

       $data ['carts'] = Cart::all();

       //load more products with ajax
       if($request->ajax()){

            $loadProducts = view('front.ajax-product', compact('products'))->render();
            return response()->json(['products' => $loadProducts ]);
       }

       //load more popular products with ajax
       if($request->ajax()){
           $loadProducts = view('front.ajax-product', compact('popular_products'))->render();
           return response()->json(['popular_products' => $loadProducts ]);
       }

       $result['home_categories'] = Category::where('display_homepage','=',1)->limit(3)->get();
       foreach ($result['home_categories'] as $list){
           $result['home_categories_products'][$list->id] = Product::where('product_approval','=','Approved')
               ->where('category_id','=',$list->id)
               ->where( 'product_status','=','Active')
               ->where('product_approval','=','Approved')
               ->orderBy('id','DESC')
               ->limit(10)->get();

       }

       return view('front.home',$data, $result, compact('products'));

   }

////   public function loadMoreProduct(Request $request){
////       if($request->ajax())
////       {
////             if ($request->id){
////                 $products = Product::where('id','<',$request->id )->where('product_approval','=','Approved')->
////                 where( 'product_status','=','Active')->orderBy('id','DESC')->limit(5)->get();
////             }
////             else{
////
////             }
////             return response()->json($products);
////       }
////       return view('front.home',compact('products'));
//
//   }
    public function updateWishlist(Request $request){
        if ($request->ajax()){
            $data = $request->all();
//            echo "<pre>";print_r($data);die;
          $countWishlist = Wishlist::where(['user_id'=> Auth::user()->id, 'w_product_id' => $data['product_id']])->count();
            if ($countWishlist == 0 ){
                //Add product in Wishlist
                $wishList = new Wishlist();
                $wishList->user_id = Auth::user()->id;
                $wishList->w_product_id = $data['product_id'];
                $wishList->save();
                return response()->json(['status'=>true,'action'=>'add']);
            }
            else{
                //delete product in Wishlist
                $wishList = Wishlist::where(['user_id'=> Auth::user()->id,'w_product_id'=> $data['product_id']])
                    ->delete();
                return response()->json(['status'=>true,'action'=>'remove']);
            }
        }

    }

    public function updateComparelist(Request $request){
        if ($request->ajax()){
            $data = $request->all();
            $session_id = Session::get('session_id');
            if (empty($session_id)){
                $session_id = Str::random(40);
                Session::put('session_id',$session_id);
            }
//            echo "<pre>";print_r($data);die;
            $countCompares = DB::table('compares')->where(['product_id'=>$data['product_id'],'session_id'=>$session_id])->count();
            if ($countCompares > 0 ) {
                return redirect()->back()->with('flash_message_error', 'Product already exists in compare list');
            }
            else{
                //Add product in Wishlist
                $compare = new Compare();
                $compare->product_id = $data['product_id'];
                $compare->status = 1;
                $compare->session_id = $session_id;
                $compare->save();
                return response()->json(['status'=>true,'action'=>'add']);
            }

        }


    }

    public function compareList(){
        $session_id = Session::get('session_id');
//        $comparesCount= Compare::where(['session_id' =>$session_id])->count();
//            if ($comparesCount > 4){
//                session()->flash('error', 'You have 4 products input at once');
//            }
            $compares['compares'] = Compare::with('product')->where(['session_id' =>$session_id])
                ->orderBy('id','DESC') ->get();
            return view('front.compare',$compares);

    }

    public function compareProductDelete($id){
        $compareProId = decrypt($id);
        Toastr::success('Delete item successfully', 'Success', ["positionClass" => "toast-top-right"]);
        Compare::where('id',$compareProId)->delete();
        return redirect()->back();
    }

    //   Category wise product function start
   public function fetch_category_product(Request $request, $id){

//       $category_id = Crypt::decryptString($id);

       $category = Category::where('id',decrypt($id))->first();

           if ($request->get('sort')=='price_asc'){
               $products = Product::where('category_id',$category->id)
                    ->orderBy('product_regular_price','asc')
                   ->where('product_status','=','Active')
                   ->where('product_approval','=','Approved')->paginate(12);

           }
           elseif ($request->get('brandFilter')){
               $checked = $_GET['brandFilter'];

               $products =  Product::whereIn('brand_id',$checked)->where('product_status','=','Active')
                   ->where('product_approval','=','Approved')->paginate(12);

//               //filter with name
//               $singleBrand = Brand::where('brand_name',$checked)->get();
//               $brandId = [];
//
//               foreach ($singleBrand as $eachbrand)
//               {
//                    array_push($brandId,$eachbrand->id );
//               }
//               //End filter with name


           }

           elseif ($request->get('sort')=='price_desc'){
               $products = Product::where('category_id',$category->id)
                   ->orderBy('product_regular_price','desc')
                   ->where('product_status','=','Active')
                   ->where('product_approval','=','Approved')->paginate(12);
           }
           elseif ($request->get('sort')=='latest'){
               $products = Product::where('category_id',$category->id)
                   ->orderBy('created_at','desc')
                   ->where('product_status','=','Active')
                   ->where('product_approval','=','Approved')->paginate(12);
           }
           elseif( $request->min_price && $request->max_price){
                   $min_price = $request->min_price;
                   $max_price = $request->max_price;
                   $products = Product::where('category_id',$category->id)->whereBetween('product_regular_price', [$min_price,$max_price])
                       ->where('product_status','=','Active')
                       ->where('product_approval','=','Approved')
                       ->orderBy('product_regular_price','ASC')->paginate(12);
           }
           else{
               $products = DB::table('products')
                   ->join('categories','products.category_id','categories.id')
                   ->join('brands','products.brand_id', 'brands.id')
                   ->select('categories.*','brands.*','products.*')
                   ->where('products.category_id',$category->id)->where('product_approval','Approved')->paginate(12);

           }
//           $products = $products->paginate(12);
           $categories = Category::where('types','=','product')->orderBy('id', 'desc')->get();
           $services = Category::where('types','=','service')->orderBy('id', 'desc')->get();
       return view('front.product',compact('products', 'categories','services'));

    }
    //    Category wise product function end

    //Shop Page function start
    public function fetch_all_product(Request $request){

//       $category_id = Crypt::decryptString($id);

//        $category = Category::where('id',$id)->first();

        $data['sliders'] = Slider::all();
        if ($request->get('sort')=='price_asc'){
            $products = Product::orderBy('product_regular_price','asc')
                ->where('product_status','=','Active')
                ->where('product_approval','=','Approved')->paginate(12);

        }
        elseif ($request->get('brandFilter')){
            $checked = $_GET['brandFilter'];

            $products =  Product::whereIn('brand_id',$checked)->where('product_status','=','Active')
                ->where('product_approval','=','Approved')->paginate(12);

//               //filter with name
//               $singleBrand = Brand::where('brand_name',$checked)->get();
//               $brandId = [];
//
//               foreach ($singleBrand as $eachbrand)
//               {
//                    array_push($brandId,$eachbrand->id );
//               }
//               //End filter with name


        }
        elseif ($request->get('sort')=='price_desc'){
            $products = Product::orderBy('product_regular_price','desc')
                ->where('product_status','=','Active')
                ->where('product_approval','=','Approved')->paginate(12);
        }
        elseif ($request->get('sort')=='latest'){
            $products = Product::orderBy('created_at','desc')
                ->where('product_status','=','Active')
                ->where('product_approval','=','Approved')->paginate(12);
        }
        elseif( $request->min_price && $request->max_price){
            $min_price = $request->min_price;
            $max_price = $request->max_price;
            $products = Product::whereBetween('product_regular_price', [$min_price,$max_price])
                ->where('product_status','=','Active')
                ->where('product_approval','=','Approved')
                ->orderBy('product_regular_price','ASC')->paginate(12);
        }
        else{
            $products = DB::table('products')
                ->join('categories','products.category_id','categories.id')
                ->join('brands','products.brand_id', 'brands.id')
                ->select('categories.*','brands.brand_name','products.*')->where('product_approval','Approved')->paginate(12);
        }
//        $products = $products->paginate(12);
            $categories = Category::where('types','=','product')->orderBy('id', 'desc')->get();
            $services = Category::where('types','=','service')->orderBy('id', 'desc')->get();
        return view('front.product',$data,compact('products','categories','services'));

    }
    //Shop Page function end

    public function productDetails($id){
       $d_id = decrypt($id);
        //$data['product_attributes']= Attributes::with('product')->where('product_id',$id)->get();
        $data['marketing_banners'] = Banner::orderBy('id','DESC')->limit(1)->get();
        $data['product'] = Product::with('brand','category','attributes')->findOrFail($d_id);
        $data['brandImage'] = Brand::with('user')->where('id',$data['product']->brand_id)->first();
        $galleryImage = GalleryImage::where('product_id',$d_id)->get();

        $data['featured_products'] = Product::where('product_approval','=','Approved')->
        where( 'product_status','=','Active')->where('featured_products',1)->get();

        $data['brand_products'] = Product::where('brand_id','=', $data['product']->brand->id)->where('id', '!=', $data['product']->id)
            ->where('product_approval','=','Approved')
            ->where( 'product_status','=','Active')->orderBy('id','DESC')->limit(4)->get();

        $data['related_products'] = Product::where('category_id','=', $data['product']->category->id)->where('id', '!=', $data['product']->id)
            ->where('product_approval','=','Approved')
            ->where( 'product_status','=','Active')->orderBy('id','DESC')->limit(4)->get();

        $data['related_productsId'] = Category::where('id',$data['product']->category->id)->first();

        //campaign Products
        $data['campaign_pro'] = CampaignProduct::where('product_id',$id)->first();
        if (isset($data['campaign_pro'])){
            $campaignProducts = Campaign::where('id',$data['campaign_pro']->campaign_id)->first();
        }


        //rating display
        $data['ratings'] = Rating::with('users')->where('rating_approval','=', 'Approved')
            ->where('product_id',$id)->orderBy('id','DESC')
            ->limit(6)->get();

        //All-rating display with modal
        $data['AllRatings'] = Rating::with('users')->where('rating_approval','=', 'Approved')
            ->where('product_id',$id)->orderBy('id','DESC')
            ->get();

        //get avarage rating of product

        $ratingSum = Rating::where('rating_approval','=', 'Approved')
            ->where('product_id',$id)->sum('rating');
        $ratingCount = Rating::where('rating_approval','=', 'Approved')
            ->where('product_id',$id)->count();

        if ($ratingCount>0){
            $avarageRating = round($ratingSum/$ratingCount,2);
            $avarageStarRating = round($ratingSum/$ratingCount);
        }else{
            $avarageRating = 0;
            $avarageStarRating = 0;
        }

        $attribute_products = Attributes::where('product_id', $data['product']->id)->get();

        return view('front.productDetails',$data)->with(compact('avarageStarRating','avarageRating','ratingCount', 'attribute_products','galleryImage'));
    }


    public function vendorDetails($id){
        $data['brand'] = Brand::find($id);
        return view('front.vendorDetails',$data);
    }

    public function getprice(Request $request){
           $data = $request->all();
           // echo "<pre>";print_r($data);die;
           $proArr = explode("-",$data['idSize']);
           $proAttr = Attributes::where(['product_id'=>$proArr[0],'attributes_size' =>$proArr[1]])->first();
        echo $proAttr->attributes_price;

    }

    public function getstock(Request $request){
        $data = $request->all();
        // echo "<pre>";print_r($data);die;
        $proArr = explode("-",$data['idSize']);
        $proAttr = Attributes::where(['product_id'=>$proArr[0],'attributes_size' =>$proArr[1]])->first();
        echo $proAttr->attributes_stock;

    }

    public function search(Request $request){

        $append = [];

//        $products = Product::where('product_name', 'LIKE','%'.$searchingData.'%');
        $products = Product::orderBy('id', 'desc');

        if ($request->product_search != null) {
            $products = $products->where(function($query) use($request) {
                return $query->where('product_name', 'like', '%' . $request->product_search . '%');
            });
            $append['product_search'] = $request->product_search;
        }
//       $searchingData = $request->input('product_search');
       $products = $products->paginate(12)->appends($append);
//        echo "<pre>";print_r($data);die;
        $categories = Category::where('types','=','product')->orderBy('id', 'desc')->get();
        $services = Category::where('types','=','service')->orderBy('id', 'desc')->get();
        $brand = Brand::orderBy('id', 'desc')->get();
        return view('front.product', compact('products', 'categories','services', 'brand'));
//        return view('front.product_search.view')->with('products',$products);
    }

    public function categories(){
       $data ['categories'] = Category::where('types','=','product')->get();
       return view('front.all-categories',$data);
    }

    public function services(){
        $data ['services'] = Category::where('types','=','service')->get();
        return view('front.all-services',$data);
     }

    public function brands(){
        $data ['brands'] = Brand::all();
        return view('front.all-brand',$data);
    }
    public function singleBrand(Request $request, $id){
       $brand_id = decrypt($id);

        $brand = Brand::where('id',$brand_id)->first();

//        dd($brand);

        if ($request->get('sort')=='price_asc'){
            $products = Product::where('brand_id',$brand->id)
                ->orderBy('product_regular_price','asc')
                ->where('product_status','=','Active')
                ->where('product_approval','=','Approved')->paginate(12);

        }

        elseif ($request->get('sort')=='price_desc'){
            $products = Product::where('brand_id',$brand->id)
                ->orderBy('product_regular_price','desc')
                ->where('product_status','=','Active')
                ->where('product_approval','=','Approved')->paginate(12);
        }
        elseif ($request->get('sort')=='latest'){
            $products = Product::where('brand_id',$brand->id)
                ->orderBy('created_at','desc')
                ->where('product_status','=','Active')
                ->where('product_approval','=','Approved')->paginate(12);
        }
        elseif( $request->min_price && $request->max_price){
            $min_price = $request->min_price;
            $max_price = $request->max_price;
            $products = Product::where('brand_id',$brand->id)->whereBetween('product_discount_price', [$min_price,$max_price])
                ->where('product_status','=','Active')
                ->where('product_approval','=','Approved')
                ->orderBy('product_regular_price','ASC')->paginate(12);
        }
        else{
            $products = Product::with('brand')->where('brand_id',$brand_id)
                ->where('product_approval','Approved')
            ->paginate(12);

        }
        $data = Product::with('brand')->where('brand_id',$brand_id)
            ->where('product_approval','Approved')
            ->orderBy('id','DESC')->limit(4)->get();
        return view('front.single-brand-view',compact('products','brand', 'data'));
    }

    public function contactVendor(Request $request){

       $contactVendor = new VendorContact();
       $contactVendor->customer_name = $request->name;
       $contactVendor->customer_email = $request->email;
       $contactVendor->customer_phone = $request->phone;
       $contactVendor->subject = $request->subject;
       $contactVendor->description = $request->message;
       $contactVendor->save();
        Toastr::success('Message sent successfully', 'Success', ["positionClass" => "toast-top-right"]);
       return redirect()->back();
    }

    public function trackOrderView(){
       return view('front.track-order.search');
    }

    public function trackOrder(Request $request){
        $order_num = Order::where('order_id',$request->order_num)->first();
        if(isset($order_num)){
            return view('front.track-order.details',compact('order_num',$order_num));
        }
        else{
            Toastr::Error('No order found', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }

    public function addSubscriber(Request $request){
        if ($request->ajax()){
            $data = $request->all();

            $request->validate([
                'email' => 'required|unique:subscribes',
            ]);

            $subscriber = new Subscribe();
            $subscriber->email = $data['email'];
            $subscriber->date = date('d/m/Y');
            $subscriber->save();

            return response()->json(['success' => 'Data added successfully','status'=>200]);
       }
    }

    public function login(Request $request){
       if ($request->ajax()){
           $email = $request->email;
           $pass  = $request->pass;

           if (auth()->attempt(array('email' => $email, 'password' => $pass)))
           {
               return response()->json([ [1] ]);
           }
           else
           {
               return response()->json([ [3] ]);
           }
       }
    }

    public function register(Request $request){
        if ($request->ajax()){
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:20',
                'email' => 'required|unique:users',
                'mobile' => 'required|unique:users',
                'password' => 'required',
            ]);

            $email = $request->email;
            $pass  = $request->password;
            $name  = $request->name;
            $mobile  = $request->mobile;

            if($validator->fails())
            {
                return response()->json([
                    'status'=>400,
                    'errors'=>$validator->messages()
                ]);
            }
            else
            {
                $user = new User();
                $user->name = $name;
                $user->email = $email;
                $user->mobile = $mobile;
                $user->role_as = 'customer';
                $user->password = Hash::make($pass);
                $user->status = 'Active';
                $user->save();

                if (auth()->attempt(array('email' => $email, 'password' => $pass)))
                {
                    return response()->json([
                        'status'=>200,
                        'message'=>'registration Successfully.'
                    ]);
                }

            }
        }
    }

    public function aboutUs()
    {
        return view('front.aboutUs');
    }

    public function contactPage()
    {
        return view('front.contactUs');
    }

    public function contactStore(Request $request){

        $contactCustomer = new ContactUs();
        $contactCustomer->customer_name = $request->name;
        $contactCustomer->customer_email = $request->email;
        $contactCustomer->description = $request->message;
        $contactCustomer->save();
         Toastr::success('Message sent successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
     }
}

