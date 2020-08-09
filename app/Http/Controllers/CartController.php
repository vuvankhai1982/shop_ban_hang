<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Session;

class CartController extends Controller
{
    public function add(int $id)
    {
//        session(['cart' => null]);
        $data = [
            'product_id' => $id,
            'quantity' => 1
        ];

        $cart = session('cart') ?? [];

        if (isset($cart[$id])) {
            $data = [
                'product_id' => $id,
                'quantity' => ( $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1 )
            ];
        }

        $cart[$id] = $data;

        session(['cart' => $cart]);
//        session(['cart' => null]);

        return redirect()->route("cart.index")->withSuccess('Thanh cong');
    }

    public function index()
    {
        $cart = session('cart');
        $categories = ProductCategory::all();

        $products = Product::whereIn('id', array_keys($cart))->get();

        return view('frontend.carts.index', compact('cart', 'products', 'categories'));
    }
}
