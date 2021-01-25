<?php /** @noinspection ALL */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    public function __construct()
    {
        view()->share([
            '_advert' => 'am-active',
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
            if ($request->has('type')) {
                $query->where('type', $request->type);
            }
        };

        $adverts = Advert::where($where)->orderBy('id', 'desc')->get();
        return view('admin.advert.index', compact('adverts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advert.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'bail|required|unique:adverts|max:255',
            'type' => 'required|numeric|integer',
        ]);

        Advert::create($request->all());
        return redirect(route('admin.adverts.index'))->with('success', '添加成功~');
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
        $advert = Advert::find($id);
        return view('admin.advert.edit', compact('advert'));
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
        $request->validate([
            'image' => 'bail|required',
            'type' => 'required|numeric|integer',
        ]);
        $advert = Advert::find($id);
        $advert->update($request->all());
        return redirect(route('admin.adverts.index'))->with('success', '修改成功~');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Advert::destroy($id);
        return back()->with('success', '删除成功~');
    }
}
