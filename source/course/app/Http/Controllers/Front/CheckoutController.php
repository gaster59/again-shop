<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $cart = $request->session()->get(SESSION_CART, []);

        return view('front.checkout.index', [
            'cart' => $cart,
        ]);
    }
}
