<script type="text/javascript">
	$(document).ready(function(){
		/** 
			** Kiem tra khi su dung dien thoai thi chuc nang se dk thuc thi voi do rong 800px
			** Hien css mobie va an css phan trang tren may tinh
			**/
			if(window.innerWidth<800){
				$("#xem_hang_mobie").css('display','block');
				$(".phan_trang_computer").css('display','none');
		}	/** 
			**End Kiem tra khi su dung dien thoai thi chuc nang se dk thuc thi voi do rong 800px
			**End Hien css mobie va an css phan trang tren may tinh
			**/

		/**
			**Kiem tra  submit de tim neu co gia tri thi load tim.
			**/
			$('#search_pro').submit(function(){
				var tim_pro = $('.search').val();
				if(tim_pro == ""){
					return false;
				}else{
					return true;
				}
		});/**
			** End Kiem tra 2 su kien clik va submit de tim neu co gia tri thi load tim.
			**/

		});
	/** 
		**Dung kiem tra khi scroll mang hinh den cuoi trang thi load du lieu bang ajax
		**/
		$(window).scroll(function(){
			if(($(document).height()-100 <=$(window).scrollTop() + $(window).height()) ){
				loadmore();
			}
		});
		function loadmore(){
			var val = $("#gia_tri_mobie").val();
			var gia_tri_loatin = $("#gia_tri_loatin").val();


			var gia_tri_khuvuc = $("#gia_tri_khuvuc").val();


			var tong_so = $("#tong_so").val();
			var tim = $("#tim").val();
			if(Number(val)<= Number(tong_so)){
				$.ajax({
					type: 'POST',
					url: 'trangchu-xem-indexMobie.htm',
					data:{
						getresult:val,
						giatriloatin: gia_tri_loatin ,
						giatrikhuvuc: gia_tri_khuvuc,
						tim: tim,
					},
					success: function (data){
						$('#figure_mobie').html(data);
						document.getElementById("gia_tri_mobie").value = Number(val)+5;
					}
				});
			}

	}/** 
		** End Dung kiem tra khi scroll mang hinh den cuoi trang thi load du lieu bang ajax
		**/
	</script>
	<?php
