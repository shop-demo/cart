<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class settingEditReq extends FormRequest
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
            'name_key'=>'required',
            'name_key'=> 'unique:setting,name_key,'.request()->nameKeyId,
            'value'=>'required',
            'value' => 'unique:setting,value,'.request()->valueId
            
        ];
    }
    public function messages()
    {
        return [
        'name_key.required'=>'Dữ liệu không được trống',
        'name_key.unique'=> 'Dữ liệu đã tồn tại trong hệ thống',
        'value.required'=>'Dữ liệu không được trống',
        'value.unique'=>'Dữ liệu đã tồn tại trong hệ thống'
        ];
    }


}
