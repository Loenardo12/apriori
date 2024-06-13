<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="style2.css" />
<link rel="shortcut icon" href="../images/favicon.ico" />
<style>
<!--pagination-->
div.pagination {
	padding: 2px;
	margin: 2px;
	margin-bottom:22px;
}
 
div.pagination a {
	padding: 2px 3px 2px 3px;
	margin: 2px;
	border: 1px solid #AAAADD;
 
	text-decoration: none; /* no underline */
	color:#009933;
}
div.pagination a:hover, div.pagination a:active {
	border: 1px solid #000099;
	color:#CC6600;
}
div.pagination span.current {
	padding: 2px 5px 2px 5px;
	margin: 2px;
		border: 1px solid #000099;
		font-weight:normal;
		background-color:#006666;
		color: #FFF;
	}
	div.pagination span.disabled {
		padding: 2px 5px 2px 5px;
		margin: 2px;
		border: 1px solid #EEE;
		color: #DDD;
	}
.style16 {font-family: "Times New Roman", Times, serif}
<!--end pagination-->
</style>
<script type="text/javascript">
function validasi(form){
	if(form.kdtransaksi.value==""){alert("Masukkan kdtransaksi Mata Kuliah..!"); form.kdtransaksi.focus(); return false;
		}else if(form.txtmerk.value==""){ alert("Masukkan merk mata kuliah..!"); form.txtmerk.focus(); return false;
		}else if(form.txtsks.value==""){ alert("Masukkan jumlah SKS..!"); form.txtsks.focus(); return false;
		}else if(form.cbosemester.value==0){ alert("Masukkan semester..!"); form.cbosemester.focus(); return false;
		}else if(form.txtketerangan.value==0){ alert("Masukkan keterangan..!"); form.txtketerangan.focus(); return false;
		}
	form.submit();
	}
function konfirmasi(xkdhapus){
	var kdhapus=xkdhapus;
	var tabel, fld_hapus, page;
	tabel="transaksi";
	fld_hapus="kdtransaksi";
	page="transaksi";
	var url_str;
	url_str="hapus.php?kdhapus="+kdhapus+"&tabel="+tabel+"&fld_hapus="+fld_hapus+"&page="+page;
	var r=confirm("Apakah anda ingin menghapus data di tabel "+ tabel +"\n" +"dengan kdtransaksi " +kdhapus+ " ..?");
	if (r==true){   
		window.location=url_str;
		}else{
			//alert("no");
			}
	}
</script>
</head>
<body>
<div class="konten_tabel">
<h2 class="art-postheader">Data Transaksi</h2>
<?php
include "koneksi.php";
?>
<form name="form1" method="post" enctype="multipart/form-data" action="simpan-transaksi.php">
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="103">KD Transaksi</td>
      <td width="11">:</td>
      <td colspan="2"><input name="kdtransaksi" type="text" id="kdtransaksi" size="13" maxlength="13" placeholder="KD Transaksi"></td>
    </tr>
    <tr>
      <td>Item Terjual</td>
      <td>:</td>
      <td colspan="2"><br /><?php
	include "koneksi.php";
	$sql = "SELECT * FROM item ORDER BY kditem ASC";
	$query=mysqli_query($koneksi,$sql) ;
	while ($row=mysqli_fetch_array($query)){
	?>
    	<input type="checkbox" name="gejala[]" id="gejala" value="<?php echo $row['kditem'];?>">
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
      <td><input name="simpan" type="submit" id="simpan" value="Simpan" style="font-family:bauhaus md bt;color:#ffffff;font-size:12pt;border:1px solid #039; background-color:#69C;" />
        <input type="reset" name="Submit2" value="Reset" style="font-family:bauhaus md bt;color:#ffffff;font-size:12pt;border:1px solid #039; background-color:#69C;" /></td>    
    </tr>
  </table>
</form></div>
<div class="view_data">
  <table width="700" border="1" align="left" cellpadding="0" cellspacing="2" style="border:thin; border-color:#399; padding-left:3px; margin-top:5px;">
<tr style="background:linear-gradient(to top, #CCC, #999 );">
			<td width="58"><span class="style7">KD Transaksi</span></td>
			<td width="226">Item Terjual</td>
			<td width="120"><span class="style7">Tanggal</span></td>
			<td colspan="2" align="center"><span class="style7">Aksi</span></td>
		</tr>
	<?php
		$sql = "SELECT * FROM transaksi GROUP BY kdtransaksi ORDER BY kdtransaksi ASC" ;
 		$result=mysqli_query($koneksi,$sql);
		while($row = mysqli_fetch_array($result))
		{	
		?>
		<tr>
			<td><?php echo $row['kdtransaksi'];?></td>
			<td><?php
			$kdtransaksi=$row['kdtransaksi'];
			$sql ="SELECT * FROM transaksi,item WHERE item.kditem=transaksi.kditem AND transaksi.kdtransaksi='$kdtransaksi' "; 
            $result2=mysqli_query($koneksi,$sql);
			while($rowItem = mysqli_fetch_array($result2))
			{
				echo $rowItem['merk'] ." , ";
				}
			?></td>
			<td><?php echo $row['tgltransaksi'];?></a></td>
			<td width="116"><a href="edit-transaksi.php?kdtransaksi=<?php echo $row['kdtransaksi']; ?>">Edit</a><img width="16" height="16" src="images/edit.png"></img></td>
		    <td width="154"><a style="cursor:pointer; text-decoration:underline; color:blue;" onclick="return konfirmasi('<?php echo $row['kdtransaksi'];?>');">Hapus</a><img width="16" height="16" src="images/drop.png"></img></td>
		</tr>
 
		<?php }
		?>
</table>
</div>
</body>
</html>