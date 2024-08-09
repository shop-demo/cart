<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settingModel extends Model
{
    use HasFactory;
    protected $table ='setting';
    protected $fillable =['name_key','value','status','type','created_at','updated_at'];
    protected $primariKey ='id';
    public $timestamps = true;
}
