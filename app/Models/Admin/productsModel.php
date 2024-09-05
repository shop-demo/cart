<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productsModel extends Model
{
    use HasFactory;//id`, `name`, `code`, `avatar`, `album_image`, `price`, `sale`, `description`, `product_details`, `category_id`, `created_at`, `updated_at`, `product_new`, `quantity`, `ban_chay_nhat`, `gia_tot`, `status`
    protected $table ='products';
    protected $fillable =['name','code','avatar','album_image','price','sale','description','product_details','category_id','product_tag','created_at','updated_at','quantity','status'];

    protected $primariKey ='id';
    
    public $timestamps = true;

    //n-n(1san phẩn thuộc nhiều tabs)
    public function tabs(){
    	return $this->belongsToMany('App\Models\Admin\tabsModel','tabs_products','product_id','tabs_id')->where('status',1);
    }

    //lấy sanpham thuộc 1 theloai
     public function pro_category(){
        return $this->belongsTo(categoryModel::class,'category_id','id');
     }

     //seach
      public function scopeSearch($query)
      {
          $key = request('key');
          if ($key) {
              $query->where('name', 'like', '%' . $key . '%')->where('status', 1);
          }
          
          return $query;
      }
    //1comment thuôc 1 sản phẩm
    public function commPro(){
      return $this->hasMany('App\Models\Admin\commentModel','product_id','id');
       
    }
    

}
