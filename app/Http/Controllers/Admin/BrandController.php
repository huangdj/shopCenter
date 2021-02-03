<?php /** @noinspection ALL */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandValidate;

class BrandController extends Controller
{
    public function __construct()
    {
        view()->share([
            '_product' => 'am-in',
            '_brand' => 'am-active',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $where = function ($query) use ($request) {
            if ($request->has('keyword') and $request->keyword != '') {
                $search = "%" . $request->keyword . "%";
                $query->where('name', 'like', $search);
            }
        };
        $brands = Brand::where($where)->orderBy('id', 'desc')->paginate(config('admin.page_size'));
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandValidate $request)
    {
        if ($request->is_show == 1) {
            $res = Brand::where('is_show', true)->first();
            if ($res) {
                return back()->with('error', '已有置左数据，请勿重复添加');
            }
        }
        Brand::create($request->all());
        return redirect(route('admin.brands.index'))->with('success', '添加成功');
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
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * 如果数据库中已有置左数据，不能再设置置左，只能编辑其他内容
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->is_show == 1) {
            $res = Brand::where('is_show', true)->first();
            if ($res) {
                return back()->with('error', '已有置左数据，请勿添加');
            }

            $brand = Brand::find($id);
            $brand->update($request->all());
            return redirect(route('admin.brands.index'))->with('success', '编辑成功');
        }
        $brand = Brand::find($id);
        $brand->update($request->all());
        return redirect(route('admin.brands.index'))->with('success', '编辑成功');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::destroy($id);
        return back()->with('success', '删除成功');
    }
}
