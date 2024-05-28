<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Auth;

class customesModel extends Authenticatable
{
    
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table ='customes'; //, `name`, `email`, `password`, `created_at`, `updated_at`
    
    protected $fillable =['name','email','password','created_at','updated_at','status'];
   
    protected $primariKey ='id';
   
    public $timestamps = true;

    //vai trò user 1use có nhiều vai trò
    
    public function roles(){

    	return $this->belongsToMany('App\Models\Admin\rolesModel','roles_customers','customes_id','roles_id');
    }

    public function checkQuyen($route){
    	
        $userName = Auth::guard('customers')->user();
    	
        $url = $userName->roles->pluck('role')->toArray();
    	 
    	foreach ($url as $key => $value) {
    	 
    	 $check = json_decode($value);
    	 
    	 if(in_array($route, $check)){
    	 	
    	 	return true;
    	 }
    	 return false;
    		
    	}
    	
    }
    //lấy ra các chi tiết đơn hàng thông qua đơn hàng của khách hàng
   public function order_Details()
   {
        return $this->hasManyThrough(order_detailModel::class, checkoutModel::class,'customes_id', 'orders_id');
   
   }

   /*kiểm tra người dùng có mua sản phẩm này k?*/
   public function checkU($pro_id){
    
    $user = Auth::guard('cusFrontend')->user();
    
    $items = $user->order_Details->pluck('name','id')->toArray();

    
        if(in_array($pro_id, $items)){
             return true;
        
        }else{
            return false; 
        
        }
    
   }











}
