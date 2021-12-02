<?php /** @noinspection ALL */

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::all_products($request);
        return response()->json(compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());

        //相册
        if ($request->has('imgs')) {
            foreach ($request->imgs as $img) {
                $product->product_galleries()->create(['img' => $img]);
            }
        }

        //商品所属分类
        $product->categories()->sync($request->category_id);
        return response()->json(['success' => true, 'message' => '新增成功']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('categories', 'product_galleries')->find($id);
        //当前商品对应的分类id
        $p_categories = $product->categories->pluck('id');
        return response()->json(compact('product', 'p_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $request->all();

        $product = Product::find($id);
        $product->categories()->sync($request->category_id);

        $product->update($request->only('brand_id', 'name', 'image', 'price', 'is_top', 'is_recommend', 'is_hot', 'is_new', 'is_onsale', 'stock', 'description', 'content'));

        if ($request->has('imgs')) {
            foreach ($request->imgs as $img) {
                $product->product_galleries()->create(['img' => $img]);
            }
        }
        return response()->json(['success' => true, 'message' => '编辑成功']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(['success' => true, 'message' => '删除成功']);
    }
}
