<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use SoftDeletes;

    protected $table = 'product_categories';
    protected $fillable = [
        'name',
    ];
    public function products(){
        return $this->hasMany('App\Models\ProductCategory', 'category_id', 'id');
    }
}
