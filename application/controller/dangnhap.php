<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
class Dangnhap extends Controller{
	function __construct(){
	}
	public function Index(){
		include (PATH_SYSTEM."/model/nguoidung.php");
		$danhsach = new Nguoidung();
		$this->view('dangnhap');
	}
	public function Authenticate(){
		include (PATH_SYSTEM."/model/nguoidung.php");
		$danhsach = new Nguoidung();
		// kiem tra neu co nut dang nha
		if(isset($_POST['submit'])){
			$user = $_POST['username'];
			$pass = $_POST['password'];
			$rs = $danhsach->getInfoUser($user,md5($pass));
		}else{
			header('location:index.php');
		}
	}
	public function Quenmk(){
		include (PATH_SYSTEM."/model/nguoidung.php");
		$danhsach = new Nguoidung();
		if(isset($_POST['submit'])){
			$user = $_POST['username'];
			$pass = $_POST['password'];
			$pass_again = $_POST['password-again'];
			$email = $_POST['email'];
			if(strcmp($pass,$pass_again) == 0){
				$rs = $danhsach->changePass($user,md5($pass),$email);
			}else{
				header('location:index.php?c=dangnhap');
			}
		}else{
			header('location:index.php');
		}
	}
}
?>