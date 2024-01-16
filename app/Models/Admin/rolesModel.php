<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rolesModel extends Model
{
    use HasFactory;
    protected $table ='roles';
    protected $fillable =['name','role','created_at','updated_at','status'];
    protected $primariKey ='id';
    public $timestamps = true;


}
