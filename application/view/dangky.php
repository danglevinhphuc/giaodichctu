<?php
if(isset($_SESSION['authenticate'])){
	if($_SESSION['authenticate'] === 1){
		header('location:trang-chu');
	}
}
?>
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
<script src="lir/js/form_dangky.js"></script>
<div>
<header class="computer">
	<!-- ***MENU *** -->
	<nav class="navbar">
		<div class="container-fluid  container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle " data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class="navbar-brand" href="#">Trao Đổi</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="active"><a href="trang-chu"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="dangky.htm"><span class="fa fa-user"></span> Đăng Ký</a></li>
					<li><a href="dangnhap.htm"><span class="fa fa-sign-in"></span> Đăng Nhập</a></li>
				</ul>
			</div>
		</div>
	</nav><!-- ***END MENU *** -->
</header><!-- *** END HEADER *** -->
	<!-- ***Header for mobie ***-->
	<script src="lir/js/menu_mobie.js"></script>
	<header class="mobile" >
		<div id="hamburger">
			<div></div>
			<div></div>
			<div></div>
		</div>
		<div id="hamburger_close">
			<div></div>
			<div></div>
			<div></div>
		</div>
		<nav>
			<ul>
				<li class="active"><a href="trang-chu"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a href="dangky.htm"><span class="fa fa-user"></span> Đăng Ký</a></li>
				<li><a href="dangnhap.htm"><span class="fa fa-sign-in"></span> Đăng Nhập</a></li>
			</ul>
		</nav>
	</header><!-- ***END Header for mobie **-->
<!-- ***** Main *****-->
<main class="container">
	<div class="row">
		
		<div class="col-md-7">
			<section>
				<div class="alert alert-dismissible alert-danger " style="display: none;">
					<strong class="">Mã bảo vệ sai !!!</strong>
				</div>
				<h2 class="form_h2">Đăng ký tài khoản sử dụng</h2>
				<form method="POST" action="dangky-xem-xuly.htm" class="form">

					<label for="username">Username</label>
					<input type="text" name="username" class="username">
					<div id="result"></div>
					<br>
					<label for="password">Password</label>
					<input type="password" name="password" class="password">
					<div style="display: inline-block;">
						<span class="pipe_yeu" >Yếu</span><span class="pipe_trungbinh" >Trung bình</span><span class="pipe_manh" >Mạnh</span>
						
					</div><br>
					<div class="do_bao_mat_pass">
						<img src="img/tick.png" class="tick_user_kytu" alt="icon check ky tu" title="icon check ky tu"> <span class="check_kytu" >Lớn hơn 6 ký tự</span> &nbsp; &nbsp;
						<img src="img/tick.png" class="tick_user_chu" alt="icon check chu" title="icon check ky tu"> <span class="check_chu" >Chữ hoa chữ thường</span> &nbsp; &nbsp;
						<img src="img/tick.png" class="tick_user_so" alt="icon check so" title="icon check so"> <span class="check_so" >Số</span> 
					</div>
					<label for="password-again">Nhập lại password</label>
					<input type="password" name="password-again" class="pass_again"><img src="img/tick.png" class="check_tick" alt="icon dung" title="icon dung"><img src="img/cancel.png" class="check_cancel" alt="icon sai" title="icon sai">
					<br> 
					<label for="emai">Email</label>
					<input type="email" name="email" class="email"><br>
					<label for="capcha">Mã bảo vệ</label>
					<input type="text" name="capcha" id="ma_bao_ve" required>
					<img src="index.php?c=capcha" alt="capcha" title="capcha bao mat"><br>
					<label for="submit"></label>
					<input type="submit" name="submit" class="btn btn-primary buton_dangky" value="Đăng ký" id="submit">
				</form>
			</section>
		</div>
		
		<!-- ***Quang cáo ****-->
		<div class="col-md-5" id="quang_cao">
			<img src="img/qc.jpg" alt="quang cao" title="quang_cao">
		</div><!-- ***END Quang cáo ****-->  
	</div>
	

	</main><!-- *****End Main *****-->