<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use JWTAuth;
use EasyWeChat;
use Auth;

class MiniController extends Controller
{
    public function auth(Request $request)
    {
        $app = EasyWeChat::miniProgram();
        $session = $app->auth->session($request->code);
        $openid = $session['openid'];
        //用openid查询数据库，是否已经有了，没有就创建。
        $user = User::firstOrCreate(compact('openid'));
        //生成token
        $token = JWTAuth::fromUser($user);
        return response()->json(['token_type' => 'Bearer', 'access_token' => $token]);
    }
}
