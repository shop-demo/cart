<?php

namespace App\Http\Requests\Admin\Customes;

use Illuminate\Foundation\Http\FormRequest;

class cusEditRequest extends FormRequest
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
            'name'=>'required|min:3',
            'email'=> 'required|unique:customes,email,'.request()->_nameId,
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
              'name.required'=>'Trường name không được bỏ trống',
              'name.min'=>'Định đạng dữ liệu không đúng',
              'email.required'=>'Trường email không được bỏ trống',
              'email.unique'=>'Email đã có trong hệ thống',
              'password.required' => 'Trường password không được bỏ trống',
              'password.min' => 'Độ dài password phải gồm 6 ký tự',
        
        ];
    }



}
