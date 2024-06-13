
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
<h2 class="art-postheader">Data Proses C1</h2>
<a style="padding:3px 6px 3px 6px; border:1px solid #06F;"  href="hal_admin.php?page=proses">Proses C1</a>
<a style="padding:3px 6px 3px 6px; border:1px solid #06F;"  href="hal_admin.php?page=proses-c2">Proses C2</a>
<a style="padding:3px 6px 3px 6px; border:1px solid #06F;"  href="hal_admin.php?page=proses-c3">Proses C3</a>
<?php
include "koneksi.php";
?>
<form name="form1" method="post" enctype="multipart/form-data" action="simpan-item.php">
  
</form></div>
<div class="view_data">
<table width="500" border="1" align="left" cellpadding="0" cellspacing="2" style="border:thin; border-color:#399; padding-left:3px; margin-top:5px;">
<tr >
  <td colspan="3" style="background:linear-gradient(to top, #09F, #0CC );">Pola Transaksi Penjualan</td>
  </tr>
<tr style="background:linear-gradient(to top, #CCC, #999 );">
			<td width="58"><span class="style7">KD Transaksi</span></td>
			<td width="226">Item Terjual</td>
			<td width="120"><span class="style7">Tanggal</span></td>
		</tr>
	<?php
 		$result=mysqli_query("SELECT * FROM transaksi GROUP BY kdtransaksi ORDER BY kdtransaksi ASC");
		while($row = mysqli_fetch_array($result))
		{
		?>
		<tr>
			<td><?php echo $row['kdtransaksi'];?></td>
			<td><?php
			$kdtransaksi=$row['kdtransaksi'];
            $result2=mysqli_query("SELECT * FROM transaksi,item WHERE item.kditem=transaksi.kditem AND transaksi.kdtransaksi='$kdtransaksi' ");
			while($rowItem = mysqli_fetch_array($result2))
			{
				echo $rowItem['merk'] ." , ";
				}
			?></td>
			<td><?php echo $row['tgltransaksi'];?></a></td>
		</tr>
		<?php }
		?>
</table><br /><br /><br /><br /><br /><br />
<table width="700" border="1" align="left" cellpadding="0" cellspacing="2" style="border:thin; border-color:#399; padding-left:3px; margin-top:5px;">
<tr style="background:linear-gradient(to top, #CCC, #999 );">
  <td colspan="6">Pembentukan Item C2 (2 itemset)</td>
  </tr>
<tr style="background:linear-gradient(to top, #CCC, #999 );">
			<td width="191">Itemset</td>
			<td width="115"><span class="style7">Support Count</span></td>
			<td width="115">Support %</td>
		</tr>
	<?php
		//kosong tmp transaksi
 		$result=mysqli_query("SELECT * FROM itemc2");
		while($rowC2 = mysqli_fetch_array($result))
		{
		?>
		<tr>
			<td><?php
            $C2kditem1=$rowC2['kditem1']; $C2kditem2=$rowC2['kditem2'];
			//menampilkan data kditem1 c2
			$MerkItem1=mysqli_query("SELECT * FROM item WHERE kditem='$C2kditem1' ") or die(mysqli_error());
			$DataMerkItem1=mysqli_fetch_array($MerkItem1); echo "[".$DataMerkItem1['kditem']."]".$DataMerkItem1['merk']." , ";
			//menampilkan data kditem2 c2
			$MerkItem2=mysqli_query("SELECT * FROM item WHERE kditem='$C2kditem2' ") or die(mysqli_error());
			$DataMerkItem2=mysqli_fetch_array($MerkItem2); echo "[".$DataMerkItem2['kditem']."]".$DataMerkItem2['merk'];
			?></td>
			<td><?php echo $rowC2['support_count'];?></td>
			<td><?php echo substr($rowC2['persen_support'],0,5)."%";?></td>
		</tr>
		<?php }
		?>
</table>
<table width="700" border="1" align="left" cellpadding="0" cellspacing="2" style="border:thin; border-color:#399; padding-left:3px; margin-top:5px;">
<tr style="background:linear-gradient(to top, #CCC, #999 );">
  <td colspan="6">Pembentukan Item C2 (2 itemset) yang memenuhi minum support count <?php
  $strRule=mysqli_query("SELECT * FROM rule WHERE kdrule='R2' ");
		$dataRule=mysqli_fetch_array($strRule); $nRule=$dataRule['minsupport']; 
		echo "<a href='edit-rule.php?kdrule=R2'>$nRule %</a>";
  ?></td>
  </tr>
<tr style="background:linear-gradient(to top, #CCC, #999 );">
			<td width="191">Itemset</td>
			<td width="115"><span class="style7">Support Count</span></td>
			<td width="115">Support %</td>
		</tr>
	<?php
		//kosong tmp transaksi
		
 		$result=mysqli_query("SELECT * FROM itemc2 WHERE persen_support >='$nRule' ");
		while($rowC2 = mysqli_fetch_array($result))
		{
		?>
		<tr>
			<td><?php
            $C2kditem1=$rowC2['kditem1']; $C2kditem2=$rowC2['kditem2'];
			//menampilkan data kditem1 c2
			$MerkItem1=mysqli_query("SELECT * FROM item WHERE kditem='$C2kditem1' ") or die(mysqli_error());
			$DataMerkItem1=mysqli_fetch_array($MerkItem1); echo "[".$DataMerkItem1['kditem']."]".$DataMerkItem1['merk']." , ";
			//menampilkan data kditem2 c2
			$MerkItem2=mysqli_query("SELECT * FROM item WHERE kditem='$C2kditem2' ") or die(mysqli_error());
			$DataMerkItem2=mysqli_fetch_array($MerkItem2); echo "[".$DataMerkItem2['kditem']."]".$DataMerkItem2['merk'];
			?></td>
			<td><?php echo $rowC2['support_count'];?></td>
			<td><?php echo substr($rowC2['persen_support'],0,5)."%";?></td>
		</tr>
		<?php }
		?>
</table>
<br /><br />
<p>&nbsp;</p>

<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
</body>
</html>