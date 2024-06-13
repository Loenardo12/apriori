<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hapus Data</title>
<style type="text/css">
body { margin:120px;}
div { border:1px dashed #666; background-color:#E7F1FE; padding:10px; width:500px;}
.tblok {
	padding:2px 2px 2px 2px;
	border:1px solid #CCC;
	width:120px;
	background-color:#E2E2E2;
	}
</style>
</head>

<body>
<div>
<?php
include "koneksi.php";
//$id_user=$_GET['id_user'];
$nama_tabel=$_GET['tabel'];
$kdhapus=$_GET['kdhapus'];
$page=$_GET['page'];
$fld_hapus=$_GET['fld_hapus'];
$sql = "DELETE FROM $nama_tabel WHERE $fld_hapus='$kdhapus'";
$query=mysqli_query($koneksi,$sql);
if($query){
	echo "<center><font color='#0000ff'>Data $page Telah Berhasil Dihapus Dari Database..!</font></center>";
	echo "<center><span class='tblok'><a href='hal_admin.php?page=$page'>OK</a></span></center>";
	//header("location: ../admin/haladmin.php?top=Relasi.php");
	}else{
		echo "<center><font color='#ff0000'>Data Tidak dapat dihapus</font></center>";
		echo "<center><a href='hal_admin.php?page=$page'>Kembali</a></center>";
		}
?>
</div>
</body>
</html>