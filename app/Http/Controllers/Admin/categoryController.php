<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\categoryModel;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Category\storeCategoryReq;
use App\Http\Requests\Admin\Category\showCategoryReq;
use Str;


class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title="Danh sách Danh mục";
        $listCategory = categoryModel::orderBy('id','DESC')->get();
        return view('Admin.Pages.Category.categoryList',compact('title','listCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Thêm Danh mục";
        return view('Admin.Pages.Category.categoryAdd',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeCategoryReq $request)
    {
       
            $newCategory = new categoryModel;
            $newCategory->name = request()->name;
            //$newCategory->code = Tieu_de(request()->name);
            $newCategory->code = Str::slug($request->name);
            $newCategory->id_cha =request()->id_cha;
            $newCategory->status =request()->status;
            $newCategory->save();

            return redirect()->route('admin.categoryList')->with('success','Thêm mới menu thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\categoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
       
       $title="Sửa Danh mục ";
       $dataCategoryEdit = categoryModel::find($id);
       return view('Admin.Pages.Category.categoryEdit',compact('title','dataCategoryEdit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\categoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function edit(showCategoryReq $request,$id)
    {
       $dataCategoryUpdate = categoryModel::find($id);
       $dataCategoryUpdate->name = request()->name;
       $dataCategoryUpdate->code = Str::slug($request->name);
       $dataCategoryUpdate->id_cha =request()->id_cha;
       $dataCategoryUpdate->status =request()->status;
       $dataCategoryUpdate->save();

       return redirect()->route('admin.categoryList')->with('success','update dữ liệu thành công');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\categoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {
        $delete = categoryModel::find($id);
        $delete->delete();
        return redirect()->route('admin.categoryList')->with('success','Delete dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\categoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post = $request->option;
        if(is_array($post)){
            foreach ($post as $key => $value) {
                $dataDelete = categoryModel::where('id',$value);
                $dataDelete->delete();
            }
           return redirect()->route('admin.categoryList')->with('success','Delete dữ liệu thành công'); 
        }
    }
}
