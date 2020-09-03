<?php

namespace App\Http\Controllers\Front;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    private $__country;

    public function __construct(Country $country)
    {
        $this->country = $country;
    }

    public function index(Request $request)
    {
        $cart = $request->session()->get(SESSION_CART, []);
        if(empty($cart)) {
            return redirect(route('shop.index'));
        }

        $countries = $this->country->getCountries();

        return view('front.checkout.index', [
            'cart'      => $cart,
            'countries' => $countries,
        ]);
    }

    public function store(CheckoutRequest $request)
    {

    }
}
