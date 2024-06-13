<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Edit Data</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="jquery-ui.css">
<script type="text/javascript" src="jquery-1.10.2.js"></script>
<script type="text/javascript" src="jquery-ui.js"></script>
<script type="text/javascript">
function kembali(){
	window.location="haladmin.php?page=mtkuliah&page_num=1";
	}
</script>
</head>
<body>
<?php 
include"koneksi.php";
$kode=$_GET['kdtransaksi'];
$query="SELECT * FROM transaksi WHERE kdtransaksi='$kode'";
$result=mysqli_query($query);
$row=mysqli_fetch_array($result);
?>
<form name="form1" method="post" enctype="multipart/form-data" action="update-transaksi.php">
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="32" colspan="4" style="background:linear-gradient(to top, #9C0, #9F0);"><center>EDIT DATA TRANSAKSI</center></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="543" colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td width="145">KD Transaksi</td>
      <td width="12">:</td>
      <td colspan="2"><input type="text" value="<?php echo $_GET['kdtransaksi'];?>" size="10"><input name="kdtransaksi" type="hidden" id="kdtransaksi" size="13" maxlength="13" value="<?php echo $_GET['kdtransaksi'];?>" ></td>
    </tr>
    <tr>
      <td>Item Terjual</td>
      <td>:</td>
      <td colspan="2"><br /><?php
	include "koneksi.php";
	$kdtransaksi=$_GET['kdtransaksi']; echo $kdtransaksi;	
	$query=mysqli_query("SELECT * FROM item ORDER BY kditem ASC") or die("Query Error..!" .mysqli_error);
	while ($row=mysqli_fetch_array($query)){
		$kditem=$row['kditem'];
		$kueri = mysqli_query ("SELECT * FROM transaksi WHERE kdtransaksi='$kdtransaksi' AND kditem='$kditem' ORDER BY kditem desc ");
		$edit = mysqli_fetch_array($kueri);
		$checked = explode(', ', $edit['kditem']);
	?>
    	<input type="checkbox" name="gejala[]" id="gejala" value="<?php echo $row['kditem'];?>" <?php in_array ($row['kditem'], $checked) ? print "checked" : "";  ?> >
    	<?php echo $row['merk'];?>
		 <?php } ?></td>
    </tr>
    <tr>
      <td>Tanggal Transaksi</td>
      <td>:</td>
      <td colspan="2"><input name="tgltransaksi" type="text" id="tgltransaksi" size="20" maxlength="20" placeholder="tanggal" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input name="simpan" type="submit" id="simpan" value="Update" style="font-family:bauhaus md bt;color:#ffffff;font-size:12pt;border:1px solid #039; background-color:#69C;" />
        <input type="reset" name="Submit2" value="Reset" style="font-family:bauhaus md bt;color:#ffffff;font-size:12pt;border:1px solid #039; background-color:#69C;" /></td>    
    </tr>
  </table>
</form>

</body>
</html>
