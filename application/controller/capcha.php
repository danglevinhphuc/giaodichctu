<?php
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
class Capcha {
	function __construct(){
		$seri_md5 = md5(rand(0,1000));
		$seri_code = substr($seri_md5,7,6);
		setcookie('capcha', $seri_code, time() + 3600);
		$width = 150;
		$height = 40;
		$image = imagecreate($width, $height);
		$black = imagecolorallocate($image, 139,0,139);
		$white = imagecolorallocate($image, 255, 255, 255);
		imagefill($image, 0, 0,$black);
		imagestring($image, 5, 50, 10, $seri_code, $white);
		header('Content-type:image/jpeg');
		imagejpeg($image);
		imagedestroy($image);
	}
}
?>