<?php /** @noinspection ALL */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appraise;
use Illuminate\Http\Request;

class AppraiseController extends Controller
{
    public function __construct()
    {
        view()->share([
            '_appraise' => 'am-active',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appraises = Appraise::with('customer')->orderBy('created_at', 'desc')->paginate(config('admin.page_size'));
        return view('admin.appraise.index', compact('appraises'));
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

    /***
     * 删除
     * @param $id
     */
    public function destroy($id)
    {
        Appraise::destroy($id);
        return back()->with('success', '删除成功');
    }

    /***
     * 是否显示
     * @param Request $request
     */
    public function is_something(Request $request)
    {
        $attr = $request->attr;
        $appraise = Appraise::find($request->id);
        $value = $appraise->is_show ? false : true;
        $appraise->$attr = $value;
        $appraise->save();
    }
}
