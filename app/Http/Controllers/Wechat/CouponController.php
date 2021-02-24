<?php /** @noinspection ALL */

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    private $today;

    public function __construct()
    {
        view()->share(['_home' => 'on']);
        $this->today = date('Y-m-d', time()); // 当天日期
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 查出当前发放的有效优惠券
        $coupons = Coupon::where('enabled', true)->whereDate('not_after', '>=', $this->today)->orderBy('id', 'desc')->get();

        // 查出领取说明
        $receive = Config::find(1)->value('receive');
        return view('wechat.coupon.index', compact('coupons', 'receive'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
}
