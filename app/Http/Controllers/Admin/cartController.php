<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\cartModel;
use App\Models\Admin\productsModel;
use App\Thuvien\CartHelper;
use Illuminate\Http\Request;
use Auth;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get giỏ hàng
        //$listCart = $cart = session()->get('cart');
      //session()->forget('cart');
       return view('frontend.pages.cartShop');
    }

    /**
     * Add cart
     *
     * @return \Illuminate\Http\Response
     */
    public function addCart(Request $request,CartHelper $CartHelper)
    {
        $sp = productsModel::find($request->id);
        
        if(!$sp){
            return response()->json([
                'data'=>'null',
                'status_code'=>404,
                'message'=>"Không tìm thấy sản phẩm !",
                ]);

        }
        
        $cart_data = $CartHelper ->addCart($sp,$quantity=1);
        return response()->json([
            'data'=>$cart_data,
            'status_code'=>200,
            'message'=>"Thêm giỏ hàng thành công !"
            ]);
        
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\cartModel  $cartModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,CartHelper $CartHelper)
    {

      $id = $request->id;
      $quantity = $request->qty ? $request->qty : 1;
      $CartHelper->update($id,$quantity);
      return response()->json(['data'=>"success"]);
    }

    public function delete(Request $request,CartHelper $CartHelper)
    {

      $id = $request->id;
      $delete = $CartHelper->remove($id);
      if($delete){
        return response()->json(['data'=>"success"]);
      }
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\cartModel  $cartModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,CartHelper $CartHelper)
    {
        $destroy = $CartHelper->clear_cart();
        if($destroy){
            return response()->json(['data'=>"Xóa thành công"]); 
        }
       
    }
}
