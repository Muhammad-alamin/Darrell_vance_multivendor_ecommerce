<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Product;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class CreateProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data ['products'] = DB::table('products')
            ->join('categories','products.category_id', 'categories.id')
            ->join('users','products.user_id', 'users.id')
            ->join('brands','products.brand_id', 'brands.id')
            ->select('categories.category_name','users.name','brands.brand_name','products.*')
            ->orderBy('products.id','DESC')
            ->get();
        return view('admin.product.index',$data);
    }

    public function details($id){
        $data ['product'] = DB::table('products')
            ->join('categories','products.category_id', 'categories.id')
            ->join('users','products.user_id', 'users.id')
            ->join('brands','products.brand_id', 'brands.id')
            ->select('categories.category_name','users.name','brands.brand_name','products.*')
            ->where('products.id',$id)
            ->first();
        return view('admin.product.details',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $data['categories'] = Category::where('types','=','product')->get();
        $data ['users'] = User::all();
        $data ['brands'] = Brand::all();
        return view('admin.product.create',$data);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.products.index');
        }
        else
        {
            $request->validate([
                'category_id' => 'required',
                'product_name' => 'required',
                'product_image' => 'mimes:jpeg,png',
                'thumbnail_image' => 'mimes:jpeg,png',
                'product_regular_price' => 'required',
                'product_quantity' => 'required',
                'product_status' => 'required',
//            'video' => 'mimes:mp4,ogx,oga,ogv,ogg,webm',
            ]);

            $data = array();

            $data['category_id'] = $request->category_id;
            $data['user_id'] = auth()->user()->id;
            $data['brand_id'] = $request->brand_id;
            $data['product_name'] = $request->product_name;
            $data['product_description'] = $request->product_description;
            $data['product_sku'] = $request->product_sku;
            $data['product_code'] = $request->product_code;
            $data['product_colour'] = json_encode($request->product_colour);
            $data['product_buying_date'] = $request->product_buying_date;
            $data['product_regular_price'] = $request->product_regular_price;
            $data['product_discount_price'] = $request->product_discount_price;
            $data['product_quantity'] = $request->product_quantity;
            $data['product_stock'] = $request->product_stock;
            $data['product_discount_percent'] = $request->product_discount_percent;
            $data['product_discount_amount'] = $request->product_discount_amount;
            $data['product_size'] = json_encode($request->product_size);
            $data['product_status'] = $request->product_status;
            $data['product_approval'] = 'Approved';
            $data['created_at'] = \Carbon\Carbon::now()->toDateTimeString();

            $getProduct=[];
            if($request->hasFile('images'))
            {
                $products = $request->file('images');

                foreach ( $products as $eachProduct) {
                    $path = 'images/products/';
                    $file_name = rand(0000,9999).'-'.$eachProduct->getClientOriginalName();
                    $eachProduct->move($path,$file_name);
                    //Image::make($eachProduct)->resize(500,370)->save($path.$file_name);

                    $getProduct[] = $file_name;

                }

                $singleProduct = json_encode($getProduct);

                $data['product_image'] = $singleProduct;

            }
            if ($request->hasFile('thumbnail_image')){

                $path = 'images/products/';
                $img = $request->file('thumbnail_image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                // Image::make($img)->resize(700, 650)->save(public_path('images/products/').$file_name);
                $img->move($path,$file_name);


                $data['product_thumbnail_image'] = $file_name;

            }
            if ($request->hasFile('video')){

                $path = 'images/products/video/';
                $img = $request->file('video');
                $file_name = $img->getClientOriginalName();
                $img->move($path,$file_name);


                $data['video'] = $file_name;

            }
            DB::table('products')->insert($data);
            session()->flash('success', 'Product Created Successfully');
            return redirect()->route('admin.products.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $d_id = decrypt($id);
        $data['categories'] = Category::where('types','=','product')->get();
        $data['brands'] = Brand::all();
        $data['product']= Product::find($d_id);
        return view('admin.product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.products.index');
        }
        else
        {
            $request->validate([
                'category_id' => 'required',
                'product_name' => 'required',
                'product_image' => 'mimes:jpeg,png',
                'thumbnail_image' => 'mimes:jpeg,png',
                'product_regular_price' => 'required',
            ]);
            $d_id = decrypt($id);
            $product = Product::find($d_id);

            $product->category_id = $request->category_id;
            $product->user_id = auth()->user()->id;
            $product->brand_id = $request->brand_id;
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            $product->product_sku = $request->product_sku;
            $product->product_code = $request->product_code;
            $product->product_buying_date = $request->product_buying_date;
            $product->product_regular_price = $request->product_regular_price;
            $product->product_discount_price = $request->product_discount_price;
            $product->product_quantity = $request->product_quantity;
            $product->product_stock = $request->product_stock;
            $product->product_discount_percent = $request->product_discount_percent;
            $product->product_discount_amount = $request->product_discount_amount;
            $product->product_size = json_encode($request->product_size);
            $product->product_status = $request->product_status;
            $product->product_approval = 'Approved';

            if ($request->hasFile('thumbnail_image')){

                $path = 'images/products/';
                $img = $request->file('thumbnail_image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                $img->move($path,$file_name);


                if ($product->product_thumbnail_image != null && file_exists($product->product_thumbnail_image)){
                    unlink($product->product_thumbnail_image);
                }

                $product->product_thumbnail_image = $file_name;



            }

            $getProduct=[];
            if($request->hasFile('images'))
            {
                $products = $request->file('images');

                foreach ( $products as $eachProduct) {
                    $path = 'images/products/';
                    $file_name = rand(0000,9999).'-'.$eachProduct->getClientOriginalName();
                    $eachProduct->move($path,$file_name);
                    //Image::make($eachProduct)->resize(500,370)->save($path.$file_name);

                    $getProduct[] = $file_name;
                }
                $images = json_decode($product->product_image);
                $path = 'images/products/';
                foreach ($images as $eachImage){
                    unlink($path . $eachImage);
                }

                $singleProduct = json_encode($getProduct);

                $product->product_image = $singleProduct;

            }

            $product->save();
            session()->flash('success', 'Product Updated Successfully');
            return redirect()->route('admin.products.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


    }

    public function delete($id){
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.products.index');
        }
        else
        {
            $d_id = decrypt($id);
            $attribute = DB::table('attributes')
                ->join('products','attributes.product_id', 'products.id')
                ->select('attributes.product_id','products.*')
                ->where('attributes.product_id',$d_id)
                ->first();
            $product = Product::find($d_id);


            if (!empty($attribute->product_id)){
                session()->flash('warning','Product not deleted  because at first deleted Attribute');
                return redirect()->route('admin.products.index');
            }
            else{
                $images = json_decode($product->product_image);
                $path = 'images/products/';

                foreach ($images as $eachImage) {
                    unlink($path . $eachImage);
                }
                Product::destroy($d_id);
                session()->flash('success', 'Product Deleted Successfully');
                return redirect()->route('admin.products.index');
            }
        }

    }

    public function productList(){
        $data ['products'] = DB::table('products')
            ->join('categories','products.category_id', 'categories.id')
            ->join('users','products.user_id', 'users.id')
            ->join('brands','products.brand_id', 'brands.id')
            ->select('categories.category_name','users.name','brands.brand_name','products.*')
            ->orderBy('products.id','DESC')
            ->get();
        return view('admin.stock.product',$data);
    }

    public function stockEdit($id){
        $product_id = Crypt::decryptString($id);
        $data['product']= Product::find($product_id);
        return view('admin.stock.edit',$data);
    }

    public function stockUpdate(Request $request, $id){
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.stock.product');
        }
        else
        {
            $request->validate([
                'product_quantity' => 'required',
            ]);
            $product_id = Crypt::decryptString($id);
            $product = Product::find($product_id);

            $product->product_quantity = $request->product_quantity;
            $product->save();
            session()->flash('success', 'Stock Updated Successfully');
            return redirect()->route('admin.stock.product');
        }
    }
}
