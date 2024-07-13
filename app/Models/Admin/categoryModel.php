<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoryModel extends Model
{
    use HasFactory;
    protected $table ='category';
    protected $fillable =['name','code','id_cha','created_at','updated_at','status'];
    protected $primariKey ='id';
    public $timestamps = true;
   
    
    //1 category có nhiều product :1-n query trong cùng 1 bảng
    function product(){
       return $this->hasMany('App\Models\Admin\productsModel', 'category_id','id');
   }
	
	//danh mục cha :1con thuộc 1cha
   public function categoryParent()
    {
        return $this->hasOne('App\Models\Admin\categoryModel','id','id_cha');
    }
   //danh mục cha :1cha có nhiều con
    public function childCategory()
    {
        return $this->belongsTo('App\Models\Admin\categoryModel','id_cha','id');
    }



}
