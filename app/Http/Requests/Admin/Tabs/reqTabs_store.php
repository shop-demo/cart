<?php

namespace App\Http\Requests\Admin\Tabs;

use Illuminate\Foundation\Http\FormRequest;

class reqTabs_store extends FormRequest
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
            'tabs_name' => 'required|unique:tabs,tabs_name',
            
            
        ];
    }
   
     public function messages()
    {
        return [
              'tabs_name.required'=>'Trường name không được bỏ trống',
              'tabs_name.unique'=> 'name đã có trong hệ thống',
              
        ];
    }



}
