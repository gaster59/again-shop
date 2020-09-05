<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Product;
use App\Services\AlertService;
use Illuminate\Http\Request;

class CartController extends Controller
{

    private $__alertService;
    private $__product;

    public function __construct(Product $product, AlertService $alertService)
    {
        $this->alertService = $alertService;
        $this->product      = $product;
    }

    /**
     * @method index
     * @param Request $request
     * @return view
     */
    public function index(Request $request)
    {
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
    public function addToCart(Request $request)
    {
        $result = [];
        try {
            $id            = $request->id;
            $detailProduct = $this->product->getDetailProduct($id);
            if (null == $detailProduct) {
                $result = ['success' => 0];
                return response()->json($result);
            }
            $quantity = $request->quantity;
            $cart     = $request->session()->get(SESSION_CART, []);

            if ($detailProduct->price != 0) {
                if (!isset($cart[$id])) {
                    $cart[$id] = [
                        $detailProduct->price_down == 0 ? $detailProduct->price : $detailProduct->price_down, // price
                        (int)$quantity, // quantity
                        $detailProduct, // product info
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
                    'total'   => count($cart),
                    'money'   => $money,
                    'message' => 'Added item to cart successfully',
                ];
            }
        } catch (Exception $ex) {
            \Log::error($ex->getMessage());
            $result = ['success' => 0];
        }
        return response()->json($result);
    }

    /**
     * @method updateToCart
     * @param CartRequest $request
     * @return redirect
     */
    public function updateToCart(CartRequest $request)
    {
        $cart = $request->session()->get(SESSION_CART, []);
        // if empty cart, redirect to index
        if (empty($cart)) {
            $request->session()->put(SESSION_CART, []);
            return redirect(route('shop.index'));
        }

        $updateCarts = $request->cart;
        // if empty request update cart, redirect to index
        if (empty($updateCarts)) {
            return redirect(route('shop.index'));
        }
        $updated = [];
        foreach ($updateCarts as $productId => $item) {
            $updated[]           = $productId;
            $cart[$productId][1] = (int)$item['quantity'];
        }

        $tempCart = $cart;
        foreach ($cart as $key => $item) {
            if (!in_array($key, $updated)) {
                unset($tempCart[$key]);
            }
        }
        $request->session()->put(SESSION_CART, $tempCart);
        return redirect(route('shop.cart.index'));
    }

    public function viewCart(Request $request)
    {
        dd($request->session()->get(SESSION_CART));
    }
}
