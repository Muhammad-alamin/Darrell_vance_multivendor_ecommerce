<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Attributes;
use App\Model\Product;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    //   public function create($id){
//       $data ['product'] = DB::table('products')
//           ->join('categories','products.category_id', 'categories.id')
//           ->select('categories.category_name','products.*')
//           ->where('products.id',$id)
//           ->first();
//       return view('vendor.productAttributes.create',$data);
//   }

    public function addAttributes(Request $request, $id = null)
    {


        $productdetails['product'] = Product::with('attributes')->where(['id' => $id])->first();
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo '<pre>'; print_r($data); die;
            foreach ($data['product_sku'] as $key => $val) {
                if (!empty($val)) {
                    //prevent Duplicate SKU record
                    $attrCountSku = Attributes::where('attributes_sku', $val)->count();
                    if ($attrCountSku > 0) {
                        session()->flash('error', 'SKU is already exists Please Select another sku');
                        return redirect('/admin/add/attributes/' . $id);
                    }

                    //prevent Duplicate Size record
                    $attrCountSize = Attributes::where(['product_id' => $id, 'attributes_size' => $data['product_size'][$key]])->count();
                    if ($attrCountSize > 0) {
                        session()->flash('error', '' . $data['product_size'][$key] . ' ' . 'Size is already exists Please Select another Size');
                        return redirect('/admin/add/attributes/' . $id);
                    }
                    $attribute = new Attributes();
                    $attribute->product_id = $id;
                    $attribute->attributes_sku = $val;
                    $attribute->attributes_colour = $data['product_colour'][$key];
                    $attribute->attributes_size = $data['product_size'][$key];
                    $attribute->attributes_price = $data['product_price'][$key];
                    $attribute->attributes_stock = $data['product_stock'][$key];
                    $attribute->save();
                }
            }
            session()->flash('success', 'Product Attributes added Successfully');
            return redirect('/admin/add/attributes/' . $id);

        }
        return view('admin.product_attributes.create', $productdetails);

    }

    public function editAttribute($id)
    {
        $data['attribute'] = Attributes::find($id);
        return view('admin.product_attributes.edit', $data);
    }

    public function update(Request $request, $id)
    {

        $newAttr = Attributes::find($id);
        $productId = $newAttr->product_id;
        $newAttr->product_id = $productId;
        $newAttr->attributes_sku = $request->attributes_sku;
        $newAttr->attributes_colour = $request->attributes_colour;
        $newAttr->attributes_size = $request->attributes_size;
        $newAttr->attributes_price = $request->attributes_price;
        $newAttr->attributes_stock = $request->attributes_stock;
        $newAttr->save();
        session()->flash('success', 'Attributes Updated Successfully');
        return redirect()->route('admin.add.attributes', $productId);
    }

    public function deleteAttribute($id)
    {
        Attributes::where('id', $id)->delete();
        return redirect()->back();
    }
}