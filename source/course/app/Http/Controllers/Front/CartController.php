<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\AlertService;
use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller {

    private $__alertService;
    private $__product;

	public function __construct(Product $product, AlertService $alertService) {
        $this->alertService = $alertService;
        $this->product = $product;
	}

	public function addToCart(Request $request) {
        $result = [];
        try {
            // $request->session()->flush();
            $id = $request->id;
            $detailProduct = $this->product->getDetailProduct($id);
            if($detailProduct == null) {
                $result = ['success' => 0];
                return response()->json($result);
            }
            $quantity = $request->quantity;
            $cart = $request->session()->get(SESSION_CART, []);
    
            if (!isset($cart[$id])) {
                $cart[$id] = [
                    $detailProduct->price_down == 0 ? $detailProduct->price : $detailProduct->price_down,
                    (int) $quantity
                ];
            } else {
                foreach ($cart as $productId => &$item) {
                    if ($id == $productId) {
                        $index = $productId;
                        ++$item[1];
                        break;
                    }
                }
            }

            $money = 0;
            foreach ($cart as $productId => $item) {
                $money += ($item[0] * $item[1]);
            }

            $request->session()->put(SESSION_CART, $cart);
            $result = [
                'success' => 1, 
                'total' => count($cart),
                'money' => $money,
                'message' => 'Added item to cart successfully'
            ];
        } catch(Exception $ex) {
            \Log::error($ex->getMessage());
            $result = ['success' => 0];
        }
        return response()->json($result);
	}

	public function viewCart(Request $request) {
		dd($request->session()->get(SESSION_CART));
	}
}
