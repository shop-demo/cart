<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\bannerModel;
use App\Models\Admin\categoryModel;
use App\Models\Admin\customesModel;
use App\Models\Admin\productsModel;
use Auth;

use Illuminate\Http\Request;

class homeController extends Controller
{
    
    public function index(){

    	return view('welcome');
    }



}
