<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class cusFrontendMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$guard="cusFrontend")
    {
        // Kiểm tra nếu người dùng chưa đăng nhập
        if(!Auth::guard($guard)->check()){//chưa đăng nhập guard
            
             return redirect()->route('dang-nhap');//quay về login để đăng nhập
       
        }

        return $next($request);
    }
}
