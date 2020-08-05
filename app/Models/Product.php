<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'id',
        'name',
        'category_id',
        'description',
        'content',
        'status_id',
        'type_id',
        'unit_price',
        'promotion_price',
        'image',
        'thumbnail_image'
    ];

    public function category()
    {
      return  $this->belongsTo('App\Models\ProductCategory', 'category_id', 'id');
    }

    public function images()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    public static function getBestsellers()
    {
        return Product::where('type_id', config('constants.product.types.ban_chay'))->get();
    }
}
