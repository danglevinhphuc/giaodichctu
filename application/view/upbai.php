<?php
include('content_header.php');
?>
<!-- *** MAIN *** -->

<main class="container">
	<section id="form_thong_tin" id="dautrang">
		<div class="row">
			<div class="col-md-7">
				<h1>Thông tin liên hệ(<span>vui lòng điền đầy đủ thông tin</span>)</h1>
				<!-- **** FORM nhập yêu cần bài đăng *** -->
				<form action="upbai-xem-send.htm" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="ten_san_pham">Tên sản phẩm:</label>

						<input type="text" class="form-control" id="ten_san_pham" name="ten_sp" placeholder="Nhập thông cho tin sản phẩm ..." required>
					</div>
					<div class="form-group">
						<label for="chon_khu_vuc">Chọn khu vực:</label>
						<label id="chon_dc">Bạn chưa chọn địa chỉ</label>
						<select class="form-control" id="chon_khu_vuc" name="chon_khu_vuc">
							<option value="" id="tieu_de_chon_kv"  >**** Chọn địa chỉ ****</option>
							<optgroup label="KTX Đại học cần thơ" id="khu_vuc_select">
								<option value="KTXA">KTX A</option>
								<option value="KTXB">KTX B</option>
							</optgroup>
							<option value="khuvuckhac" id="khuvuckhac_slect">Khu vực khác...</option>
						</select>
					</div>
					<div class="form-group">
						<label>Chọn loại sản phẩm:</label>
						<label id="chon_sp">Bạn chưa chọn sản phẩm</label>
						<select class="form-control" id="chon_loai_sp" name="chon_sp">
							<option value="" id="tieu_de_chon_loai" >**** Chọn loại sản phẩm ****</option>
							<optgroup label="Dụng cụ công nghệ" id="loai_sp_select">
								<option value="laptop">Laptop</option>
								<option value="chuot">Chuột máy tính</option>
								<option value="banphim">Bàn phím</option>
								<option value="loa">Loa</option>
								<option value="cpu">CPU</option>
								<option value="ram">Ram</option>
								<option value="card">Card màng hình</option>
								<option value="mp3">mp3</option>
								<option value="mp4">mp4</option>

								<option value="ongkinh">Ống kính máy ảnh</option>
								<option value="maychuphinh">Máy chụp hình</option>
								<option value="phutung">Các phụ tùng khác</option>
							</optgroup>
							<optgroup label="Đồ dùng gia đình & cá nhân & học tập" id="loai_sp_gd_select">
								<option value="quat">Quạt</option>
								<option value="tu">Tủ quần áo</option>
								<option value="sach">Sách</option>
								<option value="dungcukhac">Các dụng cụ khác</option>
							</optgroup>
						</select>
					</div>
					<div class="form-group">
						<label for="muc_dich_dang_tin">Bạn đăng tin:</label>&nbsp; &nbsp;
						<input type="radio" name="loai_tin" value="Bán" checked>Bán &nbsp; &nbsp;
						<input type="radio" name="loai_tin" value="Trao đổi" > Trao đổi
					</div>
					<div class="form-group">
						<label for="tieu_de">Tiêu đề tin:</label>
						<input type="text" class="form-control " id="tieu_de" name="tieu_de" placeholder="Nhập tiêu đề cho sản phẩm ..." required>
					</div>
					<div class="form-group">
						<label for="noi_dung">Nội dung tin tức:</label><br>
						<textarea name="noi_dung" id="noi_dung" class="form-control" cols="63" rows="10" placeholder="Điền nội dung chi tiết sản phẩm bạn cần cho người xem biết" required></textarea>
					</div>
					<div class="form-group">
						<label for="sdt">SĐT liên lạc:</label>
						<label for="check_sdt" id="check_form">SĐT phải là số vd: 0123456789</label><br>
						<input type="text" name="sdt" id="blur_sdt" class="form-control" placeholder="Nhập số điện thoại liên hệ ...">
					</div>
					<div class="form-group">
						<label for="gia_tien">Giá tiền cho sản phẩm:</label>
						<label for="check_giatien" id="check_form_gia"> Giá tiền phải là số vd: 100.000</label><br>
						<input type="text" name="gia_tien" id="blur_gia_tien" class="form-control" placeholder="Nhập Giá tiền cho sản phẩm ..."  >
					</div>
					<div class="form-group" id="khung_hinh">
						<div class="row">
							<div class="col-md-6 ">
								<label for="hinh_anh">Hình 1:</label><br>
								<input type="file" name="hinh1" id="file1" class="hinh_1 btn btn-info" >
								<div class="khung_load">
									<img id='output1' width="100px" height="100px">
								</div>

							</div>
							<div class="col-md-6 ">
								<label for="hinh_anh">Hình 2:</label><br>
								<input type="file" name="hinh2" id="file2" class="hinh_2 btn btn-info" >
								<div class="khung_load">
									<img id='output2' width="100px" height="100px">
								</div>
							</div>
							<div class="col-md-6 ">
								<label for="hinh_anh">Hình 3:</label><br>
								<input type="file" name="hinh3" id="file3" class="hinh_3 btn btn-info" >
								<div class="khung_load">
									<img id='output3' width="100px" height="100px">
								</div>
							</div>
							<div class="col-md-6 ">
								<label for="hinh_anh">Hình 4:</label><br>
								<input type="file" name="hinh4" id="file4" class="hinh_4 btn btn-info" >
								<div class="khung_load">
									<img id='output4' width="100px" height="100px">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group submit_form">
						<input type="submit" name="submit" value="Đăng bài" class="btn btn-primary btn-lg btn_submit">
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