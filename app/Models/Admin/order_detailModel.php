<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detailModel extends Model
{
    use HasFactory;
    protected $table ='order_details';
    protected $fillable =['name','orders_id','products_id','price','sale','quantity','status'];
    protected $primariKey ='id';
    public $timestamps = true;


    // Khai báo mối quan hệ: Một chi tiết đơn hàng thuộc về một đơn hàng
    public function order()
    {
        return $this->belongsTo('App\Models\Admin\checkoutModel', 'orders_id', 'id');
    }
	

}
