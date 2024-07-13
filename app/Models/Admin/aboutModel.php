<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aboutModel extends Model
{
    use HasFactory;
    protected $table ='about';
    protected $fillable =['title','avatar','content','status','created_at','updated_at'];
    protected $primariKey ='id';
    public $timestamps = true;
}
