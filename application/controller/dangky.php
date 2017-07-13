<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
class Dangky extends Controller{
	function __construct(){
	}
	public function Index(){
		$this->view("dangky");
	}
	public function Xuly(){
		include (PATH_SYSTEM."/model/nguoidung.php");
		$danhsach = new Nguoidung();
			/*** 
				** Lay thong tin cua nguoi dung tu form 
				** Dua vao mang chuyen den model xu ly
				**/
				if(isset($_POST['submit'])){
					$user = isset($_POST['username']) ? $_POST['username'] : "";
					$pass = isset($_POST['password']) ? $_POST['password'] : "";
					$pass_again = isset($_POST['password-again']) ? $_POST['password-again'] : "";
					$email = isset($_POST['email']) ? $_POST['email'] : "";
					$thongtin_dangky = array();
					if($user && $pass && $email && $pass === $pass_again && $pass_again){
						$thongtin_dangky = array($user,md5($pass),$email);
						$rs= $danhsach->themDanhsachnguoidung($thongtin_dangky);
					}else{
				// gan bien quay lại
						echo "<script>";
						echo "
						time = null;
						function move(){
							window.history.back()
						}
						timer=setTimeout('move()',1000)

						";
						echo "</script>";
						echo "<center><h1 style='color:blue'>Nhập sai thông tin</h1></center>";
					}
				}else{
					header('location:index.php');
				}
			}
			public function checkuser(){
				$username = $_POST['title'];
				include (PATH_SYSTEM."/model/nguoidung.php");
				$danhsach = new Nguoidung();
				if(isset($username) && $username != ""){
					$rs = $danhsach->kiemTrausername($username);
				}
			}
		}
		?>