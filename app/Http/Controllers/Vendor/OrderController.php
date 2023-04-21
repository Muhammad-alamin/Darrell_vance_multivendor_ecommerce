<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class OrderController extends Controller
{
    public function index(Request $request){

        $data['title'] = 'Oder List';
        $data['orders'] = Order::with('brand')->get();

        return view('vendor.order.orderList',$data);

    }

    public function show ($id){
        $order_id = Crypt::decryptString($id);
        $data['title'] = 'Order Details';
//        $data['orderDetails'] = OrderDetails::with('brandCommission')->get();
        $data['order'] = Order::with(['order_details' => function($brandCommission){
            return $brandCommission->with('brandCommission');
        }])->find($order_id);
        return view('vendor.order.orderDetails',$data);
    }

    public function dailyReport(Request $request){
        $data['title'] = 'Daily Report';

        $orders = Order::with('brand')->first();
            if ($orders->brand->user_id == \auth()->user()->id){
                if ($request->daily_report != null){
                    $order = new Order();
                    $append =[];
                    if ( $request->has('daily_report') && $request->daily_report != null){
                        $order = $order->where(function ($query) use ($request){
                            $query->where('order_date', 'like', '%' . $request->daily_report . '%');
                        });
                        $append['daily_report'] = $request->daily_report;
                    }
                    $order = $order->orderBy('id','desc')->paginate(10);
                    $data['orders'] = $order->appends($append);
                }
                else{
                    $date = date('d/m/y');
                    $data['orders'] = Order::where('order_date',$date)->orderBy('id','desc')->paginate(10);
                }
            }

        return view('vendor.sales_report.daily',$data);
    }
    public function monthlyReport(Request $request){
        $data['title'] = 'Monthly Report';

        $orders = Order::with('brand')->first();
        if ($orders->brand->user_id == \auth()->user()->id) {
            if ($request->monthly_report != null) {
                $order = new Order();
                $append = [];
                if ($request->has('monthly_report') && $request->monthly_report != null) {
                    $order = $order->where(function ($query) use ($request) {
                        $query->where('order_month', 'like', '%' . $request->monthly_report . '%');
                    });
                    $append['monthly_report'] = $request->monthly_report;
                }
                if ($request->has('yearly_report') && $request->yearly_report != null) {
                    $order = $order->where('order_year', 'like', '%' . $request->yearly_report . '%');

                    $append['yearly_report'] = $request->yearly_report;
                }
                $order = $order->with('brand')->orderBy('id', 'desc')->paginate(10);
                $data['orders'] = $order->appends($append);
            } else {
                $date = date('F');
                $data['orders'] = Order::with('brand')->where('order_month', $date)->orderBy('id', 'desc')->paginate(10);
            }
        }

        return view('vendor.sales_report.monthly',$data);

    }
    public function yearlyReport(Request $request){
        $orders = Order::with('brand')->first();
        if ($orders->brand->user_id == \auth()->user()->id) {
            if ($request->yearly_report != null) {
                $order = new Order();
                $append = [];
                if ($request->has('yearly_report') && $request->yearly_report != null) {
                    $order = $order->where('order_year', 'like', '%' . $request->yearly_report . '%');

                    $append['yearly_report'] = $request->yearly_report;
                }
                $order = $order->with('brand')->orderBy('id', 'desc')->paginate(10);
                $data['orders'] = $order->appends($append);
            } else {
                $date = date('Y');
                $data['orders'] = Order::with('brand')->where('order_year', $date)->orderBy('id', 'desc')->paginate(10);

            }
        }

        return view('vendor.sales_report.yearly',$data);
    }
}
