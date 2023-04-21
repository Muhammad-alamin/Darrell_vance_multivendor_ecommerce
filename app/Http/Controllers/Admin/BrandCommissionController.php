<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\BrandCommission;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class BrandCommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data ['brandListCommission'] = BrandCommission::with('brand','user')->get();
        return view('admin.brand_commission.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['users'] = User::where('role_as','=','vendor')->where('status','=','Active')->get();

        return view('admin.brand_commission.create',$data);
    }

    public function getBrand($id){
        $brand = Brand::where('user_id',$id)->get();
        return response()->json($brand);
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
            session()->flash('error', 'Demo account ar not change anything! thanks');
            return redirect()->route('brand-commission.index');
        }
        else{
            $request->validate([
                'percentage' => 'required'
            ]);

            $brandCommission = new BrandCommission();
            $brandCommission->brand_id = $request->brand_id;
            $brandCommission->vendor_id = $request->vendor_id;
            $brandCommission->percentage = $request->percentage;

            $brandCommission->save();
            session()->flash('success', 'Commission Set Successfully');
            return redirect()->route('brand-commission.index');
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
        $d_id  = decrypt($id);
        $data ['brandListCommission'] = BrandCommission::with('brand','user')->find($d_id);
        return view('admin.brand_commission.edit',$data);
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
            return redirect()->route('brand-commission.index');
        }
        else{
            $request->validate([
                'percentage' => 'required'
            ]);

            $d_id  = decrypt($id);
            $brandCommission = BrandCommission::find($d_id);
            $brandCommission->percentage = $request->percentage;

            $brandCommission->save();
            session()->flash('success', 'Commission updated Successfully');
            return redirect()->route('brand-commission.index');
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
//        BrandCommission::destroy($id);
//
//        return redirect()->route('brand-commission.index');
    }

    public function delete($id)
    {
        if (auth()->user()->demo_id == 1){
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('brand-commission.index');
        }
        else{
            $d_id  = decrypt($id);
            BrandCommission::destroy($d_id);
            session()->flash('success', 'Commission deleted Successfully');
            return redirect()->route('brand-commission.index');
        }
    }
}
