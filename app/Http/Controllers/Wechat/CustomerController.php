<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function __construct()
    {
        view()->share(['_customer' => 'on']);
    }

    // 我的
    public function index()
    {
        $customer = Customer::find(session('wechat.customer.id'));
        $count_collections = Collection::where('customer_id', session('wechat.customer.id'))->count();
        return view('wechat.customer.index', compact('customer', 'count_collections'));
    }

    /***
     * 购物车收藏
     * @param Request $request
     */
    public function add_collection(Request $request)
    {
        $product_id = $request->product_id;
        $product = Collection::where('customer_id', session('wechat.customer.id'))->where('product_id', $product_id)->first();
        // 如果已经收藏了
        if ($product) {
            Collection::where('customer_id', session('wechat.customer.id'))->where('product_id', $product_id)->delete();
            return response()->json(['success' => false, 'message' => '您取消了收藏']);
        }
        Collection::create([
            'product_id' => $product_id,
            'customer_id' => session('wechat.customer.id')
        ]);
        return response()->json(['success' => true, 'message' => '收藏成功']);
    }

    // 我的收藏
    public function collection()
    {
        $collections = Collection::where('customer_id', session('wechat.customer.id'))->with('product')->orderBy('created_at', 'desc')->get();
        return view('wechat.customer.collection', compact('collections'));
    }
}
