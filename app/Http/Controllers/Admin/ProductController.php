<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.products.product', compact('products'));
    }


    public function create()
    {
        $categories = ProductCategory::all();
        return view('admin.products.addproduct', compact('categories'));
    }

    public function store(Request $request)
    {
        $filename = $request->image->getClientOriginalName();
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'content' => 'required',
            'status_id' => 'required',
            'unit_price' => 'required',
            'promotion_price' => 'required',
//            'image'  => 'required',
//            'thumbnail_image' => 'required'

        ]);
        $data = $request->all();
        $data['image'] =  $filename;
        Product::create($data);
        return back();
    }

    public function show($id)
    {
        $products = Product::find($id);
        return view('admin.products.editproduct', compact('products'));
    }


    public function edit($id)
    {
       $products = Product::find($id);
        return view('admin.products.editproduct', compact('products'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'content' => 'required',
            'status_id' => 'required',
            'unit_price' => 'required',
            'promotion_price' => 'required',
            'image' => 'required',
//            'thumbnail_image' => 'required'
        ]);
        $products = Product::find($id);
        $products->name = $request->get('name');
        $products->save();
        return redirect()->intended('admin/products');
    }


    public function destroy($id)
    {
        //
    }
}
