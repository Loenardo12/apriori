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
	if(form.kditem.value==""){alert("Masukkan kditem Mata Kuliah..!"); form.kditem.focus(); return false;
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
	tabel="item";
	fld_hapus="kditem";
	page="item";
	var url_str;
	url_str="hapus.php?kdhapus="+kdhapus+"&tabel="+tabel+"&fld_hapus="+fld_hapus+"&page="+page;
	var r=confirm("Apakah anda ingin menghapus data di tabel "+ tabel +"\n" +"dengan kditem " +kdhapus+ " ..?");
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
<h2 class="art-postheader">Data Item</h2>
<?php
include "koneksi.php";
?>
<form name="form1" method="post" enctype="multipart/form-data" action="simpan-item.php">
  <table width="428" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="103">KD Item</td>
      <td width="11">:</td>
      <td colspan="2"><input name="kditem" type="text" id="kditem" size="13" maxlength="13" placeholder="KD Item"></td>
    </tr>
    <tr>
      <td>Merk Item</td>
      <td>:</td>
      <td colspan="2"><input name="merk" type="text" id="merk" size="30" maxlength="30" placeholder="Merk"></td>
    </tr>
    <tr>
      <td>Jenis</td>
      <td>:</td>
      <td colspan="2"><input name="jenis" type="text" id="jenis" size="20" maxlength="20" placeholder="jenis" /></td>
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
			<td width="55"><span class="style7">KD Item</span></td>
			<td width="120">Merk</td>
			<td width="229"><span class="style7">Jenis</span></td>
			<td colspan="2" align="center"><span class="style7">Aksi</span></td>
		</tr>
	<?php
		$sql = "SELECT * FROM item ORDER BY kditem ASC" ;
 		$result=mysqli_query($koneksi,$sql);
		while($row = mysqli_fetch_array($result))
		{
		?>
		<tr>
			<td><?php echo $row['kditem'];?></td>
			<td><?php echo $row['merk'];?></td>
			<td><?php echo $row['jenis'];?></a></td>
			<td width="117"><a href="edit-item.php?kditem=<?php echo $row['kditem'];?>">Edit</a><img width="16" height="16" src="images/edit.png"></img></td>
		    <td width="153"><a style="cursor:pointer; text-decoration:underline; color:blue;" onclick="return konfirmasi('<?php echo $row['kditem'];?>');">Hapus</a><img width="16" height="16" src="images/drop.png"></img></td>
		</tr>
 
		<?php }
		?>
</table>
</div>
</body>
</html>