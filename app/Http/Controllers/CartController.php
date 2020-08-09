<?php

namespace App\Http\Controllers;

use Session;

class CartController extends Controller
{
    public function AddCart(int $id)
    {
        $data = [
            'product_id' => $id,
            'quantity' => 1
        ];

        $cart = Session('cart') ?? [];

        if (isset($cart[$id])) {
            $data = [
                'product_id' => $id,
                'quantity' => ( $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1 )
            ];
        }

        $cart[$id] = $data;

        session(['cart' => $cart]);

        return redirect()->back()->withSuccess('Thanh cong');
    }
}
