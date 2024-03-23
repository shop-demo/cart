 <div class="row">
               <div class="col-sm-12 col-md-12">
                  <div class="product-table">
                  <h1 id="info" style="text-align:center;"></h1>
                     <table class="table">
                        <thead>
                           <tr>
                              <th>Product</th>
                              <th>Quantity</th>
                              <th class="text-center">Price</th>
                              <th class="text-center">Total</th>
                              <th> </th>
                           </tr>
                        </thead>
                        <!-- cat-->
                        <tbody>
                         @if($cart_data))
                        @foreach($cart_data as $key=>$cart)
                           <tr>
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
                            
                        @endforeach
                        @else
                        <p>Không có sản phẩm nào trong giỏ</p>   
                        @endif
                        </tbody>
                        <tbody>
                        
                       <!-- cat-->

                     </table>
                      
                           <tr class="cart-form">
                              <td >
                                 <button class="button"  type="submit" >Tổng tiền</button>
                              </td>
                           </tr>
                  </div>
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
                                 <h4>$1500.00</h4>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <h5>Estimated shipping</h5>
                              </td>
                              <td class="text-right">
                                 <h4>$50.00</h4>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <h3>Total</h3>
                              </td>
                              <td class="text-right">
                                 <h4>$1550.00</h4>
                              </td>
                           </tr>
                           <tr>
                              <td><button type="button" class="button">Continue Shopping</button></td>
                              <td><button class="button">Checkout</button></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>