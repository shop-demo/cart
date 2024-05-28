@extends('frontend.client')
@section('main')

         <div class="container" style="margin-top: 180px;">
          <!-- thong bao -->
          @if(session('message'))
          @include('frontend.pages.block.mgs')
          @endif
          <!-- end thong bao --> 
            <div class="row" >
             @if(auth()->guard('cusFrontend')->check())
              <div class="col-sm-6">
                <p>Chào bạn {{auth()->guard('cusFrontend')->user()->name}}! Vui lòng<a href="{{route('home.index')}}" style="font-size: 15px; color: blue; text-align: center;"> Click vào đây để vào trang chủ</a></p>
              </div>
              @else
             
            <!-- login -->
               <div class="col-sm-6">
                  <div class="full">

                        <div class="login-form-checkout">
                           <p>Nếu bạn là thành viên của chúng tôi vui lòng đăng nhập. Nếu bạn là khách hàng mới vui lòng đăng ký thành viên</p>
                            <p class="mgs" style="font-family: roboto; font-size:16px;padding: 15px; text-align: center; color:green; margin: 0;"></p>
                            <p id="kq"></p>
                           <form action="" method="POST" >
                              <fieldset>
                              @csrf
                                 <div class="row">
                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                       <label for="username">Email <span class="required">*</span></label>
                                       <input class="input-text" name="email" id="user_Email"  type="email" value="">
                                       <input class="input-text" name="url" id="user_url"  type="hidden" value="{{route('loginSubmit')}}">
                                       <p class="loi_0 err"></p>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                       <label for="password">Password <span class="required">*</span></label>
                                       <input class="input-text" name="password" id="password_user" type="password" value="">
                                       <p class="loi_1 err"></p>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 btn-login">
                                       <button class="bt_main bt_login" data-previous="{{session('previous_url')}}" type="submit">Login</button>
                                       <span class="remeber">
                                       <input type="checkbox">Remember me</span> 
                                    </div>
                                 </div>
                              </fieldset>
                           </form>
                        </div>
                    
                    </div>
                   </div>
                 <!-- end login -->
                

                 <!-- Đăng ký -->

                <div class="col-sm-6">
                  <div class="full">
                     <div class="tab-info login-section">
                        <p>Returning customer? <a href="#login" class="" data-toggle="collapse">Click Vào đây để đăng ký thành viên</a></p>
                     </div>
                     <div id="login" class="collapse">
                        <div class="login-form-checkout">
                           <p>Đăng ký thành viên</p>
                          
                           <form action="" method="POST" id="formRegister">
                              <fieldset>
                                 <div class="row">
                                 @csrf
                                 <div class="col-md-12 col-sm-6 col-xs-12">
                                       <label for="usName">Username <span class="">*</span></label>
                                       <input class="input-text input_name" name="name" id="usName"  type="text" value="">
                                       <p class="err_0 loi"></p>

                                    </div>
                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                       <label for="usEmail">Email <span class="">*</span></label>
                                       <input class="input-text input_Email" name="email" id="usEmail" type="text" value="">
                                       <p class="err_1 loi"></p>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                       <label for="password_us">Password <span class="">*</span></label>
                                       <input class="input-text input_ps" name="passwordName" id="password_us"  type="password" value="">
                                       <p class="err_2 loi"></p>
                                      
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 btn-login">
                                       <button class="bt_main sub_resgiter">Đăng ký</button>
                                       <span class="remeber">
                                       <input type="checkbox">Remember me</span> 
                                    </div>
                                 </div>
                              </fieldset>
                           </form>
                        </div>
                     </div>
                    </div>
                   </div>
                 <!-- end login -->

              @endif
          

                 </div><!-- end row -->
            </div>

             <!-- Modal search bar-->
             @include('frontend.pages.block.seach')
              <!-- End Model search bar -->

@endsection
@section('js')


@endsection