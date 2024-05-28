$(document).ready(function(){
	
	function load(){
		$('.btn-btn_nav').on('click',function(){
		var _url = $(this).data('url');
		var _id  = $(this).data('id');
		
		$.ajax({

			type:'GET',
			url:_url,

			data:{
				id:_id
			},

			success:function(res){
				$('#comm_text').html(res);
				//console.log(res);
			}

	      }); //ajax login 
			
			
		});
  
	}

	//comment
	$('.btn-comment').on('click',function(ev){
	    ev.preventDefault();
	    var _comment = $('#new-comment').val();
	    var _url = $(this).data('url-comment');
	    var productId = $(this).data('id-product');
	    var id_user =$(this).data('id-user');
	    var token = $('input[name ="_token"]').val();
	     $('.text_err').text('');
	     $.ajax({
	          url: _url,
	          type: 'PUT',
	         
	          data: { 
	            comment: _comment,
	            product_id:productId,
	            customes_id:id_user,
	            _token:token
	          },
	          success: function(res) {
	            // Xử lý phản hồi từ server nếu cần
	            if(res.error){
	             
	             		$('.loi_').text(res.error);
	              
	             }else{
			            $('#new-comment').val(''); 
			            $('#comm_text').append(res); //prepend .append
			                
			           // load();
			           // location.reload();
	             }
	          }
	        
	        });//end ajax

	  });

	/*reply $(document).on('click','.btn_replay_comm',function(event)
  --------------------------------------------------------------*/
 
  $(document).on('click','.btnRep',function(ev){
    ev.preventDefault();
    var id = $(this).data('id');
    var f_replay = ('.replayForm_')+id;
    $('.formRep').slideUp();
    $(f_replay).slideDown();
   
  });
  
  $(document).on('click','.reply',function(ev){
    ev.preventDefault();
     var _url = $(this).data('url');
     var _product_id = $(this).data('product-id');
     var _customes_id = $(this).data('customes-id');
     var id = $(this).data('id');
     var commentRep = ('.commReply_')+id;
     var commReply = $(commentRep).val();
     var token = $('input[name ="_token"]').val();
     
     $('.text_err').text('');
     $.ajax({
          url: _url,
          type: 'PUT',
         
          data: { 
            comment: commReply,
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

            	$(commentRep).val('');
            	$('#comm_text').append(res);

            }
          

          }

        });//end ajax
  });
  

 /*reply $(document).on('click','.btn_replay_comm',function(event)
  --------------------------------------------------------------*/ 	








});