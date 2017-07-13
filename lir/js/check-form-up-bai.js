		$(document).ready(function(){
			
			$(".btn_submit").attr('disabled','true');
			//var x =$("#loai_sp_select option").is(':selected');
			$("#chon_sp").slideDown();
			$('#chon_dc').slideDown();
			//gan bien dem
			var value_sp = 0;
			var value_sdt = 0;
			var value_dc = 0;
			var value_gia_tien = 0;
			// check select san pham
			$("#chon_loai_sp").change(function(){
				// chon sp cong nghe hoac chon sp gia dinh
				var sp_cn =$("#loai_sp_select option").is(':selected');
				var sp_gd =$("#loai_sp_gd_select option").is(':selected');
				if(sp_gd || sp_cn ){
					value_sp = 1;
					$("#chon_sp").slideUp();
				}else{
					value_sp = 0;
				}
				if(value_sdt === 1 && value_sp === 1 && value_dc === 1){
					$(".btn_submit").removeAttr('disabled');
				}
			});
			// check select khu vuc
			$("#chon_khu_vuc").change(function(){
				var dc =$("#khu_vuc_select option").is(':selected');
				var dc_khuvuckhac = $("#khuvuckhac_slect").is(':selected');
				if(dc || dc_khuvuckhac){
					value_dc = 1;
					$("#chon_dc").slideUp();
				}else{
					value_dc = 0;
				}
				if(value_sdt === 1 && value_sp === 1 && value_dc === 1){
					$(".btn_submit").removeAttr('disabled');
				}
			});
			// check sdt
			$("#blur_sdt").on('blur',function(){
				var sdt = $(this).val();
				if(isNaN(sdt) || sdt.length <10){
					$("#check_form").slideDown();
					value_sdt = 0;
				}else{
					$("#check_form").slideUp();
					value_sdt = 1;
				}
				if(value_sdt === 1 && value_sp === 1 && value_dc === 1){
					$(".btn_submit").removeAttr('disabled');
				}
			});
			$("#blur_gia_tien").keyup(function(){
				var gia_tien = $(this).val();
				if(isNaN(gia_tien) ){
					$("#check_form_gia").slideDown();
					
				}else{
					$("#check_form_gia").slideUp();
					
				}
			});
			
		});