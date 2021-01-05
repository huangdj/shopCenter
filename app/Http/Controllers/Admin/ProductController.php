<?php /** @noinspection ALL */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\ProductValidate;

class ProductController extends Controller
{
    public function __construct()
    {
        view()->share([
            '_product' => 'am-active',
            'categories' => Category::get_categories(),
            'filter_categories' => Category::filter_categories()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::all_products($request);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductValidate $request)
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
        return redirect(route('admin.products.index'))->with('success', '新增成功~');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        return view('admin.product.edit', compact('product', 'p_categories'));
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
        $product = Product::find($id);
        $product->categories()->sync($request->category_id);

        $product->update($request->all());

        if ($request->has('imgs')) {
            foreach ($request->imgs as $img) {
                $product->product_galleries()->create(['img' => $img]);
            }
        }

        return redirect(route('admin.products.index'))->with('success', '编辑成功~');
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
        return back()->with('success', '被删商品已进入回收站~');
    }
}
