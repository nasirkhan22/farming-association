<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\retailor_products;
use Illuminate\Http\Request;
use App\Models\ProductItems;
use App\Models\cart;
use App\Models\order_t;
use App\Models\order_items;

class retailorController extends Controller
{
    public function index(){
          $check = cart::where('user_id',auth()->user()->id)
            ->where('status',1)->get();
        $count = $check->count();
        $items = (new ProductItems())->getretailorProducts();
        return view('customer.retailorproducts',['items'=>$items,'count'=>$count]);
    }
}
