<?php /** @noinspection ALL */

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->paginate(config('admin.page_size'));
        return response()->json(compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Brand::create($request->all());
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
        $brand = Brand::find($id);
        return response()->json(compact('brand'));
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
        $brand = Brand::find($id);
        $brand->update($request->all());
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
        Brand::destroy($id);
        return response()->json(['success' => true, 'message' => '删除成功']);
    }

    public function delete_all(Request $request)
    {
        Brand::destroy($request->checked_id);
        return response()->json(['status' => true, 'message' => '删除成功']);
    }

    /**
     * 改变属性
     * @param Request $request
     * @return array
     */
    function change_attr(Request $request)
    {
        $brand = Brand::find($request->id);
        $value = $brand->is_show ? false : true;
        $brand->is_show = $value;
        $brand->save();
        return response()->json(['status' => true, 'message' => '改变成功']);
    }
}
