<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tabs_productsModel extends Model
{
    use HasFactory;
    protected $table ='tabs_products';
    protected $fillable =['product_id','tabs_id'];
    protected $primariKey ='id';
    public $timestamps = true;


}
