<?php
$row_thong_tin = $row->fetch_assoc();
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#xac_nhan').click(function(){
			
			ok = confirm("Bạn có chắc chắn sửa thông tin như thế này không ?");
			if(ok){
				// nen chon ok thì se load form
					
					return true;

			}else{
				return false;
			}
		});
	});
</script>
<?php
	include('content_header.php');
?>

<!-- *** MAIN *** -->
<main class="container">
	<section id="form_thong_tin" id="dautrang">
		<div class="row">
			<div class="col-md-7">
				<h1>Sửa sản phẩm  (<span>vui lòng điền đầy đủ thông tin</span>)</h1>
				<!-- **** FORM nhập yêu cần bài đăng *** -->
				<form action="kiemtra-xem-editvalue.htm" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="gia_tri_an" value="<?php echo  $_GET['id'] ?>">
					<div class="form-group">
						<label for="ten_san_pham">Tên sản phẩm:</label>

						<input type="text" class="form-control"  name="ten_sp" placeholder="Nhập thông cho tin sản phẩm ..." value="<?php echo $row_thong_tin['ten_sp'] ?>">
					</div>
					<div class="form-group">
					<?php 
					// gan gia tri vao khu vuc
									$khuvuc = $row_thong_tin['khu_vuc'];

									echo "<script>";
									echo "
										var gia_tri_khu_vuc = '".$khuvuc."';
										var khuvuc_value = ['KTXA', 'KTXB','khuvuckhac'];
										$('.KTX').attr('selected',true);
										$(document).ready(function(){
											
											for(i = 0 ; i<khuvuc_value.length ; i++){
												if(gia_tri_khu_vuc == khuvuc_value[i]){
													
													$('.KTX'+i).attr('selected',true);
													
												}else{
													$('.KTX'+i).removeAttr('selected');
												}
											}
										});
									";
									echo "</script>";
								?>
						<label for="chon_khu_vuc">Chọn khu vực:</label>
						
						<select class="form-control" name="chon_khu_vuc">
							<option value="" selected="selected" >**** Chọn địa chỉ ****</option>
							<optgroup label="KTX Đại học cần thơ" >
								
								<option value="KTXA" class="KTX0" kv= "KTXA">KTX A</option>
								<option value="KTXB" class="KTX1" kv= "KTXB">KTX B</option>
							</optgroup>
							<option value="khuvuckhac" class="KTX2">Khu vực khác...</option>
						</select>
					</div>
					<div class="form-group">
					<?php 
					// gan gia tri vao loai tin
									$loaisp = $row_thong_tin['loai_sp'];
									echo "<script>";
									echo "
										var gia_tri_sp = '".$loaisp."';
										var sp_value = ['laptop', 'chuot','banphim','loa','cpu','ram','card','mp3','mp4','mayanh','ongkinh','maychuphinh','phutung','quat','tu','sach','dungcukhac'];
										$(document).ready(function(){
											
											for(i = 0 ; i<sp_value.length ; i++){
												if(gia_tri_sp == sp_value[i]){
													
													$('.loai'+i).attr('selected',true);
													
												}else{
													$('.loai'+i).removeAttr('selected');
												}
											}
										});
									";
									echo "</script>";
								?>
						<label>Chọn loại sản phẩm:</label>
						
						<select class="form-control" id="" name="chon_sp">
							<option value="" selected="selected">**** Chọn loại sản phẩm ****</option>
							<optgroup label="Dụng cụ công nghệ" id="loai_sp_select">
								<option value="laptop" class="loai0">Laptop</option>
								<option value="chuot" class="loai1">Chuột máy tính</option>
								<option value="banphim" class="loai2">Bàn phím</option>
								<option value="loa" class="loai3">Loa</option>
								<option value="cpu" class="loai4">CPU</option>
								<option value="ram" class="loai5">Ram</option>
								<option value="card" class="loai6">Card màng hình</option>
								<option value="mp3" class="loai7">mp3</option>
								<option value="mp4" class="loai8">mp4</option>
								<option value="mayanh" class="loai9">Máy ảnh</option>
								<option value="ongkinh" class="loai10">Ống kính máy ảnh</option>
								<option value="maychuphinh" class="loai11">Máy chụp hình</option>
								<option value="phutung" class="loai12">Các phụ tùng khác</option>
							</optgroup>
							<optgroup label="Đồ dùng gia đình & cá nhân & học tập" id="">
								<option value="quat" class="loai13">Quạt</option>
								<option value="tu" class="loai14">Tủ quần áo</option>
								<option value="sach" class="loai15">Sách</option>
								<option value="dungcukhac" class="loai16">Các dụng cụ khác</option>
							</optgroup>
						</select>
					</div>
					<div class="form-group">
								<?php 
					// gan gia tri vao loai tin
									$loaitin = $row_thong_tin['loai_tin'];
									
									echo "<script>";
									echo "
										var gia_tri_loai_tin = '".$loaitin."';
										var loaitin_value = ['Bán', 'Trao đổi'];
										$(document).ready(function(){
											
											for(i = 0 ; i<loaitin_value.length ; i++){
												if(gia_tri_loai_tin == loaitin_value[i]){
													
													$('.loaitin'+i).attr('checked',true);
													
												}else{
													$('.loaitin'+i).removeAttr('selected');
												}
											}
										});
									";
									echo "</script>";
								?>
						<label for="muc_dich_dang_tin">Bạn đăng tin:</label>&nbsp; &nbsp;
						<input type="radio" name="loai_tin" class="loaitin0" value="Bán" >Bán &nbsp; &nbsp;
						<input type="radio" name="loai_tin" class="loaitin1" value="Trao đổi" > Trao đổi
					</div>
					<div class="form-group">
								<?php 
					// gan gia tri vao loai tin
									$trangthai = $row_thong_tin['trang_thai'];
									echo "<script>";
									echo "
										var gia_tri_trangthai = '".$trangthai."';
										var trangthai_value = [0, 1];
										$(document).ready(function(){
											
											for(i = 0 ; i<trangthai_value.length ; i++){
												if(gia_tri_trangthai == trangthai_value[i]){
													
													$('.trangthai'+i).attr('checked',true);
													
												}else{
													$('.trangthai'+i).removeAttr('selected');
												}
											}
										});
									";
									echo "</script>";
								?>
						<label for="trangthai_dang_tin">Trạng thái bài đăng:</label>&nbsp; &nbsp;
						<input type="radio" name="trangthai" class="trangthai0" value="0" > Không muốn đăng tiếp &nbsp; &nbsp;
						<input type="radio" name="trangthai" class="trangthai1" value="1" > Đang đăng trên trang chủ
					</div>
					<div class="form-group">
						<label for="tieu_de">Tiêu đề tin:</label>
						<input type="text" class="form-control " name="tieu_de" placeholder="Nhập tiêu đề cho sản phẩm ..." value="<?php echo $row_thong_tin['tieu_de'] ?>" >
					</div>
					<div class="form-group">
					
						<label for="noi_dung">Nội dung tin tức:</label><br>
						<textarea name="noi_dung" class="form-control" cols="63" rows="10" placeholder="Điền nội dung chi tiết sản phẩm bạn cần cho người xem biết" ><?php echo $row_thong_tin['noi_dung'] ?></textarea>
					</div>
					<div class="form-group">
						<label for="sdt">SĐT liên lạc:</label>
						<label for="check_sdt" id="check_form">SĐT phải là số vd: 0123456789</label><br>
						<input type="text" name="sdt" id="" class="form-control" placeholder="Nhập số điện thoại liên hệ ..." value="<?php echo $row_thong_tin['sdt'] ?>">
					</div>
					<div class="form-group">
						<label for="gia_tien">Giá tiền cho sản phẩm:</label>
						<label for="check_giatien" id="check_form_gia"> Giá tiền phải là số vd: 100.000</label><br>
						<input type="text" name="gia_tien" id="" class="form-control" placeholder="Giá tiền cho sản phẩm" value="<?php echo $row_thong_tin['gia_tien']?>">
					</div>
					<div class="form-group" id="khung_hinh">
						<div class="row">
							<div class="col-md-6 ">
							<?php

							?>
								<label for="hinh_anh">Hình 1:</label><br>
								<input type="file" name="hinh1" id="file1" class="hinh_1 btn btn-info"  >
								<div class="khung_load">
								<input type="hidden" name="hinh_1" value="<?php echo $row_thong_tin['hinh_1'] ?>">
									<img id='output1' width="100px" height="100px" src="img/<?php echo $row_thong_tin['hinh_1'] ?>">
								</div>

							</div>
							<div class="col-md-6 ">
								<label for="hinh_anh">Hình 2:</label><br>
								<input type="file" name="hinh2" id="file2" class="hinh_2 btn btn-info" >
								<div class="khung_load">
								<input type="hidden" name="hinh_2" value="<?php echo $row_thong_tin['hinh_2'] ?>">
									<img id='output2' width="100px" height="100px" src="img/<?php echo $row_thong_tin['hinh_2'] ?>">
								</div>
							</div>
							<div class="col-md-6 ">
								<label for="hinh_anh">Hình 3:</label><br>
								<input type="file" name="hinh3" id="file3" class="hinh_3 btn btn-info" >
								<div class="khung_load">
									<input type="hidden" name="hinh_3" value="<?php echo $row_thong_tin['hinh_3'] ?>">
									<img id='output3' width="100px" height="100px" src="img/<?php echo $row_thong_tin['hinh_3'] ?>">
								</div>
							</div>
							<div class="col-md-6 ">
								<label for="hinh_anh">Hình 4:</label><br>
								<input type="file" name="hinh4" id="file4" class="hinh_4 btn btn-info" >
								<div class="khung_load">
								<input type="hidden" name="hinh_4" value="<?php echo $row_thong_tin['hinh_4'] ?>">
									<img id='output4' width="100px" height="100px" src="img/<?php echo $row_thong_tin['hinh_4'] ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group submit_form">
						<input type="submit" name="submit" value="Sửa thông tin" class="btn btn-primary btn-lg" id="xac_nhan">
					</div>

				</form><!-- ****End FORM nhập yêu cần bài đăng *** -->
			</div>
			<!-- ***Quang cáo***-->
			<div class="col-md-5">
				<img src="img/qc.jpg" width="300px" height ="400px" id="quang_cao">
			</div>
		</div>
	</section>
		</main><!-- **** END MAIN ****-->