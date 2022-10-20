<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
class ProductItems extends Model
{
    protected $table = 'product_items';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'fk_category_id','name','price','quantity','image'
    ];

    public static function getCategoryWithItems($id): Collection
    {
        return collect(DB::select("SELECT pc.name as category,pi.id,pi.name,pi.price,pi.quantity,pi.image,pi.created_at from product_categories pc JOIN product_items pi on pc.id=pi.fk_category_id WHERE pc.fk_user_id=$id"));

    }

    public static function getItemsWithFarmers(): Collection
    {
        return collect(DB::select("SELECT u.id, u.name,u.email,u.address,u.phone, pi.name as item_name,pi.id as product_id,pi.price,pi.quantity,pi.image,pi.created_at as published_date, pc.name as category_name from product_items pi JOIN product_categories pc on pi.fk_category_id=pc.id join users u ON pc.fk_user_id=u.id where u.fk_role_id=1;"));

    }

    public static function getretailorProducts(): Collection
    {
        return collect(DB::select("SELECT u.id, u.name,u.email,u.address,u.phone, pi.name as item_name,pi.id as product_id,pi.price,pi.quantity,pi.image,pi.created_at as published_date, pc.name as category_name from product_items pi JOIN product_categories pc on pi.fk_category_id=pc.id join users u ON pc.fk_user_id=u.id where u.fk_role_id=2;"));

    }
    public function categories()
    {
        return $this->belongsTo('App\Models\ProductCategories', 'fk_category_id');
    }

}
