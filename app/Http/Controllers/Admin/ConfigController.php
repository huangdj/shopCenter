<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;

class ConfigController extends Controller
{
    public function __construct()
    {
        view()->share([
            '_setting' => 'am-active',
        ]);
    }

    /***
     * 加载系统设置页面
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function setting()
    {
        $config = Config::find(1);
        return view('admin.config.setting', compact('config'));
    }

    /***
     * 更新系统设置
     * @param Request $request
     */
    public function setting_update(Request $request)
    {
        $config = Config::find(1);
        $config->update($request->all());
        return back()->with('success', '修改成功~');
    }
}
