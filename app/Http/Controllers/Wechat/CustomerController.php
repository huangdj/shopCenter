<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Collection;
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
        return view('wechat.customer.index');
    }

    /***
     * 购物车收藏
     * @param Request $request
     */
    public function add_collection(Request $request)
    {
        $product_id = $request->product_id;
        $product = Collection::where('customer_id', 88)->where('product_id', $product_id)->first();
        if ($product) {
            return response()->json(['success' => false, 'message' => '您已经收藏了']);
        }
        Collection::create([
            'product_id' => $product_id,
            'customer_id' => 88
        ]);
        return response()->json(['success' => true, 'message' => '收藏成功']);
    }

    // 我的收藏
    public function collection()
    {
        $collections = Collection::with('product')->orderBy('created_at', 'desc')->get();
        return view('wechat.customer.collection', compact('collections'));
    }
}
