$(document).ready(function(){
         /*ĐĂNG NHẬP---------------------------
         ------------------------------------*/
          $('.bt_login').on('click',function(e){
                e.preventDefault();

                var _email = $('#user_Email').val();

                var _password = $('#password_user').val();

                var _url=$('#user_url').val();

                var _token = $('input[name ="_token"]').val();
                var previous = $(this).data('previous');
                
                $('.err').text('');

                $('.mgs').text('');
                
                var html = "";
          
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
                          }else 

                            if(res.mgs){

                                $('.mgs').text(res.mgs);

                            }else{


                                Swal.fire({
                                  title: "Đăng nhập thành công",
                                  icon: "success"
                                }).then((result) => {
                                  // Nếu người dùng nhấn vào nút xác nhận, thực hiện tải lại trang
                                  if (result.isConfirmed) {
                                  // Reload trang
                                  
                                  location.href = previous;
                                 
                                  
                                  }
                                  

                                });

                            }//\else

                     }//\success  

                   })//ajax

           }); //btn login
        /* end ĐĂNG NHẬP---------------------------
         ------------------------------------*/  

      
            /*REGISTER - đăng ký--------------------------
            --------------------------------------------- */
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
                       
                        Swal.fire({
                        title:"Đăng ký tài khoản thành công",
                        text: "Đăng ký tài khoản thành công",
                        icon: "success"
                        
                        }).then((result) => {
                            // Nếu người dùng nhấn vào nút xác nhận, thực hiện tải lại trang
                            if (result.isConfirmed) {
                              
                           // location.reload();
                            }

                          });
                        };
                     }

              })// \ajax login

          });//btn

            /* END REGISTER - đăng ký--------------------------
            --------------------------------------------- */
 });