<?php

namespace App\Http\Requests\Admin\About;

use Illuminate\Foundation\Http\FormRequest;

class aboutAddRequest extends FormRequest
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
            'title'=> 'required',

            'content'=>'required'

        ];
    }

    public function messages()
    {
        return [

            'title.required'=> 'Dữ liệu không được bỏ trống',

            'content.required'=>'Dữ liệu không được bỏ trống'
            
            
        ];
    
    }
}
