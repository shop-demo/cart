<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles_customersModel extends Model
{
    use HasFactory;
    protected $table ='roles_customers';
    protected $fillable =['customes_id','roles_id'];
    protected $primariKey ='id';
    public $timestamps = true;
}
