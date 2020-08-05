<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
   public function index(){
       $products = Product::where('type_id', config('constants.product.types.noi_bat'))->orderBy('id', 'desc')->get();
       $dress = Product::where('category_id',3)->orderBy('id', 'desc')->get();
       $mens = Product::where('category_id',1)->orderBy('id', 'desc')->get();
       return view('frontend.index',compact('products', 'categories','dress', 'mens'));
   }

   public  function getCategory($id){
       $items = Product::where('category_id', $id)->orderBy('id', 'desc')->paginate(5);
       return view('frontend.product_categories', compact('items', 'categories'));
   }

   public function  getProduct($id){
       $item_view = Product::find($id);
       $view_images = ProductImage::where('product_id', $id)->get();
       return view('frontend.product',compact('item_view','view_images'));
   }

   public function about(){
       return view('frontend.about', compact('categories'));
   }

    public function contacts(){
        return view('frontend.contacts', compact('categories'));
    }
}
