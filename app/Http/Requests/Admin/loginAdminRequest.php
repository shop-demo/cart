<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class loginAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|exists:customes',
            'password'=> 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
              
              'email.required'=>'Trường email không được bỏ trống',
              'email.email'=>'Định dạng email không đúng',
              'email.exists'=>'Địa chỉ email không có trong hệ thống',
              'password.required' => 'Trường password không được bỏ trống',
              'password.min' => 'Độ dài password phải gồm 6 ký tự',
        
        ];
    }


}
