<?php
class Model{
	private $db;
	private $classname;
	function __construct(){
		$this->db= new Database();
		$this->classname = get_class($this);
	}
	// hàm mặc định quay lại trang
	public static function  back($noidung){
		echo "<script>";
		echo "
		time = null;
		function move(){
			window.history.back()
		}
		timer=setTimeout('move()',2000)
		";
		echo "</script>";
		echo "<center><h1 style='color:blue'>".$noidung."</h1></center>";
	}
	// ham lay gia tri va noi dung trong csdl where va gio han pt , dem tong phan tu
	public function selectDanhSach($diadiem = array(),$start,$tensp = null){
		// neu tim ten sp k co ton tai
		//xoa khoang trang dau va cuoi
		$fix_khuvuc= trim($diadiem[0]);
		$fix_loaisp= trim($diadiem[1]);
		// chong sql injection
		$fix_khuvuc = $this->db->real_escape_string($fix_khuvuc);
		$fix_loaisp = $this->db->real_escape_string($fix_loaisp);
		$talbe = strtolower($this->classname);
		if(!$tensp && $fix_khuvuc && $fix_loaisp){
			// neu url chi có khu vực va loaisp
			$sql = "SELECT  * FROM `$talbe` where khu_vuc = '".$fix_khuvuc."' and loai_sp = '".$fix_loaisp."' and trang_thai != 0 ORDER BY id  DESC limit $start,5  ";

			$query = $this->db->Thucthi($sql);	

			$sql_count = "SELECT  * FROM `$talbe`  where khu_vuc = '".$fix_khuvuc."' and loai_sp = '".$fix_loaisp."' and trang_thai != 0 ";

			$query_count = $this->db->Thucthi($sql_count);	

		}else if(!$tensp && $fix_khuvuc && !$fix_loaisp){
			// neu url chi có khu vực
			$sql = "SELECT  * FROM `$talbe` where khu_vuc = '".$fix_khuvuc."' and trang_thai != 0 ORDER BY id  DESC limit $start,5 ";
			
			$query = $this->db->Thucthi($sql);	
			$sql_count = "SELECT  * FROM `$talbe`  where khu_vuc = '".$fix_khuvuc."' and trang_thai != 0 ";

			$query_count = $this->db->Thucthi($sql_count);	
		}else if(!$tensp && !$fix_khuvuc && !$fix_loaisp){
			// neu url rong~
			$sql = "SELECT  * FROM `$talbe` where  trang_thai != 0 ORDER BY id  DESC limit $start,5 ";
			
			$query = $this->db->Thucthi($sql);	
			$sql_count = "SELECT  * FROM `$talbe`  where  trang_thai != 0 ";

			$query_count = $this->db->Thucthi($sql_count);	
		}else if(!$tensp && !$fix_khuvuc && $fix_loaisp){
			// Neu ma thanh url  chi co loai san pham
			$sql = "SELECT  * FROM `$talbe` where  loai_sp = '".$fix_loaisp."' and trang_thai != 0 ORDER BY id  DESC limit $start,5 ";

			$query = $this->db->Thucthi($sql);	

			$sql_count = "SELECT  * FROM `$talbe`  where  loai_sp = '".$fix_loaisp."' and trang_thai != 0 ";

			$query_count = $this->db->Thucthi($sql_count);	

		}else{
			// tra ve gia tri theo search tra ra tat ca cac sp va k phan trang
			$query = $this->searchTensp($tensp,$start);
			//Dem phan tu
			$query_count = $this->demsearchTensp($tensp);	
		}
		/**
			** Tim sp dk nhieu ng xem
		 **/
		$sql_view  = "SELECT id,ten_sp,hinh_1,tieu_de,khu_vuc FROM `$talbe` where trang_thai != 0 ORDER BY luot_xem DESC LIMIT 0,2";
		$query_view = $this->db->Thucthi($sql_view);	
		/*
			** O day mang gom 2 phan tu se dk hien trong view 
			** $yeu_cau[0] la xac dinh thanh phan yeu cau tren url 
			** $yeu_cau[1] dem cac phan tu tren url
		*/

			$yeu_cau = array($query,$query_count,$query_view);
			return $yeu_cau;
		}
	// ham lay thong tin trong trang xem thong tin 
		public function selectXemthongtin($diadiem = array()){
		//xoa khoang trang dau va cuoi
			$fix_id= trim($diadiem[0]);
			$fix_khuvuc= trim($diadiem[1]);
		// chong sql injection
			$fix_khuvuc = $this->db->real_escape_string($fix_khuvuc);
			$fix_id = $this->db->real_escape_string($fix_id);
			$talbe = strtolower($this->classname);
			if($diadiem){
			// dung de lay sp dk chon
				$sql = "SELECT  * FROM `$talbe` where khu_vuc = '".$fix_khuvuc."' and id = '".$fix_id."' and trang_thai != 0 ";

				$query = $this->db->Thucthi($sql);
			// dung de lay cac sp random vao cac sp khac	
				$sql_extra = "SELECT  * FROM `$talbe` where khu_vuc = '".$fix_khuvuc."' and id != '".$fix_id."' and trang_thai != 0 ORDER BY RAND() limit 0,6";
				$query_extra = $this->db->Thucthi($sql_extra);	
			// 
			}
			$yeu_cau = array($query,$query_extra);
			return $yeu_cau;
		}
	//Chuc nang tim kiem thong tin cua mot sp theo ten
		public function searchTensp($tensp= null ,$start){
		// chong sql injection
			$tensp = $this->db->real_escape_string($tensp);
			$talbe = strtolower($this->classname);
			$sql = "SELECT  * FROM `$talbe` where ten_sp like '".$tensp."%' and trang_thai != 0 ORDER BY id  DESC limit $start,5  ";
			$query = $this->db->Thucthi($sql);
			return $query;
		}
	// Dem so phan tu tim kiem thong tin 
		public function demsearchTensp($tensp= null ){
		// chong sql injection
			$tensp = $this->db->real_escape_string($tensp);
			$talbe = strtolower($this->classname);
			$sql = "SELECT  * FROM `$talbe` where ten_sp like '".$tensp."' and trang_thai != 0  ";
			$query = $this->db->Thucthi($sql);
			return $query;
		}
	// Them vao mot phan tu nguoi dung trong csdl
		public function themDanhsachnguoidung($sp=array()){
		// lay gia tri
			$user = trim($sp[0]);
			$pass = trim($sp[1]);
			$email = trim($sp[2]);
		// chong sql injection
			$user = $this->db->real_escape_string($user);
			$pass = $this->db->real_escape_string($pass);
			$email = $this->db->real_escape_string($email);
		// Cau lenh insert them vao csdl 
			$talbe = strtolower($this->classname);
			$sql = "insert into `$talbe` values('$user','$pass','$email')";
			$query = $this->db->Thucthi($sql);
			if($query){
			// gan bien quay lại
				$this::back("Đăng ký thành công");
			}else{
			// gan bien quay lại
				$this::back("Username đã tồn tại hãy chọn tên khác");
			}
		}
	// Lay du lieu thong tin user
		public function getInfoUser($user,$pass){
		//chong sql injection
			$user = $this->db->real_escape_string($user);
			$pass = $this->db->real_escape_string($pass);
			$talbe = strtolower($this->classname);
			$sql = "SELECT username FROM `$talbe` where username = '$user' and password = '$pass'";
			$query = $this->db->Thucthi($sql);
			if($query->num_rows){
			// gan bien quay lại
				$this::back("Đăng nhập thành công");
				// authenticate dung de dang nhap dang xuat 
				// Cookie user dung de luu ten ng dung
				$_SESSION['authenticate'] = 1;
				setcookie("User",$user,time() + 90000);
			}else{
			// gan bien quay lại
				$this::back("Đăng nhập thất bại");
			}
		}
		// Them bai dang 
		public function insertBaidang($thong_tin_sp = array()){
			// chon sql injection
			$ten_sp = $this->db->real_escape_string($thong_tin_sp['ten_sp']);
			$khu_vuc = $this->db->real_escape_string($thong_tin_sp['chon_khu_vuc']);
			$loai_sp = $this->db->real_escape_string($thong_tin_sp['chon_sp']);
			$loai_tin = $this->db->real_escape_string($thong_tin_sp['loai_tin']);
			$tieu_de = $this->db->real_escape_string($thong_tin_sp['tieu_de']);
			$noi_dung = $this->db->real_escape_string($thong_tin_sp['noi_dung']);
			$sdt = $this->db->real_escape_string($thong_tin_sp['sdt']);
			$gia_tien = $this->db->real_escape_string($thong_tin_sp['gia_tien']);
			$hinh1= $this->db->real_escape_string($thong_tin_sp['hinh1']);
			$hinh2 = $this->db->real_escape_string($thong_tin_sp['hinh2']);
			$hinh3 = $this->db->real_escape_string($thong_tin_sp['hinh3']);
			$hinh4 = $this->db->real_escape_string($thong_tin_sp['hinh4']);
			$ngay_dang = $this->db->real_escape_string($thong_tin_sp['date']);
			$username = $this->db->real_escape_string($thong_tin_sp['username']);

			$talbe = strtolower($this->classname);
			$sql = "insert into `$talbe` values('','$ten_sp','$khu_vuc','$loai_sp','$loai_tin','$tieu_de','$noi_dung','$sdt','$hinh1','$hinh2','$hinh3','$hinh4','$ngay_dang','$username',1,'$gia_tien',0)";
			$query = $this->db->Thucthi($sql);
			if($query){
			// gan bien quay lại
				$this::back("Thêm sản phẩm thành công");
			}else{
			// gan bien quay lại
				$this::back("Thêm sản phẩm thất bại");
			}

		}
		// hàm dùng load dữ liệu ajax cho trang xem lại bài đã đăng
		public function loadData_ajax($loai_sp){
			/* 
				**Câu lệnh sql lấy dữ liệu vs đk ID 
				**Chống sql injection
			*/
				$user = $this->db->real_escape_string($_COOKIE['User']);
				$loaisp = $this->db->real_escape_string($loai_sp);
				$talbe = strtolower($this->classname);
				$sql = "SELECT id,ten_sp,khu_vuc,loai_sp,loai_tin,tieu_de,noi_dung,sdt,hinh_1,trang_thai FROM `$talbe` where username = '$user' and loai_sp = '$loaisp'  ";
				$query = $this->db->Thucthi($sql);
				if($query->num_rows){
					while($row = $query->fetch_assoc()){
						
						echo "<section style='width:265px; display:inline;float:left;margin-bottom:100px;' >";
						echo '<p><a href="#" rel="" >'.$row['khu_vuc'].'</a> >> <a href="#" rel="" >'.$row['loai_sp'].'</a> >> <a href="#" rel="" id="loai_sp"> '.$row['ten_sp'].'</a> </p>';
						echo "<img src='img/".$row['hinh_1']."' alt='".$row['tieu_de']."' title='".$row['tieu_de']."' width='200px' height='200px'>";
						if($row['trang_thai'] == 1){
							echo "<p>Trạng thái: đang đăng trên trang chủ </p>";	
						}else{
							echo "<p>Trạng thái: đã gỡ khỏi trang chủ </p>";	
						}
						
						echo "<p>Nội dung bài viết: ".$row['noi_dung']."</p>";
						echo "<p>Số điện thoại:+84 ".$row['sdt']." </p>";
						echo "<a href='kiemtra-sua-".$row['id'].".htm' ><button  class='btn btn-success btn-lg ' >Sửa</button></a>&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "<a href='kiemtra-xoa-".$row['id'].".htm' style='text-decoration:none'> <button class='btn btn-warning btn-lg' onClick=\"javascript:return confirm('Bạn có muốn xoá sản phẩm này');\">Xoá</button></a>";
						echo "</section>";
					}
				}
				else{
					echo "<h3>Không có bài đăng</h3>";
				}
			}
			// Xoa sp voi gia tri id va ten nguoi dung
			public function deleteSp($id,$user){
				$talbe = strtolower($this->classname);
				$id = $this->db->real_escape_string($id);
				$user = $this->db->real_escape_string($user);
				$sql = "DELETE FROM `$talbe` where id ='$id' and username = '$user'";
				$query = $this->db->Thucthi($sql);
				if($query){
					$this::back('Xoá thành công');
				}else{
					$this::back('Xoá không thành công');
				}
			}
			//Sua sp voi gia tri dau vao id va ten ng dung
			public function layDulieusp($id,$user){
				$talbe = strtolower($this->classname);
				$id = $this->db->real_escape_string($id);
				$user = $this->db->real_escape_string($user);
				$sql = "SELECT ten_sp,khu_vuc,loai_sp,loai_tin,tieu_de,noi_dung,sdt,hinh_1,hinh_2,hinh_3,hinh_4,trang_thai,gia_tien FROM `$talbe` where id ='$id' and username = '$user' ";

				$query = $this->db->Thucthi($sql);
				return $query;
			}
			//Cập nhật lại sp
			public function updateBaidang($thong_tin_sp = array()){
				// chon sql injection
				$id = $this->db->real_escape_string($thong_tin_sp['id']);
				$ten_sp = $this->db->real_escape_string($thong_tin_sp['ten_sp']);
				$khu_vuc = $this->db->real_escape_string($thong_tin_sp['chon_khu_vuc']);
				$loai_sp = $this->db->real_escape_string($thong_tin_sp['chon_sp']);
				$loai_tin = $this->db->real_escape_string($thong_tin_sp['loai_tin']);
				$tieu_de = $this->db->real_escape_string($thong_tin_sp['tieu_de']);
				$noi_dung = $this->db->real_escape_string($thong_tin_sp['noi_dung']);
				$sdt = $this->db->real_escape_string($thong_tin_sp['sdt']);
				$gia_tien = $this->db->real_escape_string($thong_tin_sp['gia_tien']);
				$hinh1= $this->db->real_escape_string($thong_tin_sp['hinh1']);
				$hinh2 = $this->db->real_escape_string($thong_tin_sp['hinh2']);
				$hinh3 = $this->db->real_escape_string($thong_tin_sp['hinh3']);
				$hinh4 = $this->db->real_escape_string($thong_tin_sp['hinh4']);
				$ngay_dang = $this->db->real_escape_string($thong_tin_sp['date']);
				$username = $this->db->real_escape_string($thong_tin_sp['username']);
				$trang_thai = $this->db->real_escape_string($thong_tin_sp['trangthai']);
				
				$talbe = strtolower($this->classname);
				$sql = "update `$talbe` SET ten_sp = '$ten_sp', khu_vuc = '$khu_vuc' , loai_sp='$loai_sp', loai_tin='$loai_tin', tieu_de='$tieu_de',noi_dung = '$noi_dung',sdt='$sdt', hinh_1='$hinh1', hinh_2 ='$hinh2', hinh_3='$hinh3', hinh_4='$hinh4',ngay_dang='$ngay_dang', trang_thai = '$trang_thai',gia_tien='$gia_tien' where id = '$id' and username = $username   ";
				
				$query = $this->db->Thucthi($sql);
				if($query){
				// gan bien quay lại
					$this::back("Sửa sản phẩm thành công");
				}else{
				// gan bien quay lại
					$this::back("Sửa sản phẩm thất bại");
				}
			}
		//lay gia tri tong cac loai trong mot loai 
			function getTotal_sp($user){

			// Danh sach dem cac loai sp
				$laptop =  $this->demTotal_sp($user, 'laptop');
				$chuot =  $this->demTotal_sp($user, 'chuot');
				$banphim =  $this->demTotal_sp($user, 'banphim');
				$loa =  $this->demTotal_sp($user, 'loa');
				$cpu =  $this->demTotal_sp($user, 'cpu');
				$ram =  $this->demTotal_sp($user, 'ram');
				$card =  $this->demTotal_sp($user, 'card');
				$mp3 =  $this->demTotal_sp($user, 'mp3');
				$mp4 =  $this->demTotal_sp($user, 'mp4');
				$ongkinh =  $this->demTotal_sp($user, 'ongkinh');
				$maychuphinh =  $this->demTotal_sp($user, 'maychuphinh');
				$phutung =  $this->demTotal_sp($user, 'phutung');
				$quat =  $this->demTotal_sp($user, 'quat');
				$tu =  $this->demTotal_sp($user, 'tu');
				$sach =  $this->demTotal_sp($user, 'sach');
				$dungcukhac =  $this->demTotal_sp($user, 'dungcukhac');

			// mang gia tri truyen vao gom cac loai sp 
				$yeu_cau = array(
					'laptop' => $laptop,
					'chuot' => $chuot,
					'banphim' => $banphim,
					'loa' => $loa,
					'cpu' => $cpu,
					'ram' => $ram,
					'card' => $card,
					'mp3' => $mp3,
					'mp4' => $mp4,
					'maychuphinh' => $maychuphinh,
					'ongkinh' => $ongkinh,
					'phutung'=> $phutung,
					'quat' => $quat,
					'tu' => $tu,
					'sach' => $sach,
					'dungcukhac' => $dungcukhac
					);
				return $yeu_cau;
			}
			private function demTotal_sp($user, $loaisp){
			//chong sql injection
				$username = $this->db->real_escape_string($user);
				$loai_sp =$this->db->real_escape_string($loaisp);
				$talbe = strtolower($this->classname);
				$sql = "SELECT * FROM `$talbe` where loai_sp = '$loai_sp' and username = '$username'";
				$query = $this->db->Thucthi($sql);
				return  $query->num_rows;
			}
		/** 
			** Thay doi mat khau cho ng dung
			**/
			public function changePass($user, $pass, $email){
				$user = $this->db->real_escape_string($user);
				$pass = $this->db->real_escape_string($pass);
				$email= $this->db->real_escape_string($email);
				$talbe = strtolower($this->classname);
				$sql = "UPDATE `$talbe` SET password = '$pass' where username = '$user' and email = '$email' ";

				$query = $this->db->Thucthi($sql);
			// kiem tra doi thanh cong hoac that bai
				$sql_kt = "SELECT * from `$talbe` where username = '$user'  and email = '$email' and password = '$pass' ";

				$query_doi = $this->db->Thucthi($sql_kt);

				if($query_doi->num_rows != 0){
				// gan bien quay lại
					$this::back("Đổi mật khẩu thành công");
				}else{
				// gan bien quay lại
					$this::back("Đổi mật khẩu thất bại");
				}
			}
			public function kiemTrausername($username){
				$username = $this->db->real_escape_string($username);
				$talbe = strtolower($this->classname);
				$sql = "SELECT username FROM `$talbe` where username = '$username' ";
				$query = $this->db->Thucthi($sql);
				if($query->num_rows){
					echo "<span style='color:red;font-weight:bold;'>Đã tồn tại</span>";
				}else{
					echo "<span style='color:green;font-weight:bold;'>Bạn có thể đăng ký</span>";
				}
			}
			
