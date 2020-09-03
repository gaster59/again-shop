<?php

namespace App\Http\Controllers\Front;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Order;
use App\OrderDetail;
use App\Services\AlertService;
use DB;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    private $__country;
    private $__order;
    private $__orderDetail;
    private $__alertService;

    public function __construct(Country $country, Order $order, OrderDetail $orderDetail, AlertService $alertService)
    {
        $this->country      = $country;
        $this->order        = $order;
        $this->orderDetail  = $orderDetail;
        $this->alertService = $alertService;
    }

    public function index(Request $request)
    {
        $cart = $request->session()->get(SESSION_CART, []);
        if (empty($cart)) {
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
        try {
            DB::beginTransaction();
            $cart = $request->session()->get(SESSION_CART, []);
            if (empty($cart)) {
                return redirect(route('shop.index'));
            }
            $total = 0;
            foreach ($cart as $key => $item) {
                $total += (int)$item[0] * (int)$item[1];
            }
            $insertedOrder = $this->order->create([
                'memo'                => $request->memo,
                'total'               => $total,
                'customer_first_name' => $request->customer_first_name,
                'customer_last_name'  => $request->customer_last_name,
                'country_id'          => $request->country_id,
                'ip'                  => $request->ip(),
                'address'             => $request->address,
                'ship_address'        => $request->ship_address,
                'postal_code'         => $request->postal_code,
                'city'                => $request->city,
                'phone'               => $request->phone,
                'email'               => $request->email,
                'status'              => 0,
                'customer_id'         => 0,
            ]);

            foreach ($cart as $key => $item) {
                DB::table('order_details')->insert([
                    'order_id'     => $insertedOrder->id,
                    'product_id'   => $item[2]->id,
                    'product_name' => $item[2]->name,
                    'price'        => $item[2]->price,
                    'price_down'   => $item[2]->price_down,
                    'quantity'     => (int)$item[1],
                    'total'        => (int)$item[0] * (int)$item[1],
                ]);
            }
            $this->alertService->saveSessionSuccess('Order saved successfully');
            DB::commit();
        } catch (Exception $ex) {
            \Log::error($ex->getMessage());
            $this->alertService->saveSessionDanger('Order saved unsuccessfully');
            DB::rollBack();
        }
        $request->session()->put(SESSION_CART, []);
        return redirect(route('shop.index'));
    }
}
