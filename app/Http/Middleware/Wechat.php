<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Customer;

class Wechat
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!session('wechat.customer')) {
            /**
             * 获取用户信息并 存入/更新 数据库
             */
            $original = session('wechat.oauth_user.default.original');

            $openid = $original['openid'];
            $customer = Customer::where('openid', $openid)->first();
            if ($customer) {
                $customer->update([
                    'openid' => $openid,
                    'nickname' => Customer::filterEmoji($original['nickname']),
                    'sex' => $original['sex'],
                    'country' => $original['country'],
                    'city' => $original['city'],
                    'province' => $original['province'],
                    'headimgurl' => $original['headimgurl'],
                ]);
            } else {
                $customer = Customer::create([
                    'openid' => $openid,
                    'nickname' => Customer::filterEmoji($original['nickname']),
                    'sex' => $original['sex'],
                    'country' => $original['country'],
                    'city' => $original['city'],
                    'province' => $original['province'],
                    'headimgurl' => $original['headimgurl'],
                ]);
            }
            session(['wechat.customer' => $customer]);
        }

        return $next($request);
    }
}
