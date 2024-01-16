<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class CustomersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$guard="customers")
    {
        if(!Auth::guard($guard)->check()){//chưa đăng nhập guard
            
             return redirect()->route('dashboard');//quay về login để đăng nhập
        }

        $user = Auth::guard('customers')->user();
       
        $route = $request->route()->getName();//route hiện tại
        
        if($user->cant($route)){
          
           return redirect()->route('error',['code'=>403]);//quay về login để đăng nhập
            
        }
      
        return $next($request);
    }

    





}



