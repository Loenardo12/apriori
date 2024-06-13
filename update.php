<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Update Data</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="shortcut icon" href="../images/favicon.ico">
<style type="text/css">
body { margin:120px;}
div { border:1px dashed #666; background-color:#E7F1FE; padding:10px; width:500px;}
.frmupdate{
	border:1px solid #CCC;
	border-radius:5px;
	padding:30px; 0px 30px 0px;
	background:linear-gradient(to right, #CCC, #999 );
	}
</style>
</head>
<body>
<div class="frmupdate">
<?php
include"koneksi.php";
$aksi=$_GET['aksi'];
//udpate data mahasiswa
if($aksi=="item"){
$kditem=$_POST["kode2"];
$merk=$_POST["merk"];
$jenis=$_POST["jenis"];

$query=" UPDATE  item SET merk='$merk', jenis='$jenis' WHERE  kditem='$kditem' ";
$result=mysqli_query($query);
if ($result){
echo"<center style='color:#FFF; font-weight:bold;'>Data Telah Berhasil Diupdate ..!</center>";
echo"<center><a href='hal_admin.php?page=item'>Ok</a></center>";
} else {
echo"ERROR";
}
}elseif($aksi=="rule"){
// edit dosen
$kdrule=$_POST["kode"];
$minsupport=$_POST["minsupport"];
$query="UPDATE rule SET minsupport='$minsupport' WHERE kdrule='$kdrule'";
$result=mysqli_query($query);
if ($result){
echo"<center>Data Berhasil di Update</center>";
echo"<center><a href='hal_admin.php?page=rule'>Ok</a></center>";
} else {
echo"ERROR";
echo"<center><a href='hal_admin.php?page=rule'>Ok</a></center>";
}
//edit mtkuliah
}elseif($aksi=="mtkuliah"){
$id_mt=$_POST["kode"];
$nama=$_POST["txtnama"];
$sks=$_POST["txtsks"];
$ket=$_POST["txtketerangan"];
$semester=$_POST["cbosemester"];

$query="UPDATE tbmata_kuliah SET nama='$nama', sks='$sks', semester='$semester', ket='$ket' WHERE id_mt='$id_mt'";
$result=mysqli_query($query);
if ($result){
echo"<center>Data Berhasil di Update</center>";
echo"<center><a href='haladmin.php?page=mtkuliah&page_num=1&id=admin'>Ok</a></center>";
} else {
echo"ERROR";	
	}
}
?>
</div>
</body>
</html>
