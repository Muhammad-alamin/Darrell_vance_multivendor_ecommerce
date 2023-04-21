<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\DeliveryCharge;
use Illuminate\Http\Request;

class DeliveryChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data ['deliveryCharge'] = DeliveryCharge::all();
        return view('admin.delivery_charge.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.delivery_charge.create');
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
            return redirect()->route('delivery_charge.index');
        }
        else
        {
            $request->validate([
                'delivery_location' => 'required',
                'delivery_amount' => 'required'
            ]);

            $deliveryCharge = new DeliveryCharge();

            $deliveryCharge->delivery_location = $request->delivery_location;
            $deliveryCharge->delivery_amount = $request->delivery_amount;

            $deliveryCharge->save();
            session()->flash('success', 'Shipping Charge Created Successfully');
            return redirect()->route('delivery_charge.index');
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
        $deliveryCharge = DeliveryCharge::find($d_id);
        return view('admin.delivery_charge.edit')->with('deliveryCharge',$deliveryCharge);
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
            return redirect()->route('delivery_charge.index');
        }
        else
        {
            $d_id = decrypt($id);
            $request->validate([
                'delivery_location' => 'required',
                'delivery_amount' => 'required'
            ]);

            $deliveryCharge = DeliveryCharge::find($d_id);
            $deliveryCharge->delivery_location = $request->delivery_location;
            $deliveryCharge->delivery_amount = $request->delivery_amount;

            $deliveryCharge->save();
            session()->flash('success', 'Shipping Charge Updated Successfully');
            return redirect()->route('delivery_charge.index');
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
    public function delete($id)
    {
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('delivery_charge.index');
        }
        else
        {
            $d_id = decrypt($id);
            DeliveryCharge::destroy($d_id);
            session()->flash('success', 'Shipping Charge Deleted Successfully');
            return redirect()->route('delivery_charge.index');
        }
    }
}
