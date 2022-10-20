<?php

namespace App\Http\Controllers\retailor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductItems;
use App\Models\ProductCategories;
use App\Models\cart;
use App\Models\order_t;
use App\Models\order_items;
use DB;



class HomeController extends Controller
{
    public function index(){
        $check = cart::where('user_id',auth()->user()->id)
            ->where('status',1)->get();
        $count = $check->count();
        $items = (new ProductItems())->getItemsWithFarmers();
        return view('retailor.home',['items'=>$items,'count'=>$count]);
    }

    public function addToCart(Request $request){

        $product_id = $request['product_id'];
        $quantity = $request['quantity'];

       $pluck_price= ProductItems::where('id',$product_id)->pluck('price');
       // $pluck_category = ProductItems::where('id',$product_id)->pluck('fk_category_id');
       // $pluck_product_user = ProductCategoris::where('id',$pluck_category)->pluck('fk_user_id');
        $check = cart::where('product_id',$product_id)
            ->where('user_id',auth()->user()->id)
            ->where('status',1)->get();
        $count = $check->count();
        //dd($count);
        if($count==0) {
            $cart = new cart();
            $cart->product_id = $product_id;
            $cart->user_id = auth()->user()->id;
            $cart->quantity = $quantity;
            $cart->item_price = $pluck_price[0];
            $cart->price = $quantity * $pluck_price[0];
            if ($cart->save()) {
                $check = cart::where('product_id',$product_id)
                    ->where('user_id',auth()->user()->id)
                    ->where('status',1)->get();
                $count = $check->count();
                return back()->with('success', 'Item Added Successfully')
                    ->with('count',$count);
            }
        }else{
            return back()->with('error', 'Product Already in the Cart');
        }



    }

    public function showCart(){
        //$cart_Data=cart::where('user_id',auth()->user()->id);
        $cart_Data = (new cart())->getCart(auth()->user()->id);

        return view('retailor.showCart',['cartData'=>$cart_Data]);
    }

    public function checkout(){
        return view('retailor.checkout');
    }

    public function placeOrder(Request $request){
        $order = new order_t();
        $order->retailor_id = auth()->user()->id;
        $order->full_name=$request['name'];
        $order->email=$request['email'];
        $order->shippment_address=$request['address'];
        $order->phone = $request['phone'];
        if($order->save()){
            $order_id = $order->id;
            $cartData = cart::where('user_id',auth()->user()->id)->get();
            foreach($cartData as $row){
                $order_items = new order_items();
                $order_items->product_id=$row->product_id;
                $order_items->user_id=$row->user_id;
                $order_items->order_id=$order_id;
                $order_items->quantity = $row->quantity;
                $order_items->item_price = $row->item_price;
                $order_items->amount = $row->price;
                $order_items->save();
            }
            cart::where('user_id', auth()->user()->id)->delete();
            return back()->with('success', 'Order Placed Successfully');

        }
    }

    function deleteCartItem($cartId){
        $result=cart::where('id',$cartId)->delete();
        return back()->with("success","Item Removed");

    }
}
