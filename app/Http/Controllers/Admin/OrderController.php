<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Express;

class OrderController extends Controller
{
    public function __construct()
    {
        view()->share([
            '_order' => 'am-active',
            'order_status' => config('admin.order_status')
        ]);
    }

    /***
     * 订单列表
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        //多条件查找
        $where = function ($query) use ($request) {
            if ($request->has('out_trade_no') and $request->out_trade_no != '') {
                $search = "%" . $request->out_trade_no . "%";
                $query->where('out_trade_no', 'like', $search);
            }

            if ($request->has('customer_id') and $request->customer_id != '') {
                $query->where('customer_id', $request->customer_id);
            }

            if ($request->has('status') and $request->status != '-1') {
                $query->where('status', $request->status);
            }

            if ($request->has('created_at') and $request->created_at != '') {
                $time = explode(" ~ ", $request->input('created_at'));
                foreach ($time as $k => $v) {
                    $time["$k"] = $k == 0 ? $v . " 00:00:00" : $v . " 23:59:59";
                }
                $query->whereBetween('created_at', $time);
            }
        };
        $orders = Order::with('order_products.product', 'customer', 'address')->where($where)->orderBy('created_at', 'desc')
            ->paginate(config('admin.page_size'));
        return view('admin.order.index', compact('orders'));
    }

    /***
     * 订单详情
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $expresses = Express::orderBy('id', 'desc')->get();
        $order = Order::with('address', 'express', 'customer', 'order_products.product')->find($id);
        return view('admin.order.show', compact('order', 'expresses'));
    }

    /**
     * 更新订单状态为：待发货
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $order = order::find($id);
        $order->express_code = $request->express_code;
        //只有当前在未发货状态下，才修改订单状态
        if ($order->status == 1) {
            $order->status = 2;
        }
        $order->save();
        return back()->with('notice', '发货成功');
    }

    /**
     * 更新状态为：配货
     * @param Request $request
     * @return array
     */
    public function picking(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = 3;
        $order->picking_time = \Carbon\Carbon::now();
        $order->save();
    }

    /**
     * 更新状态为：发货
     * @param Request $request
     * @return array
     */
    public function shipping(Request $request)
    {
        $order = Order::find($request->id);
        if ($request->status == 3) {
            $order->status = 4;
            $order->shipping_time = \Carbon\Carbon::now();
        }

        $order->express_code = $request->express_code;
        $order->express_id = $request->express_id;
        $order->save();
    }

    /**
     * 更新状态为：交易成功
     * @param Request $request
     * @return array
     */
    public function finish(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = 5;
        $order->finish_time = \Carbon\Carbon::now();
        $order->save();
    }
}
