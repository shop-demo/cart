<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\customesModel;
use App\Models\Admin\rolesModel;
use App\Models\Admin\roles_customersModel;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Customes\cusAddRequest;
use App\Http\Requests\Admin\Customes\cusEditRequest;
use Auth;
use Route;

class customesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $title="Danh sách khách hàng";
        $dataCus = customesModel::orderBy('id','DESC')->get();
        
        return view('Admin.Pages.Customes.customeList',compact('title','dataCus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Thêm danh sách khách hàng";
        return view('Admin.Pages.Customes.customeAdd',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(cusAddRequest $request)
    {
       $dataNew = new customesModel;
       $dataNew->name = $request->name;
       $dataNew->email = $request->email;
       $dataNew->password =bcrypt($request->password);
       $dataNew->status = $request->status;
       $dataNew->save();
       return redirect()->route('admin.customeList')->with('success','Thêm Khách hàng thành công');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\customesModel  $customesModel
     * @return \Illuminate\Http\Response
     */
    public function show(request $request,$id)
    {
       $title="Sửa danh sách khách hàng";
       $dataCusEdit = customesModel::find($id);
       return view('Admin.Pages.Customes.customeEdit',compact('title','dataCusEdit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\customesModel  $customesModel
     * @return \Illuminate\Http\Response
     */
    public function edit(cusEditRequest $request,$id)
    {
       $dataEdit = customesModel::find($id);
       $dataEdit->name = $request->name;
       $dataEdit->email = $request->email;
       $dataEdit->password =bcrypt($request->password);
       $dataEdit->status = $request->status;
       $dataEdit->save();
       return redirect()->route('admin.customeList')->with('success','Update Khách hàng thành công');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\customesModel  $customesModel
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {
        $dataDelete = customesModel::find($id);
        $dataDelete->delete();
        return redirect()->route('admin.customeList')->with('success','Delete Khách hàng thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\customesModel  $customesModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $post = $request->check;
       
        if(is_array($post)){
           
            foreach ($post as $key => $value) {
                
                $deleteAll = customesModel::where ('id',$value);
                  
                 $deleteAll->delete(); 
                
                }//endforeach
              
              return redirect()->route('admin.customeList')->with('success','Delete Khách hàng thành công'); 
           
            }else{

              return redirect()->route('admin.customeList')->with('success','Bạn chọn xóa dữ liệu chưa chính xác');  
        }
        
    }

     /*----Quyền----
    ----------------*/
    public function quyen(Request $request,$id){

         $title="Thêm quyền User";
            //user
         $dataCus = customesModel::find($id);

           //vai trò user
         $roleCus = $dataCus->roles->pluck('name','id')->toArray();
            //dataRole theo name
         $dataRole = rolesModel::orderBy('name','ASC')->get();

         return view('Admin.Pages.Customes.quyen',compact('title','dataCus','roleCus','dataRole'));
    }
    public function quyenAdd(Request $request,$id){
        
        $upDataCus = customesModel::find($id);
        
        $upDataCus->update([

            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
            
            ]);

        $upDataCus->roles()->sync($request->role);

        return redirect()->route('admin.customeList')->with('success','Update quyền thành công');  
    }
   

}
