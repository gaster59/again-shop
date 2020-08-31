<?php

namespace App\Services;

use Illuminate\Http\Request;

class CartService {

    public function getInfoCart()
    {
        $cart = Request()->session()->get(SESSION_CART, []);
        $total = 0;
        foreach ($cart as $productId => $item) {
            $total += ($item[0] * $item[1]);
        }
        return [
            count($cart),
            $total
        ];
    }

}
