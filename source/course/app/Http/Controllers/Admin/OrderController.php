<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Services\AlertService;
use DB;
use Illuminate\Http\Request;

class OrderController extends BaseAdminController
{

    private $__order;
    private $__alertService;

    public function __construct(Order $order, AlertService $alertService)
    {
        $this->order        = $order;
        $this->alertService = $alertService;
    }

    public function index(Request $request)
    {
        $orders = $this->order->getOrdersPaginate(config('paginate.back-end'));
        return view('admin.order.index', [
            'orders' => $orders,
        ]);
    }

    public function detail($id, Request $request)
    {
        $orderDetails = DB::table('orders')->select('order_details.*')
            ->join('order_details', 'order_details.order_id', '=', 'orders.id')
            ->where('order_details.order_id', $id)
            ->get();

        return view('admin.order.detail', [
            'orderDetails' => $orderDetails,
        ]);
    }

    public function delete($id)
    {
        try {
            $auth              = \Auth::guard('admin')->user();
            $order             = $this->order->where('id', $id)->first();
            $order->deleted_by = $auth->id;
            $order->update();
            $order->delete();
            $this->alertService->saveSessionSuccess('Order deleted successfully');
            DB::commit();
        } catch (Exception $ex) {
            \Log::error($ex->getMessage());
            $this->alertService->saveSessionDanger('Order deleted unsuccessfully');
            DB::rollBack();
        }
        return redirect(route('admin.order.index'));
    }

}
