<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DateTimeInterface;

class Product extends Model
{
    protected $guarded = ['category_id', 'imgs', 'file'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i:s');
    }

    // 商品属于品牌
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    // 商品属于主题
    public function theme()
    {
        return $this->belongsTo('App\Models\Theme');
    }

    //商品可以属于多个分类
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    //一个商品有很多相册图片
    public function product_galleries()
    {
        return $this->hasMany('App\Models\ProductGallery');
    }

    //一个商品有很多商品参数
    public function product_parames()
    {
        return $this->hasMany('App\Models\ProductParame');
    }

    /***
     * 增加库存
     * @param $num
     * @return int
     */
    public function addStock($num)
    {
        return $this->increment('stock', $num);
    }

    static function all_products(Request $request)
    {
        //多条件查找
        $where = function ($query) use ($request) {
            if ($request->has('name') and $request->name != '') {
                $search = "%" . $request->name . "%";
                $query->where('name', 'like', $search);
            }

            if ($request->has('is_seckill') and $request->is_seckill != '-1') {
                $query->where('is_seckill', $request->is_seckill);
            }

            if ($request->has('brand_id') and $request->brand_id != '') {
                $query->where('brand_id', $request->brand_id);
            }

            if ($request->has('is_top') and $request->is_top != '') {
                $query->where('is_top', true);
            }

            if ($request->has('is_recommend') and $request->is_recommend != '') {
                $query->where('is_recommend', true);
            }

            if ($request->has('is_hot') and $request->is_hot != '') {
                $query->where('is_hot', true);
            }

            if ($request->has('is_new') and $request->is_new != '') {
                $query->where('is_new', true);
            }

            if ($request->has('category_id') and $request->category_id != '') {
                $category_id = $request->category_id;
                $product_ids = \DB::table('category_product')->where('category_id', $category_id)->pluck('product_id');
                $query->whereIn('id', $product_ids);
            }

            if ($request->has('created_at') and $request->created_at != '') {
                $time = explode(",", $request->input('created_at'));
                $start = $time[0] . ' 00:00:00';
                $end = $time[1] . ' 23:59:59';
                $query->whereBetween('created_at', [$start, $end]);
            }
        };

        $products = Product::with('categories', 'brand', 'theme')
            ->where($where)
            ->orderBy('created_at', "desc")
            ->paginate(config('admin.page_size'));
        return $products;
    }

    public function order_products()
    {
        return $this->hasMany('App\Models\OrderProduct');
    }

    //检查当前商品是否有订单
    static function check_orders($id)
    {
        $product = self::with('order_products')->find($id);
        if ($product->order_products->isEmpty()) {
            return true;
        }
        return false;
    }
}
