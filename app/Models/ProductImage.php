<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    use SoftDeletes;

    protected $table = 'product_images';

    protected $fillable = [
        'product_id',
        'images'
    ];

    public function products()
    {
        return  $this->belongsTo('App\Models\Product');
    }
}
