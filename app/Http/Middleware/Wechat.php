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
            $customer = Customer::find(63);
            session(['wechat.customer' => $customer]);
        }
        return $next($request);
    }
}
