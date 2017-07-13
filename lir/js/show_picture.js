function clicked(x){
	var array = ['hinh_1','hinh_2','hinh_3','hinh_4'];
	for(i = 0; i < array.length ;i++){
		if(x == array[i]){
			$("."+array[i]).addClass("active");
			$('#show_hinh .'+array[i]).show();

		}else{
			$("."+array[i]).removeClass("active");
			$('#show_hinh .'+array[i]).hide();
		}
	}
}
$(document).ready(function(){

	$("#chon_hinh .hinh_1").addClass("active");
	$('#show_hinh .hinh_1').addClass("active").show();
});