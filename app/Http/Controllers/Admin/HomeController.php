<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderRemind;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $today;
    private $month;
    private $year;

    public function __construct()
    {
        view()->share([
            '_admin' => 'am-active',
            'order_status' => config('admin.order_status')
        ]);

        $this->today = date('Y-m-d', time()); // 当天日期
        $this->month = date('m', time()); // 当月日期
        $this->year = date('Y', time()); // 当年年份
    }

    /***
     * 后台首页
     */
    public function index()
    {
        // 今日数据
        $today_orders = Order::whereDate('created_at', $this->today)->count();  // 今日订单总笔数
        $today_daifu_amount = Order::where('status', 1)->whereDate('created_at', $this->today)->sum('total_price');
        $today_chengjiao_amount = Order::whereIn('status', [5,6])->whereDate('finish_time', $this->today)->sum('total_price');
        $today_chengjiao_count = Order::whereIn('status', [5,6])->whereDate('finish_time', $this->today)->count();

        // 本月数据
        $month_orders = Order::whereMonth('created_at', $this->month)->count();  // 本月订单总笔数
        $month_daifu_amount = Order::where('status', 1)->whereMonth('created_at', $this->month)->sum('total_price');
        $month_chengjiao_amount = Order::whereIn('status', [5,6])->whereMonth('finish_time', $this->month)->sum('total_price');
        $month_chengjiao_count = Order::whereIn('status', [5,6])->whereMonth('finish_time', $this->month)->count();

        // 全部数据
        $year_orders = Order::whereYear('created_at', $this->year)->count();  // 全部订单总笔数
        $year_daifu_amount = Order::where('status', 1)->whereYear('created_at', $this->year)->sum('total_price');
        $year_chengjiao_amount = Order::whereIn('status', [5,6])->whereYear('finish_time', $this->year)->sum('total_price');
        $year_chengjiao_count = Order::whereIn('status', [5,6])->whereYear('finish_time', $this->year)->count();

        // 在线用户数
        $customer_count = Customer::count();
        return view('admin.index', compact('today_orders', 'today_daifu_amount', 'today_chengjiao_amount', 'today_chengjiao_count',
            'month_orders', 'month_daifu_amount', 'month_chengjiao_amount', 'month_chengjiao_count',
            'year_orders', 'year_daifu_amount', 'year_chengjiao_amount', 'year_chengjiao_count', 'customer_count'));
    }

    /***
     * 加载修改密码页面
     */
    public function change_password()
    {
        return view('admin.config.change_password');
    }


    /**
     * 执行修改密码
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_password(Request $request)
    {
        $user = \Auth::user();

        if (!\Hash::check($request->oldpassword, $user->password)) {
            return back()->with('error', '原始密码输入错误~');
        }

        if ($request->password == '') {
            return back()->with('error', '请输入新密码~');
        }

        if ($request->password != $request->newpassword) {
            return back()->with('error', '两次密码输入不一致~');
        }

        $user->password = bcrypt($request->input('password'));
        $user->save();
        $request->session()->invalidate(); //修改密码后，清除session，退到登录页面

        return redirect(route('login'))->with('success', '您已成功修改密码,请重新登录~');
    }

    /***
     * 今日订单详情
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function today_orders(Request $request)
    {
        $where = function ($query) use ($request) {
            if ($request->has('status') and $request->status != '-1') {
                $query->where('status', $request->status);
            }
        };
        $orders = Order::with('customer')->whereDate('created_at', $this->today)->where($where)->paginate(env('admin.page_size'));
        return view('admin.today_orders', compact('orders'));
    }

    /***
     * 本月订单详情
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function month_orders(Request $request)
    {
        $where = function ($query) use ($request) {
            if ($request->has('status') and $request->status != '-1') {
                $query->where('status', $request->status);
            }
        };
        $orders = Order::with('customer')->whereMonth('created_at', $this->month)->where($where)->paginate(env('admin.page_size'));
        return view('admin.month_orders', compact('orders'));
    }

    /***
     * 全部订单详情
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function year_orders(Request $request)
    {
        $where = function ($query) use ($request) {
            if ($request->has('status') and $request->status != '-1') {
                $query->where('status', $request->status);
            }
        };
        $orders = Order::with('customer')->whereYear('created_at', $this->year)->where($where)->paginate(env('admin.page_size'));
        return view('admin.year_orders', compact('orders'));
    }
}
