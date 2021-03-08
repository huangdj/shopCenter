<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MenuController extends Controller
{
    private $menu;

    public function __construct()
    {
        $app = app('wechat.official_account');  // 获取实例
        $this->menu = $app->menu;
    }

    /***
     * 微信菜单管理首页
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $buttons = Cache::rememberForever('wechat_config_menus', function () {
            $list = $this->menu->list(); //获取所有菜单
            if (isset($list['menu'])) {
                return $list['menu']['button'];
            }
            return [];
        });
        return view('admin.menu.edit', compact('buttons'));
    }

    /***
     * 修改微信菜单
     * @param Request $request
     */
    public function update(Request $request)
    {
        $buttons = wechat_menus($request->buttons);
        $this->menu->create($buttons);
        Cache::forget('wechat_config_menus');
        return back()->with('success', '您已成功设置菜单，请取消关注后，再重新关注~');
    }

    /***
     * 删除微信菜单
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        $this->menu->delete();
        Cache::forget('wechat_config_menus');
        return back()->with('success', '删除成功，请取消关注后，再重新关注~');
    }
}
