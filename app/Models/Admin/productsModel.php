<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productsModel extends Model
{
    use HasFactory;//id`, `name`, `code`, `avatar`, `album_image`, `price`, `sale`, `description`, `product_details`, `category_id`, `created_at`, `updated_at`, `product_new`, `quantity`, `ban_chay_nhat`, `gia_tot`, `status`
    protected $table ='products';
    protected $fillable =['name','code','avatar','album_image','price','sale','description','product_details','category_id','created_at','updated_at','product_new','quantity','ban_chay_nhat','gia_tot','status'];
    
    protected $primariKey ='id';
    
    public $timestamps = true;

    
}
