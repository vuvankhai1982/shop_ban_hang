<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
   public function index(){
//       $categories = ProductCategory::all();
       $products = Product::where('type_id', config('constants.product.types.noi_bat'))->orderBy('id', 'desc')->get();
       $dress = Product::where('category_id',3)->orderBy('id', 'desc')->get();
       $mens = Product::where('category_id',1)->orderBy('id', 'desc')->get();
       return view('frontend.index',compact('products', 'categories','dress', 'mens'));
   }

   public  function getCategory($id){

//       $categories = ProductCategory::all();
       $items = Product::where('category_id', $id)->orderBy('id', 'desc')->paginate(5);
//       $bestsellers = Product::where('type_id', config('constants.product.types.ban_chay'))->get();
       return view('frontend.product_categories', compact('items', 'categories'));

   }

   public function  getProduct($id){
//       $categories = ProductCategory::all();
       $item_view = Product::find($id);
       $images = ProductImage::find($id);
//       $bestsellers = Product::where('type_id', config('constants.product.types.ban_chay'))->get();
       return view('frontend.product',compact('item_view','images'));
   }

   public function about(){
//       $categories = ProductCategory::all();
       return view('frontend.about', compact('categories'));
   }

    public function contacts(){
//        $categories = ProductCategory::all();
        return view('frontend.contacts', compact('categories'));
    }
}
