<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Model\BankInfo;
use App\Model\Withdraw;
use App\VendorProfit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WithdrawController extends Controller
{
    public function info(){
        $data ['total_earning'] = VendorProfit::where('vendor_id',auth()->user()->id)->sum('profit_amount');
        $data ['total_withdraw'] = Withdraw::where('vendor_id',auth()->user()->id)->where('status','Complete')->sum('withdraw_amount');
        $data['account_info'] = BankInfo::where('vendor_id',auth()->user()->id)->first();
        return view('vendor.pay_out.view',$data);
    }

    public function store(Request $request){

        $bank_info = new BankInfo();
           $bank_info->vendor_id = auth()->user()->id;
           $bank_info->bank_name = $request->bank_name;
           $bank_info->branch_name = $request->branch_name;
           $bank_info->account_number = $request->account_number;
           $bank_info->account_holder_name = $request->account_holder_name;
           $bank_info->routing_number = $request->routing_number;
           $bank_info->card_number = $request->card_number;
           $bank_info->description = $request->description;
           $bank_info->save();

           session()->flash('success', 'Account Info Added Successfully');
           return redirect()->back();
    }

    public function edit($id)
    {
        $d_id = decrypt($id);
        $data ['total_earning'] = VendorProfit::where('vendor_id',auth()->user()->id)->sum('profit_amount');
        $data ['total_withdraw'] = Withdraw::where('vendor_id',auth()->user()->id)->where('status','Complete')->sum('withdraw_amount');
        $data['account_info']= BankInfo::find($d_id);
        return view('vendor.pay_out.edit',$data);
    }

    public function update(Request $request, $id){

        $d_id = decrypt($id);
        $bank_info = BankInfo::find($d_id);
           $bank_info->vendor_id = auth()->user()->id;
           $bank_info->bank_name = $request->bank_name;
           $bank_info->branch_name = $request->branch_name;
           $bank_info->account_number = $request->account_number;
           $bank_info->account_holder_name = $request->account_holder_name;
           $bank_info->routing_number = $request->routing_number;
           $bank_info->card_number = $request->card_number;
           $bank_info->description = $request->description;
           $bank_info->save();

           session()->flash('success', 'Account Info Updated Successfully');
           return redirect()->route('vendor.payout.info');
    }

    public function withdrawIndex(){
        $data ['withdrawRequest'] = DB::table('withdraws')
        ->join('bank_infos','withdraws.bank_info_id','bank_infos.id')
        ->select('bank_infos.*','withdraws.*')
        ->where('withdraws.vendor_id',auth()->user()->id)->get();

        $data ['total_earning'] = VendorProfit::where('vendor_id',auth()->user()->id)->sum('profit_amount');
        $data ['total_withdraw'] = Withdraw::where('vendor_id',auth()->user()->id)->where('status','Complete')->sum('withdraw_amount');
        $data['account_info'] = BankInfo::where('vendor_id',auth()->user()->id)->first();
        return view('vendor.withdraw.index',$data);
    }

     public function withdrawCreate(){
        $data ['total_earning'] = VendorProfit::where('vendor_id',auth()->user()->id)->sum('profit_amount');
        $data ['total_withdraw'] = Withdraw::where('vendor_id',auth()->user()->id)->where('status','Complete')->sum('withdraw_amount');
        $data['account_info'] = BankInfo::where('vendor_id',auth()->user()->id)->first();
        return view('vendor.withdraw.create',$data);
    }

    public function withdrawRequestStore(Request $request){

        $data ['total_withdraw'] = Withdraw::where('vendor_id',auth()->user()->id)->where('status','Complete')->sum('withdraw_amount');
        $total_earning = VendorProfit::where('vendor_id',auth()->user()->id)->sum('profit_amount');

        if(isset($data ['total_withdraw'])){
        $available_balance = $total_earning - $data ['total_withdraw'];
        }
        else{
            $available_balance = $total_earning;
        }

        $account_info = BankInfo::where('vendor_id',auth()->user()->id)->first();
        // dd($total_earning, $account_info);
        if (is_null($account_info)){
            session()->flash('error', 'Please Create Your Pay-out Account First! thanks');
            return redirect()->back();
        }
        elseif($request->amount < 1){
            session()->flash('error', 'Please Type Right Amount! thanks');
            return redirect()->back();
        }
        elseif($request->amount > $available_balance){
            session()->flash('error', 'Please Type Right Amount! thanks');
            return redirect()->back();
        }
        else{

        $withdraw_info = new Withdraw();
        $withdraw_info->vendor_id = auth()->user()->id;
        $withdraw_info->bank_info_id = $account_info->id;
        $withdraw_info->withdraw_amount = $request->amount;
        $withdraw_info->vendor_message = $request->description;
        $withdraw_info->save();

        session()->flash('success', 'Withdraw Request Send Successfully');
        return redirect()->route('vendor.withdrawl.index');
        }

    }

    public function withdrawEdit($id)
    {
        $d_id = decrypt($id);
        $data ['total_earning'] = VendorProfit::where('vendor_id',auth()->user()->id)->sum('profit_amount');
        $data ['total_withdraw'] = Withdraw::where('vendor_id',auth()->user()->id)->where('status','Complete')->sum('withdraw_amount');
        $data['account_info'] = BankInfo::where('vendor_id',auth()->user()->id)->first();
        $data['withdraw']= Withdraw::find($d_id);
        return view('vendor.withdraw.edit',$data);
    }

    public function withdrawUpdate(Request $request ,$id){

        $d_id = decrypt($id);

        $data ['total_withdraw'] = Withdraw::where('vendor_id',auth()->user()->id)->where('status','Complete')->sum('withdraw_amount');
        $total_earning = VendorProfit::where('vendor_id',auth()->user()->id)->sum('profit_amount');
        $account_info = BankInfo::where('vendor_id',auth()->user()->id)->first();

        if(isset($data ['total_withdraw'])){
            $available_balance = $total_earning - $data ['total_withdraw'];
            }
            else{
                $available_balance = $total_earning;
            }

        // dd($total_earning, $account_info);
        if (is_null($account_info)){
            session()->flash('error', 'Please Create Your Pay-out Account First! thanks');
            return redirect()->back();
        }
        elseif($request->amount < 1){
            session()->flash('error', 'Please Type Right Amount! thanks');
            return redirect()->back();
        }
        elseif($request->amount > $available_balance){
            session()->flash('error', 'Please Type Right Amount! thanks');
            return redirect()->back();
        }
        else{

        $withdraw_info = Withdraw::find($d_id);
        $withdraw_info->vendor_id = auth()->user()->id;
        $withdraw_info->bank_info_id = $account_info->id;
        $withdraw_info->withdraw_amount = $request->amount;
        $withdraw_info->vendor_message = $request->description;
        $withdraw_info->save();

        session()->flash('success', 'Withdraw Request Send Successfully');
        return redirect()->route('vendor.withdrawl.index');
        }

    }

    public function withdrawDetails($id){
        $d_id = decrypt($id);

        $data ['total_withdraw'] = Withdraw::where('vendor_id',auth()->user()->id)->where('status','Complete')->sum('withdraw_amount');
        $data ['withdrawRequest'] = DB::table('withdraws')
        ->join('bank_infos','withdraws.bank_info_id','bank_infos.id')
        ->select('bank_infos.*','withdraws.*')
        ->where('withdraws.id',$d_id)->first();

        return view('vendor.withdraw.details',$data);
    }
}
