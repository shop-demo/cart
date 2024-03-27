<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\customesModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        return view('frontend.pages.loginFontend');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginSubmit(Request $request)
    {
       
         $validator = Validator::make($request->all(), [
              'email' => 'required|email',
              'password' => 'required|min:6',
              ],[
              'email.required'=>'Trường name không được bỏ trống',
              'email.email'=>'Email phải là địa chỉ hợp lệ',
              'password.required'=>'Trường password không được bỏ trống',
              'password.min' => 'Độ dài password phải gồm 6 ký tự'

              ],[
              'name'=>'Tên người dùng',
              'password'=>'Mật khẩu người dùng'

              ]
          );
           
            if($validator->fails()){

                $errors = $validator->errors();

                return response()->json(['error'=>$validator->errors()->all()]); 
           
            }else{
                $login = auth()->guard('cusFrontend')->attempt($request->only('email','password'));
               
                if($login){
                    
                 
                 return response()->json(['data'=>$validator->validate()]);
                

                 }else{
                  
                   return  response()->json(['mgs'=>'Dữ liệu nhập không chính xác.']);
                
                }


            }

        

    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Logout(Request $request)
    {
      
      $logout = auth()->guard('cusFrontend')->logout();
     
       return redirect()->route('home.index');
    }  
//
    /**
     * Đăng ký thành viên
     *
     * @param  \App\Models\Admin\customesModel  $customesModel
     * @return \Illuminate\Http\Response
     */
    public function resgiter(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
          'name' => 'required|min:3',
          'email'=>'required|unique:customes|email',
          'password' => 'required|min:6'
          ],[
          'name.required'=>'Trường name không được bỏ trống',
          'name.min'=>'Định đạng dữ liệu không đúng',
          'email.required'=>'Trường email không được bỏ trống',
          'email.unique'=>'Email đã có trong hệ thống',
          'password.required' => 'Trường password không được bỏ trống',
          'password.min' => 'Độ dài password phải gồm 6 ký tự',

           ]

          );

         
      
         if ($validator->fails()) {
         $errors = $validator->errors();
         return response()->json(['error'=>$validator->errors()->all()]); 
         
        }else{
          $register = new customesModel;
          $register->name = $request->name;
          $register->email = $request->email;
          $register->password = bcrypt($request->password);
          $register->save();
          return response()->json(['data'=>"success"]); 

       }
       
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\customesModel  $customesModel
     * @return \Illuminate\Http\Response
     */
    public function edit(customesModel $customesModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\customesModel  $customesModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customesModel $customesModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\customesModel  $customesModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(customesModel $customesModel)
    {
        //
    }
}
