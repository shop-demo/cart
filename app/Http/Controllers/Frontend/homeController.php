<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\bannerModel;
use App\Models\Admin\categoryModel;
use App\Models\Admin\customesModel;
use App\Models\Admin\productsModel;
use App\Models\Admin\tabsModel;
use App\Models\Admin\tabs_productsModel;
use App\Models\Admin\order_detailModel;
use App\Models\Admin\checkoutModel;
use App\Models\Admin\ratingModel;
use App\Models\Admin\commentModel;
use Illuminate\Support\Facades\Validator;
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
    
     //get all
     $listCategory = categoryModel::all();

    
     return view('welcome',compact('shopList','pages','tabs','slides','listCategory'));
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
    //sản phẩm thuộc category
    
    
    //get sanpham cùng tabs
    $t_pro = $productDetail->tabs;

    //comment product
    $commProduct = commentModel::where(['product_id'=>$productDetail->id,'reply_id'=>0])->orderBy('id','DESC')->get();
   
    //total comm
    $commProductCount = $productDetail->commPro;

     //REVIEW RATING
    $productId = $productDetail->id;
   
    $ratingSP = round(ratingModel::where('product_id',$productId)->avg('rating_star'));//tổng rating
   
    /*kiểm tra người dùng có mua sản phẩm này k?*/
    $cusOders = new customesModel;//khởi tạo cusMode

    return view('frontend.pages.productDetail',compact('productDetail','t_pro','cusOders','ratingSP','commProductCount','commProduct'));
  }

  //seach
 
  public function search(Request $request)
  {
   /* 
    if(request('key')){
     
      $data_search = productsModel::search()->get();
      
      return view('frontend.pages.block.listSeach', compact('data_search'));
      }
    */

      if ($request->has('key')) {
        $data_search = productsModel::where('name', 'LIKE', '%' . $request->key . '%')->get();

        if ($data_search->isEmpty()) {
            return response()->json([
                'status' => 'not_found',
                'message' => 'Không tìm thấy sản phẩm nào'
            ]);
        }

        return view('frontend.pages.block.listSeach', compact('data_search'));
        
        } else {
            return response()->json([
                'status' => 'empty_query',
                'message' => 'Search query is empty.'
            ]);
        }
  }

  
  //rating
  public function rating(Request $request){
  
    // Tiếp tục lưu đánh giá nếu đã mua sản phẩm
    $rating_model = ratingModel::where($request->only('product_id','customes_id'))->first();
   
    if($rating_model){
      
      ratingModel::where($request->only('product_id','customes_id'))->
      
      update($request->only('rating_star'));
    
    }else{
       ratingModel::create($request->only('product_id','customes_id','rating_star'));
    }

    // return redirect()->back();
     return response()->json(['data' => true]);

  }

  /*COMMENT-----------------------------------------------*/
  public function comment(Request $request){
   
     $validator = Validator::make($request->all(), [
          
          'comment'    => 'required',

          ],[

          'comment.required'=>'comment không được bỏ trống',

          ]);

        if ($validator->fails()) {
          
          $errors = $validator->errors();

          return response()->json(['error'=>$validator->errors()->first()]); 

        }else{

          $dataComment = new commentModel;
          $dataComment->comment = $request->comment;
          $dataComment->product_id = $request->product_id;
          $dataComment->customes_id = $request->customes_id;
          $dataComment->status = $request->status ? $request->status :0;
          $dataComment->reply_id = $request->reply_id ? $request->reply_id :0;
          $dataComment ->save();
          
             if($dataComment){
                
                $commProduct = commentModel::where([
                  'reply_id'=>0,
                  'product_id'=>$request->product_id,
                  'status'=>0])->orderBy('id','DESC')->get();
              
               return view('frontend.pages.comment',compact('commProduct'));
             }

           
       }
 
 }

  //load comment
  public function loadComm(Request $request){
    $commProduct = commentModel::all();
    return view('frontend.pages.comment',compact('commProduct'));
  }

//tag
  public function tagProduct(Request $request){
    
    //lấy sản phẩm theo danh mục sản phẩm
   // $pageProduct = categoryModel::where('code',$slug)->first()->product;
   
    $keyTag = $request->tag;
    
    if($keyTag){
      
      $data_tag = productsModel::where('name', 'LIKE', '%' .$keyTag . '%')->get();
     

      return view('frontend.pages.productTag',compact('data_tag'));
    }
   
    
  }
 

}
