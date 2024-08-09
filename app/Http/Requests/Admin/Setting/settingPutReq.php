<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class settingPutReq extends FormRequest
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
            'name_key' => 'required|unique:setting,name_key',
            'value' =>'required|unique:setting,value'
        ];
    }

     public function messages()
    {
        return [
              'name_key.required'=>'Trường name không được bỏ trống',
              'name_key.unique'=> 'name đã có trong hệ thống',
              'value.required'=>'Trường value không được bỏ trống',
              'value.unique'=> 'value đã có trong hệ thống',
              
        ];
    }
}
