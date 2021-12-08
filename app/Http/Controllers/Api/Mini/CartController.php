<?php /** @noinspection ALL */

namespace App\Http\Controllers\Api\Mini;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /***
     * 加入购物车
     * @param Request $request
     */
    public function store(Request $request)
    {
        //判断购物车是否有当前商品,如果有,那么 num +1
        $product_id = $request->product_id;
        $cart = Cart::where('product_id', $product_id)->where('user_id', auth('users')->user()->id)->first();

        if ($cart) {
            Cart::where('id', $cart->id)->increment('num');
            return response()->json(['status' => true, 'message' => '添加成功~']);
        }

        //否则购物车表,创建新数据
        Cart::create([
            'product_id' => $request->product_id,
            'user_id' => auth('users')->user()->id,
        ]);

        return response()->json(['status' => true, 'message' => '添加成功~']);
    }

    /***
     * 购物车首页
     */
    public function index()
    {
        $carts = Cart::with('product')->where('user_id', auth('users')->user()->id)->orderBy('id', 'desc')->get();
        $count = Cart::count_carts($carts);

        return response()->json(compact('carts', 'count'));
    }

    /***
     * 改变数量
     * @param Request $request
     * @return array
     */
    public function change_num(Request $request, $id)
    {
        if ($request->type == 'add') {
            Cart::where('id', $id)->increment('num');
        } else {
            $result = Cart::where('id', $id)->first();
            if($result->num == 1){
                return response()->json(['status'=>false, 'message'=>'数量已达最小值']);
            }
            Cart::where('id', $id)->decrement('num');
        }
        return Cart::count_carts();
    }

    /***
     * 删除
     * @param Request $request
     * @return array
     */
    public function destroy(Request $request)
    {
        Cart::destroy($request->id);
        return Cart::count_carts();
    }
}
