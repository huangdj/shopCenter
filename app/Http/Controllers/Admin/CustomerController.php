<?php /** @noinspection ALL */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Point;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        view()->share([
            '_customer' => 'am-active',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //多条件查找
        $where = function ($query) use ($request) {
            if ($request->has('nickname') and $request->nickname != '') {
                $nickname = "%" . $request->nickname . "%";
                $query->where('nickname', 'like', $nickname);
            }

            if ($request->has('openid') and $request->openid != '') {
                $openid = "%" . $request->openid . "%";
                $query->where('openid', 'like', $openid);
            }

            if ($request->has('created_at') and $request->created_at != '') {
                $time = explode(" ~ ", $request->input('created_at'));
                foreach ($time as $k => $v) {
                    $time["$k"] = $k == 0 ? $v . " 00:00:00" : $v . " 23:59:59";
                }
                $query->whereBetween('created_at', $time);
            }
        };
        $customers = Customer::where($where)->orderBy('created_at', 'desc')->paginate(config('admin.page_size'));
        foreach ($customers as $k => $v) {
            $customers[$k]['points'] = Point::where('customer_id', $v->id)->sum('scores');
        }
        return view('admin.customer.index', compact('customers'));
    }
}
