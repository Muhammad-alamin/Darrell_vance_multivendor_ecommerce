<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\BankInfo;
use App\Model\Withdraw;
use App\VendorProfit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WithdrawController extends Controller
{
    public function index(){
        $data ['withdraws'] = DB::table('withdraws')
        ->join('bank_infos','withdraws.bank_info_id','bank_infos.id')
        ->join('users','withdraws.vendor_id', 'users.id')
        ->select('bank_infos.*','users.*','withdraws.*')
        ->get();
        return view('admin.withdraw.index',$data);
    }

    public function withdrawEdit($id)
    {
        $d_id = decrypt($id);

        $single_withdraw = Withdraw::where('id',$d_id)->first();
        $data ['total_withdraw'] = Withdraw::where('vendor_id',$single_withdraw->vendor_id)->where('status','Complete')->sum('withdraw_amount');
        $data ['total_earning'] = VendorProfit::where('vendor_id',$single_withdraw->vendor_id)->sum('profit_amount');
        $data ['withdraw'] = DB::table('withdraws')
        ->join('bank_infos','withdraws.bank_info_id','bank_infos.id')
        ->join('users','withdraws.vendor_id', 'users.id')
        ->select('bank_infos.*','users.*','withdraws.*')
        ->where('withdraws.id',$d_id)->first();

        return view('admin.withdraw.edit',$data);
    }

    public function withdrawUpdate(Request $request ,$id){

        $d_id = decrypt($id);

        $withdraw_info = Withdraw::find($d_id);
        $withdraw_info->transaction_id = $request->transaction_id;
        $withdraw_info->complete_date = $request->complete_date;
        $withdraw_info->admin_message = $request->admin_message;
        $withdraw_info->status = $request->status;
        $withdraw_info->save();

        session()->flash('success', 'Withdraw Request Approved Successfully');
        return redirect()->route('withdraw.index');


    }

    public function withdrawDetails($id){
        $d_id = decrypt($id);
        $single_withdraw = Withdraw::where('id',$d_id)->first();
        $data ['total_withdraw'] = Withdraw::where('vendor_id',$single_withdraw->vendor_id)->where('status','Complete')->sum('withdraw_amount');
        $data ['total_earning'] = VendorProfit::where('vendor_id',$single_withdraw->vendor_id)->sum('profit_amount');
        $data ['withdrawRequest'] = DB::table('withdraws')
        ->join('bank_infos','withdraws.bank_info_id','bank_infos.id')
        ->join('users','withdraws.vendor_id', 'users.id')
        ->select('bank_infos.*','users.*','withdraws.*')
        ->where('withdraws.id',$d_id)->first();

        return view('admin.withdraw.details',$data);
    }
}
