<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
class Supplier extends Model
{
    
    public static function getSupplierRequests():Collection
    {
        return collect(DB::select("SELECT order_t.id,order_t.full_name,order_t.email,order_t.shippment_address,order_t.phone,order_t.status,product_items.name,order_items.quantity,order_items.amount,order_items.created_at,users.name as order_by from order_t JOIN
            order_items on order_t.id=order_items.order_id
            JOIN product_items on order_items.product_id=product_items.id
            JOIN users on order_t.retailor_id=users.id WHERE order_t.fk_supplier_id=0 and order_t.status='under processing'"));
    }

     public static function getActiveDeliveries():Collection
    {
        return collect(DB::select("SELECT order_t.id,order_t.full_name,order_t.email,order_t.shippment_address,order_t.phone,order_t.status,product_items.name,order_items.quantity,order_items.amount,order_items.created_at,users.name as order_by from order_t JOIN
            order_items on order_t.id=order_items.order_id
            JOIN product_items on order_items.product_id=product_items.id
            JOIN users on order_t.retailor_id=users.id WHERE order_t.fk_supplier_id='".auth()->user()->id."' and order_t.status='assigned'"));
    }

      public static function getCompletedDeliveries():Collection
    {
        return collect(DB::select("SELECT order_t.id,order_t.full_name,order_t.email,order_t.shippment_address,order_t.phone,order_t.status,product_items.name,order_items.quantity,order_items.amount,order_items.created_at,users.name as order_by from order_t JOIN
            order_items on order_t.id=order_items.order_id
            JOIN product_items on order_items.product_id=product_items.id
            JOIN users on order_t.retailor_id=users.id WHERE order_t.fk_supplier_id='".auth()->user()->id."' and order_t.status='completed'"));
    }

   
}
