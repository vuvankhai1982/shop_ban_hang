<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
   public function index(){
       $categories = ProductCategory::all();
       $products = Product::where('type_id', 1)->orderBy('id', 'desc')->get();
       $dress = Product::where('category_id',3)->orderBy('id', 'desc')->get();
       $mens = Product::where('category_id',1)->orderBy('id', 'desc')->get();
       return view('frontend.index',compact('products', 'categories','dress', 'mens'));
   }

   public  function getCategory($id){

       $categories = ProductCategory::all();
       $items = Product::where('category_id', $id)->orderBy('id', 'desc')->paginate(5);
       return view('frontend.product_categories', compact('items', 'categories'));

   }
   public function  getProduct($id){
       $categories = ProductCategory::all();
       $item_view = Product::find($id);
       return view('frontend.product',compact('item_view','categories'));
   }
}
