<script type="text/javascript">
	function getCookie(cname) {
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i=0; i<ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1);
			if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
		}
		return "";
	}
	$(document).ready(function(){
		$("#submit").click(function(){
			// thoai dieu kien capcha thi ms cho load trang
			xacNhan = getCookie('capcha');
			
			protect = $("#ma_bao_ve").val();
			if(protect === xacNhan){
				return true;
			}else{
				$(".alert-danger").slideDown();
				return false;
			}
		});
	});
</script>