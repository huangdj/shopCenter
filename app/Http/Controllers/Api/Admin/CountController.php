<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CountController extends Controller
{
    //本周起止时间unix时间戳
    private $week_start;
    private $week_end;

    function __construct()
    {
        $this->week_start = mktime(0, 0, 0, date("m"), date("d") - date("w") + 1, date("Y"));
        $this->week_end = mktime(23, 59, 59, date("m"), date("d") - date("w") + 7, date("Y"));
    }

    /**
     * 本周订单数
     * @return array
     */
    function sales_count()
    {
        return Cache::remember('xApi_visualization_sales_count', 60, function () {
            $count = [];
            for ($i = 0; $i < 7; $i++) {
                $start = date('Y-m-d H:i:s', strtotime("+" . $i . " day", $this->week_start));
                $end = date('Y-m-d H:i:s', strtotime("+" . ($i + 1) . " day", $this->week_start));

                //待支付
                $count['create'][] = Order::whereBetween('created_at', [$start, $end])->where('status', 1)->count();

                $count['pay'][] = Order::whereBetween('pay_time', [$start, $end])->where('status', 2)->count();

                $count['picking'][] = Order::whereBetween('picking_time', [$start, $end])->where('status', 3)->count();

                $count['shipping'][] = Order::whereBetween('shipping_time', [$start, $end])->where('status', 4)->count();

                $count['finish'][] = Order::whereBetween('finish_time', [$start, $end])->where('status', 5)->count();
            }

            $data = [
                'week_start' => date("Y年m月d日", $this->week_start),
                'week_end' => date("Y年m月d日", $this->week_end),
                'count' => $count,
            ];
            return $data;
        });

    }

    /**
     * 本周销售额
     * @return array
     */
    function sales_amount()
    {
        return Cache::remember('xApi_visualization_sales_amount', 60, function () {
            $amount = [];
            for ($i = 0; $i < 7; $i++) {
                $start = date('Y-m-d H:i:s', strtotime("+" . $i . " day", $this->week_start));
                $end = date('Y-m-d H:i:s', strtotime("+" . ($i + 1) . " day", $this->week_start));
                $amount['create'][] = Order::whereBetween('created_at', [$start, $end])->where('status', 1)->sum('total_price');
                $amount['pay'][] = Order::whereBetween('pay_time', [$start, $end])->where('status', '>', 1)->sum('total_price');
            }

            $data = [
                'week_start' => date("Y年m月d日", $this->week_start),
                'week_end' => date("Y年m月d日", $this->week_end),
                'amount' => $amount,
            ];
            return $data;
        });
    }
}
