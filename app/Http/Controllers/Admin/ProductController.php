<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        $products = Product::all();
        return view('admin.products.product', compact('products','categories'));
    }

    public function create()
    {
        $categories = ProductCategory::all();

        return view('admin.products.addproduct', compact('categories'));
    }

    public function store(Request $request)
    {
        $file = $request->image;

        $file->move('images', $request->image->getClientOriginalName());
        $filename = $request->image->getClientOriginalName();
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'content' => 'required',
            'status_id' => 'required',
            'type_id' => 'required',
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
        $categories = ProductCategory::all();
        $products = Product::find($id);

        return view('admin.products.editproduct', compact('products', 'categories'));
    }

    public function edit($id)
    {
        $categories = ProductCategory::all();
        $products = Product::find($id);
        return view('admin.products.editproduct', compact('products','categories'));
    }

    public function update(Request $request, $id)
    {
//        $file = $request->image;
//
//        $file->move('images', $request->image->getClientOriginalName());
//        $filename = $request->image->getClientOriginalName();
//        $request->validate([
//            'name' => 'required',
//            'category_id' => 'required',
//            'description' => 'required',
//            'content' => 'required',
//            'status_id' => 'required',
//            'type_id' => 'required',
//            'unit_price' => 'required',
//            'promotion_price' => 'required',
////            'image'  => 'required',
////            'thumbnail_image' => 'required'
//        ]);
//        $data['image'] =  $filename;
        $products = new Product;
        $data['name'] = $request->name;
        $data['category_id'] = $request->category_id;
        $data['description'] = $request->description;
        $data['content'] = $request->content;
        $data['status_id'] = $request->status_id;
        $data['type_id'] = $request->type_id;
        $data['unit_price'] = $request->unit_price;
        $data['promotion_price'] = $request->promotion_price;
        if ($request->hasFile('image')){
            $filename= $request->image->getClientOriginalName();
            $data['image'] = $filename;
            $file = $request->image;
            $file ->move('images', $filename);
        }
        $products::where('id', $id)->update( $data);

        return redirect()->intended('admin/products');
    }

    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();
        return back();
    }
}
