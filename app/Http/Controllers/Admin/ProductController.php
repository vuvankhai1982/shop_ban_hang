<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;

use DB;
use Session;
use Symfony\Component\Console\Input\Input;
use function GuzzleHttp\Psr7\str;

class ProductController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        $products = Product::orderBy('id', 'desc')->paginate(5);

        return view('admin.products.product', compact('products','categories'));
    }

    public function create()
    {
        $categories = ProductCategory::all();

        return view('admin.products.addproduct', compact('categories'));
    }

    public function store(Request $request)
    {
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->move('images', $file_name);
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->content = $request->contents;
        $product->status_id = $request->status_id;
        $product->type_id = $request->type_id;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->image =  $file_name;
        $product->save();
        $product_id = $product->id;

        if ($request->file('images')){
            foreach ($request->file('images') as $fileimg){
                $product_img = new ProductImage();
                $product_img->images = $fileimg->getClientOriginalName();
                $product_img->product_id = $product_id;
                $fileimg->move('imgproducts', $fileimg->getClientOriginalName());
                $product_img->save();
            }
        }

        Session::put('message', 'Thêm sản phẩm thành công!');
        return redirect()->intended('admin/products');
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
        $products = new Product;
        $data['name'] = $request->name;
        $data['category_id'] = $request->category_id;
        $data['description'] = $request->description;
        $data['content'] = $request->contents;
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

        Session::put('message', 'Sửa sản phẩm thành công!');
        return redirect()->intended('admin/products');
    }

    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();

        Session::put('message', 'Xóa sản phẩm thành công!');
        return back();
    }
}
