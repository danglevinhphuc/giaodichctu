	<?php
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
class Kiemtra extends controller{
	function __construct(){
		if(isset($_SESSION['authenticate'])){
			if($_SESSION['authenticate'] === 0){
				header('location:trang-chu');
			}
		}
		if(!isset($_SESSION['authenticate'])){
			header('location:trang-chu');
		}
	}

	public function Index(){
		include (PATH_SYSTEM."/model/danhsachsp.php");
		$danhsach = new Danhsachsp();

		$username = $_COOKIE['User'];
		$rs = $danhsach->getTotal_sp($username);
		$this->view("kiemtra" , $rs);
	}
	public function Xuly(){
		include (PATH_SYSTEM."/model/danhsachsp.php");
		$danhsach = new Danhsachsp();

		$loai_sp = $_GET["loai_sp"];
		$rs = $danhsach->loadData_ajax($loai_sp);
	}
	public function Edit(){
		include (PATH_SYSTEM."/model/danhsachsp.php");
		$danhsach = new Danhsachsp();
		$id =  $_GET['id'];
		$user = $_COOKIE['User'];
		// neu co dang nhap thi ms thuc hien dk
		if($_SESSION['authenticate'] === 1){
			$rs = $danhsach->layDulieusp($id,$user);
			$this->view('edit',$rs,"header_upbai","footer_upbai");
		}
	}
	public function editValue(){
		include (PATH_SYSTEM."/model/danhsachsp.php");
		$danhsach = new Danhsachsp();
		$id = $_POST['gia_tri_an'];
		$ten_sp = $_POST['ten_sp'];
		$chon_khu_vuc = $_POST['chon_khu_vuc'];
		$chon_sp = $_POST['chon_sp'];
		$loai_tin = $_POST['loai_tin'];
		
		$tieu_de = $_POST['tieu_de'];
		$noi_dung = $_POST['noi_dung'];
		$sdt= $_POST['sdt'];
		$gia_tien = $_POST['gia_tien'];
		$trang_thai = $_POST['trangthai'];
		// neu co hinh moi thi update con k co thi lay gia tri mat dinh
		/*** 
			**Kiem tra co phai la hinh anh hay khong
			**Neu k phai luu lai hinh cu~
		**/

		if($_FILES['hinh1']['name'] != null ){
			$hinh1_link = $_FILES['hinh1'];
			$info_hinh1 = !empty($hinh1_link["tmp_name"]) ? getimagesize($hinh1_link['tmp_name']) : "k";
			
			if($info_hinh1 != "" ){
			
				if($info_hinh1 === FALSE){
					
				}else{
					move_uploaded_file($hinh1_link["tmp_name"], "img/".$hinh1_link["name"]);
					$hinh1= $hinh1_link["name"];
					
				}
			}else{
				$hinh1 = $_POST['hinh_1'];
			}
		}else{
			$hinh1 = $_POST['hinh_1'];
		}

		if($_FILES['hinh2']['name'] != null ){
			$hinh2_link = $_FILES['hinh2'];
			$info_hinh2 = !empty($hinh2_link["tmp_name"]) ? getimagesize($hinh2_link['tmp_name']) : "";
			if($info_hinh2 != "" ){
			
				if($info_hinh2 === FALSE){
					
				}else{
					move_uploaded_file($hinh2_link["tmp_name"], "img/".$hinh2_link["name"]);
					$hinh2= $hinh2_link["name"];
					
				}
			}else{
				$hinh2 = $_POST['hinh_2'];
			}
		}else{
			$hinh2 = $_POST['hinh_2'];
		}
		if($_FILES['hinh3']['name'] != null ){
			$hinh3_link = $_FILES['hinh3'];
			$info_hinh3 = !empty($hinh3_link["tmp_name"]) ? getimagesize($hinh3_link['tmp_name']) : "";
			if($info_hinh3 != "" ){
			
				if($info_hinh3 === FALSE){
					
				}else{
					move_uploaded_file($hinh3_link["tmp_name"], "img/".$hinh3_link["name"]);
					$hinh3= $hinh3_link["name"];
					
				}
			}else{
				$hinh3 = $_POST['hinh_3'];
			}
		}else{
			$hinh3 = $_POST['hinh_3'];
		}
		if($_FILES['hinh4']['name'] != null ){
			$hinh4_link = $_FILES['hinh4'];
			$info_hinh4 = !empty($hinh4_link["tmp_name"]) ? getimagesize($hinh4_link['tmp_name']) : "";
			if($info_hinh4 != "" ){
			
				if($info_hinh4 === FALSE){
					
				}else{
					move_uploaded_file($hinh4_link["tmp_name"], "img/".$hinh4_link["name"]);
					$hinh4= $hinh4_link["name"];
					
				}
			}else{
				$hinh4 = $_POST['hinh_4'];
			}
		}else{
			$hinh4 = $_POST['hinh_4'];
		}
		/*** 
			** END Kiem tra co phai la hinh anh hay khong
			** END Neu k phai luu lai hinh cu~
		**/
		$date = new DateTime();
		$date->format('Y-m-d');
		$username = $_COOKIE['User'];

		if($chon_khu_vuc != "" || $chon_sp != ""){
			$thong_tin_sp = array(
			'id' => $id,
			'ten_sp' => $ten_sp,
			'chon_khu_vuc' => $chon_khu_vuc,
			'chon_sp' => $chon_sp,
			'loai_tin' => $loai_tin,
			'tieu_de' => $tieu_de,
			'noi_dung' => $noi_dung,
			'sdt' => $sdt,
			'gia_tien' => $gia_tien,
			'hinh1' => $hinh1,
			'hinh2' => $hinh2,
			'hinh3' => $hinh3,
			'hinh4' => $hinh4,
			'date' => $date->format('Y-m-d'),
			'username' => $username,
			'trangthai' =>$trang_thai
			);
		}

		if($_SESSION['authenticate'] === 1){
			$rs=  $danhsach->updateBaidang($thong_tin_sp);
		}else{
			header('location:index.php?c=kiemtra');
		}
	}
	public function Delete(){
		include (PATH_SYSTEM."/model/danhsachsp.php");
		$danhsach = new Danhsachsp();
		$id =  $_GET['id'];
		$user = $_COOKIE['User'];
		// neu co dang nhap thi ms thuc hien dk

		if($_SESSION['authenticate'] === 1){
			$rs = $danhsach->deleteSp($id,$user);
		}
	}
	
}

?>