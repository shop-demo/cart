<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\tabsModel;
use App\Http\Requests\Admin\Tabs\reqTabs_store;
use App\Http\Requests\Admin\Tabs\reqTabsEdit;
use Illuminate\Http\Request;
use Str;

class tabsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title="Tabs-List";
        
        $data = tabsModel::orderBy('id','DESC')->get();
        
        return view('Admin.Pages.Tabs.tabsList',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Tabs Add";
        
        return view('Admin.Pages.Tabs.tabsAdd',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(reqTabs_store $request)
    {
      
        $AddProHot = new tabsModel;
        
        $AddProHot->tabs_name = $request->tabs_name;
        
        $AddProHot->code = Str::slug($request->tabs_name);
        
        $AddProHot->status = $request->status;
       
        $AddProHot->save();
        
        return redirect()->route('admin.tabsList')->with('success','Thêm dữ liệu thành công');

     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\productHotModel  $productHotModel
     * @return \Illuminate\Http\Response
     */
    public function show(request $request,$id)
    {
        $title = 'Edit Tabs';
        $dataEdit = tabsModel::find($id);
        return view('Admin.Pages.Tabs.tabsEdit',compact('title','dataEdit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\productHotModel  $productHotModel
     * @return \Illuminate\Http\Response
     */
    public function edit(reqTabsEdit $request,$id)
    {
        $dataUpdate = tabsModel::find($id);
        $dataUpdate->tabs_name = $request->tabs_name;
        $dataUpdate->code = Str::slug($request->tabs_name);
        $dataUpdate->status = $request->status;
        $dataUpdate->save();
        return redirect()->route('admin.tabsList')->with('success','Cập nhật dữ liệu thành công');

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\productHotModel  $productHotModel
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $dataDelete = tabsModel::find($id);
        $dataDelete->delete();
        return redirect()->route('admin.tabsList')->with('success','Xóa dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\productHotModel  $productHotModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post = $request->check;
        if(is_array($post)){
            foreach ($post as $key => $tabs_id) {
                
               $deleteTabs = tabsModel::where('id',$tabs_id);
               
               $deleteTabs->delete();
            }
             return redirect()->route('admin.tabsList')->with('success','Dữ liệu đã được xóa thành công');
        }
    }
}
