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
	/** 
		**Ma bao ve cho dang nhap
		*/
		$(document).ready(function(){
			$("#submit").click(function(){
			// thoai dieu kien capcha thi ms cho load trang
			xacNhan = getCookie('capcha');
			
			protect = $("#ma_bao_ve_dn").val();
			if(protect === xacNhan){
				return true;
			}else{
				$("#alert_dn").slideDown();
				return false;
			}
		});
		});
	/** 
		**Ma bao ve cho quen mk
		*/
		$(document).ready(function(){
			$("#submit_qmk").click(function(){
			// thoai dieu kien capcha thi ms cho load trang
			xacNhan = getCookie('capcha');
			
			protect = $("#ma_bao_ve_qmk").val();
			if(protect === xacNhan){
				return true;
			}else{
				$("#alert_qmk").slideDown();
				return false;
			}
		});
		});
	</script>
	<script type="text/javascript">
	// script cho form quen mat khau
	$(document).ready(function(){
		$(".user").val("");
		$("#email").val("");
		$('#next').click(function(){
			$("#dang_nhap").slideUp();
			$("#quen_mk").slideDown();
		});
		$('#back').click(function(){
			$("#dang_nhap").slideDown();
			$("#quen_mk").slideUp();
		});
	});
</script>
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
				<li class="active"><a href="trang-chu"> <i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a href="dangky.htm"><span class="fa fa-user"></span> Đăng Ký</a></li>
				<li><a href="dangnhap.htm"><span class="fa fa-sign-in"></span> Đăng Nhập</a></li>
			</ul>
		</nav>
	</header><!-- ***END Header for mobie **-->
	<!-- ***** Main  Đăng nhập*****-->

	
	<main class="container">
		<div class="row">
			<div class="col-md-7">
				<section id="dang_nhap">
					<div class="alert alert-dismissible alert-danger" id="alert_dn" style="display: none;">
						<strong>Mã bảo vệ sai !!!</strong>
					</div>
					<h2>Đăng nhập tài khoản sử dụng</h2>

					<form method="POST" action="dangnhap-xem-authenticate.htm">
						<label for="username">Username</label>

						<input type="text" name="username" id="username" class="user" required><br>
						<br>
						<label for="password"> Password</label>

						<input type="password" name="password" id="password" required><br>
						<br>
						<label for="capcha">Mã bảo vệ</label>
						<input type="text" name="capcha" id="ma_bao_ve_dn" required>
						<img src="index.php?c=capcha" alt="capcha" title="capcha bao mat"><br>
						<input type="submit" name="submit" class="btn btn-primary buton_dangky" id="submit" value="Đăng nhập">
						<input type="button" class ="btn btn-default buton_dangky" value="Quên mật khẩu" id="next">
					</form>
				</section>
				<section id="quen_mk">
					<div class="alert alert-dismissible alert-danger" id="alert_qmk"  style="display: none;">
						<strong>Mã bảo vệ sai !!!</strong>
					</div>
					<h2>Quên mật khẩu</h2>

					<form method="POST" action="dangnhap-xem-quenmk.htm">
						<label for="username">Username</label>
						<input type="text" name="username" class="username user"  required ><br>
						<label for="password">Password mới</label>
						<input type="password" name="password" class="new_password password"  required ><br>
						<label for="password-again">Nhập lại password</label>
						<input type="password" name="password-again"  class="pass_again" required>
						<br>
						<label for="emai">Email</label>
						<input type="email" name="email" id="email" class="email"><br>
						<label for="capcha">Mã bảo vệ</label>
						<input type="text" name="capcha" id="ma_bao_ve_qmk" required>
						<img src="index.php?c=capcha" alt="capcha" title="capcha bao mat"><br>
						<label for="submit"></label>
						<input type="submit" name="submit" id="submit_qmk" class="btn btn-primary buton_dangky"  value="Đổi mật khẩu" >
						<input type="button" name="quay_lai" class="btn btn-default buton_dangky" value="Quay lại" id="back">
					</form>
				</section>
			</div>
			<!-- ***Quang cáo ****-->
			<div class="col-md-5" id="quang_cao">
				<img src="img/qc.jpg"  alt="quang cao" title="quang_cao">
			</div><!-- ***END Quang cáo ****-->
		</div>
		
	</main><!-- *****End Main *****-->

	