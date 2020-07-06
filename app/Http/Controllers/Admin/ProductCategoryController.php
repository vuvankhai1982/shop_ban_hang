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

        return view('admin.product_categories.index', compact('categories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(ProductCategory $category)
    {
        //
    }

    public function update(Request $request, ProductCategory $category)
    {
        //
    }

    public function destroy(ProductCategory $category)
    {
        //
    }
}
