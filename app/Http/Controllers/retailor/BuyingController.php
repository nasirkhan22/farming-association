<?php

namespace App\Http\Controllers\retailor;

use App\Http\Controllers\Controller;
use App\Models\order_items;
use App\Models\ProductItems;
use Illuminate\Http\Request;
use App\Models\order_t;

class BuyingController extends Controller
{
    public function allOrders(){
        $orders  =(new order_t())->getOrders(auth()->user()->id);
        //$orders = order_t::where('retailor_id',auth()->user()->id)->get();
        return view('retailor.orders',['orders'=>$orders]);
    }

    public function pendingOrders(){
        $orders  =(new order_t())->getActiveOrders(auth()->user()->id);
        // $orders = order_t::where('retailor_id',auth()->user()->id)
        //     ->where('status','pending')
        //     ->get();
        return view('retailor.pendingorders',['orders'=>$orders]);

    }

    public function completedOrders(){
        $orders  =(new order_t())->getCompletedOrders(auth()->user()->id);
        // $orders = order_t::where('retailor_id',auth()->user()->id)
        //     ->where('status','completed')
        //     ->get();
        return view('retailor.completedorders',['orders'=>$orders]);
    }

    public function orderDetail($order_id){
        $orderItems = (new order_items())->getOrderItems($order_id);
        return view('retailor.orderdetail',['orderDetail'=>$orderItems]);
    }
}