/* 
	**PHIA DUOI TA CO 2 ROW : ROW[0] va ROW[1]  va ROW[2]
	**ROW[0]:  dung de xuat du lieu theo trang 1 2 3 4 5
	**ROW[1]: lay tong cac pt trong csdl khi co yeu cau select 
	**ROW[2]: dung de xuat tin xem nhieu nhat
*/
//gia so trang tu mang thu 2 cua $row
	$number_page = isset($_GET['page']) ? $_GET['page'] : 1;
	$limit = 5;
	$total_sp = $row[1]->num_rows;
	$total_page = ceil($total_sp / $limit);
	if($number_page > $total_page){
		$number_page = $total_page;
	}else if( $number_page <1 ){
		$number_page = 1;
	}
	setcookie('limit', $limit, time() + 3600);
	if($total_sp ===0){
		header('Location: _404.htm');
	}
	// Ham dao nguoi chuoi
	function ham_dao_nguoc_chuoi($str1)  
	{  
		$n = strlen($str1);  
		if($n == 1)  
		{  
			return $str1;  
		}  
		else  
		{  
			$n--;  
			return ham_dao_nguoc_chuoi(substr($str1,1, $n)) . substr($str1, 0, 1);  
		}  
	} 

	?>
	<!-- ****** Css loader ******* -->
	<link rel="stylesheet" type="text/css" href="lir/css/loader.css">

	<div class="loader">
		<div class="cssload-loader">
			<div class="cssload-inner cssload-one"></div>
			<div class="cssload-inner cssload-two"></div>
			<div class="cssload-inner cssload-three"></div>
		</div>
	</div>
	<!-- ******End Css loader ******* -->
	<div id="main">
		<?php
		include('content_header.php');
		?>

		<main class="container" id="dautrang">
			<!-- *** Phan loai danh muc *** -->

			<?php
			$row1 =$row[1]->fetch_assoc();
			?>
			<section id="danh_muc">
				<p ><a href="trang-chu"><i class="fa fa-home" aria-hidden="true"></i> Home</a>  <?php
			 	// Neu ton tai khu vuc thi hien khu vuc 
					if(isset($_GET['khuvuc'])){
						echo "<a href='kv-".$_GET['khuvuc'].".htm ' rel='' > >> ".$_GET['khuvuc']."</a>";
					}
					?> 
					<?php
				// nếu trên url có tồn tại loại tin thì thêm chi tiết loại tin 
					if(isset($_GET['loaitin'])){
						?>
						>><a href="lt-<?php echo $_GET['loaitin']; ?>.htm" rel="" id="loai_sp">	<?php echo $_GET['loaitin']; ?></a></p>
					<?php
						}
					?>
					<h1>Trao đổi hàng hoá <?php
			 	// Neu ton tai khu vuc thi hien khu vuc 
						if(isset($_GET['khuvuc'])){
							echo "tại ".$_GET['khuvuc'];
						}
						?> 
					</h1>
				</section><!-- ***End Phan loai danh muc *** -->
				<!-- ******Search *****-->
				<section id="speed_search">
					<h2>Trao đổi hàng hoá</h2>
					<div class="row">
						<div class="col-md-7" style="float: left;">
							<!-- ***input-group*** -->
							<form action="trang-chu-can" method="GET">
								<div class="input-group">
									<input type="text" class="search" name="tim" placeholder="Nhập từ khoá cần tìm ..."  value="" >
								</div>
							</form><!-- ***End input-group*** -->
							<!-- ***Select form ***-->
							<div class="row" id="loc_tin">

								<div class="col-md-6">
									<select class="form-control" id="chon_khu_vuc_ktx">
										<option value="">Chọn khu vực bạn muốn xem</option>
										<?php 

										if(isset($_GET['loaitin'])){
									// lay gia tri loai tin gan vao duong dan url
											$loaitin = $_GET['loaitin'];

											echo '<option value="sp-KTXA-'.$loaitin.'.htm">KTX A</option>';
											echo '<option value="sp-KTXB-'.$loaitin.'.htm">KTX B</option>';
											echo '<option value="sp-khuvuckhac-'.$loaitin.'.htm">Khu vực khác</option>';
										}else{
									// lay mat dinh khong co gia tri loai tin gan vao duong dan url
											echo '<option value="kv-KTXA.htm">KTX A</option>';
											echo '<option value="kv-KTXB.htm">KTX B</option>';
											echo '<option value="kv-khuvuckhac.htm">Khu vực khác</option>';
										}
										?>
									</select><!-- ***End Select form ***-->
								</div>
								<div class="col-md-6">
									<select class="form-control" id="chon_loai_hang_can_xem">

										<option value="">Chọn loại tin bạn muốn xem</option>
										<?php
										if(isset($_GET['khuvuc'])){
											$khuvuc= $_GET['khuvuc'];
											echo "<optgroup label='Dụng cụ công nghệ'>";
											echo '<option value="sp-'.$khuvuc.'-laptop.htm">Laptop</option>';
											echo '<option value="sp-'.$khuvuc.'-chuot.htm">Chuột máy tính</option>';
											echo '<option value="sp-'.$khuvuc.'-banphim.htm">Bàn phím</option>';
											echo '<option value="sp-'.$khuvuc.'-loa.htm">Loa</option>';
											echo '<option value="sp-'.$khuvuc.'-cpu.htm">CPU</option>';
											echo '<option value="sp-'.$khuvuc.'-ram.htm">Ram</option>';
											echo '<option value="sp-'.$khuvuc.'-card.htm">Card màng hình</option>';
											echo '<option value="sp-'.$khuvuc.'-mp3.htm">MP3</option>';
											echo '<option value="sp-'.$khuvuc.'-mp4.htm">MP4</option>';
											
											echo '<option value="sp-'.$khuvuc.'-ongkinh.htm">Ống kính máy ảnh</option>';
											echo '<option value="sp-'.$khuvuc.'-maychuphinh.htm">Máy chụp hình</option>';
											echo '<option value="sp-'.$khuvuc.'-phutung.htm">Các phụ tùng khác</option>';
											echo "</optgroup>";
											echo "<optgroup label='Đồ dùng gia đình & cá nhân & học tập'>";
											echo '<option value="sp-'.$khuvuc.'-quat.htm">Quạt</option>';
											echo '<option value="sp-'.$khuvuc.'-tu.htm">Tủ quần áo</option>';
											echo '<option value="sp-'.$khuvuc.'-sach.htm">Sách</option>';
											echo '<option value="sp-'.$khuvuc.'-dungcukhac.htm">Các dụng cụ khác</option>';
											echo "</optgroup>";
										}else{
											echo "<optgroup label='Dụng cụ công nghệ'>";
											echo '<option value="lt-laptop.htm">Laptop</option>';
											echo '<option value="lt-chuot.htm">Chuột máy tính</option>';
											echo '<option value="lt-banphim.htm">Bàn phím</option>';
											echo '<option value="lt-loa.htm">Loa</option>';
											echo '<option value="lt-cpu.htm">CPU</option>';
											echo '<option value="lt-ram.htm">Ram</option>';
											echo '<option value="lt-card.htm">Card màng hình</option>';
											echo '<option value="lt-mp3.htm">MP3</option>';
											echo '<option value="lt-mp4.htm">MP4</option>';
											
											echo '<option value="lt-ongkinh.htm">Ống kính máy ảnh</option>';
											echo '<option value="lt-maychuphinh.htm">Máy chụp hình</option>';
											echo '<option value="lt-phutung.htm">Các phụ tùng khác</option>';
											echo "</optgroup>";
											echo "<optgroup label='Đồ dùng gia đình & cá nhân & học tập'>";
											echo '<option value="lt-quat.htm">Quạt</option>';
											echo '<option value="lt-tu.htm">Tủ quần áo</option>';
											echo '<option value="lt-sach.htm">Sách</option>';
											echo '<option value="lt-dungcukhac.htm">Các dụng cụ khác</option>';
											echo "</optgroup>";
										}
										?>
									</select><!-- ***End Select form ***-->
								</div>
							</div>

						</div>

					</div>

				</section>
				<!-- ********End Search *******-->
				<!-- *** LIST ITEM ***-->

				<section id="xem_hang"  >
					<div class="row">
						<div class="col-md-7">
							<?php

							while( $row_list =$row[0]->fetch_assoc()){
					/**  
						** Moi sp co id rieng dua vao id ta dieu huong no den trang xem thong tin
						** $ROW[0] lay thong tin sp qa page 1 2 3 4 5...
						**/

						?>
						<figure>

							<a href="xemthongtin-<?php echo $row_list['id'] ?>-<?php echo $row_list['khu_vuc']; ?>.htm" >
								<img src="img/<?php echo $row_list['hinh_1']; ?>"  alt="<?php echo $row_list['tieu_de'];?>"  title='<?php echo $row_list['tieu_de'];?>' >
								<div class="info-picture" >
									<p><?php echo $row_list['ten_sp']; ?></p>
									<?php
										// Neu tồn tại giá tiền
									if($row_list['gia_tien'] != null){
										$gia_tien =ham_dao_nguoc_chuoi($row_list['gia_tien']);
										$do_dai = strlen($gia_tien) - 1;
										echo "<p>";
										for($i = $do_dai ; $i>=0 ; $i--){
											echo $gia_tien[$i];
											if($i%3 == 0 && $i != 0){
												echo ".";
											}
										}
										echo " vnđ</p>";
									}else{
										echo "<p><a href='#'>0 vnđ</a></p>";
									}
									?>
									<p class="ngay_dang">Ngày đăng: <?php echo $row_list['ngay_dang']; ?> </p>
								</div>
							</a>
						</figure>
						<?php
					}
					?>
				</div>
				<div class="col-md-7" id="xem_hang_mobie" style="display: none">
					<input type="hidden" id="gia_tri_mobie" value="5">
					<input type="hidden" id="gia_tri_loatin" value="<?php 
					if(isset($_GET['loaitin'])){
						echo $_GET['loaitin'];
					}else{
						echo "";
					}
					?>">
					<input type="hidden" id="gia_tri_khuvuc" value="<?php 
					if(isset($_GET['khuvuc'])){
						echo $_GET['khuvuc'];
					}else{
						echo "";
					}
					?>">
					<input type="hidden" id="tim" value="<?php 
					if(isset($_GET['tim'])){
						echo $_GET['tim'];
					}else{
						echo "";
					}
					?>">
					<input type="hidden" id="tong_so" value="<?php echo $total_sp?>">
					<!-- ****** Thong tin san phai cho mobie ****** -->
					<figure id="figure_mobie"></figure>
					<!-- ******End  Thong tin san phai cho mobie ****** -->
				</div>

				<!-- ***Tin tuc xem nhieu ***-->
				<div class="col-md-5" id="tin_xem_nhieu">
				<div class="col-md-2 row h3">
						<h3>Tin Xem Nhiều </h3>
					</div>
					<div class="col-md-10">
						<div class="khung_xem_nhieu">
							<?php
							while($row_2 = $row[2]->fetch_assoc()){
								?>
								<a href="xemthongtin-<?php echo $row_2['id'] ?>-<?php echo $row_2['khu_vuc']; ?>.htm" >
									<img src="img/<?php echo $row_2['hinh_1']; ?>" alt="<?php echo $row_2['tieu_de'];?>"  title='<?php echo $row_2['tieu_de'];?>' >
									<div class="info-picture text-center" >
										<p><?php echo $row_2['ten_sp']; ?></p>
									</div>
								</a>
								<?php
							}
							?>
						</div>
					</div>
					
					
				</div><!-- ***End Tin tuc xem nhieu ***-->
				
				<!-- ***Quang cáo ****-->
				<div class="col-md-5 text-center" id="quang_cao">
					<img src="img/qc.jpg" title="day la quang cao website giao dich" alt="quang cao" >
				</div><!-- ***END Quang cáo ****-->
				
			</div>
			
			<div class="phan_trang_computer" >
				<?php
				/*
					** chi su dung phan trang khi tim theo selet
					** va show tat ca cac sp mac dinh
					** Phan  trang khong  cho tim kiem
					** k co loai tin va khu vuc
				*/
					if(!isset($_GET['tim']) && !isset($_GET["loaitin"]) && !isset($_GET['khuvuc'])){
						?>
						<nav aria-label="Page navigation">
							<ul class="pagination pull-left">
								<?php
								if($number_page>1 && $total_page >1){ 

									echo '<li>
									<a href="trang-'.($number_page-1).'.htm" aria-label="Previous">
										<span aria-hidden="true">&laquo</span>
									</a>
								</li>';
							}
							?>
							<?php for($i = 1 ; $i<= $total_page ; $i++){
								if($i == $number_page){
									echo '<li ><a class="btn btn-default">'.$i.'</a></li>';
								}else{
									echo '<li><a href="trang-'.$i.'.htm">'.$i.'</a></li>';
								}
							}
							?>

							<?php
							if($number_page<$total_page && $total_page >1){ 

								echo '<li>
								<a href="trang-'.($number_page+1).'.htm" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
								</a>
							</li>';
						}
						?>
					</ul>
				</nav>

				<?php
		/*
			 ***Phan trang cho tim kiem
		*/
	}else if(isset($_GET['tim']) && !isset($_GET["loaitin"])){
		?>
		<nav aria-label="Page navigation">
			<ul class="pagination pull-left">
				<?php
				if($number_page>1 && $total_page >1){ 

					echo '<li>
					<a href="index.php?c=trangchu&a=index&page='.($number_page-1).'&tim='.$_GET["tim"].' " aria-label="Previous">
						<span aria-hidden="true">&laquo</span>
					</a>
				</li>';
			}
			?>
			<?php for($i = 1 ; $i<= $total_page ; $i++){
				if($i == $number_page){
					echo '<li ><a class="btn btn-default">'.$i.'</a></li>';
				}else{
					echo '<li><a href="index.php?c=trangchu&a=index&page='.$i.'&tim='.$_GET["tim"].' ">'.$i.'</a></li>';
				}
			}
			?>

			<?php
			if($number_page<$total_page && $total_page >1){ 

				echo '<li>
				<a href="index.php?c=trangchu&a=index&page='.($number_page+1).'&tim='.$_GET["tim"].' " aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>';
		}
		?>
	</ul>
</nav>
<?php
/* Chi ton tai loai tin */
}	else if(!isset($_GET['tim']) && isset($_GET['loaitin'])  && !isset($_GET['khuvuc']) ){
	?>

	<nav aria-label="Page navigation">
		<ul class="pagination pull-left">
			<?php
			if($number_page>1 && $total_page >1){ 

				echo '<li>
				<a href="trangloaitin-'.($number_page-1).'-'.$_GET['loaitin'].'.htm" aria-label="Previous">
					<span aria-hidden="true">&laquo</span>
				</a>
			</li>';
		}
		?>
		<?php for($i = 1 ; $i<= $total_page ; $i++){
			if($i == $number_page){
				echo '<li ><a class="btn btn-default">'.$i.'</a></li>';
			}else{
				echo '<li><a href="trangloaitin-'.$i.'-'.$_GET["loaitin"].'.htm">'.$i.'</a></li>';
			}
		}
		?>

		<?php
		if($number_page<$total_page && $total_page >1){ 

			echo '<li>
			<a href="trangloaitin-'.($number_page+1).'-'.$_GET["loaitin"].'.htm" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			</a>
		</li>';
	}
	?>
</ul>
</nav>
<?php
/* Yeu cau ton tai khu vuc va loai tin */
}else if(!isset($_GET['tim']) && isset($_GET['loaitin']) && isset($_GET['khuvuc'])){
	?>
	<nav aria-label="Page navigation">
		<ul class="pagination pull-left">
			<?php
			if($number_page>1 && $total_page >1){ 

				echo '<li>
				<a href="trangloaitinvakhuvuc-'.($number_page-1).'-'.$_GET['khuvuc'].'-'.$_GET['loaitin'].'.htm" aria-label="Previous">
					<span aria-hidden="true">&laquo</span>
				</a>
			</li>';
		}
		?>
		<?php for($i = 1 ; $i<= $total_page ; $i++){
			if($i == $number_page){
				echo '<li ><a class="btn btn-default">'.$i.'</a></li>';
			}else{
				echo '<li><a href="trangloaitinvakhuvuc-'.$i.'-'.$_GET['khuvuc'].'-'.$_GET["loaitin"].'.htm">'.$i.'</a></li>';
			}
		}
		?>

		<?php
		if($number_page<$total_page && $total_page >1){ 

			echo '<li>
			<a href="trangloaitinvakhuvuc-'.($number_page+1).'-'.$_GET['khuvuc'].'-'.$_GET["loaitin"].'.htm" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			</a>
		</li>';
	}
	?>
</ul>
</nav>
<?php
/* Yeu cau ton tai khu vuc */
} else if(!isset($_GET['tim']) && !isset($_GET['loaitin']) && isset($_GET['khuvuc'])){
	?>
	<nav aria-label="Page navigation">
		<ul class="pagination pull-left">
			<?php
			if($number_page>1 && $total_page >1){ 

				echo '<li>
				<a href="trangkhuvuc-'.($number_page-1).'-'.$_GET['khuvuc'].'.htm" aria-label="Previous">
					<span aria-hidden="true">&laquo</span>
				</a>
			</li>';
		}
		?>
		<?php for($i = 1 ; $i<= $total_page ; $i++){
			if($i == $number_page){
				echo '<li ><a class="btn btn-default">'.$i.'</a></li>';
			}else{
				echo '<li><a href="trangkhuvuc-'.$i.'-'.$_GET['khuvuc'].'.htm">'.$i.'</a></li>';
			}
		}
		?>

		<?php
		if($number_page<$total_page && $total_page >1){ 

			echo '<li>
			<a href="trangkhuvuc-'.($number_page+1).'-'.$_GET['khuvuc'].'.htm" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			</a>
		</li>';
	}
	?>
</ul>
</nav>
<?php
}
?>
</div>
</section><!-- ***END LIST ITEM ***-->
</main><!-- ***END MAIN *** -->

<script>
	/* 
		**script cho  cach tim bang select
		*/
		document.getElementById("chon_loai_hang_can_xem").onchange = function() {
			if (this.selectedIndex!==0) {
				window.location.href = this.value;
			}        
		};
		document.getElementById("chon_khu_vuc_ktx").onchange = function() {
			if (this.selectedIndex!==0) {
				window.location.href = this.value;

			}        
		};

	</script>
	<script src="lir/js/loading.js"></script>