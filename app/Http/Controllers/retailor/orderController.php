<?php

namespace App\Http\Controllers\retailor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order_t;

class orderController extends Controller
{
    public function index(){
        $orders = (new order_t())->getFarmerBuyingOrders();
        return view('retailor.sellingOrders',['orders'=>$orders]);
    }


    public function changeStatus($orderId,$status){
        $data=order_t::findOrFail($orderId);
       if($status=="accept"){

           $data->status='under processing';
           $data->save();
           return back()->with("success","Order Accepted");
       }if($status=='reject'){
            $data->status='rejected';
            $data->save();
            return back()->with("success","Order Accepted");
        }if($status=='completed'){
            $data->status='completed';
            $data->save();
            return back()->with("success","Order Accepted");
        }
    }
}
