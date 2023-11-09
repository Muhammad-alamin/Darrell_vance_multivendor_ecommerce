<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data ['sliders'] = Slider::all();
        return view('admin.slider.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            return redirect()->route('slider.index');
        }
        else
        {
            $request->validate([
                'title' => 'required',
                'image' => 'mimes:jpeg,png,webp'
            ]);

            $slider = new Slider();

            $slider->slider_title = $request->title;

            if ($request->hasFile('image')){

                $path = 'images/slider';
                $img = $request->file('image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                $img->move($path,$file_name);

                if ($slider->slider_image != null && file_exists($slider->slider_image)){
                    unlink($slider->slider_image);
                }

                $slider->slider_image = $path .'/'. $file_name;

            }
            $slider->save();
            session()->flash('success', 'Slider Added Successfully');
            return redirect()->route('slider.index');
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
        $data ['slider'] = Slider::find($d_id);
        return view('admin.slider.edit',$data);
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
            return redirect()->route('slider.index');
        }
        else
        {
            $d_id = decrypt($id);
            $request->validate([
                'title' => 'required',
                'image' => 'mimes:jpeg,png,webp'
            ]);

            $slider = Slider::find($d_id);
            $slider->slider_title = $request->title;


            if ($request->hasFile('image')){

                $path = 'images/slider';
                $img = $request->file('image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                $img->move($path,$file_name);


                if ($slider->slider_image != null && file_exists($slider->slider_image)){
                    unlink($slider->slider_image);
                }
                $slider->slider_image = $path .'/'. $file_name;



            }

            $slider->save();
            session()->flash('success', 'Slider Updated Successfully');
            return redirect()->route('slider.index');
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
//        $slider=Slider::find($id);
//
//        if ($slider->slider_image != null && file_exists($slider->slider_image)){
//            unlink($slider->slider_image);
//        }
//        Slider::destroy($id);
//
//        return redirect()->route('slider.index');
    }
    public function deleteSlider($id)
    {
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('slider.index');
        }
        else
        {
            $d_id = decrypt($id);
            $slider=Slider::find($d_id);

            if ($slider->slider_image != null && file_exists($slider->slider_image)){
                unlink($slider->slider_image);
            }
            Slider::destroy($d_id);
            session()->flash('success', 'Slider Deleted Successfully');
            return redirect()->route('slider.index');
        }
    }
}
