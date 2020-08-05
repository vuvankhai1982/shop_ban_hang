<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\Product;

class HomeController extends Controller
{
   public function index()
   {
       $products = Product::where('type_id', config('constants.product.types.noi_bat'))->orderBy('id', 'desc')->get();
       $dress = Product::where('category_id',3)->orderBy('id', 'desc')->get();
       $mens = Product::where('category_id',1)->orderBy('id', 'desc')->get();
       $categories = ProductCategory::all();

       return view('frontend.index',compact('products', 'categories','dress', 'mens'));
   }

   public function getCategory($id)
   {
       $items = Product::where('category_id', $id)->orderBy('id', 'desc')->paginate(5);
       $categories = ProductCategory::all();
       $bestsellers = Product::getBestsellers();

       return view('frontend.product_categories', compact('items', 'categories', 'bestsellers'));
   }

   public function  getProduct($id)
   {
       $item_view = Product::find($id);
       $view_images = ProductImage::where('product_id', $id)->get();
       $categories = ProductCategory::all();
       $bestsellers = Product::getBestsellers();

       return view('frontend.product', compact('item_view','view_images', 'categories', 'bestsellers'));
   }

   public function about()
   {
       $categories = ProductCategory::all();

       return view('frontend.about', compact('categories'));
   }

    public function contacts()
    {
        $categories = ProductCategory::all();

        return view('frontend.contacts', compact('categories'));
    }
}
