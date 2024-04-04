@extends('frontend.client')
@section('css')
<style type="text/css" >
 .btn_update{
   font-size: 15px;
   font-weight: 600;
   min-width: auto;
   padding: 0px 15px;
   height: 45px;
   line-height: 45px;
   margin: 33px 0 0 30px;
   background: #d7bb3e;
   transition: ease all 0.5s;
   border: none;
   color: #fff;
   cursor: pointer;
   min-width: 120px;
}
.btn_update:hover{
 background: #333;
}


.btnDelete{
   font-size: 15px;
   font-weight: 600;
   min-width: auto;
   padding: 0px 15px;
   height: 45px;
   line-height: 45px;
   margin: 33px 0 0 30px;
   background: #fff;
   transition: ease all 0.5s;
   border: 1px solid #333;
   color: #333;
   cursor: pointer;
   min-width: 120px;
}
.btnDelete:hover{
 background: #d7bb3e;
}
.btn_order:hover{
  cursor: pointer;
  background: #d7bb3e;
  color: #fff;
  border: none;
}
.btn-order{
  font-size: 15px;
   font-weight: 600;
   min-width: auto;
   padding: 0px 15px;
   height: 45px;
   line-height: 45px;
   margin: 33px 0 0 0;
   background: #d7bb3e;
   transition: ease all 0.5s;
   border: none;
   color: #333;
   cursor: pointer;
   min-width: 120px;
}
.btn-order:hover{
  cursor: pointer;
  background: #333;
  color: #fff;
  border: none;
}
.checkoutSection{
  padding: 0;
}
.err{
  color: red;
  margin-top: 1.2rem;
}


</style>
@endsection

@section('main')
@php  @endphp

