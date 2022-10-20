<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\cart;
use Illuminate\Http\Request;
use App\Models\order_t;

class HomeController extends Controller
{

    public function index(){

        return view('customer.home');
    }

    public function showCart(){
        $cart_Data = (new cart())->getCart(auth()->user()->id);
        return view('customer.showcart',['cartData'=>$cart_Data]);
    }

    public function allOrders(){
        $orders  =(new order_t())->getOrders(auth()->user()->id);
        //$orders = order_t::where('retailor_id',auth()->user()->id)->get();
        return view('customer.orders',['orders'=>$orders]);
    }
}
