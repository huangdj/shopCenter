<?php /** @noinspection ALL */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\ProductParame;
use App\Models\Theme;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\ProductValidate;

class ProductController extends Controller
{
    public function __construct()
    {
        view()->share([
            '_product' => 'am-in',
            '_productList' => 'am-active',
            'categories' => Category::get_categories(),
            'brands' => Brand::orderBy('id', 'desc')->get(),
            'themes' => Theme::all(),
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

        $parame_names = $request->parame_name;
        $parame_values = $request->parame_value;
        $count = count($parame_names);
        for ($i = 0; $i < $count; $i++) {
            $array[] = ['parame_name' => $parame_names[$i], 'parame_value' => $parame_values[$i]];
        }

        //通过循环插入
        foreach ($array as $k => $v) {
            $product->product_parames()->create([
                'parame_name' => $v['parame_name'],
                'parame_value' => $v['parame_value'],
            ]);
        }
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
        $product = Product::with('categories', 'product_galleries', 'product_parames')->find($id);
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

        //更新商品参数
        $parame_names = $request->parame_name;
        $parame_values = $request->parame_value;
        $proper_ids = $request->id;
        $collection = collect($proper_ids);
        $unique = $collection->unique();

        //接收过来的两个数组重新组装成json格式
        $count = count($parame_names);
        for ($i = 0; $i < $count; $i++) {
            $array[] = ['parame_name' => $parame_names[$i], 'parame_value' => $parame_values[$i], 'pid' => $unique->values()[$i]];
        }

        //通过循环更新
        foreach ($array as $k => $v) {
            ProductParame::where('id', $v['pid'])->update([
                'parame_name' => $v['parame_name'],
                'parame_value' => $v['parame_value'],
            ]);
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

    /**
     * 更新库存
     * @param Request $request
     * @return array
     */
    function change_stock(Request $request)
    {
        $product = Product::find($request->id);
        $product->stock = $request->stock;
        $product->save();
    }

    /**
     * 更新满额
     * @param Request $request
     * @return array
     */
    function change_full_num(Request $request)
    {
        $product = Product::find($request->id);
        $product->full_num = $request->full_num;
        $product->save();
    }

    /**
     * 更新满额
     * @param Request $request
     * @return array
     */
    function change_discount(Request $request)
    {
        $product = Product::find($request->id);
        $product->discount = $request->discount;
        $product->save();
    }

    /**
     * 多选删除
     * @param Request $request
     */
    function destroy_checked(Request $request)
    {
        $checked_id = $request->checked_id;

        //检测商品是否能删除
        foreach ($checked_id as $id) {
            if (!Product::check_orders($id)) {
                return response()->json(['status' => false, 'message' => '编号' . $id . '的商品有订单，不能删除~']);
            }
        }

        Product::destroy($delete_id);
        return response()->json(['status' => true, 'message' => '删除成功~']);
    }

    /**
     * 改变属性
     * @param Request $request
     * @return array
     */
    function is_something(Request $request)
    {
        $attr = $request->attr;
        $product = Product::find($request->id);
        $value = $product->$attr ? false : true;
        $product->$attr = $value;
        $product->save();
    }
}
