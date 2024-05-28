<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkoutModel extends Model
{
    use HasFactory;
    protected $table ='orders';
    protected $fillable =['name_user','email','mobile','address','total_product','thanh_tien','note','customes_id','token','status'];
    protected $primariKey ='id';
    public $timestamps = true;

    //ordre chi tiết  thuộc 1 order
     public function orderDetail(){
        return $this->hasMany(order_detailModel::class,'orders_id','id');
     }

      public function cus(){
        return $this->hasMany(customesModel::class,'customes_id','id');
     }
    


}
