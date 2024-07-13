<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\aboutModel;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\About\aboutAddRequest;
use App\Http\Requests\Admin\About\aboutEditRequest;

class aboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title="About";
        $about=aboutModel::all();

        return view('Admin.Pages.about.aboutList',compact('about','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Thêm Content";

        return view('Admin.Pages.about.aboutAdd',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(aboutAddRequest $request)
    {
       
        $insetAbout = new aboutModel;
        $insetAbout->title = $request->title;
        
        $insetAbout->avatar = str_replace("http://localhost:8088/website/shopping/public/uploads/avatar/", "",$request->avatar);  
        $insetAbout->content = $request->content;
        $insetAbout->status = $request->status ? $request->status :0;
       
        $insetAbout->save();

        return redirect()->route('admin.about')->with('success','Thêm dữ liệu thành công'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\aboutModel  $aboutModel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $title="Sửa about";
        $data = aboutModel::find($id);
       return view('Admin.Pages.about.aboutEdit',compact('data','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\aboutModel  $aboutModel
     * @return \Illuminate\Http\Response
     */
    public function edit(aboutEditRequest $request,$id)
    {
        $aboutEdit = aboutModel::find($id);
        $aboutEdit->title = $request->title;
        $aboutEdit->avatar = str_replace("http://localhost:8088/website/shopping/public/uploads/avatar/", '',$request->avatar);  
        $aboutEdit->content = $request->content;
        $aboutEdit->status = $request->status;
        $aboutEdit->save();
        return redirect()->route('admin.about')->with('success','Edit dữ liệu thành công');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\aboutModel  $aboutModel
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {
        $aboutDelete = aboutModel::find($id);
        $aboutDelete->delete();
         return redirect()->route('admin.about')->with('success','Thao tác xóa dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\aboutModel  $aboutModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(aboutModel $aboutModel)
    {
        //
    }


    //action status
    public function active(Request $request,$id){
        $upStatus = aboutModel::find($id);

        $upStatus->update(['status'=>1]);

        return redirect()->route('admin.about')->with('success',' Trạng thái cập nhật thành công');
       
    }
  
   //not_action status
    public function not_active(Request $request,$id){
        $upStatus = aboutModel::find($id);
        $upStatus->update(['status'=>0]);
        return redirect()->route('admin.about')->with('success',' Trạng thái cập nhật thành công');
    }





}
