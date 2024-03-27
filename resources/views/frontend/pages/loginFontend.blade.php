@extends('frontend.client')
@section('main')

         <div class="container">
            <div class="row">
            <!-- login -->
               <div class="col-sm-6">
                  <div class="full">
                        <div class="login-form-checkout">
                           <p>Nếu bạn là thành viên của chúng tôi vui lòng đăng nhập. Nếu bạn là khách hàng mới vui lòng đăng ký thành viên</p>
                            <p class="mgs" style="font-family: roboto; font-size:16px;padding: 15px; text-align: center; color:green; margin: 0;"></p>
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
                                       <button class="bt_main bt_login" type="submit">Login</button>
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

                 </div><!-- end row -->
            </div>

@endsection
@section('js')
	<script  type="text/javascript" charset="utf-8" async defer>
		$(document).ready(function(){

    			$('.bt_login').on('click',function(e){
    				e.preventDefault();
    				
            var _email = $('#user_Email').val();
    			
          	var _password = $('#password_user').val();
    				
            var _url=$('#user_url').val();
    				
            var _token = $('input[name ="_token"]').val();

            $('.err').text('');

            $('.mgs').text('');

             $.ajax({

                     type:'POST',
                     url:_url,
                     data:{
                       email: _email,
                       password:_password,
                       _token :_token,

                     },
                     success:function(res){

                       if(res.error){

                         for(var key in res.error) {
                          $('.loi_'+key).text(res.error[key]);

                        }
                      }else if(res.mgs){
                         $('.mgs').text(res.mgs);

                         }else{
                         
                          alert('Đăng nhập thành công');
                	          
                            location.reload();
                	        
                          }//\if

            	       }//\success  

      	       })//ajax

         }); //btn login

          /*resgiter*/
          $('#formRegister').on('submit',function(ev){
            ev.preventDefault();
            var name = $('.input_name').val();
            var email = $('.input_Email').val();
            var password = $('.input_ps').val();
            var url = "{{route('resgiterPut')}}";
            var token = $('input[name ="_token"]').val();
           
          $('.loi').text('');
            $.ajax({

                  type:'POST',
                  url:url,
                  data:{
                    name: name,
                    email:email,
                    password:password,
                    _token :token

                  },

                  success:function(res){
                    if(res.error){

                         for(var key in res.error) {
                          $('.err_'+key).text(res.error[key]);

                        }

                  };//
                  
                  if(res.data){
                    alert('Đăng nhập thành công');
                    location.reload();
                  };
                }

           })// \ajax login
          


          });//btn

		});
	</script>
@endsection