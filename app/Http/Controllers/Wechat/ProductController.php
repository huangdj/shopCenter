<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {

    }

    public function category()
    {
        $parent_categories = Category::where('parent_id', 0)->get();
        $categories = Category::get_categories();
        return view('wechat.product.category', compact('parent_categories', 'categories'));
    }

    public function show($id)
    {
        $product = Product::with('product_galleries', 'product_parames')->find($id);
//        return $product;
        $collection = Collection::where('customer_id', 88)->where('product_id', $id)->first();
//        return $collection;
        return view('wechat.product.show', compact('product', 'collection'));
    }
}
