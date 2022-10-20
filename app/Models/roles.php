<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $table = 'roles';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name'
    ];
}
