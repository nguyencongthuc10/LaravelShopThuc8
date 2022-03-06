<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Brand;
use App\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Order;
use App\InfoOrder;
use Session;
use Competition;

class AdminOrderController extends Controller
{
    public function all_order(){
        $info_customer = InfoOrder::paginate(8);
        return view('admin/all_order',compact('info_customer'));
    }
    public function info_detail($id) {
        $detail_order  = Order::where('customer_id',$id)->orderBy('id', 'DESC')->paginate(8);
        if($detail_order->isEmpty()){
            return redirect ('/admin');
        }
        return view('admin/detail-order',compact('detail_order'));
    }
    public function order_status(Request $request,$id){
        
        $value = $request->orderStatus;
        $order = Order::find($id);
        $order->order_status = $value;
        $order->save();
        if($order == ''){
            return redirect ('/admin');
        }
        return redirect()->back();
    }
}
