<?php

namespace App\Http\Requests\Admin\roles;

use Illuminate\Foundation\Http\FormRequest;

class editRoleRequest extends FormRequest
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
           'name'=> 'required|unique:roles,name,'.request()->idName,
           'name'=>  'min:3',
           'role'=> 'required'
        ];
    }

    public function messages()
    {
        return 
        [
            'name.required'=>'Dữ liệu không bỏ trống',
            'name.min'=> 'Dữ liệu không đúng định dạng',
            'name.unique'=>'Dữ liệu đã tồn tại',
            'role.required'=>'Dữ liệu không bỏ trống'
        ];
    }


}
