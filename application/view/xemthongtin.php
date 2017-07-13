<?php
	// kiem tra co ton tai noi dung hay khong neu khong co chuyen den 404.php
$kiem_tra = $row[0]->num_rows;
if($kiem_tra ===0){
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
<?php
include('content_header.php');
?>

<main class="container">
	<!-- *** Phan loai danh muc *** -->
	<section id="danh_muc" >
		<p><a href="#" rel="" >Website</a> >> <a href="kv-<?php echo $row1['khu_vuc'];  ?>.htm" rel="" ><?php echo $row1['khu_vuc']; ?></a> >> <a href="lt-<?php echo $row1['loai_sp'];  ?>.htm" rel="" ><?php echo $row1['loai_sp']; ?></a> >> <a href="xemthongtin-<?php echo $row1['id'] ?>-<?php echo $row1['khu_vuc'];  ?>.htm" rel="" id="loai_sp"> <?php echo $row1['ten_sp']; ?></a> </p>
		<h1>Xem thông tin sản phẩm tại khu vực <?php echo $row1['khu_vuc'] ?></h1>
	</section><!-- ***End Phan loai danh muc *** -->
	<!-- **** Chi tiet sp qua hinh anh ****-->
	<section id="thong_tin_sp">
		<div class="row">
			<!--***** Chọn hình xem ***** -->
			<div class="col-md-2" id="chon_hinh">
				<?php if($row1['hinh_1'] != ""){
					// Kiem tra co ton tai hinh anh khong neu co thi hien
					?>
					<img src="img/<?php echo $row1['hinh_1']; ?>" alt="<?php echo $row1['tieu_de'];?>"  title='<?php echo $row1['tieu_de'];?>'  class="hinh_1 img-responsive" onclick="clicked('hinh_1')">
					<?php }?>
					<?php if($row1['hinh_2'] != ""){
					// Kiem tra co ton tai hinh anh khong neu co thi hien
						?>
						<img src="img/<?php echo $row1['hinh_2']; ?>" alt="<?php echo $row1['tieu_de'];?>"  title='<?php echo $row1['tieu_de'];?>' class="hinh_2 img-responsive" onclick="clicked('hinh_2')">
						<?php }?>
						<?php if($row1['hinh_3'] != ""){
					// Kiem tra co ton tai hinh anh khong neu co thi hien
							?>
							<img src="img/<?php echo $row1['hinh_3']; ?>" alt="<?php echo $row1['tieu_de'];?>"  title='<?php echo $row1['tieu_de'];?>'  class="hinh_3 img-responsive" onclick="clicked('hinh_3')">
							<?php }?>
							<?php if($row1['hinh_4'] != ""){
					// Kiem tra co ton tai hinh anh khong neu co thi hien
								?>
								<img src="img/<?php echo $row1['hinh_4']; ?>" alt="<?php echo $row1['tieu_de'];?>"  title='<?php echo $row1['tieu_de'];?>'  class="hinh_4 img-responsive" onclick="clicked('hinh_4')">
								<?php }?>

							</div><!--*****End Chọn hình xem ***** -->
							<!--**** ZOOM Hình ****-->
							<div class="col-md-5" id="show_hinh">
								<!--******ZOOM****** -->
								<div id="hinh_mo_ta">
									<h6>Hình mô tả sản phẩm phía dưới:</h6>
								</div>
								<span class='zoom hinh_1'>
									<img src='img/<?php echo $row1['hinh_1']; ?>' alt="<?php echo $row1['tieu_de'];?>"  title='<?php echo $row1['tieu_de'];?>'/>
								</span>
								<div class="zoom hinh_2">
									<img src="img/<?php echo $row1['hinh_2']; ?>" alt="<?php echo $row1['tieu_de'];?>"  title='<?php echo $row1['tieu_de'];?>' >
								</div>
								<div class="zoom hinh_3">
									<img src="img/<?php echo $row1['hinh_3']; ?>" alt="<?php echo $row1['tieu_de'];?>"  title='<?php echo $row1['tieu_de'];?>' >
								</div>
								<div class="zoom hinh_4">
									<img src="img/<?php echo $row1['hinh_4']; ?>" alt="<?php echo $row1['tieu_de'];?>"  title='<?php echo $row1['tieu_de'];?>' >
								</div><!--******END ZOOM****** -->
								<!-- ***** Mieu ta sp qua chi tiet noi dung tai vi tri **** -->
								<section id="mieu_ta_sp">
									<div class="row">
										<div class="col-md-12">
											<div id="ten_sp">
												<h2><?php echo $row1['tieu_de'] ?></h2>
											</div>
										</div>
										<div class="col-md-12">
											<div id="noi_dung_sp">
												<p><strong>Nội dung mô tả sản phẩm:</strong> <?php echo $row1['noi_dung'] ?></p>
											</div>
										</div>
										<div class="col-md-12">
											<div id="khu_vuc">
												<p><i class="fa fa-map-marker"></i><?php echo $row1['khu_vuc'] ?></p>
												<p><i class="fa fa-user-circle"></i>Tên người đăng : <?php echo $row1['username'] ?></p>
											</div>
										</div>
										
										<div class="col-md-12">
											<div id="gia_tien">
												<?php
										// Neu tồn tại giá tiền
												if($row1['gia_tien'] != null){
													$gia_tien =ham_dao_nguoc_chuoi($row1['gia_tien']);
													$do_dai = strlen($gia_tien) - 1;

										

													echo "<p><i class='fa fa-usd'></i>Giá tiền :";
													for($i = $do_dai ; $i>=0 ; $i--){
														echo $gia_tien[$i];
														if($i%3 == 0 && $i != 0){
															echo ".";
														}
													}
													echo " VNĐ</p>";
												}else{
													echo "<p><i class='fa fa-usd'></i>Giá tiền :0 VNĐ</p>";
												}
												?>
												
											</div>
										</div>
										<div class="col-md-12">
											<div id="sdt_lien_he">
												<p><i class="fa fa-phone"></i> Liên hệ :+84 <?php echo $row1['sdt'] ?></p>
											</div>
										</div>
									</div>
								</section><!-- *****END Mieu ta sp qua chi tiet noi dung tai vi tri **** -->
							</div><!--****END ZOOM Hình ****-->
							<!-- ***Quang cáo ****-->
							<div class="col-md-5" id="quang_cao">
								<img src="img/qc.jpg" title="day la quang cao website giao dich" alt="quang cao">
							</div><!-- ***END Quang cáo ****-->
						</div>
					</section><!-- ****END Chi tiet sp qua hinh anh ****-->

					<!-- ***Slider cac sp lien quan *** -->
					<section class="san_pham_khac">
						<h3>Sản phẩm khác</h3>
						<div class="row" >
							<?php
			// duyet các sản phẩm khác
							while ($row_extra = $row[1]->fetch_assoc() ) {
				# code...

								?>
								<div class="col-xs-6 col-md-2 " >

									<a href="xemthongtin-<?php echo $row_extra['id']?>-<?php echo $row_extra['khu_vuc']?>.htm" >
										<div class="noibat" style="margin: 0 ; padding: 0;">
											<div > 
												<img src="img/<?php echo $row_extra['hinh_1']?>"  alt="<?php echo $row_extra['tieu_de'];?>"  title='<?php echo $row_extra['tieu_de'];?>' >
											</div>	
											<div class="noibat-title text-center" >
												<?php
												echo $row_extra['tieu_de'];
												?>
											</div>
											<div class="noibat-bottom text-center"  >
												<div class="xem-btn">
													<strong>Hình thức:</strong>
													<?php
													echo $row_extra['loai_tin'];
													?>
												</div>
											</div>
										</div>
									</a>

								</div>
								<?php
							}
							?>
						</div>
					</section><!-- ***End Slider cac sp lien quan *** -->
				</main>