<div class="section padding_layout_1 Shopping_cart_section">
   <div class="container">
      <div class="row">
         <div class="col-sm-12 col-md-12">
            <div class="product-table">
               <h1 id="info" style="text-align:center;"></h1>
                  <table class="table">
                     <thead>
                        <tr>
                           <th><input class="form-check-input" type="checkbox" name="checAll" value="something" >Stt</th>
                           <th>Product</th>
                           <th>Quantity</th>
                           <th class="text-center">Price</th>
                           <th class="text-center">Total</th>
                           <th class="text-center">action</th>
                        </tr>
                     </thead>
                     <!-- list cat-->
                     <tbody>
                        @if(session()->get('cart'))
                        @php $i = 1; @endphp
                        @foreach(session()->get('cart') as $key=>$cart)
                        <tr>
                           <td class="col-sm-1 col-md-1" style="text-align: center"><input class="form-check-input" value="{{$key}}" type="checkbox" name="name_option[]" >{{$i}}
                           </td>

                           <td class="col-sm-8 col-md-6">
                              <div class="media">
                                 <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{url('public/uploads')}}/Products/{{$cart['avatar']}}" alt="#" style="width:120px; height:auto;"></a>
                                 <div class="media-body">
                                    <h4 class="media-heading"><a href="#">{{$cart['name']}}</a></h4>
                                    <span>Status: </span><span class="text-success">In Stock</span> 
                                 </div>
                              </div>
                           </td>

                           <td class="col-sm-1 col-md-1" style="text-align: center"><input class="form-control valInput" value="{{$cart['qty']}}" type="text" name="qtyName" >
                           </td>
                           <td class="col-sm-1 col-md-1 text-center">
                            <p class="price_table">{{number_format($cart['price'])}}</p>
                         </td>
                         <td class="col-sm-1 col-md-1 text-center">
                           <p class="price_table">{{number_format($cart['price']*$cart['qty'])}}</p>
                        </td>
                        <form action="" method="POST">
                         @csrf @method("PUT")
                         <td class="col-sm-1 col-md-1"><button type="button" class="bt_main bt_cartUpdate"
                            data-id="{{$cart['id']}}" data-url-update="{{route('cart.update',['id'=>$cart['id']])}}">
                            <i class="fa fa-edit"></i>Update</button></td>
                         </form>
                         <form action="" method="POST" id="cart-form"> 
                          @csrf @method("DELETE")
                          <td class="col-sm-1 col-md-1"><button type="button" class="bt_main btn_delete" data-id-product="{{$cart['id']}}" data-product-url ="{{route('cart.delete',['id'=>$cart['id']])}}" ><i class="fa fa-trash" ></i>Remove</button></td>
                       </form> 
                    </tr>
                    @php
                    $i++; 
                    @endphp
                    @endforeach
                    @else
                    <p>Không có sản phẩm nào trong giỏ</p> 
                    @endif
                 </tbody>
                </table>

                <div class="row">
                <!-- button xóa hết-->
                  <div class="col-md-4">
                    <form action="{{route('cart.destroy')}}" method="Post" id="formDeleteAll">
                       @csrf
                       <button class="btnDelete"  type="submit" >DeleteAll</button>
                    </form>
                  </div>
                 <!-- end button xóa hết-->
                 <!-- Thông báo tổng tiền-->
                  <div class="col-md-8">
                    <div class="shopping-cart-cart" style="max-width: 100%;">
                     <table>
                        <tbody>
                           <tr class="head-table">
                              <td>
                                 <h5>Hóa đơn sản phẩm</h5>
                              </td>
                              <td class="text-right"></td>
                           </tr>
                           <tr>
                              <td>
                                 <h4>Số lượng sản phẩm</h4>
                              </td>
                              <td class="text-right">
                                 <h4>{{$cartShop->total_quantity}}</h4>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <h5>Tổng tiền khuyến mại</h5>
                              </td>
                              <td class="text-right">
                                 <h4>$50.00</h4>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <h3>Tổng tiền</h3>
                              </td>
                              <td class="text-right">
                                 <h4>{{number_format($cartShop->total_price)}}vnđ</h4>
                              </td>
                           </tr>
                           <tr>
                              <td><button type="button" class="button">Tiếp tục mua hàng</button></td>
                              @if(auth()->guard('cusFrontend')->user())
                              <td><button class="button btn_order" data-bs-toggle="collapse" type="button" data-bs-target="#order"> Tiếp tục đặt hàng</button></td>
                              @else
                              <td><a href="{{route('dang-nhap')}}" class="button btn_order">Bạn đăng nhập để đặt hàng</a></td>
                              @endif
                              
                           </tr> 
                        </tbody>
                     </table>
                  </div>
                  </div>
                   <!-- end Thông báo tổng tiền-->
                </div>
                 <!-- end giỏ hàng -->
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Cart list-->
<!--order -->
<!-- end inner page banner -->
      <div class="section padding_layout_1 checkout_section checkoutSection">
         <div class="container collapse" id="order">
          
           <!-- ORDER-->
          @if(auth()->guard('cusFrontend')->user())
            <div class="row">
               <div class="col-md-8">
                
                @if(session('success_message'))
                    <div class="alert alert-success">
                        {{ session('success_message') }}
                    </div>
                @endif
                 
                  <div class="checkout-form">
                  <p class="h5 pb-1" style="display:inline-block;font-weight: 600; color: #333; border-bottom: 2px solid #c4c4c4; margin-bottom: 25px">Thủ tục thanh toán - checkout</p>
                   <form class="row g-3" action="" method="POST">
                      @csrf @method('PUT')
                        <div class="col-md-12">
                          <label for="n_input" class="form-label ">Họ tên </label>
                          <input type="text" class="form-control inputName" id="n_input" name="name" value="">
                          <p class="loi_ err"></p>
                        </div>
                        <div class="col-md-12">
                          <label for="e_input" class="form-label">Email</label>
                          <input type="email" class="form-control inputEmail" id="e_input" value="" name="email">
                          <p class="loi_ err"></p>
                        </div>
                        
                        <div class="col-md-12" style="padding: 10px; 0">
                          <label for="m_input" class="form-label">Mobile</label>
                          <input type="text" class="form-control inputMoble" id="m_input" name="mobile">
                          <p class="loi_ err"></p>
                        </div>
                        <div class="col-12" style="padding: 10px; 0">
                          <label for="address_input" class="form-label">Địa chỉ</label>
                          <input type="text" class="form-control inputAddress" id="address_input" name="address" placeholder="Nhập địa chỉ" value="">
                          <p class="loi_ err"></p>
                        </div>
                        <div class="col-12" style="padding: 10px; 0">
                          <label for="note_input2" class="form-label">Ghi chú</label>
                          <textarea class="form-control note" name="note"></textarea> 
                          <p class="loi_ err"></p>
                        </div>
                        <div class="col-12">
                          <button type="submit" class="btn-order" data-url-order="{{route('cart.order')}}">Order</button>
                        </div>
                    </form>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="shopping-cart-cart">
                     <table>
                        <tbody>
                           <tr class="head-table">
                              <td>
                                 <h5>Cart Totals</h5>
                              </td>
                              <td class="text-right"></td>
                           </tr>
                           <tr>
                              <td>
                                 <h4>Subtotal</h4>
                              </td>
                              <td class="text-right">
                                 <h4>$1500</h4>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <h5>Estimated shipping</h5>
                              </td>
                              <td class="text-right">
                                 <h4>$50</h4>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <h3>Total</h3>
                              </td>
                              <td class="text-right">
                                 <h4>$1550</h4>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div><!-- end order-->
            @endif
            

         </div>
      </div>

@endsection  
<!-- end section -->
@section('js')
<script type="text/javascript" charset="utf-8" async defer>
  
</script>
@endsection
