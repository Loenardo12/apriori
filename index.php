<?php header("location: hal_admin.php?page=item");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kontrol PC Jarak Jauh</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="shortcut icon" href="images/favicon.jpg" />
<script type="text/javascript" src="jquery-1.4.3.min.js"></script>
<script>
function validasi(form){
		if(form.textusername.value=="") {
			alert("Silahkan masukkan nama pengguna..!");
			form.textusername.focus();
			return false;
			}else if(form.textpassword.value==""){
				alert("Jangan lupa masukkan password..!");
				form.textpassword.focus();
				return false;
				}
		}
	function set_fokus(){
		$("#textusername").focus();
		}
		
$(function(){
	$('.fadein img:gt(0)').hide();
	setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);
});
$(document).ready(function(){
	var url_str="hal_admin.php?page=kontrol";
	window.setTimeout('window.location=url_str()', 1000);
	})
</script>
</head>
<body onload="set_fokus();">
<div class="header">
<center><h2>IMPLEMENTASI DATA MINING PADA PENJUALAN PRODUK
ELEKTRONIK DENGAN ALGORITMA APRIORI
</h2></center>
<center><h3>(STUDI KASUS : KREDITPLUS)</h3></center>
</div><img class="imgheader" src="images/pika_line.png" />
<div class="menu"><?php include "menu.php"; ?></div>
<img class="imgheader" src="images/pika_line.png" />
<div class="fadein"></div>
<div class="konten">
<h2 class="art-postheader">Selamat Datang di sistem pengontrol PC jarak jauh</h2>
</div>
<img class="imgheader" src="images/pika_line.png" />
</div>
<div class="footer"><center>
    Copyright &copy;2016
</center></div>
</body>
</html>