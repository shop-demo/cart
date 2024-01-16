<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bannerModel extends Model
{
    use HasFactory;
   
    protected $table ='banner';
    //`name`, `code`, `image`, `description`, `link`, `status`, `created_at`, `updated_at`
    protected $fillable =['name','code','image','description','link','status','created_at','updated_at'];
    
    protected $primariKey ='id';
    
    public $timestamps = true;

}
