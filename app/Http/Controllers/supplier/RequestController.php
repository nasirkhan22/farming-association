<?php

namespace App\Http\Controllers\supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\order_t;
class RequestController extends Controller
{
    public function index() {
         $orders = (new Supplier())->getSupplierRequests();
         return view('supplier.requests',['orders'=>$orders]);
    }

     public function changeStatus($orderId,$status){
        $data=order_t::findOrFail($orderId);
       if($status=="assigned"){
           $data->status=$status;
           $data->fk_supplier_id=auth()->user()->id;
           $data->remarks = "Your order has accepted will deliver as soon as possible";
           $data->save();
           return back()->with("success","Order Accepted");
       }if($status=='completed'){
            $data->status='completed';
            $data->remarks = "Your order has been delivered";
            $data->save();
            return back()->with("success","Order Accepted");
        }
    }

     public function activeDeliveries()
    {
        $orders = (new Supplier())->getActiveDeliveries();
        return view('supplier.active',['orders'=>$orders]);
    }

    public function completedDeliveries()
    {
        $orders = (new Supplier())->getCompletedDeliveries();
        return view('supplier.active',['orders'=>$orders]);
    }
}
