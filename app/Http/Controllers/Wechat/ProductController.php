<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Appraise;
use App\Models\Category;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /***
     * 商品列表
     * @param Request $request
     */
    public function index(Request $request)
    {
        $where = function ($query) use ($request) {
            if ($request->has('brand_id') and $request->brand_id != '') {
                $query->where('brand_id', $request->brand_id);
            }
        };
        $products = Product::where($where)->orderBy('is_top', "desc")->orderBy('created_at')->get();
        return view('wechat.product.index', compact('products'));
    }

    /***
     * 商品分类
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category()
    {
        $parent_categories = Category::where('parent_id', 0)->get();
        $categories = Category::get_categories();
        return view('wechat.product.category', compact('parent_categories', 'categories'));
    }

    /***
     * 商品详情
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $product = Product::with('product_galleries', 'product_parames')->find($id);
        $collection = Collection::where('customer_id', session('wechat.customer.id'))->where('product_id', $id)->first();

        // 热卖推荐
        $products = Product::where('is_hot', true)->orWhere('is_recommend', true)->where('id', '<>', $id)->get();

        // 相关推荐
        $recommends = Product::where('is_onsale', true)->where('is_recommend', 'true')->where('id', '<>', $id)->take(4)->get();

        // 商品评价
        $appraise = Appraise::where('product_id', $id)->where('is_show', true)->orderBy('id', 'desc')->first();

        // 商品评价总数
        $total_num = Appraise::where('product_id', $id)->where('is_show', true)->count();
        return view('wechat.product.show', compact('product', 'collection', 'products', 'recommends', 'appraise', 'total_num'));
    }

    /***
     * 评价列表
     */
    public function appraise($id)
    {
        $appraises = Appraise::where('product_id', $id)->where('is_show', true)->orderBy('id', 'desc')->get();
        return view('wechat.product.appraise', compact('appraises'));
    }
}
