<?php /** @noinspection ALL */

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Coupon;
use App\Models\GetCoupon;
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
        $coupon_id = $request->coupon_id;
        $coupon = GetCoupon::where('coupon_id', $coupon_id)->where('customer_id', session('wechat.customer.id'))->first();

        if ($coupon) {
            return response()->json(['success' => false, 'message' => '您已领取过了，请勿重复领取~']);
        }

        //否则领券表,创建新数据
        GetCoupon::create([
            'coupon_id' => $request->coupon_id,
            'customer_id' => session('wechat.customer.id'),
        ]);

        // 领取成功后，削减优惠券总数,增加领取数
        Coupon::where('id', $coupon_id)->decrement('total');
        Coupon::where('id', $coupon_id)->increment('recived');
        return response()->json(['success' => true, 'message' => '领取成功~']);
    }
}
