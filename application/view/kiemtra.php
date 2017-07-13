<?php
	include('content_header.php');
?>

	<script type="text/javascript">
		function select(x){
			for(i = 1 ; i <= 17 ; i++){
				if(i == x){
					$('#sp'+i).animate({margin: "55px"}).css("color", "#fff").parents().addClass("active");
					value = $('#sp'+i).attr('giatri');
					$.get('index.php?c=kiemtra&a=xuly',{loai_sp:value},function(data){
						$("#thong_tin").html(data);
					});
				}else{
					$('#sp'+i).animate({margin: "0px"}).css("color", "#2196f3").parents().removeClass("active");

				}				
			}
		}
	</script>
	<main class="container">
		<section class="list_sp" id="dautrang">
			<div class="row">
				<div class="col-md-3">
					<p>-- Danh sách sản phẩm đã đăng --<p>
						<ul class="list-group">
							<li class="list-group-item"><span class="badge"><?php echo $row['laptop'] ?></span><a href="#" giatri="laptop" id="sp1" onclick="select(1)">Laptop</a></li>
							<li class="list-group-item"><span class="badge"><?php echo $row['chuot'] ?></span><a href="#" id="sp2" giatri="chuot" onclick="select(2)">Chuột mt</a></li>
							<li class="list-group-item"><span class="badge"><?php echo $row['banphim'] ?></span><a href="#" id="sp3" giatri="banphim" onclick="select(3)">Bàn phím</a></li>
							<li class="list-group-item"><span class="badge"><?php echo $row['loa'] ?></span><a href="#" giatri="loa" id="sp4" onclick="select(4)">Loa</a></li>
							<li class="list-group-item"><span class="badge"><?php echo $row['cpu'] ?></span><a href="#" id="sp5" giatri="cpu" onclick="select(5)">CPU</a></li>
							<li class="list-group-item"><span class="badge"><?php echo $row['ram'] ?></span><a href="#" id="sp6" giatri="ram" onclick="select(6)">RAM</a></li>
							<li class="list-group-item"><span class="badge"><?php echo $row['card'] ?></span><a href="#" giatri="card" id="sp7" onclick="select(7)">Card đồ hoạ</a></li>
							<li class="list-group-item"><span class="badge"><?php echo $row['mp3'] ?></span><a href="#" id="sp8" giatri="mp3" onclick="select(8)">MP3</a></li>
							<li class="list-group-item"><span class="badge"><?php echo $row['mp4'] ?></span><a href="#" id="sp9" giatri="mp4" onclick="select(9)">MP4</a></li>
							
							<li class="list-group-item"><span class="badge"><?php echo $row['ongkinh'] ?></span><a href="#" id="sp11" giatri="ongkinh" onclick="select(11)">Ống kính</a></li>
							<li class="list-group-item"><span class="badge"><?php echo $row['maychuphinh'] ?></span><a href="#" id="sp12" giatri="maychuphinh" onclick="select(12)">Camera</a></li>
							<li class="list-group-item"><span class="badge"><?php echo $row['phutung'] ?></span><a href="#" id="sp13" giatri="phutung" onclick="select(13)">Phụ tùng </a></li>
							<li class="list-group-item"><span class="badge"><?php echo $row['quat'] ?></span><a href="#" id="sp14" giatri="quat" onclick="select(14)">Quạt</a></li>
							<li class="list-group-item"><span class="badge"><?php echo $row['tu'] ?></span><a href="#" id="sp15" giatri="tu" onclick="select(15)">Tủ quần áo</a></li>
							<li class="list-group-item"><span class="badge"><?php echo $row['sach'] ?></span><a href="#" id="sp16" giatri="sach" onclick="select(16)">Sách</a></li>
							<li class="list-group-item"><span class="badge"><?php echo $row['dungcukhac'] ?></span><a href="#" id="sp17" giatri="dungcukhac" onclick="select(17)">Dụng cụ khác</a></li>
						</ul>
					</div>
					<div class="col-md-9">
						<p class="text-center">-- Các sản phẩm --</p>
						<div id="thong_tin">
							
						</div>
					</div>
				</div>
				
			</section>
		</main>