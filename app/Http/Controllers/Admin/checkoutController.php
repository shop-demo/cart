<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\checkoutModel;
use App\Models\Admin\productsModel;
use App\Models\Admin\order_detailModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Thuvien\CartHelper;
use Auth;
use Str;
use Mail;

class checkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request,CartHelper $CartHelper)
    {

        $validator = Validator::make($request->all(), [
              
              'name_user' => 'required|min:3',
              'email' => 'required|email',
              'mobile' => 'required',
              'address' =>'required|min:3',
              'note'=>'required'

              ],[
              'name_user.required'   =>'Trường name không được bỏ trống',
              'name.min'        => 'Độ dài name phải gồm 3 ký tự',
              'email.required'  =>'Trường emai không được bỏ trống',
              'email.email'     =>'Email phải là địa chỉ hợp lệ',
              'mobile.required' =>'Số điện thoại không được bỏ trống',
              'address.required'=>'Địa chỉ không được bỏ trống',
              'note.required' => "Ghi chú không được bỏ trống"

              ]
          );

        if($validator->fails()){

                $errors = $validator->errors();

                return response()->json(['error'=>$validator->errors()->all()]); 
           
            }else{

                
                $token_order = strtoupper(Str::random(20));
                $order = checkoutModel::create([
                    'name_user'=>$request->name_user,
                    'email'=>$request->email,
                    'mobile'=>$request->mobile,
                    'address'=>$request->address,
                    'note'=>$request->note,
                    'total_product'=>$CartHelper->total_quantity,
                    'thanh_tien' =>$CartHelper->total_price,
                    'customes_id'=>Auth::guard('cusFrontend')->user()->id,
                    'token'=>$token_order
                ]);
               
                if($order){
                    foreach($CartHelper->items as $key=>$value){
                        order_detailModel::create([
                          'name'=>$value['name'],
                          'avatar'=>$value['avatar'],
                          'orders_id'=>$order->id,
                          'products_id'=>$key,
                          'price'=>$value['price'],
                          'quantity'=>$value['qty']
                        ]);
                    }

                }
              //gủi email

                $email_cus = $request->email;
                $name_cus = Auth::guard('cusFrontend')->user()->name;

                Mail::send('emails.infoEmail',[
                'name'=> $name_cus,
                'donhang'=> $order,
                'shopping'   => $CartHelper->items,
                'total_price' =>$CartHelper->total_price,

                ], function($email) use($email_cus,$name_cus){
                
                $email->subject('Email đặt hàng');
                $email->to($email_cus,$name_cus);
                $email->from('info.haianhh@gmail.com');
            
                });
                
                session(['cart'=>'']);
                return response()->json([
                'data'=>'success',
                ]);
                
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assert_order(Request $request,CartHelper $CartHelper,$id,$token_order)
    {
      
        $assert_order = checkoutModel::find($id);
        $order_detail = order_detailModel::where('orders_id',$id)->get()->toArray();
        $name_khachhang = $assert_order->name_user;
        $mail_khachhang = $assert_order->email;
        if($assert_order->token === $token_order){
         $assert_order->update(['status'=>1]); 
          Mail::send('emails.assert_order',[
            'name'=> $name_khachhang,
            'email'=>$mail_khachhang,
            'donhang'=> $assert_order,
            'order_detail'   => $order_detail
            
            ], function($email) use($mail_khachhang,$name_khachhang){
                
            $email->subject('Email đặt hàng xác nhận thành công');
            $email->to($mail_khachhang,$name_khachhang);
            $email->from('info.haianhh@gmail.com');
            });

        return view('frontend.pages.info_order');
        
        
        }else{
            // Thêm xử lý cho trường hợp token không hợp lệ
            return redirect()->route('cart.index')->with('error', 'Token không hợp lệ');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\checkoutModel  $checkoutModel
     * @return \Illuminate\Http\Response
     */
    public function show(checkoutModel $checkoutModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\checkoutModel  $checkoutModel
     * @return \Illuminate\Http\Response
     */
    public function edit(checkoutModel $checkoutModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\checkoutModel  $checkoutModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, checkoutModel $checkoutModel)
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
