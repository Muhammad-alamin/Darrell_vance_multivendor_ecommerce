<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
   public function index(){
        $data ['ratings'] = Rating::with('products','users')->get();
        return view('admin.rating_approval.index',$data);
   }

    public function edit($id)
    {
        $d_id = decrypt($id);
        $data['ratings']= Rating::with('products','users')->find($d_id);
        return view('admin.rating_approval.edit',$data);
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
            return redirect()->route('admin.rating.approval');
        }
        else
        {
            $d_id = decrypt($id);
            $rating = Rating::find($d_id);

            $rating->rating_status = $request->rating_status;
            $rating->rating_approval = $request->rating_approval;
            $rating->save();
            session()->flash('success', 'Rating Updated Successfully');
            return redirect()->route('admin.rating.approval');
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
            return redirect()->route('admin.rating.approval');
        }
        else
        {
            $d_id = decrypt($id);
            Rating::destroy($d_id);
            session()->flash('success', 'Rating Deleted Successfully');
            return redirect()->route('admin.rating.approval');
        }
    }

    public function details($id){
        $d_id = decrypt($id);
        $data['ratings']= Rating::with('products','users')->find($d_id);
        return view('admin.rating_approval.details',$data);
    }
}
