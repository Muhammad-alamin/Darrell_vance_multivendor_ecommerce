<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data ['campaigns'] = Campaign::all();
        return view('admin.campaign.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.campaign.create');
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
            return redirect()->route('campaign.index');
        }
        else{
            $request->validate([
                'title' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'discount' => 'required',
                'campaign_status' => 'required',
                'image' => 'mimes:jpeg,png'
            ]);

            $campaign = new Campaign();

            $campaign->title = $request->title;
            $campaign->start_date = $request->start_date;
            $campaign->end_date = $request->end_date;
            $campaign->status = $request->campaign_status;
            $campaign->discount = $request->discount;
            $campaign->month = date('F');
            $campaign->year = date('Y');

            if ($request->hasFile('image')){

                $path = 'images/campaign';
                $img = $request->file('image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                $img->move($path,$file_name);

                if ($campaign->image != null && file_exists($campaign->image)){
                    unlink($campaign->image);
                }

                $campaign->image = $path .'/'. $file_name;

            }
            $campaign->save();
            session()->flash('success', 'Campaign Created Successfully');
            return redirect()->route('campaign.index');
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
        $data ['campaign'] = Campaign::find($d_id);
        return view('admin.campaign.edit',$data);
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
            return redirect()->route('campaign.index');
        }
        else{
            $d_id = decrypt($id);
            $request->validate([
                'title' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'discount' => 'required',
                'campaign_status' => 'required',
                'image' => 'mimes:jpeg,png'
            ]);

            $campaign = Campaign::find($d_id);
            $campaign->title = $request->title;
            $campaign->start_date = $request->start_date;
            $campaign->end_date = $request->end_date;
            $campaign->status = $request->campaign_status;
            $campaign->discount = $request->discount;
            $campaign->month = date('F');
            $campaign->year = date('Y');

            if ($request->hasFile('image')){

                $path = 'images/campaign';
                $img = $request->file('image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                $img->move($path,$file_name);

                if ($campaign->image != null && file_exists($campaign->image)){
                    unlink($campaign->image);
                }

                $campaign->image = $path .'/'. $file_name;

            }
            $campaign->save();
            session()->flash('success', 'Campaign Updated Successfully');
            return redirect()->route('campaign.index');
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
        if (auth()->user()->demo_id == 1){
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('campaign.index');
        }
        else
        {
            $d_id = decrypt($id);
            $campaign=Campaign::find($d_id);

            if ($campaign->image != null && file_exists($campaign->image)){
                unlink($campaign->image);
            }
            Campaign::destroy($d_id);
            session()->flash('success', 'Campaign Deleted Successfully');
            return redirect()->route('campaign.index');
        }
    }
}
