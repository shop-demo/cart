<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class storeCategoryReq extends FormRequest
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
            
        'name'=> 'required|unique:category,name',
        'code' => 'unique:category,code',
        'id_cha'=> 'required|integer'
        
        ];
    }

    public function messages()
    {
        return [
         
        'name.required'=>'Dữ liệu không bỏ trống',
        'name.unique'=> 'Dữ liệu đã tồn tại trong hệ thống',
        'id_cha.required'=>'Dữ liệu không được bỏ trống',
        'id_cha.integer'=>'Dữ liệu không đúng định dạng'
        ];
    }



}
