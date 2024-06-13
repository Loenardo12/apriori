<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simpan Data</title>
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
$kditem=$_POST["kditem"];
$merk=$_POST["merk"];
$jenis=$_POST["jenis"];
$sql=" INSERT INTO `item` (`kditem` ,`merk` ,`jenis`)VALUES ('$kditem',  '$merk',  '$jenis')";
$data=mysqli_query($koneksi,$sql);
if ($query)
{ //echo"Data Telah Disimpan..!";

echo "<center>Data Telah disimpan..!</center>";
echo "<center><a href='hal_admin.php?page=item'>Ok</a></center>";
}
else
{ echo"Data Tidak Dapat Disimpan..!";}

?>
</div>
</body>
</html>