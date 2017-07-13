<script src="lir/js/menu_mobie.js"></script>
<!-- *** HEADER *** -->
<header class="computer" >
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
					<?php
					if(isset($_COOKIE['User']) && isset($_SESSION['authenticate'])){
						echo "<li><a href='upbai.htm'><span  class='fa fa-pencil' ></span> Đăng Bài</a></li>";
						echo "<li><a href='kiemtra.htm'><span class='fa fa-shopping-cart'></span>  Các bài đã đăng</a></li>";
						echo "<li><a href='logout.htm'><span class='fa fa-sign-out'></span> Đăng Xuất</a></li>";
						echo "<li><a >Chào bạn ".$_COOKIE['User']."</a></li>";
					}else if(isset($_SESSION['authenticate']) &&!isset($_COOKIE['User'])){
						echo "<li><a href='upbai.htm'><span  class='fa fa-pencil' ></span> Đăng Bài</a></li>";
						echo "<li><a href='kiemtra.htm'><span class='fa fa-shopping-cart'></span> Các bài đã đăng</a></li>";
						echo "<li><a href='logout.htm'><span class='fa fa-sign-out'></span> Đăng Xuất</a></li>";
					}else{
						echo "<li><a href='dangky.htm'><span class='fa fa-user'></span> Đăng Ký</a></li>";
						echo "<li><a href='dangnhap.htm'><span class='fa fa-sign-in'></span> Đăng Nhập</a></li>";
					}
					?>
				</ul>
			</div>
		</div>
	</nav><!-- ***END MENU *** -->
</header><!-- *** END HEADER *** -->
<!--** Header For mobile ** -->
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
			<?php
			if(isset($_COOKIE['User']) && isset($_SESSION['authenticate'])){
				echo "<li><a href='upbai.htm'><span  class='fa fa-pencil' ></span> Đăng Bài</a></li>";
				echo "<li><a href='kiemtra.htm'><span class='fa fa-shopping-cart'></span> Các bài đã đăng</a></li>";
				echo "<li><a href='logout.htm'><span class='fa fa-sign-out'></span> Đăng Xuất</a></li>";
				echo "<li><a >Chào bạn ".$_COOKIE['User']."</a></li>";
				echo "<li><a href='#dautrang'><span class='fa fa-arrow-up'></span> Đầu trang</a></li>";
			}else if(isset($_SESSION['authenticate']) &&!isset($_COOKIE['User'])){
				echo "<li><a href='upbai.htm'><span  class='fa fa-pencil' ></span> Đăng Bài</a></li>";
				echo "<li><a href='kiemtra.htm'><span class='fa fa-shopping-cart'></span> Các bài đã đăng</a></li>";
				echo "<li><a href='logout.htm'><span class='fa fa-sign-out'></span> Đăng Xuất</a></li>";
				echo "<li><a href='#dautrang'><span class='fa fa-arrow-up'></span> Đầu trang</a></li>";
			}else{
				echo "<li><a href='dangky.htm'><span class='fa fa-user'></span> Đăng Ký</a></li>";
				echo "<li><a href='dangnhap.htm'><span class='fa fa-sign-in'></span> Đăng Nhập</a></li>";
				echo "<li><a href='#dautrang'><span class='fa fa-arrow-up'></span> Đầu trang</a></li>";
			}
			?>
		</ul>
	</nav>
</header><!-- ***END Header for mobie **-->
