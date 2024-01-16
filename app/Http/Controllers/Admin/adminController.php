<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\customesModel;
use App\Http\Requests\Admin\loginAdminRequest;
use Auth;

class adminController extends Controller

{
    public function dashboard(){
    	
    	return view('Admin.Pages.dashboard');
    }

    //login
    
    public function login(loginAdminRequest $request){

    	$login = auth()->guard('customers')->attempt($request->only('email','password'));

        if($login){

         return redirect()->route('dashboard')->with('success','Đăng nhập thành công'); 

         }else{
          return redirect()->route('dashboard')->with('success', 'Tài khoản đăng nhập không chính xác'); 

        }


    }

    public function logout(request $request){

          $logoutName = auth()->guard('customers')->logout();
          
          return redirect()->route('dashboard')->with('success','Bạn vừa đăng xuất thành công');

    }

        //fileManager
     public function filemanager(){
        return view('Admin.Pages.file');

    }

    public function error(){
    
     $code = request()->code;

     $errors = config('errors.'.$code);

     return view('Admin.Pages.Errors.403',$errors);


    }


}
