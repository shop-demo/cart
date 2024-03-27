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
}
