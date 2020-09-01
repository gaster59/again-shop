<?php

namespace App\Services;

use Illuminate\Http\Request;

class CartService {

    /**
     * @method getInfoCart
     * @return Array
     */
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

    /**
     * @method getSubTotal
     * @return Integer
     */
    public function getSubTotal($price, $quality)
    {
        try {
            return (int)$price * (int)$quality;
        } catch(Exception $ex) {
            return 0;
        }
    }

}
