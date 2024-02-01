<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tabsModel extends Model
{
    use HasFactory;
    //id`, `name`, `code`, `link`, `created_at`, `updated_at`, `status`

    protected $table ='tabs';
   
    protected $fillable =['tabs_name','code','created_at','updated_at','status',];
    
    protected $primariKey ='id';
    
    public $timestamps = true;
}
