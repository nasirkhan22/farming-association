<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    protected $table = 'product_categories';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name','fk_user_id','isActive'
    ];

    public function items()
    {
        return $this->hasMany('App\Models\ProductItems', 'fk_category_id','id');
    }
}
