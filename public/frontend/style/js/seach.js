
$(document).ready(function(){
	$('.dataList').hide();
	$('.iput-seach').keyup(function(){
		var _text = $(this).val();
		var _url = $(this).data('url');
		
		if(_text != ''){
			$('.dataList').show();
			$.ajax({

				type:'GET',
				url:_url + _text,
				
				success:function(res){
					//$('.dataList').html(res);
					if (res.status === 'not_found') {
                        $('.dataList').html('<li style="padding:1rem; display:inlinle-block; list-style: none;">' + res.message + '</li>');
                        
                    } else {
                        $('.dataList').html(res);
                    }
					
					
				}

			}); //ajax login c
			 
		
		}else{
			$('.dataList').html('');
			$('.dataList').hide();
			

		}
	
	});




});