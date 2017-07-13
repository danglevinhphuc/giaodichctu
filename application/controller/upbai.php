<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
class Upbai extends controller{
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
	public function index(){
		$this->view("upbai","","header_upbai","footer_upbai");
	}
		// Thong tin gui tu form
	public function send(){
		include (PATH_SYSTEM."/model/danhsachsp.php");
		$danhsach = new Danhsachsp();

		$ten_sp = $_POST['ten_sp'];
		$chon_khu_vuc = $_POST['chon_khu_vuc'];
		$chon_sp = $_POST['chon_sp'];
		$loai_tin = $_POST['loai_tin'];
		$tieu_de = $_POST['tieu_de'];
		$noi_dung = $_POST['noi_dung'];
		$sdt= $_POST['sdt'];
		$gia_tien = $_POST['gia_tien'];
		$hinh1 = $_FILES["hinh1"];
		$hinh2 = $_FILES["hinh2"];
		$hinh3 = $_FILES["hinh3"];
		$hinh4 = $_FILES["hinh4"];
		/**
			**Kiem tra co phai la hinhh hay khong 
			**Neu phai thi cho up hinh 
		 */
		$info_hinh1 = !empty($hinh1["tmp_name"]) ? getimagesize($hinh1['tmp_name']) : "";
		$info_hinh2 = !empty($hinh2["tmp_name"]) ? getimagesize($hinh2['tmp_name']) : "";
		$info_hinh3 = !empty($hinh3["tmp_name"]) ? getimagesize($hinh3['tmp_name']) : "";
		$info_hinh4 = !empty($hinh4["tmp_name"]) ? getimagesize($hinh4['tmp_name']) : "";
		if($info_hinh1 != "" ){
			
			if($info_hinh1 === FALSE){

			}else{
				move_uploaded_file($hinh1["tmp_name"], "img/".$hinh1["name"]);
			}
		}
		if($info_hinh2 != "" ){
			
			if($info_hinh2 === FALSE){
				
			}else{
				move_uploaded_file($hinh2["tmp_name"], "img/".$hinh2["name"]);
			}
		}
		if($info_hinh3 != "" ){
			
			if($info_hinh3 === FALSE){
				
			}else{
				move_uploaded_file($hinh3["tmp_name"], "img/".$hinh3["name"]);
			}
		}
		if($info_hinh4 != "" ){
			
			if($info_hinh4 === FALSE){
				
			}else{
				move_uploaded_file($hinh4["tmp_name"], "img/".$hinh4["name"]);
			}
		}


		$date = new DateTime();
		$date->format('Y-m-d');
		$username = $_COOKIE['User'];
			//dua hinh len tep img
		if($chon_khu_vuc != "" || $chon_sp != ""){
			$thong_tin_sp = array(
				'ten_sp' => $ten_sp,
				'chon_khu_vuc' => $chon_khu_vuc,
				'chon_sp' => $chon_sp,
				'loai_tin' => $loai_tin,
				'tieu_de' => $tieu_de,
				'noi_dung' => $noi_dung,
				'sdt' => $sdt,
				'gia_tien'=>$gia_tien,
				'hinh1' => $hinh1["name"],
				'hinh2' => $hinh2["name"],
				'hinh3' => $hinh3["name"],
				'hinh4' => $hinh4["name"],
				'date' => $date->format('Y-m-d'),
				'username' => $username,
				);
		$rs=  $danhsach->insertBaidang($thong_tin_sp);
		}else{
			header('location:trang-chu');
		}
		
	}

}
?>