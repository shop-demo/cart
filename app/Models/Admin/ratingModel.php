<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ratingModel extends Model
{
    use HasFactory;
    protected $table ='rating';
    protected $fillable =['product_id','customes_id','rating_star','status'];
   
    public $timestamps = false;
}
