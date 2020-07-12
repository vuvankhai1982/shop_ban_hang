<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'content',
        'status_id',
        'unit_price',
        'promotion_price',
        'image',
//        'thumbnail_image'
    ];
    public function product_categories(){
      return  $this->belongsTo('App\Models\ProductCategory', 'category_id', 'id');

    }
}
