
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
					$('.dataList').html(res);
					
				}

			}); //ajax login 
			 
		
		}else{
			$('.dataList').html('');
			$('.dataList').hide();
			

		}
	
	});




});