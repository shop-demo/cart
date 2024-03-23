  $(document).ready(function(){
      //add cart
      $('.bt_addCart').on('click',function(ev){
        ev.preventDefault();

        var id_product = $(this).data('product-id');
        var _url  = $('.input_route').val();
        var token = $('input[name ="_token"]').val();

        $.ajax({

            type:'POST',
            url:_url,
            data:{
              id:id_product,
              _token :token

            },

            success:function(res){

              if(res.status_code === 404){

               Swal.fire("Không tìm thấy sản phẩm");
               }

              if(res.status_code ==200){
                 Swal.fire({
                  title: "Thêm",
                  text: "Sản phẩm đã thêm trong giỏ hàng",
                  icon: "success"
                 });

              }
          }
        }); //ajax login 

    });//btn add 

     /*-----------------------------------
            update cart
       -------------------------------------*/
      $('.bt_cartUpdate').on('click',function(ev){
         ev.preventDefault();
        var _id = $(this).data('id');
        var _url = $(this).data('url-update');

        var token = $('input[name ="_token"]').val();
        // Tìm hàng (row) tương ứng với sản phẩm được cập nhật
        var $row = $(this).closest('tr');
        // Tìm input số lượng trong hàng này
        var valInput = $row.find('input[name="qtyName"]').val();

      $('#info').text('');

      $.ajax({
        type: 'PUT',
        url: _url,

        data:{
          _token: token,
          id: _id,
          qty: valInput,

        }, // added data type

        success: function(res){
          if(res.data="success"){
            
            Swal.fire({
              title: "update giỏ hàng",
              text: "update thành công giỏ hàng",
              icon: "success"
            }).then((result) => {
                        // Nếu người dùng nhấn vào nút xác nhận, thực hiện tải lại trang
                        if (result.isConfirmed) {
                          location.reload();
                        }
                        
              });
         
          }//end if  

        }//success

      });//ajax

    });//button     

     /*-------------------------------
     ---------------------------------
     Delete*/
     $('.btn_delete').on('click', function(ev) {
      ev.preventDefault();
      var _id = $(this).data('id-product');
      var _url = $(this).data('product-url');
      var token = $('input[name="_token"]').val();

            // Xác nhận từ người dùng trước khi thực hiện xóa
              Swal.fire({
                title: "Bạn có chắc xóa không?",
                text: "Bạn không thể quay lại nếu xóa nó",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
              }).then((result) => {
                if (result.isConfirmed) {
                      // Nếu người dùng chấp nhận xóa, gọi hàm để thực hiện xóa sản phẩm
                      deleteProduct(_url, token, _id);
                    }
                });
    
     });//end button
     
     //function delete
     function deleteProduct(url, token, id) {
      $.ajax({
        type: 'DELETE',
        url: url,
        data: {
          _token: token,
          id: id,
        },
        success: function(res) {
                    // Hiển thị thông báo xóa thành công từ SweetAlert2
                    Swal.fire({
                      title: "Đã xóa!",
                      text: "Sản phẩm trong giỏ hàng đã bị xóa",
                      icon: "success"
                    }).then((result) => {
                        // Sau khi hiển thị thông báo, làm mới trang
                        location.reload();
                      });
        },
        error: function(xhr, status, error) {
                    // Xử lý lỗi nếu có
          console.error(xhr.responseText);

        }
               

      });//ajax
   

    }//end function delete

   
    /*--------------------------------------------------------------------------
    xóa hết
    -------------------------------------------------------------------------*/
    $('#formDeleteAll').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var url = $(this).attr('action');

       // Xác nhận từ người dùng trước khi thực hiện xóa
              Swal.fire({
                title: "Bạn có chắc xóa hết không?",
                text: "Bạn không thể quay lại nếu xóa nó",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
             
              }).then((result) => {
               
                if (result.isConfirmed) {
                      // Nếu người dùng chấp nhận xóa, gọi hàm để thực hiện xóa sản phẩm
                        $.ajax({
                            type: 'post',
                            url: url,
                            data: formData,
                            success: function(res) {
                               // Hiển thị thông báo xóa thành công từ SweetAlert2
                                Swal.fire({
                                  title: "Đã xóa!",
                                  text: "Sản phẩm trong giỏ hàng đã bị xóa hết",
                                  icon: "success"
                                }).then((result) => {
                                    // Sau khi hiển thị thông báo, làm mới trang
                                    location.reload();
                                  });
                            },
                            error: function(xhr) {
                                var errors = xhr.responseJSON.errors;
                                console.log(res);
                                // Xử lý hiển thị lỗi
                            }
                        });

                    }
              });

        
    });//xóa hết-----------------------------------


    //oredr
    $('#order').on('click',function(){
        alert(123);
    });
 


  })


          
        
          
         
      


 

      