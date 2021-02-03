<?php /** @noinspection ALL */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function __construct()
    {
        view()->share([
            '_theme' => 'am-active',
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
        $themes = Theme::where($where)->orderBy('id')->paginate(config('admin.page_size'));
        return view('admin.theme.index', compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.theme.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->is_left == 0 && $request->is_right == 0 && $request->is_bottom == 0) {
            return back()->with('error', '请至少选择一条属性~');
        }
        if ($request->is_left == 1) {
            $res = Theme::where('is_left', true)->first();
            if ($res) {
                return back()->with('error', '只能添加一条置左数据，请勿重复添加~');
            }
        }

        if ($request->is_right == 1) {
            $res = Theme::where('is_right', true)->count();
            if ($res >= 4) {
                return back()->with('error', '最多只能添加四条置右数据，请勿重复添加~');
            }
        }
        if ($request->is_bottom == 1) {
            $res = Theme::where('is_bottom', true)->count();
            if ($res >= 4) {
                return back()->with('error', '最多只能添加四条置底数据，请勿重复添加~');
            }
        }
        Theme::create($request->all());
        return redirect(route('admin.themes.index'))->with('success', '添加成功~');
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
        $theme = Theme::find($id);
        return view('admin.theme.edit', compact('theme'));
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
        $theme = Theme::find($id);
        $theme->update($request->all());
        return redirect(route('admin.themes.index'))->with('success', '编辑成功~');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Theme::destroy($id);
        return back()->with('success', '删除成功');
    }
}
