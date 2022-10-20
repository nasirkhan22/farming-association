<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class cart extends Model
{
    protected $table = 'cart';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'product_id','user_id','quantity','item_price','price','status'
    ];

    public static function getCart($id): Collection
    {
        return collect(DB::select("SELECT cart.id as cartid, cart.product_id,cart.quantity,cart.item_price,cart.price,(SELECT product_items.name from product_items WHERE product_items.id=cart.product_id) as product from cart WHERE cart.user_id='$id';"));

    }





}
