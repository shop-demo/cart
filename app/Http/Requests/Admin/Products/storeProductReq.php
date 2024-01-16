<?php

namespace App\Http\Requests\admin\Products;

use Illuminate\Foundation\Http\FormRequest;

class storeProductReq extends FormRequest
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
            //`name`, `code`, `avatar`, `album_image`, `price`, `sale`, `description`, `product_details`, `category_id`, `created_at`, `updated_at`, `status`
        
            'name'=> 'required|unique:products,name',

            'code'=> 'unique:products,code',
            
            'avatar'=>'required',
                    
            'price'=> 'required|numeric|min:0|not_in:0', //giá không<0
                    
            'sale'=> 'required|numeric|min:0|lt:price', //giá km<gia_ban
            
            'description'=>'required',
                    
            'product_details'=>'required',
                   
            'category_id'   =>'required'
           


        ];
    }


    public function messages()
    {
        return [
            //
            'name.required'=>'Nhập tên sản phẩm',
            
            'name.unique'=>'Tên sản phẩm đã tồn tại trong hệ thống',

            'code.unique'=>'slug đã tồn tại trong hệ thống',
                    
            'avatar.required'=>'Chọn hình ảnh sản phẩm',
           
            'price.required'=>'Giá sản phẩm chưa nhập',
                     
            'price.not_in'=>'Giá sản phẩm phải là số lớn hơn 0',
                    
            'sale.required'=> 'Chưa nhập giá khuyến mại sản phẩm',
                    
            'sale.lt'=>'Giá khuyến mại phải nhỏ giá bán',
                    
            'description.required'=>'Dữ liệu không được bỏ trống',
                     
            'product_details.required'=>'Dữ liệu không được bỏ trống',
                     
            'category_id.required'=>'Chọn thể loại sản phẩm'
                    
           
       
        ];
    }







}
