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
$kode=$_GET['kdrule'];
$sql ="SELECT * FROM rule WHERE kdrule='$kode'";
$result=mysqli_query($koneksi,$sql);
$row=mysqli_fetch_array($result);
?>
<table width="500" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td colspan="5"><center>
    <strong>Edit Rule</strong>
    </center></td>
  </tr>
  <tr>
  <form name="form1" method="post" action="update.php?aksi=rule">
    <tr>
    <td width="103" height="27">KD Rule</td>
    <td width="11">:</td>
    <td width="348"><input name="kode" type="hidden" id="kode" value="<?php echo $row['kdrule'];?>"><input name="kode2" type="text" id="kode2" value="<?php echo $row['kdrule'];?>" disabled="true" ></td>
  </tr>
      <tr>
        <td>Itemset</td>
        <td>:</td>
        <td><input name="itemset" type="text" id="itemset" size="20" maxlength="20" placeholder="Nomor HP" disabled="true" value="<?php echo $row['itemset'];?>"></td>
      </tr>
        <tr>
          <td>Min Support</td>
          <td>:</td>
          <td><input name="minsupport" type="text" id="minsupport" size="5" maxlength="5" placeholder="jenis User" value="<?php echo $row['minsupport'];?>"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input name="simpan" type="submit" id="simpan" value="Update" style="font-family:bauhaus md bt;color:#ffffff;font-size:12pt;border:1px solid #039; background-color:#69C;" />
          <input type="reset" name="Submit2" value="Back" onClick="kembali();" style="font-family:bauhaus md bt;color:#ffffff;font-size:12pt;border:1px solid #039; background-color:#69C;" /></td>
        </tr>
        <tr>
    <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
  </form>
  </tr>
</table>

</body>
</html>
