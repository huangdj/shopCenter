<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    protected $guarded = [];

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id', 'id');
    }

    /**
     * 生成分类数据
     * @return mixed
     */
    static function get_categories()
    {
        $categories = Cache::rememberForever('shop_categories', function () {
            return self::with([
                'children' => function ($query) {
                    $query->orderBy('id');
                }
            ])->where('parent_id', 0)->orderBy('id')->get();
        });

        return $categories;
    }

    //清除缓存
    static function clear()
    {
        Cache::forget('shop_categories');
    }

    /**
     * 检查是否有子分类
     */
    static function check_children($id)
    {
        $category = self::with('children')->find($id);
        if ($category->children->isEmpty()) {
            return true;
        }
        return false;
    }

    /**
     * 检查当前分类是否有商品
     */
    static function check_products($id)
    {
        $category = self::with('products')->find($id);
        if ($category->products->isEmpty()) {
            return true;
        }
        return false;
    }
}
