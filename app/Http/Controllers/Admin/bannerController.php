<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\bannerModel;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Banner\bannerShowRequest;
use App\Http\Requests\Admin\Banner\bannerStoreRequest;
use Str;

class bannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $title="Banner-slide";
       $bannerList = bannerModel::orderBy('id','DESC')->paginate(10);
       return view('Admin.Pages.Banner.bannerList',compact('title','bannerList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $title ="Banner-slide-add";
       return view('Admin.Pages.Banner.bannerAdd',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(bannerStoreRequest $request)
    {
        $insetBanner = new bannerModel;
        $insetBanner->name = $request->name;
        $insetBanner->code = Str::slug($request->name);
        $insetBanner->image = str_replace("http://localhost:8088/website/shopping/public/uploads/slides/", "",$request->image);  
        $insetBanner->description = $request->description;
        $insetBanner->link = $request->link;
        $insetBanner->status = $request->status;
        $insetBanner->save();

        return redirect()->route('admin.bannerList')->with('success','Thêm dữ liệu thành công'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\bannerModel  $bannerModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $title = "Update slider";
        $bannerDetail = bannerModel::find($id);
        return view('Admin.Pages.Banner.bannerEdit',compact('title','bannerDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\bannerModel  $bannerModel
     * @return \Illuminate\Http\Response
     */
    public function edit(bannerShowRequest $request,$id)
    {
        $bannerDetailEdit = bannerModel::find($id);
        $bannerDetailEdit->name = $request->name;
        $bannerDetailEdit->code = Str::slug($request->name);
       
        $bannerDetailEdit->image = str_replace("http://localhost:8088/website/shopping/public/uploads/slides/", '',$request->image);  
        $bannerDetailEdit->description = $request->description;
        $bannerDetailEdit->link = $request->link;
        $bannerDetailEdit->status = $request->status;
        $bannerDetailEdit->save();
        return redirect()->route('admin.bannerList')->with('success','Update dữ liệu thành công'); 
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\bannerModel  $bannerModel
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, bannerModel $bannerModel,$id)
    {
       
        $bannerDetailDelete = bannerModel::find($id);
        
        $bannerDetailDelete->delete();
       
        return redirect()->route('admin.bannerList')->with('success','Delete dữ liệu thành công'); 
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\bannerModel  $bannerModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,bannerModel $bannerModel)
    {
        $post = $request->checkName;
            if(is_array($post)){
            foreach($post as $key=>$id_post){
               
               $deleteBanner = bannerModel::where('id',$id_post);
                
                $deleteBanner->delete();
  
            }
            return redirect()->route('admin.bannerList')->with('success',' Dữ liệu đã xóa thành công'); 
        }
    }
}
