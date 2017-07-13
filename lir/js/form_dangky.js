	$(document).ready(function(){
		var time = null;
		$(".username").keyup(function(){
			clearTimeout(time);
			timeout = setTimeout(function ()
			{
            // Lấy nội dung search
            var data = {
            	title : $('.username').val()
            };

            // Gửi ajax search
            $.ajax({
            	type : 'post',
            	dataType : 'text',
            	data : data,
            	url : 'index.php?c=dangky&a=checkuser',
            	success : function (result){
            		$('#result').html(result);
            	}
            });
        }, 1000);
		});
	});
	$(document).ready(function(){
		var pass = "";
		$(".password").keyup(function(){
			pass= $(".password").val();
			
			if(/[0-9]/.test(pass)){
				$(".tick_user_so").css('opacity','1');
				$(".check_so").css('opacity','1');
			}else{
				$(".tick_user_so").css('opacity','0.3');
				$(".check_so").css('opacity','0.3');
			}
			if(pass.length > 6 ){
				$(".tick_user_kytu").css('opacity','1');
				$(".check_kytu").css('opacity','1');
			}else{
				$(".tick_user_kytu").css('opacity','0.3');
				$(".check_kytu").css('opacity','0.3');
			}
			if(/[a-z]/.test(pass) && /[A-Z]/.test(pass)){
				$(".tick_user_chu").css('opacity','1');
				$(".check_chu").css('opacity','1');
			}else{
				$(".tick_user_chu").css('opacity','0.3');
				$(".check_chu").css('opacity','0.3');
			}
			if(/[a-z]/.test(pass) && /[A-Z]/.test(pass) && pass.length > 6 && /[0-9]/.test(pass))
			{
				$(".pipe_manh").show();
				$(".pipe_yeu").hide();
				$(".pipe_trungbinh").hide();
			}else if((/[a-z]/.test(pass) && /[A-Z]/.test(pass) && pass.length > 6)){
				$(".pipe_manh").hide();
				$(".pipe_yeu").hide();
				$(".pipe_trungbinh").show();
			}else if(/[a-z]/.test(pass) && /[A-Z]/.test(pass) || pass.length > 6 || /[0-9]/.test(pass)){
				$(".pipe_manh").hide();
				$(".pipe_yeu").show();
				$(".pipe_trungbinh").hide();
			}else{
				$(".pipe_manh").hide();
				$(".pipe_yeu").hide();
				$(".pipe_trungbinh").hide();
			}
			$('.pass_again').keyup(function(){
				pass_again = $(this).val();
				if(pass_again === pass){
					$('.check_tick').show();
					$('.check_cancel').hide();
				}else{
					$('.check_tick').hide();
					$('.check_cancel').show();
				}
			});
		});
	});