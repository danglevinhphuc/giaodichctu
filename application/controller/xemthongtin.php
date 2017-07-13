<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
	class Xemthongtin extends controller{
		function __construct(){}
		function index(){
			include (PATH_SYSTEM."/model/danhsachsp.php");
			$danhsach = new Danhsachsp();
			//id
			$id = $_GET["id"];
			//khu vuc
			$khu_vuc = $_GET["khuvuc"];
			$diadiem = array($id,$khu_vuc);
			$rs = $danhsach->selectXemthongtin($diadiem);
			$rs_1 = $danhsach->capNhapview($id);
			$this->view("xemthongtin",$rs,"header_view");
		}
	}
?>