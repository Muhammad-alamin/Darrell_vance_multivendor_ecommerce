<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Cupon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CouponsController extends Controller
{
    public function addCoupon(Request $request){
        if($request->isMethod('post')) {
            if (auth()->user()->demo_id == 1) {
                session()->flash('error', 'Demo account are not change anything! thanks');
                return redirect('/admin/view-coupons')->with('error', 'Demo account are not change anything! thanks');
            }
            else
            {
                $data = $request->all();
                //echo"<pre>"; print_r($data);die;
                $coupon = new Cupon();
                $coupon->coupon_code = $data['coupon_code'];
                $coupon->amount = $data['coupon_amount'];
                $coupon->amount_type = $data['amount_type'];
                $coupon->expiry_date = $data['expiry_date'];
                $coupon->save();
                return redirect('/admin/view-coupons')->with('flash_message_success','Coupon has been added Successfully');
            }
        }
        return view('admin.coupons.add_coupon');
    }
    public function viewCoupons(){
        $coupons = Cupon::get();
        return view('admin.coupons.view_coupons')->with(compact('coupons'));
    }
    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        Cupon::where('id',$data['id'])->update(['status'=>$data['status']]);
    }
    public function editCoupon(Request $request,$id=null){
        $d_id = decrypt($id);
        if($request->isMethod('post')){
            if (auth()->user()->demo_id == 1) {
                return redirect('/admin/view-coupons')->with('error', 'Demo account are not change anything! thanks');
            }
            else
            {
                $data = $request->all();
                $coupon = Cupon::find($d_id);
                $coupon->coupon_code = $data['coupon_code'];
                $coupon->amount = $data['coupon_amount'];
                $coupon->amount_type = $data['amount_type'];
                $coupon->expiry_date = $data['expiry_date'];
                $coupon->save();
                return redirect('/admin/view-coupons')->with('flash_message_success','Coupon has been Updated Successfully');
            }
        }
        $couponDetails = Cupon::find($d_id);
        return view('admin/coupons/edit_coupon')->with(compact('couponDetails'));
    }
    public function deleteCoupon($id=null){
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->back();
        }
        else
        {
            $d_id = decrypt($id);
            Cupon::where(['id'=>$d_id])->delete();
            Alert::success('Deleted', 'Success Message');
            return redirect()->back();
        }
    }
}
