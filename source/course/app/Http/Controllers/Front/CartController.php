<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use App\Services\AlertService;
use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;

class CartController extends Controller {

	private $__alertService;
	private $__product;

	public function __construct(Product $product, AlertService $alertService) {
		$this->alertService = $alertService;
		$this->product = $product;
	}

	/**
	 * @method index
	 * @param Request $request
	 * @return view
	 */
	public function index(Request $request) {
		$cart = $request->session()->get(SESSION_CART, []);

		return view('front.cart.index', [
			'cart' => $cart,
		]);
	}

	/**
	 * @method addtoCart
	 * @param Request $request
	 * @return json
	 */
	public function addToCart(Request $request) {
		$result = [];
		try {
			$id = $request->id;
			$detailProduct = $this->product->getDetailProduct($id);
			if ($detailProduct == null) {
				$result = ['success' => 0];
				return response()->json($result);
			}
			$quantity = $request->quantity;
			$cart = $request->session()->get(SESSION_CART, []);

			if (!isset($cart[$id])) {
				$cart[$id] = [
					$detailProduct->price_down == 0 ? $detailProduct->price : $detailProduct->price_down,
					(int) $quantity,
					$detailProduct,
				];
			} else {
				$cart[$id][1] = $cart[$id][1] + $quantity;
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
				'message' => 'Added item to cart successfully',
			];
		} catch (Exception $ex) {
			\Log::error($ex->getMessage());
			$result = ['success' => 0];
		}
		return response()->json($result);
    }
    
    public function updateToCart(CartRequest $request)
    {

    }

	public function viewCart(Request $request) {
		dd($request->session()->get(SESSION_CART));
	}
}
