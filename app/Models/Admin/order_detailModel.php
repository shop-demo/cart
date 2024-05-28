<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detailModel extends Model
{
    use HasFactory;
    protected $table ='order_details';
    protected $fillable =['name','avatar','orders_id','products_id','price','sale','quantity','status'];
    protected $primariKey ='id';
    public $timestamps = true;

	//lấy order chi tiết  thuộc 1 order
     public function order(){
        return $this->belongsTo(checkoutModel::class,'orders_id','id');
     }

     //lấy chi tiết sanpham thuộc order_detailModel
     public function product_order()
    {
        return $this->belongsTo(productsModel::class,'products_id','id');
    }

}
