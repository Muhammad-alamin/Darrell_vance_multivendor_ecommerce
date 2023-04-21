<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class CreateBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data ['brands'] = Brand::all();
        return view('admin.brand.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
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
            return redirect()->route('Brand.index');
        }
        else
        {
            $request->validate([
                'brand_name' => 'required',
                'brand_phone' => 'required|unique:brands',
                'address' => 'required',
                'image' => 'mimes:jpeg,png',
            ]);

            $brands = new Brand();

            $brands->user_id = auth()->user()->id;
            $brands->brand_name = $request->brand_name;
            $brands->brand_phone = $request->brand_phone;
            $brands->brand_address = $request->address;

            if ($request->hasFile('image')){

                $path = 'images/brands';
                $img = $request->file('image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(500, 300)->save(public_path('images/brands/').$file_name);

                if ($brands->brand_image != null && file_exists($brands->brand_image)){
                    unlink($brands->brand_image);
                }

                $brands->brand_image = $path .'/'. $file_name;

            }
            if ($request->hasFile('brand_thumbnail_image')){

                $path = 'images/brands';
                $img = $request->file('brand_thumbnail_image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(500, 300)->save(public_path('images/brands/').$file_name);

                if ($brands->brand_thumbnail_image != null && file_exists($brands->brand_thumbnail_image)){
                    unlink($brands->brand_thumbnail_image);
                }

                $brands->brand_thumbnail_image = $path .'/'. $file_name;

            }
//        Image::make('foo.jpg')->resize(300, 200);
            $brands->save();
            session()->flash('success', 'Brand Created Successfully');
            return redirect()->route('Brand.index');
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
        $data['brands']= Brand::find($d_id);
        return view('admin.brand.edit',$data);
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
            return redirect()->route('Brand.index');
        }
        else
        {
            $request->validate([
                'brand_name' => 'required',
                'phone' => 'required|unique:brands,brand_phone,'.$id,
                'address' => 'required',
                'image' => 'mimes:jpeg,png',
            ]);
            $d_id = decrypt($id);
            $brands = Brand::find($d_id);

            $brands->user_id = auth()->user()->id;
            $brands->brand_name = $request->brand_name;
            $brands->brand_phone = $request->phone;
            $brands->brand_address = $request->address;

            if ($request->hasFile('image')){

                $path = 'images/brands';
                $img = $request->file('image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(500, 300)->save(public_path('images/brands/').$file_name);

//            $img->move($path,$file_name);

                if ($brands->brand_image != null && file_exists($brands->brand_image)){
                    unlink($brands->brand_image);
                }

                $brands->brand_image = $path .'/'. $file_name;

            }
            if ($request->hasFile('brand_thumbnail_image')){

                $path = 'images/brands';
                $img = $request->file('brand_thumbnail_image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(500, 300)->save(public_path('images/brands/').$file_name);

//            $img->move($path,$file_name);

                if ($brands->brand_thumbnail_image != null && file_exists($brands->brand_thumbnail_image)){
                    unlink($brands->brand_thumbnail_image);
                }

                $brands->brand_thumbnail_image = $path .'/'. $file_name;

            }
            $brands->save();
            session()->flash('success', 'Brand Updated Successfully');
            return redirect()->route('Brand.index');
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
            return redirect()->route('Brand.index');
        }
        else
        {
            $d_id = decrypt($id);
            $brands = Brand::find($d_id);

            if ($brands->brand_image != null && file_exists($brands->brand_image)){
                unlink($brands->brand_image);
            }
            if ($brands->brand_thumbnail_image != null && file_exists($brands->brand_thumbnail_image)){
                unlink($brands->brand_thumbnail_image);
            }
            Brand::destroy($d_id);
            session()->flash('success', 'Brand Deleted Successfully');
            return redirect()->route('Brand.index');
        }
    }
}
