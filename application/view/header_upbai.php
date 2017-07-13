<?php
	/*** 
		** Lấy thanh url để thay đỗi title theo trang 
	***/
$title ;
if(isset($_GET['a'])){
	$trang = $_GET['a'];
}else{
	$trang = "dangbai";
}
if($trang == 'dangbai'){
	$title = "Đăng bài";
}else{
	$title = "Sửa bài";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?>|Trao đổi hoặc bán hàng hoá các loại|website uy tín trực tuyến</title>
	<!-- Latest compiled and minified CSS -->
	<meta name="description" content=""/>
	<meta name="keywords" content="" />
	<meta name="copyright" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="" />
	<meta name="geo.region" content="VN-CT" />
	<meta name="geo.placename" content="Cần Thơ" />
	<meta name="geo.position" content="10.028089;105.770886" />
	<meta name="ICBM" content="10.028089, 105.770886" />
	<meta name="dc.description" content="">
	<meta name="dc.keywords" content="">
	<meta name="dc.subject" content="">
	<meta name="dc.created" content="2016-11-01">
	<meta name="dc.publisher" content="">
	<meta name="dc.creator.name" content="">
	<meta name="dc.identifier" content="">
	<meta name="dc.rights.copyright" content="">
	<meta name="dc.language" content="vi-VN">
	<link rel="stylesheet" href="lir/css/bootstrap.css">

	<link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="lir/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="lir/css/up_bai.css">
	<link rel="stylesheet" type="text/css" href="lir/css/menu_mobie.css">
	<script  src = "lir/js/check-form-up-bai.js"></script>
</head>
<body>