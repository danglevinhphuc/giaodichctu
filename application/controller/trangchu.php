<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
	class Trangchu extends controller{
		function __construct(){}

		public function Index(){
			include (PATH_SYSTEM."/model/danhsachsp.php");
			$danhsach = new Danhsachsp();
			$page =isset($_GET['page']) ? $_GET['page'] : 1;
			$limit = isset($_COOKIE["limit"])?$_COOKIE["limit"] : 5;
			$so_trang = ($page-1)*$limit ;
			//loai tin 
			$loaitin = isset($_GET['loaitin']) ? $_GET['loaitin'] : "";
			
			// khu vuc
			$khuvuc = isset($_GET['khuvuc']) ? $_GET['khuvuc'] : "";
			/* 
				**Dia diem o day gom 2 phan khu vuc va loai tin trong csdl
			*/
			$diadiem = array($khuvuc, $loaitin);
			if(!isset($_GET['tim']))
				$rs = $danhsach->selectDanhSach($diadiem,$so_trang);
			else 
				$rs = $danhsach->selectDanhSach($diadiem,$so_trang,$_GET['tim']);	
			$this->view("index",$rs);

		}
		/** Load gia tri cho ng dung khi su dung mobie  **/
		public function indexMobie(){
			include (PATH_SYSTEM."/model/danhsachsp.php");
			$danhsach = new Danhsachsp();
			// id load cho mobie
			// loai tin
			$loaitin = isset($_POST['giatriloatin']) ? $_POST['giatriloatin'] : "";
			
			// khu vuc
			$khuvuc = isset($_POST['giatrikhuvuc']) ? $_POST['giatrikhuvuc'] : "";
			//gia tri search
			$tim = isset($_POST['tim']) ? $_POST['tim'] : "";
			// gia tri trang vd 1 lan load 5 bai
			$id_mobie = $_POST['getresult'];
			// gia tri toi da 1 yeu cau tu khu vu vi tri  loai tin tim kiem
			$tong_so = isset($_POST['tong_so']) ? $_POST['tong_so'] : "";
			$diadiem = array(
				'id' => $id_mobie,
				'loai_tin' =>$loaitin,
				'khu_vuc' => $khuvuc,
				'tim' => $tim,
			);
			$rs = $danhsach->loadDatamobie($diadiem);
		}
	}
?>