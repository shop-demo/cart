<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkoutModel extends Model
{
    use HasFactory;
    protected $table ='orders';
    protected $fillable =['name','email','mobile','address','total_product','thanh_tien','note','customes_id','token','status'];
    protected $primariKey ='id';
    public $timestamps = true;
}
