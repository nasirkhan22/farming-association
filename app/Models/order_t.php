<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
class order_t extends Model
{
    protected $table = 'order_t';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'retailor_id','full_name','email','shippment_address','phone','status'
    ];

    public static function getFarmerBuyingOrders():Collection
    {
        return collect(DB::select("SELECT order_t.remarks,order_t.id,order_t.full_name,order_t.email,order_t.shippment_address,order_t.phone,order_t.status,product_items.name,order_items.quantity,order_items.amount,order_items.created_at,users.name as order_by from order_t JOIN
            order_items on order_t.id=order_items.order_id
            JOIN product_items on order_items.product_id=product_items.id
            JOIN users on order_t.retailor_id=users.id where users.id=1"));
    }

    public static function getOrders($id=0):Collection
    {
        if($id==0){
        return collect(DB::select("SELECT order_t.remarks, order_t.id,order_t.full_name,order_t.email,order_t.shippment_address,order_t.phone,order_t.status,product_items.name,order_items.quantity,order_items.amount,order_items.created_at,users.name as order_by from order_t JOIN
            order_items on order_t.id=order_items.order_id
            JOIN product_items on order_items.product_id=product_items.id
            JOIN users on order_t.retailor_id=users.id where users.id=4"));
        }else{
            return collect(DB::select("SELECT order_t.remarks, order_t.id,order_t.full_name,order_t.email,order_t.shippment_address,order_t.phone,order_t.status,product_items.name,order_items.quantity,order_items.amount,order_items.created_at from order_t JOIN
                order_items on order_t.id=order_items.order_id
                JOIN product_items on order_items.product_id=product_items.id where order_t.retailor_id='".$id."'"));
        }
    }

    public static function getActiveOrders($id=0):Collection
    {
        if($id==0){
        return collect(DB::select("SELECT order_t.remarks, order_t.id,order_t.full_name,order_t.email,order_t.shippment_address,order_t.phone,order_t.status,product_items.name,order_items.quantity,order_items.amount,order_items.created_at,users.name as order_by from order_t JOIN
            order_items on order_t.id=order_items.order_id
            JOIN product_items on order_items.product_id=product_items.id
            JOIN users on order_t.retailor_id=users.id where users.id=4 and order_t.status='under processing' or order_t.status='assigned'"));
        }else{
            return collect(DB::select("SELECT order_t.remarks, order_t.id,order_t.full_name,order_t.email,order_t.shippment_address,order_t.phone,order_t.status,product_items.name,order_items.quantity,order_items.amount,order_items.created_at from order_t JOIN
                order_items on order_t.id=order_items.order_id
                JOIN product_items on order_items.product_id=product_items.id where order_t.retailor_id='".$id."' and order_t.status='under processing' "));
        }
    }

        public static function getNewOrders($id=0):Collection
    {
        if($id==0){
        return collect(DB::select("SELECT order_t.remarks, order_t.id,order_t.full_name,order_t.email,order_t.shippment_address,order_t.phone,order_t.status,product_items.name,order_items.quantity,order_items.amount,order_items.created_at,users.name as order_by from order_t JOIN
            order_items on order_t.id=order_items.order_id
            JOIN product_items on order_items.product_id=product_items.id
            JOIN users on order_t.retailor_id=users.id  where users.id=4 and order_t.status='pending'"));
        }else{
            return collect(DB::select("SELECT order_t.remarks, order_t.id,order_t.full_name,order_t.email,order_t.shippment_address,order_t.phone,order_t.status,product_items.name,order_items.quantity,order_items.amount,order_items.created_at from order_t JOIN
                order_items on order_t.id=order_items.order_id
                JOIN product_items on order_items.product_id=product_items.id where order_t.retailor_id='".$id."' and order_t.status='pending' "));
        }
    }

    public static function getCompletedOrders($id=0):Collection
    {   
        if($id==0){
        return collect(DB::select("SELECT order_t.remarks, order_t.id,order_t.full_name,order_t.email,order_t.shippment_address,order_t.phone,order_t.status,product_items.name,order_items.quantity,order_items.amount,order_items.created_at,users.name as order_by from order_t JOIN
            order_items on order_t.id=order_items.order_id
            JOIN product_items on order_items.product_id=product_items.id
            JOIN users on order_t.retailor_id=users.id where users.id=4 and order_t.status='completed'"));
        }else{
            return collect(DB::select("SELECT order_t.remarks, order_t.id,order_t.full_name,order_t.email,order_t.shippment_address,order_t.phone,order_t.status,product_items.name,order_items.quantity,order_items.amount,order_items.created_at from order_t JOIN
                order_items on order_t.id=order_items.order_id
                JOIN product_items on order_items.product_id=product_items.id where order_t.retailor_id='".$id."' and order_t.status='completed' "));
        }
    }
    public static function getCancelledOrders($id=0):Collection
    {
        if($id==0){
        return collect(DB::select("SELECT order_t.remarks, order_t.id,order_t.full_name,order_t.email,order_t.shippment_address,order_t.phone,order_t.status,product_items.name,order_items.quantity,order_items.amount,order_items.created_at,users.name as order_by from order_t JOIN
            order_items on order_t.id=order_items.order_id
            JOIN product_items on order_items.product_id=product_items.id
            JOIN users on order_t.retailor_id=users.id where users.id=4 and order_t.status='rejected'"));
        }else{
            return collect(DB::select("SELECT order_t.remarks, order_t.id,order_t.full_name,order_t.email,order_t.shippment_address,order_t.phone,order_t.status,product_items.name,order_items.quantity,order_items.amount,order_items.created_at from order_t JOIN
                order_items on order_t.id=order_items.order_id
                JOIN product_items on order_items.product_id=product_items.id where order_t.retailor_id='".$id."' and order_t.status='rejected' "));
        }
    }

}
