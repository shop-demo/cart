<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class commentModel extends Model
{
    use HasFactory;
    protected $table ='comments'; //, `name`, `email`, `password`, `created_at`, `updated_at`
    
    protected $fillable =['comment','product_id','customes_id','status','reply_id','created_at','updated_at'];
   
    protected $primariKey ='id';
   
    public $timestamps = true;

	
	//1 use có nhiều comm
    public function use(){
      return $this->hasOne('App\Models\Admin\customesModel','id','customes_id');
    }

   
    /*lấy comment của use*/
     public function replay()
    {
        return $this->hasMany('App\Models\Admin\commentModel','reply_id','id')->orderBy('created_at','DESC');
    }




}
