<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();

        return view('admin.product_categories.category', compact('categories'));
    }

    public function create()
    {
        return view('admin.product_categories.category');
    }

    public function store(Request $request)
    {
       $request->validate([
           'name' => 'required'
       ]);
       ProductCategory::create($request->all());
       return back();
    }

    public function show($id)
    {
            $category = ProductCategory::find($id);
            return view('admin.product_categories.editcategory', compact('category'));
    }

    public function edit($id)
    {
        $category = ProductCategory::find($id);
        return view('admin.product_categories.editcategory', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $category = ProductCategory::find($id);
        $category->name = $request->get('name');
        $category->save();
        return redirect()->intended('admin/product-categories');
    }

    public function destroy($id)
    {
        $data = ProductCategory::find($id);
        $data->delete();
        return redirect()->intended('admin/product-categories');
    }
}
