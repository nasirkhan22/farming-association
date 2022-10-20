<?php

namespace App\Http\Controllers\farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order_t;

class orderController extends Controller
{
    public function index(){
        $orders = (new order_t())->getNewOrders();
        return view('farmer.orders',['orders'=>$orders]);
    }

    public function activeOrders(){
        $orders = (new order_t())->getActiveOrders();
        return view('farmer.activeorders',['orders'=>$orders]);

    }
    public function completedOrders(){
        $orders = (new order_t())->getCompletedOrders();
        return view('farmer.completedOrders',['orders'=>$orders]);

    }

    public function cancelledOrders(){
    $orders = (new order_t())->getCancelledOrders();
    return view('farmer.cancelledOrders',['orders'=>$orders]);

    }

    public function orderHistory(){
        $orders = (new order_t())->getOrders();
        return view('farmer.orderhistory',['orders'=>$orders]);
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
