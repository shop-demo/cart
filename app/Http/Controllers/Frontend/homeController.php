<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\bannerModel;
use App\Models\Admin\categoryModel;
use App\Models\Admin\customesModel;
use App\Models\Admin\productsModel;
use App\Models\Admin\tabsModel;
use App\Models\Admin\tabs_productsModel;
use Auth;

use Illuminate\Http\Request;

class homeController extends Controller
{
    
    public function index(){

    	//category
    	$shopList = categoryModel::where('id_cha','>','0')->get();
    	
    	$pages = categoryModel::where('id_cha',0)->get();

    	//button tabs
    	$tabs = tabsModel::all();
    	

    	return view('welcome',compact('shopList','pages','tabs'));
    }



}
