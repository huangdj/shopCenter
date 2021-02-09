<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderRemind;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        view()->share([
            '_admin' => 'am-active',
        ]);
    }

    /***
     * 后台首页
     */
    public function index()
    {
        return view('admin.index');
    }

    /***
     * 加载修改密码页面
     */
    public function change_password()
    {
        return view('admin.config.change_password');
    }


    /**
     * 执行修改密码
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_password(Request $request)
    {
        $user = \Auth::user();

        if (!\Hash::check($request->oldpassword, $user->password)) {
            return back()->with('error', '原始密码输入错误~');
        }

        if ($request->password == '') {
            return back()->with('error', '请输入新密码~');
        }

        if ($request->password != $request->newpassword) {
            return back()->with('error', '两次密码输入不一致~');
        }

        $user->password = bcrypt($request->input('password'));
        $user->save();
        $request->session()->invalidate(); //修改密码后，清除session，退到登录页面

        return redirect(route('login'))->with('success', '您已成功修改密码,请重新登录~');
    }
}
