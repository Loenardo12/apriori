<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Update Transaksi</title>
<style type="text/css">
body { margin:50px;background-image:url(../Image/Bottom_texture.jpg);}
div { border:1px dashed #666; background-color:#CCC; padding:10px;}
</style>
</head>
<body>
<div>
<?php 
include "koneksi.php";
$kdtransaksi=$_POST['kdtransaksi'];
$tgltransaksi=$_POST['tgltransaksi'];
// del transaksi
$queryDel=mysqli_query("DELETE  FROM transaksi WHERE kdtransaksi='$kdtransaksi' ");
// mengambil variabel dari halaman rule_kaidah_produksi.php
$gejala 	= '';
$events 	= '';
if (isset($_POST['gejala']))
{
	$selectors 	= htmlentities(implode(',', $_POST['gejala']));
	//$events 	= htmlentities(implode('', $_POST['bobot']));
}
$data=$selectors;
//$databobot=$events;
//echo "$selectors<br>";
//echo "$events";
$input = $data;
	  //memecahkan string input berdasarkan karakter '\r\n\r\n'
	  $pecah = explode("\r\n\r\n", $input);
	  // string kosong inisialisasi
	  $text = "";
	  //untuk setiap substring hasil Jantung, sisipkan <p> di awal dan </p> di akhir
	  // lalu menggabungnya menjadi satu string untuk $text
	  for ($i=0; $i<=count($pecah)-1; $i++)
	  {
	  	$part = str_replace($pecah[$i], "<p>".$pecah[$i]."</p>", $pecah[$i]);
		$text .=$part;
	  }
	  //menampilkan outputnya
//echo $text;
//menyimpan data kedalam tabel relasi
$text_line=$data;
$text_line =$data; //"Poll number 1, 1500, 250, 150, 100, 1000";
$text_line = explode(",",$text_line);
$posisi=0;
for ($start=0; $start < count($text_line); $start++) {
	$baris=$text_line[$start]; //echo "$baris<br>";
	// untuk nilai bobot	
	//$bobot=substr($databobot,$posisi,1); echo $bobot. "<br>";
	$sql="INSERT INTO  transaksi (kdtransaksi,kditem,tgltransaksi) VALUES ('$kdtransaksi','$baris','$tgltransaksi')";
	$query=mysqli_query($sql) or die(mysqli_error());
	$posisi++;
//print $text_line[$start] . "<BR>";
}
echo "<center><strong>Data Transaksi Berhasil di Set..!</strong></center>";
echo "<center><a href='hal_admin.php?page=transaksi'>OK</a></center>";
?>
</div>
</body>
</html>
