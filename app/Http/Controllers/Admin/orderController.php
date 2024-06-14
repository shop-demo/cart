<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\checkoutModel;
use App\Models\Admin\productsModel;
use App\Models\Admin\order_detailModel;
use App\Models\Admin\customesModel;
use App\Thuvien\CartHelper;
use Illuminate\Http\Request;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title="Dach sách Oreder";
        $orderList = checkoutModel::where('status',1)->get();
        return view('Admin.Pages.Cart.orderList',compact('orderList','title'));
    }

    /**
     * Show view chi tiết đơn hàng.
     */
    public function show(Request $request,$id)
    {
        $title="Xem chi tiết đơn hàng.";
        //$img = productsModel::where()
        
        $order_detailView = checkoutModel::find($id);

        return view('Admin.Pages.Cart.order_detailView',compact('order_detailView','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\checkoutModel  $checkoutModel
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {
         $order_delete= checkoutModel::find($id);
         $order_delete->delete();
         return redirect()->route('admin.orderList')->with('success','Delete thành công');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\checkoutModel  $checkoutModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, checkoutModel $checkoutModel,$id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\checkoutModel  $checkoutModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(checkoutModel $checkoutModel)
    {
        //
    }
}
