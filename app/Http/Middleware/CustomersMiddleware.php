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
       
        // Kiểm tra nếu người dùng chưa đăng nhập
        if(!Auth::guard($guard)->check()){//chưa đăng nhập guard
            
             return redirect()->route('dashboard');//quay về login để đăng nhập
       
        }

         // Lấy thông tin người dùng
        $user = Auth::guard('customers')->user();
      
        //route hiện tại
        $route = $request->route()->getName();

       
        // Kiểm tra xem người dùng có quyền truy cập vào route hiện tại không
        if($user->cannot($route)){
          
           return redirect()->route('error',['code'=>403]);//quay về login để đăng nhập
            
        } 
       
        // Nếu không có vấn đề gì, tiếp tục xử lý request
        return $next($request);
        


    }

    





}



