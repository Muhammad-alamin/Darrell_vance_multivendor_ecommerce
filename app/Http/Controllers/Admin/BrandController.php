<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index(){
        $data ['brands'] = DB::table('brands')
            ->join('users','brands.user_id', 'users.id')
            ->select('users.name','brands.*')
            ->orderBy('brands.id','DESC')
            ->get();
        return view('admin.brand_approval.index',$data);
    }

    public function edit($id){
        $d_id = decrypt($id);
        $data['brands']= Brand::find($d_id);
        return view('admin.brand_approval.edit',$data);
    }

    public function update(Request $request, $id){
        if (auth()->user()->demo_id == 1){
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.brand.approval');
        }
        else{
            $request->validate([
                'brand_name' => 'required',
                'phone' => 'required|unique:brands,brand_phone,'.$id,
                'address' => 'required',
                'image' => 'mimes:jpeg,png',
            ]);

            $d_id = decrypt($id);
            $brands = Brand::find($d_id);

            $brands->user_id = $brands->user_id;
            $brands->brand_name = $request->brand_name;
            $brands->brand_phone = $request->phone;
            $brands->brand_address = $request->address;
            $brands->brand_status = $request->status;
            $brands->brand_approval = $request->approval;
            $brands->top_brand = $request->top_brand;

            if ($request->has('top_brand'))
            {
                $brands->top_brand = $request->top_brand;
            }

            if ($request->hasFile('image')){

                $path = 'images/brands';
                $img = $request->file('image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                $img->move($path,$file_name);

                if ($brands->brand_image != null && file_exists($brands->brand_image)){
                    unlink($brands->brand_image);
                }

                $brands->brand_image = $path .'/'. $file_name;

            }
            $brands->save();
            session()->flash('success', 'Brand Approved Successfully');
            return redirect()->route('admin.brand.approval');
        }
    }

    public function delete($id)
    {
        if (auth()->user()->demo_id == 1){
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.brand.approval');
        }
        else{
            $d_id = decrypt($id);
            $brands = Brand::find($d_id);

            if ($brands->brand_image != null && file_exists($brands->brand_image)){
                unlink($brands->brand_image);
            }
            Brand::destroy($d_id);
            session()->flash('success', 'Brand Deleted Successfully');
            return redirect()->route('admin.brand.approval');
        }
    }
}
