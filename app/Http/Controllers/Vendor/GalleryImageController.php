<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Model\GalleryImage;
use App\Model\Product;
use Illuminate\Http\Request;
use Intervention\Image\Image;

class GalleryImageController extends Controller
{
    public function addimage(Request $request, $id=null){


        $productdetails = Product::with('GalleryImage')->where(['id' => $id])->first();
        if ($request->isMethod('post')){
            $data = $request->all();
            // echo '<pre>'; print_r($data); die;

//            $getProduct=[];
            if($request->hasFile('images'))
            {
                $files = $request->file('images');

                foreach ( $files as $file) {

                    $galleryImages = new GalleryImage();
                    $extension = $file->getClientOriginalExtension();
                    $file_name = rand(0000,9999).'-'.$extension;
//                    $path = 'images/products/'.$file_name;
                    \Intervention\Image\Facades\Image::make($file)->save(public_path('images/products/').$file_name);

//                    Image::make($file)->save(public_path($path));

                    $galleryImages->image = $file_name;
                    $galleryImages->product_id = $data['product_id'];
                    $galleryImages->save();
                    //Image::make($eachProduct)->resize(500,370)->save($path.$file_name);
//
//                    $getProduct[] = $file_name;

                }

//                $singleProduct = json_encode($getProduct);
//
//                $data['product_image'] = $singleProduct;

            }

            session()->flash('success','Product Gallery-image added Successfully');
            return redirect('/add/gallery-image/'.$id);

        }
        return view('vendor.productGalleryImage.create')->with(compact('productdetails'));

    }

    public function editAttribute($id){
        $data['attribute']= Attributes::find($id);
        return view('vendor.productAttributes.edit',$data);
    }

    public function update(Request $request, $id){

        $newAttr = Attributes::find($id);
        $productId = $newAttr->product_id;
        $newAttr->product_id = $productId;
        $newAttr->attributes_sku = $request->attributes_sku;
        $newAttr->attributes_colour = $request->attributes_colour;
        $newAttr->attributes_size = $request->attributes_size;
        $newAttr->attributes_price = $request->attributes_price;
        $newAttr->attributes_stock = $request->attributes_stock;
        $newAttr->save();
        session()->flash('success','Attributes Updated Successfully');
        return redirect()->route('add.attributes',$productId);
    }

    public function deleteAttribute($id){
        Attributes::where('id',$id)->delete();
        return redirect()->back();
    }
}
