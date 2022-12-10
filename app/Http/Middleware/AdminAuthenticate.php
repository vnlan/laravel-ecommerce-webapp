<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminAuthenticate 
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    
    public function handle(Request $request, Closure $next, $roleid)
    {
       if (Auth::check() && Auth::user()->role->id <= $roleid && Auth::user()->active == 1) {
            return $next($request);
       }else return redirect()->back()->with('error','Bạn không có quyền truy cập trang này! Liên hệ quản trị viên để biết chi tiết');
    }



}
