<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class retailor_products extends Model
{
    protected $table = 'retailor_products';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name','price','perceptions','image','retailor_id'
    ];
    public static function getretailorProducts($retailor_id=0): Collection
    {
        if($retailor_id==0){
        return collect(DB::select("SELECT retailor_products.id, retailor_products.created_at,retailor_products.name,retailor_products.price,retailor_products.perceptions,retailor_products.image,users.name as retailor_name,users.email,users.address
            from retailor_products
            JOIN users
            on retailor_products.retailor_id=users.id"));
        }else{
            return collect(DB::select("SELECT retailor_products.id, retailor_products.created_at,retailor_products.name,retailor_products.price,retailor_products.perceptions,retailor_products.image,users.name as retailor_name,users.email,users.address
                from retailor_products
                JOIN users
                on retailor_products.retailor_id=users.id where retailor_products.retailor_id='".$retailor_id."'"));
        }

    }
}
