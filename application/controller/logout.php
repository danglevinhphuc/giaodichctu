<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
class Logout{
	function __construct(){
		// Xóa session name
		unset($_SESSION['authenticate']);
		header('location:trang-chu');
		setcookie("User", "", time()-3600);
	}
}
?>