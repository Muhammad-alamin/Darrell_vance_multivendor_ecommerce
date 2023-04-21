<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Mail\CustomerMessage;
use App\Model\VendorContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomerMessageController extends Controller
{
    public function index(){
        $data ['customerMessage'] = VendorContact::all();
        return view('vendor.customerMessage.index',$data);
    }

    public function details($id){
        $d_id = decrypt($id);
        $data ['customerMessage'] = VendorContact::where('id','=',$d_id)->first();
        return view('vendor.customerMessage.details',$data);
    }

    public function show($id){
        $d_id = decrypt($id);
        $data ['customerMessage'] = VendorContact::where('id',$d_id)->first();
        return view('vendor.customerMessage.message',$data);
    }

//    public function delete($id){
//        if (auth()->user()->demo_id == 1) {
//            session()->flash('error', 'Demo account are not change anything! thanks');
//            return redirect()->back();
//        }
//        else
//        {
//            $d_id = decrypt($id);
//            $data ['subscribers'] = VendorContact::where('id',$d_id)->delete();
//            session()->flash('success', 'Subscriber Deleted Successfully');
//            return redirect()->back();
//        }
//    }

    public function sendEmail(Request $request){
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.subscriber');
        }
        else
        {
            $data = $request->description;
            $email = $request->email;
//        $user['to'] = $request->email;
//        $user['to'] = 'alamin.softdevloper@gmail.com';

            Mail::to($email)->send(new CustomerMessage($data));
            session()->flash('success', 'Mail Send Successfully');
            return redirect()->route('vendor.customerMessage');
        }
    }
}
