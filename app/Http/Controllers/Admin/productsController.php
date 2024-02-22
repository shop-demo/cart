<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\productsModel;
use App\Http\Requests\Admin\Products\storeProductReq;
use App\Http\Requests\admin\Products\showProductReq;
use App\Models\Admin\tabsModel;
use App\Models\Admin\tabs_productsModel;
use Illuminate\Http\Request;
use Str;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title="Danh sách Sản phẩm";
        $dataProduct = productsModel::orderBy('id','DESC')->paginate(10);
       return view('Admin.Pages.Products.productList',compact('title','dataProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Thêm sản phẩm";
        return view('Admin.Pages.Products.productAdd',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     id`, `name`, `code`, `avatar`, `album_image`, `price`, `sale`, `description`, `product_details`, `category_id`, `created_at`, `updated_at`, `product_new`, `quantity`, `ban_chay_nhat`, `gia_tot`, `status
     */
    public function store(storeProductReq $request)
    {
        

        $insetProducts = new productsModel;
        $insetProducts->name = $request->name;
        $insetProducts->code = Str::slug($request->name);
        $insetProducts->avatar = str_replace("http://localhost:8088/website/shopping/public/uploads/Products/", '',$request->avatar);
        $insetProducts->album_image = str_replace("http://localhost:8088/website/shopping/public/uploads/Products/", '',$request->album_image);  
        $insetProducts->description     = $request->description;
        $insetProducts->product_details = $request->product_details;
        $insetProducts->price           = $request->price;
        $insetProducts->sale            = $request->sale;
        $insetProducts->quantity        = $request->quantity;
        $insetProducts->category_id     = $request->category_id;
        $insetProducts->status          = $request->status;
        
        $insetProducts->save();

        return redirect()->route('admin.productList')->with('success','Thêm dữ liệu thành công'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\productsModel  $productsModel
     * @return \Illuminate\Http\Response
     */
    public function show(request $request,$id)
    {
        $title="Sửa Sản phẩm";
        $dataProduct = productsModel::find($id);
        return view('Admin.Pages.Products.productEdit',compact('title','dataProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\productsModel  $productsModel
     * @return \Illuminate\Http\Response
     */
    public function update(showProductReq $request,$id)
    {

        $upProducts = productsModel::find($id);

        $upProducts->name = $request->name;
        $upProducts->code = Str::slug($request->name);
        $upProducts->avatar = str_replace("http://localhost:8088/website/shopping/public/uploads/Products/", '',$request->avatar);
        $upProducts->album_image = str_replace("http://localhost:8088/website/shopping/public/uploads/Products/", '',$request->album_image);  
       
        $upProducts->description     = $request->description;
        $upProducts->product_details = $request->product_details;
        $upProducts->price           = $request->price;
        $upProducts->sale            = $request->sale;
       
        $upProducts->quantity        = $request->quantity;
       
        $upProducts->category_id = $request->category_id;
        $upProducts->status = $request->status;
        $upProducts->save();

        return redirect()->route('admin.productList')->with('success','Update dữ liệu thành công'); 
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\productsModel  $productsModel
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {
        $deletePro = productsModel::find($id);
        $deletePro->delete();
        return redirect()->route('admin.productList')->with('success','Dữ liệu đã được xóa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\productsModel  $productsModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post = $request->checkName;
        if(is_array($post)){
            foreach ($post as $key => $value) {
                $deleteDataPro = productsModel::where('id',$value);
                $deleteDataPro->delete();
            }
             return redirect()->route('admin.productList')->with('success','Dữ liệu đã được xóa thành công');
        }else{
            return redirect()->route('admin.productList')->with('success','Chưa có dữ liệu nào chọn được xóa');
        }
    }


  //add tabs
    public function tabs(Request $request, $id){

        $title="Thêm Tabs cho sản phẩm";
        
        $dataProduct = productsModel::find($id);
       
        $tabs = $dataProduct->tabs->pluck('tabs_name','id')->toArray();
        
        $dataTabs = tabsModel::all();
        
        return view('Admin.Pages.Products.tabsPro',compact('title','dataProduct','dataTabs','tabs'));
   
    }
    public function addTabs(Request $request, $id){

         $dataProduct = productsModel::find($id);
        
         $dataProduct->update(['name'=>$request->name]);
         
         $dataProduct->tabs()->sync($request->tabs_name);
        
         return redirect()->route('admin.productList')->with('success','Thêm tasb sản phẩm thành công');
    }


}
