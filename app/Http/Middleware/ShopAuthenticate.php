<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ShopAuthenticate 
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->active == 0) {
            return redirect()->route('shop.products.all')->with('error','Bạn phải đăng nhập trước!');
            
        }else{
            return $next($request);
        }
    }



}
