<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Edit Data</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript">
function kembali(){
	window.location="haladmin.php?page=mtkuliah&page_num=1";
	}

</script>
</head>
<body>
<?php 
include"koneksi.php";
$kode=$_GET['kditem'];

$sql ="SELECT * FROM item WHERE kditem='$kode'";
$result=mysqli_query($koneksi,$sql);
$row=mysqli_fetch_array($result);
?>
<table width="500" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td colspan="5"><center>
    <strong>Edit Data Item</strong>
    </center></td>
  </tr>
  <tr>
  <form name="form1" method="post" action="update.php?aksi=item">
    <tr>
    <td height="27">KD Item</td>
    <td>:</td>
    <td><input name="kode" type="hidden" id="kode" value="<?php echo $row['kditem'];?>"><input name="kode2" type="text" id="kode2" value="<?php echo $row['kditem'];?>" ></td>
    <td>&nbsp;</td>
  </tr>
      <tr>
        <td>Merk</td>
        <td>:</td>
        <td><input name="merk" type="text" id="merk" size="20" maxlength="20" placeholder="Nomor HP" value="<?php echo $row['merk'];?>"></td>
        <td>&nbsp;</td>
      </tr>
        <tr>
          <td>Jenis</td>
          <td>:</td>
          <td><input name="jenis" type="text" id="jenis" size="30" maxlength="30" placeholder="jenis User" value="<?php echo $row['jenis'];?>"></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
    <td colspan="2">&nbsp;</td>
    <td><input name="simpan" type="submit" id="simpan" value="Update" style="font-family:bauhaus md bt;color:#ffffff;font-size:12pt;border:1px solid #039; background-color:#69C;" />
      <input type="reset" name="Submit2" value="Back" onClick="kembali();" style="font-family:bauhaus md bt;color:#ffffff;font-size:12pt;border:1px solid #039; background-color:#69C;" /></td>
    <td>&nbsp;</td>
  </form>
  </tr>
</table>

</body>
</html>
