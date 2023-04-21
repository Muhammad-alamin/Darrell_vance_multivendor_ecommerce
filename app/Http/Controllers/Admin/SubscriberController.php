<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Subscription;
use App\Model\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
   public function index(){
       $data ['subscribers'] = Subscribe::all();
       return view('admin.subscriber.index',$data);
   }

    public function show($id){
       $d_id = decrypt($id);
        $data ['subscribers'] = Subscribe::where('id',$d_id)->first();
        return view('admin.subscriber.message',$data);
    }

    public function delete($id){
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->back();
        }
        else
        {
            $d_id = decrypt($id);
            $data ['subscribers'] = Subscribe::where('id',$d_id)->delete();
            session()->flash('success', 'Subscriber Deleted Successfully');
            return redirect()->back();
        }
    }

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

            Mail::to($email)->send(new Subscription($data));
            session()->flash('success', 'Mail Send Successfully');
            return redirect()->route('admin.subscriber');
        }
    }
}
