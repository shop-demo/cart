<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartModel extends Model
{
    use HasFactory;
    protected $table ='cart';
    protected $fillable =['customes_id','product_id','quantity','created_at','updated_at','status'];
    protected $primariKey ='id';
    public $timestamps = true;
    
    
}
