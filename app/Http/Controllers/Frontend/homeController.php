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
    
    public function index(Request $request){
       
    	//category
    	$shopList = categoryModel::where('id_cha','<>','0')->get();
    	
        $pages = categoryModel::where('id_cha',0)->get();
        
    	//button tabs
    	$tabs = tabsModel::where('status',1)->get();
       
        return view('welcome',compact('shopList','pages','tabs'));
    }
    
    //lấy sản phẩm theo danhmuc
    public function view(Request $request,$slug){
       //get danh mục sp theo slug
        $pageShow = categoryModel::where('code',$slug)->first();
         //lấy sản phẩm theo danh mục sản phẩm
        $pageProduct = categoryModel::where('code',$slug)->first()->product;

        return view('frontend.pages.showPages',compact('pageProduct','pageShow'));
    }

    public function product_Details(Request $request,$page,$slug){

         //chi tiết sản phẩm
         $productDetail = productsModel::where('code',$slug)->first();
        
         //get sanpham cùng tabs
          $t_pro = $productDetail->tabs;

         return view('frontend.pages.productDetail',compact('productDetail','t_pro'));
    }



}
