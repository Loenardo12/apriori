<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Mining</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="shortcut icon" href="images/favicon.jpg" />
<script type="text/javascript" src="jquery-1.4.3.min.js"></script>
<script>
$(function(){
	$('.fadein img:gt(0)').hide();
	setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);
});
</script>
</head>
<body>
<div class="header">
<center><h2>IMPLEMENTASI DATA MINING PADA PENJUALAN PRODUK
ELEKTRONIK DENGAN ALGORITMA APRIORI
</h2></center>
<center><h3>(STUDI KASUS : KREDITPLUS)</h3></center>
</div><img class="imgheader" src="images/pika_line.png" />
<div class="menu"><?php include "menu.php"; ?></div>
<img class="imgheader" src="images/pika_line.png" />
<div class="fadein">
</div>
<div class="konten">
<div style="display:none;"><?php
			  $top=$_GET['page'];
			  ?>
			  </div>
			  <?php
	if(empty($top)){
		$on_top="home.php";
	}
	else{
	$on_top=$top;
	}
	include "$on_top" .".php";
	?>
</div>
<img class="imgheader" src="images/pika_line.png" />
</div>
<div class="footer"><center>Copyright &copy;2017. </center></div>
</body>
</html>