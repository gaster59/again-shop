<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
        $id       = $request->id;
        $quantity = $request->quantity;
        $cart = $request->session()->get(SESSION_CART, []);

        if (!isset($cart[$id])) {
            $cart[$id] = (int) $quantity;
        } else {
            foreach ($cart as $productId => &$qty) {
                if ($id == $productId) {
                    $index = $productId;
                    ++$qty;
                    break;
                }
            }
        }

        $request->session()->put(SESSION_CART, $cart);
        return response()->json([
            'success' => 1,
        ]);
    }

    public function viewCart(Request $request)
    {
        dd($request->session()->get(SESSION_CART));
    }
}
