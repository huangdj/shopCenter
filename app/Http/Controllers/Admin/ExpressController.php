<?php /** @noinspection ALL */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Express;
use Illuminate\Http\Request;
use App\Http\Requests\ExpressValidate;

class ExpressController extends Controller
{
    public function __construct()
    {
        view()->share([
            '_express' => 'am-active',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expresses = Express::orderBy('id', 'desc')->paginate(config('admin.page_size'));
        return view('admin.express.index', compact('expresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.express.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpressValidate $request)
    {
        Express::create($request->all());
        return redirect(route('admin.express.index'))->with('success', '添加成功~');
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
        $express = Express::find($id);
        return view('admin.express.edit', compact('express'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExpressValidate $request, $id)
    {
        $express = Express::find($id);
        $express->update($request->all());
        return redirect('/admin/express')->with('success', '修改成功~');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Express::destroy($id);
        return back()->with('success', '删除成功');
    }

    /**
     * Ajax修改属性
     * @param Request $request
     * @return array
     */
    function is_something(Request $request)
    {
        $attr = $request->attr;
        $express = Express::find($request->id);
        $value = $express->$attr ? false : true;
        $express->$attr = $value;
        $express->save();
    }
}
