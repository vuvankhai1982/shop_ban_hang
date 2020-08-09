<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\Product;
use App\Cart;
use Session;

class CartController extends Controller
{
public function AddCart($id)
    {
        $product = Product::where('id',$id)->first();
        if($product != null){
            $oldCart = Session('Cart') ? Session('Cart'):null;
            $newCart = new Cart($oldCart);
            $newCart = AddCart($product, $id);
            dd($newCart);
        }
    }
}
