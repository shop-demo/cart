<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\rolesModel;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\roles\addRoleRequest;
use App\Http\Requests\Admin\roles\editRoleRequest;
use Auth;
use Route;

class rolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $title="Danh sách Vai trò User";
       $dataRole = rolesModel::orderBy('id','DESC')->get();
       return view('Admin.Pages.Roles.roleList',compact('title','dataRole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Thêm Vai trò User";
        //lấy toàn bộ route;
        $dataRoute = Route::getRoutes();
       
        $list_r = [];
       
        foreach ($dataRoute as $key => $value) {
           
            $rou_name  = $value->getName();

            $pos = strpos($rou_name,'admin');//kt str có 'admin k '
           
            if($pos !== false){ //nếu có thì pust vảo mảng rou 

             array_push($list_r, $value->getName());
            }
        }
        
        return view('Admin.Pages.Roles.roleAdd',compact('title','list_r'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addRoleRequest $request)
    {
        $dataRoleNew = new rolesModel;
        $dataRoleNew->name = $request->name;
        $dataRoleNew->role = json_encode($request->role);
        $dataRoleNew->save();

        return redirect()->route('admin.roleList')->with('success','thêm Vai trò thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\rolesModel  $rolesModel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
       $title="Sửa Vai trò";
        //lấy toàn bộ route;
        $dataRoute = Route::getRoutes();
       
        $list_r = [];
       
        foreach ($dataRoute as $key => $value) {
           
            $rou_name  = $value->getName();

            $pos = strpos($rou_name,'admin');//kt str có 'admin k '
           
            if($pos !== false){ //nếu có thì pust vảo mảng rou 

             array_push($list_r, $value->getName());
            }
        }

        $dataRouteEdit = rolesModel::find($id);
        $listQuyen = json_decode($dataRouteEdit->role);
       return view('Admin.Pages.Roles.roleEdit',compact('title','list_r','listQuyen','dataRouteEdit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\rolesModel  $rolesModel
     * @return \Illuminate\Http\Response
     */
    public function edit(editRoleRequest $request,$id)
    {
        $updateRole = rolesModel::find($id);
        $updateRole->name = $request->name;
        $updateRole->role = json_encode($request->role);
        $updateRole->save();

        return redirect()->route('admin.roleList')->with('success','update Vai trò thành công');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\rolesModel  $rolesModel
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {
       $deleteRole = rolesModel::find($id);
       
       $deleteRole->delete();

       return redirect()->route('admin.roleList')->with('success','Xóa Vai trò thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\rolesModel  $rolesModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       $post = $request->option;
        if(is_array($post)){
            foreach($post as $key=>$id_post){
               
               $deleteRoles = rolesModel::where('id',$id_post);
                
                $deleteRoles->delete();
            }
            return redirect()->route('admin.roleList')->with('success',' Dữ liệu đã xóa thành công'); 
        }
    }

    


}
