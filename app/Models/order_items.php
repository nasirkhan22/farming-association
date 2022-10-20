<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class order_items extends Model
{
    protected $table = 'order_items';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'product_id','user_id','order_id','quantity','item_price','amount'
    ];
    public static function getOrderItems($order_id): Collection
    {
        return collect(DB::select("SELECT order_items.product_id,order_items.quantity,order_items.item_price,order_items.amount,(SELECT product_items.name from product_items WHERE product_items.id=order_items.product_id) as product from order_items WHERE order_items.order_id='$order_id'"));

    }

}
