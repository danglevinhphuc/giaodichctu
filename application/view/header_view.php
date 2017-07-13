<?php
	/*** 
		** Lấy thanh url để thay đỗi title theo trang 
	***/
	// lay ten sp gan vao title 
	$row1 = $row[0]->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Xem thông tin sản phẩm | <?php echo $row1['ten_sp']; ?>|website uy tín tại Việt Nam</title>
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
	
	<script src="lir/js/show_picture.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#show_hinh .hinh_1').zoom({ on:'click' });	
			$('#show_hinh .hinh_2').zoom({ on:'click' });
			$('#show_hinh .hinh_3').zoom({ on:'click' });
			$('#show_hinh .hinh_4').zoom({ on:'click' });
		});
	</script>
	<script src="lir/js/jquery.zoom.js"></script>
	<link rel="stylesheet" type="text/css" href="lir/css/xem.css">
	<link rel="stylesheet" type="text/css" href="lir/css/menu_mobie.css">
</head>
<body>