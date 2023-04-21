<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $data ['banners'] = Banner::all();
        return view('admin.advBanner.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advBanner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->demo_id == 1){
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('advertisement-banner.index');
        }
        else{
            $request->validate([
                'title' => 'required',
                'image' => 'mimes:jpeg,png,webp'
            ]);

            $banner = new Banner();

            $banner->banner_title = $request->title;

            if ($request->hasFile('image')){

                $path = 'images/slider';
                $img = $request->file('image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                $img->move($path,$file_name);

                if ($banner->banner_image != null && file_exists($banner->banner_image)){
                    unlink($banner->banner_image);
                }

                $banner->banner_image = $path .'/'. $file_name;

            }
            $banner->save();
            session()->flash('success', 'Banner Created Successfully');
            return redirect()->route('advertisement-banner.index');
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
        $data ['banner'] = Banner::find($d_id);
        return view('admin.advBanner.edit',$data);
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
        if (auth()->user()->demo_id == 1){
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('advertisement-banner.index');
        }
        else{
            $request->validate([
                'title' => 'required',
                'image' => 'mimes:jpeg,png,webp'
            ]);
            $d_id = decrypt($id);
            $banner = Banner::find($d_id);
            $banner->banner_title = $request->title;


            if ($request->hasFile('image')){

                $path = 'images/slider';
                $img = $request->file('image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                $img->move($path,$file_name);


                if ($banner->banner_image != null && file_exists($banner->banner_image)){
                    unlink($banner->banner_image);
                }

                $banner->banner_image = $path .'/'. $file_name;



            }
            $banner->save();
            session()->flash('success', 'Banner Updated Successfully');
            return redirect()->route('advertisement-banner.index');
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

    public function deleteBanner($id)
    {
        if (auth()->user()->demo_id == 1){
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('advertisement-banner.index');
        }
        else{
            $d_id = decrypt($id);
            $banner=Banner::find($d_id);

            if ($banner->banner_image != null && file_exists($banner->banner_image)){
                unlink($banner->banner_image);
            }
            Banner::destroy($d_id);
            session()->flash('success', 'Banner Deleted Successfully');
            return redirect()->route('advertisement-banner.index');
        }
    }
}
