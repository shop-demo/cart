$(document).ready(function(){
	
	$('.commDelete').on('click',function(e){
	 e.preventDefault();
	 let _href = $(this).attr('href');
	 let _token = $('input[name ="_token"]').val();
	 let _id = $(this).data('id');
	 $('#formComm').attr('action',_href);
	 if(confirm('bạn có muốn xóa không')==false){
             alert('Chưa có dữ liệu nào được xóa');
          }else{
            
            $('#formComm').submit();
          }
	

	})//btn
	


$('.active').on('click',function(ev) {
        ev.preventDefault();
        
        var url = $(this).data('url');
        var id = $(this).data('id');
        var token = $('input[name ="_token"]').val();

        
                    // Nếu người dùng chấp nhận xóa, gọi hàm để thực hiện xóa sản phẩm
                        $.ajax({
                            type: 'PUT',
                            url: url,
                           data: {
					          _token: token,
					          id: id,
					        },
                            success: function(res){
                            	if(res.data=='hiện'){
                            	alert('Thay đổi trạng thái publish');
                            	location.reload();
                               
                            	}else{
                            		console.log(res.data);
                            	}
                            	
                            },
                            
                        });
	
             
        
    });//xóa hết-----------------------------------

$('.not_active').on('click',function(e) {
        e.preventDefault();
        var url = $(this).data('url');
        var id = $(this).data('id');
        let token = $('input[name ="_token"]').val();

              // Nếu người dùng chấp nhận xóa, gọi hàm để thực hiện xóa sản phẩm
                $.ajax({
                  type: 'put',
                  url: url,
                  data: {
					        _token: token,
					        id: id,
					        },
                  success: function(res){
                   if(res.data=='ẩn'){

                      alert('Thay đổi trạng thái private');
                      location.reload();
                      }else{
                       alert('loi')
                      }
                  }
                 });//ajax

    });//xóa hết-----------------------------------

//get comment
	function loadComm(){

	}
	$(document).on('click','.rep_btn',function(ev){
    ev.preventDefault();
    var id = $(this).data('id');
    var f_replay = ('.repForm_')+id;
    $('.rep').slideUp();
    $(f_replay).slideDown();
   
  	});	


	$(document).on('click','.btnRep',function(ev){
    ev.preventDefault();
    
     var _url = $(this).data('url');
     var _product_id = $(this).data('product-id');
     var _customes_id = $(this).data('customes-id');
     var id = $(this).data('id');
     var textCommRep = ('.textCommRep_')+id;
     var text_Rep = $(textCommRep).val();
     var token = $('input[name ="_token"]').val();
    // console.log(_url,_product_id,_customes_id,id,text_Rep,token);
     
     $('.text_err').text('');
     
     $.ajax({
          url: _url,
          type: 'PUT',
         
          data: { 
            comment: text_Rep,
            product_id:_product_id,
            customes_id:_customes_id,
            reply_id :id,
            _token:token
          },
         
          success: function(res) {
            // Xử lý phản hồi từ server nếu cần
           
            if(res.error){
           		
           		$('.loi_').text(res.error);
           
            }else{

            	$(text_Rep).val('');
            	alert('thành công');
            	$('#textRep').text(res);
            	location.reload();

            }

          }

        });//end ajax */

	});

  //edit commentRep
  $('.editRep').on('click',function(e) {
    e.preventDefault();
    
    var _url = $(this).data('url');
    var _urlIndex = $(this).data('urlIndex');
    var _id = $(this).data('id');
    var _commentRep = $('.input-commRep').val();
    var reply_id = $(this).data('reply-id');
    var token = $('input[name ="_token"]').val();
    var urlRep = $(this).data('url-rep');
    $.ajax({
      url:_url,
      type:"PUT",
      data:{
            comment: _commentRep,
            reply_id:reply_id,
            id:_id,
            _token:token

      },

      success: function(res) {
            // Xử lý phản hồi từ server nếu cần
            if(res.error){
              $('.loi_').text(res.error);
            }else{

              $('.input-commRep').val('');
              alert('Bạn vửa update thành công');
              window.location.href = urlRep;
            }
         }


    }); //ajax

  });//btn editRep

  //delete repComm
  $('.repDelete').on('click',function(e) {
    e.preventDefault();
    let _href = $(this).attr('href');
    let _token = $('input[name ="_token"]').val();
    let id = $(this).data('id-rep');
   
   $('#repForm').attr('action',_href);
   if(confirm('bạn có muốn xóa không')==false){
             alert('Chưa có dữ liệu nào được xóa');
          }else{
            
            $('#repForm').submit();
          }
  

  });


});