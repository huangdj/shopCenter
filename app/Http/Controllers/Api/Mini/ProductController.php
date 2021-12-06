<?php

namespace App\Http\Controllers\Api\Mini;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Searche;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /***
     * 商品列表
     * @param Request $request
     */
    public function index(Request $request)
    {
        $where = function ($query) use ($request) {
            if ($request->has('category_id') and $request->category_id != '') {
                $category_id = $request->category_id;
                $product_ids = \DB::table('category_product')->where('category_id', $category_id)->pluck('product_id');
                $query->whereIn('id', $product_ids)->where('is_seckill', false);
            }
        };
        $products = Product::where($where)->orderBy('is_top', "desc")->orderBy('created_at')->get();
        return response()->json(compact('products'));
    }
    /***
     * 商品分类
     */
    public function category()
    {
        $categories = Category::get_categories();
        return response()->json(compact('categories'));
    }

    /***
     * 商品详情
     * @param $id
     */
    public function show($id)
    {
        $product = Product::with('product_galleries')->find($id);
        $products = Product::where('is_onsale', true)->where('is_hot', true)->where('is_seckill', false)->where('is_recommend', true)->where('id', '<>', $id)->get();
        return response()->json(compact('products', 'product'));
    }
}
