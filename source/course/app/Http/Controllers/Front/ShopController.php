<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        return view('front.shop.index');
    }
}
