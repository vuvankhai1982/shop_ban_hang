<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    use SoftDeletes;

    protected $table = 'product_images';

    protected $fillable = [
        'id',
        'product_id',
        'url_img'
    ];

    public function productimg()
    {
        return  $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
