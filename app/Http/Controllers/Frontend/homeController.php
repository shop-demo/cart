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

     //số lượng imge trong data
     $tong_slide  = bannerModel::where('status', 1)->count();
     
     //lấy image lần đầu
     $slides1  = bannerModel::where('status', 1)->take(4)->get();
     
     //lần tiếp theo
     $slides2 = bannerModel::where('status', 1)->skip($slides1->count())->take($tong_slide)->get();
     
     // Kết hợp cả hai tập hợp slide lại với nhau
     $slides = $slides1->concat($slides2);

     //sản phẩm luôn có


     return view('welcome',compact('shopList','pages','tabs','slides'));
  }

    //lấy sản phẩm theo danhmuc
  public function view(Request $request,$slug){

     //get danh mục sp theo slug
    $pageShow = categoryModel::where('code',$slug)->first();

    $page_id = $pageShow->id;

    //lấy sản phẩm theo danh mục sản phẩm
    $pageProduct = categoryModel::where('code',$slug)->first()->product;

    //lấy tất cả các sản phẩm từ bảng products mà có  danh mục (category) chứa id là id_cha, 
    $products = productsModel::whereHas('pro_category', function($query) use ($page_id) {
      $query->where('id_cha', $page_id);
    })->get();

    return view('frontend.pages.showPages',compact('pageProduct','pageShow','products'));
  }

 
  public function product_Details(Request $request,$page,$slug){

      //chi tiết sản phẩm
     $productDetail = productsModel::where('code',$slug)->first();

      //get sanpham cùng tabs
     $t_pro = $productDetail->tabs;

      // Lấy danh sách các sản phẩm trong danh mục phòng khách

     return view('frontend.pages.productDetail',compact('productDetail','t_pro'));
  }

  


}
