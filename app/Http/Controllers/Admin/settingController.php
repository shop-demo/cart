<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\settingModel;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Setting\settingPutReq;
use App\Http\Requests\Admin\Setting\settingEditReq;

class settingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title="Danh sách setting";
        $listSetting=settingModel::all();
        return view('Admin.Pages.Settings.settingList',compact('title','listSetting'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Thêm setting";
        return view('Admin.Pages.Settings.settingAdd',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(settingPutReq $request)
    {
        
        $issetSetting = settingModel::create([
                    'name_key'=>$request->name_key,
                    'value'=>$request->value,
                    'status'=>$request->status ? $request->status:0,
                    'type'=>$request->type,
                    'created_at'=>$request->created_at,
                    'updated_at'=>$request->updated_at
                    
                ]);

        return redirect()->route('admin.setting')->with('success','Thêm mới setting thành công');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\settingModel  $settingModel
     * @return \Illuminate\Http\Response
     */
    public function show(settingEditReq $request,$id)
    {
        $title="Edit Setting";
        $settingE = settingModel::find($id);
        
       return view('Admin.Pages.Settings.settingEdit',compact('settingE','title'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\settingModel  $settingModel
     * @return \Illuminate\Http\Response
     */
    public function edit(settingModel $settingModel,settingEditReq $request,$id)
    {
        $settingE = settingModel::find($id);
        
               $settingE->name_key = $request->name_key;
               $settingE->value = $request->value;
               $settingE->status = $request->status ? $request->status:0;
               $settingE->type = $request->type;
               $settingE->created_at = $request->created_at;
               $settingE->updated_at =$request->updated_at;
               $settingE->save();
                    
        return redirect()->route('admin.setting')->with('success','Đữ liệu updade  thành công');


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\settingModel  $settingModel
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, settingModel $settingModel,$id)
    {

        $deleteSetting = settingModel::find($id);
        if($deleteSetting){
           $deleteSetting->delete(); 
        }

        return redirect()->route('admin.setting')->with('success','Đữ liệu xóa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\settingModel  $settingModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,settingModel $settingModel)
    {
        
        $post = $request->checkName;
        
            if(is_array($post)){
            
            foreach ($post as $key => $value) {
                
                $deleteDataSe = settingModel::where('id',$value);
                
                $deleteDataSe->delete();
            
            }
                 return redirect()->route('admin.setting')->with('success','Dữ liệu đã được xóa thành công');
            
            }else{
                
                return redirect()->route('admin.setting')->with('success','Chưa có dữ liệu nào chọn được xóa');
            
            }
   
    }

    /*ative*/
    public function activeS(Request $request,$id){
       
        $actionStatus = settingModel::find($id);
        
        $actionStatus -> update(['status'=>1]);

        return redirect()->route('admin.setting')->with('success','Trạng thái vừa cập nhật thành công !');

    }
   
    public function not_activeS(Request $request,$id){

        $actionSe = settingModel::find($id);
        
        $actionSe -> update(['status'=>0]);

        return redirect()->route('admin.setting')->with('success','Trạng thái vừa cập nhật thành công !');
    
    }
   

    /*end ative*/



}
