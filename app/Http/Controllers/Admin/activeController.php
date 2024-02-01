<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\bannerModel;
use App\Models\Admin\categoryModel;
use App\Models\Admin\productsModel;
use App\Models\Admin\customesModel;
use App\Models\Admin\rolesModel;
use App\Models\Admin\tabsModel;
use Illuminate\Http\Request;

class activeController extends Controller
{
    //banner action
    
    public function activeBanner(Request $request,$id){
    	
    	$statusUpdate = bannerModel::find($id);
    	
    	$statusUpdate->update(['status'=>1]);


    	return redirect()->route('admin.bannerList')->with('success',' Trạng thái cập nhật thành công'); 	

    }
   
    public function not_activeBanner(Request $request,$id){

    	$statusUpdate = bannerModel::find($id);
    	
    	$statusUpdate->update(['status'=>0]);

    	return redirect()->route('admin.bannerList')->with('success','Cập nhật trạng thái thành công'); 

    }
    /*Category------------
    ----------------------*/
    public function activeCategory(Request $request,$id){
       
       $updateStatusCate = categoryModel::find($id);
       
       $updateStatusCate->update(['status'=>1]);

       return redirect()->route('admin.categoryList')->with('success',' Trạng thái cập nhật thành công'); 

    }

    public function notActiveCategory(Request $request,$id){

        $updateStatusCate = categoryModel::find($id);

        $updateStatusCate->update(['status'=>0]);

        return redirect()->route('admin.categoryList')->with('success',' Trạng thái cập nhật thành công');
    
    }

    /*Product-active
    ----------------*/
    public function activeProduct(Request $request,$id){

        $updateStatusPro = productsModel::find($id);
        
        $updateStatusPro->update(['status'=>1]);

        return redirect()->route('admin.productList')->with('success',' Trạng thái cập nhật thành công');

    }

    public function notActiveProduct(Request $request,$id){

        $updateStatusPro = productsModel::find($id);
        
        $updateStatusPro->update(['status'=>0]);

        return redirect()->route('admin.productList')->with('success',' Trạng thái cập nhật thành công');

    }

    /*Customers*/
    public function activeCustomes(Request $request,$id){

        $upStatusCus = customesModel::find($id);

        $upStatusCus->update(['status'=>1]);

        return redirect()->route('admin.customeList')->with('success',' Trạng thái cập nhật thành công');

    }

     public function notActiveCustomes(Request $request,$id){

        $upStatusCus = customesModel::find($id);
        
        $upStatusCus->update(['status'=>0]);

        return redirect()->route('admin.customeList')->with('success',' Trạng thái cập nhật thành công');

    }

    //role
    public function activeRole(Request $request,$id){

        $upStatusRole = rolesModel::find($id);

        $upStatusRole->update(['status'=>1]);

        return redirect()->route('admin.roleList')->with('success',' Trạng thái cập nhật thành công');

    }

     public function notActiveRole(Request $request,$id){

        $upStatusRole = rolesModel::find($id);
        
        $upStatusRole->update(['status'=>0]);

        return redirect()->route('admin.roleList')->with('success',' Trạng thái cập nhật thành công');

    }

    //Tabs
    public function activeTabs(Request $request,$id){

        $upStatusTabs = tabsModel::find($id);

        $upStatusTabs->update(['status'=>1]);

        return redirect()->route('admin.tabsList')->with('success',' Trạng thái cập nhật thành công');

    }
    public function notActiveTabs(Request $request,$id){

        $upStatusTabs = tabsModel::find($id);
        
        $upStatusTabs->update(['status'=>0]);

        return redirect()->route('admin.tabsList')->with('success',' Trạng thái cập nhật thành công');

    }




}