		/*** 
			** Load du lieu cho mobie
			**/
			public function loadDatamobie($diadiem = array()){
				$start = $this->db->real_escape_string($diadiem['id']);
				$loaitin = $this->db->real_escape_string($diadiem['loai_tin']);
				$khuvuc = $this->db->real_escape_string($diadiem['khu_vuc']);
				$tim = $this->db->real_escape_string($diadiem['tim']);
				$talbe = strtolower($this->classname);

				if(!$tim && !$loaitin && !$khuvuc ){
						$sql = "SELECT  * FROM `$talbe` where trang_thai != 0 ORDER BY id  DESC limit 5,$start";
						$query = $this->db->Thucthi($sql);
						if($query->num_rows){
							while($row = $query->fetch_assoc()){

								echo '<figure>';

								echo "<a href='xemthongtin-".$row['id']."-".$row['khu_vuc'].".htm'>";
								echo	"<img src='img/".$row['hinh_1']."' width='150px' height='150px' alt='".$row['tieu_de']."'  title='".$row['tieu_de']."'>";
								echo "<div class='info-picture' >
								<p>".$row['ten_sp']."</p>";
								if($row['gia_tien'] != null){;
									$gia_tien = $this->ham_dao_nguoc_chuoi($row['gia_tien']);
									$do_dai = strlen($gia_tien) - 1;
									echo "<p><a href='#'>";
									for($i = $do_dai ; $i>=0 ; $i--){
										echo $gia_tien[$i];
										if($i%3 == 0 && $i != 0){
											echo ".";
										}
									}
									echo " vnđ</a></p>";
								}else{
									echo "<p><a href='#'>0 vnđ</a></p>";
								}

								echo "<p id='ngay_dang'>Ngày đăng:".$row['ngay_dang']."</p>
							</div></a></figure>";
						}

					}
				}
			
			else if(!$tim && $loaitin && !$khuvuc){
				$sql = "SELECT  * FROM `$talbe` where loai_tin = '".$loaitin."' and trang_thai != 0 ORDER BY id  DESC limit 5,$start";
				$query = $this->db->Thucthi($sql);
				if($query->num_rows){
					while($row = $query->fetch_assoc()){

								echo '<figure>';

								echo "<a href='xemthongtin-".$row['id']."-".$row['khu_vuc'].".htm'>";
								echo	"<img src='img/".$row['hinh_1']."' width='150px' height='150px' alt='".$row['tieu_de']."'  title='".$row['tieu_de']."'>";
								echo "<div class='info-picture' ><p>".$row['ten_sp']."</p>";
								if($row['gia_tien'] != null){;
									$gia_tien = $this->ham_dao_nguoc_chuoi($row['gia_tien']);
									$do_dai = strlen($gia_tien) - 1;
									echo "<p><a href='#'>";
									for($i = $do_dai ; $i>=0 ; $i--){
										echo $gia_tien[$i];
										if($i%3 == 0 && $i != 0){
											echo ".";
										}
									}
									echo " vnđ</a></p>";
								}else{
									echo "<p><a href='#'>0 vnđ</a></p>";
								}
								echo "<p id='ngay_dang'>Ngày đăng:".$row['ngay_dang']."</p>
							</div></a></figure>";
					}
				}
			}
			else if(!$tim && !$loaitin && $khuvuc){
				$sql = "SELECT  * FROM `$talbe` where khu_vuc = '".$khuvuc."' and trang_thai != 0 ORDER BY id  DESC limit 5,$start";

				$query = $this->db->Thucthi($sql);
				if($query->num_rows){
					while($row = $query->fetch_assoc()){

								echo '<figure>';

								echo "<a href='xemthongtin-".$row['id']."-".$row['khu_vuc'].".htm'>";
								echo	"<img src='img/".$row['hinh_1']."' width='150px' height='150px' alt='".$row['tieu_de']."'  title='".$row['tieu_de']."'>";
								echo "<div class='info-picture' ><p>".$row['ten_sp']."</p>";
								if($row['gia_tien'] != null){;
									$gia_tien = $this->ham_dao_nguoc_chuoi($row['gia_tien']);
									$do_dai = strlen($gia_tien) - 1;
									echo "<p><a href='#'>";
									for($i = $do_dai ; $i>=0 ; $i--){
										echo $gia_tien[$i];
										if($i%3 == 0 && $i != 0){
											echo ".";
										}
									}
									echo " vnđ</a></p>";
								}else{
									echo "<p><a href='#'>0 vnđ</a></p>";
								}
								echo "<p id='ngay_dang'>Ngày đăng:".$row['ngay_dang']."</p>
							</div></a></figure>";
					}
				}
			}else if(!$tim && $loaitin && $khuvuc){
				$sql = "SELECT  * FROM `$talbe` where khu_vuc = '".$khuvuc."' and loai_sp = '".$loaitin."'  and trang_thai != 0 ORDER BY id  DESC limit 5,$start";
				echo $sql;
				$query = $this->db->Thucthi($sql);
				if($query->num_rows){
					while($row = $query->fetch_assoc()){

								echo '<figure>';

								echo "<a href='xemthongtin-".$row['id']."-".$row['khu_vuc'].".htm'>";
								echo	"<img src='img/".$row['hinh_1']."' width='150px' height='150px' alt='".$row['tieu_de']."'  title='".$row['tieu_de']."'>";
								echo "<div class='info-picture' ><p>".$row['ten_sp']."</p>";
								if($row['gia_tien'] != null){;
									$gia_tien = $this->ham_dao_nguoc_chuoi($row['gia_tien']);
									$do_dai = strlen($gia_tien) - 1;
									echo "<p><a href='#'>";
									for($i = $do_dai ; $i>=0 ; $i--){
										echo $gia_tien[$i];
										if($i%3 == 0 && $i != 0){
											echo ".";
										}
									}
									echo " vnđ</a></p>";
								}else{
									echo "<p><a href='#'>0 vnđ</a></p>";
								}
								echo "<p id='ngay_dang'>Ngày đăng:".$row['ngay_dang']."</p>
							</div></a></figure>";
					}
				}
			}else if($tim && !$loaitin && !$khuvuc){
				$sql = "SELECT  * FROM `$talbe` where ten_sp like '".$tim."%' and trang_thai != 0 ORDER BY id  DESC limit 5,$start";
				$query = $this->db->Thucthi($sql);
				if($query->num_rows){
					while($row = $query->fetch_assoc()){

								echo '<figure>';

								echo "<a href='xemthongtin-".$row['id']."-".$row['khu_vuc'].".htm'>";
								echo	"<img src='img/".$row['hinh_1']."' width='150px' height='150px' alt='".$row['tieu_de']."'  title='".$row['tieu_de']."'>";
								echo "<div class='info-picture' ><p>".$row['ten_sp']."</p>";
								if($row['gia_tien'] != null){;
									$gia_tien = $this->ham_dao_nguoc_chuoi($row['gia_tien']);
									$do_dai = strlen($gia_tien) - 1;
									echo "<p><a href='#'>";
									for($i = $do_dai ; $i>=0 ; $i--){
										echo $gia_tien[$i];
										if($i%3 == 0 && $i != 0){
											echo ".";
										}
									}
									echo " vnđ</a></p>";
								}else{
									echo "<p><a href='#'>0 vnđ</a></p>";
								}
								echo "<p id='ngay_dang'>Ngày đăng:".$row['ngay_dang']."</p>
							</div></a></figure>";
					}
				}
			}
		}
		/*** Dao nguoc chuoi gia tien ****/
		public function ham_dao_nguoc_chuoi($str1)  
		{  
			$n = strlen($str1);  
			if($n == 1)  
			{  
				return $str1;  
			}  
			else  
			{  
				$n--;  
				return $this->ham_dao_nguoc_chuoi(substr($str1,1, $n)) . substr($str1, 0, 1);  
			}  
		}
		/**** Cap nhat luot xem *****/
		public function capNhapview($id){
			// chong sql injection
			$fix_id = $this->db->real_escape_string($id);	
			$gia_tri_moi = 0;
			$talbe = strtolower($this->classname);
			// Lay so luot xem ra 
			$sql = "SELECT luot_xem from `$talbe` where id = '$id' and trang_thai != 0";
			$query = $this->db->Thucthi($sql);
			$row = $query->fetch_assoc();
			if($row['luot_xem'] == 0){
				$gia_tri_moi++;
			}else{
				$gia_tri_moi = $row['luot_xem'] + 1;
			}
			// Lay so luot xem ra  va tang len 1 gia tri
			$sql_update_view = "UPDATE `$talbe` SET luot_xem = '$gia_tri_moi' where id ='$id' and trang_thai != 0";
			$query_updata_view = $this->db->Thucthi($sql_update_view);
		}
	}	
	?>