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
<h2 class="art-postheader">Data Hasil C3</h2>
<a style="padding:3px 6px 3px 6px; border:1px solid #06F;"  href="hal_admin.php?page=proses">Proses C1</a>
<a style="padding:3px 6px 3px 6px; border:1px solid #06F;"  href="hal_admin.php?page=proses-c2">Proses C2</a>
<a style="padding:3px 6px 3px 6px; border:1px solid #06F;"  href="hal_admin.php?page=proses-c3">Proses C3</a>
<?php
include "koneksi.php";
?>
<form name="form1" method="post" enctype="multipart/form-data" action="simpan-item.php">
  
</form></div>
<div class="view_data">
<table width="700" border="1" align="left" cellpadding="0" cellspacing="2" style="border:thin; border-color:#399; padding-left:3px; margin-top:5px;">
<tr >
  <td colspan="3" style="background:linear-gradient(to top, #CF0, #FF3);"><a href="hal_admin.php?page=proses-c3_hasil_akhir">&gt;&gt; Lanjutkan ke-Hasil Akhir C3</a></td>
</tr>
<tr >
  <td colspan="3" style="background:linear-gradient(to top, #09F, #0CC );">Pola Transaksi Penjualan</td>
  </tr>
<tr style="background:linear-gradient(to top, #CCC, #999 );">
			<td width="58"><span class="style7">KD Transaksi</span></td>
			<td width="226">Item Terjual</td>
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
		</tr>
		<?php }
		?>
</table>
<table width="700" border="1" align="left" cellpadding="0" cellspacing="2" style="border:thin; border-color:#399; padding-left:3px; margin-top:5px;">
<tr style="background:linear-gradient(to top, #CCC, #999 );">
  <td colspan="6">Pembentukan Item C3 (3 itemset)</td>
  </tr>
<tr style="background:linear-gradient(to top, #CCC, #999 );">
			<td width="380">Itemset</td>
			<td width="171"><span class="style7">Support Count</span></td>
			<td width="131">Support %</td>
		</tr>
	<?php
		//kosong tmp transaksi
 		$resultC3=mysqli_query("SELECT * FROM itemc3 ORDER BY kditem1,kditem2 ASC ");
		$support_count="0";
		while($rowC3 = mysqli_fetch_array($resultC3))
		{
		?>
		<tr>
			<td><?php
            //echo $rowC3['kditem1'].",".$rowC3['kditem2'].",".$rowC3['kditem3'];
			$C3kditem1=$rowC3['kditem1']; $C3kditem2=$rowC3['kditem2']; $C3kditem3=$rowC3['kditem3'];
			//menampilkan data kditem1 c3
			echo "<strong>";
			$MerkItem1=mysqli_query("SELECT * FROM item WHERE kditem='$C3kditem1' ") or die(mysqli_error());
			$DataMerkItem1=mysqli_fetch_array($MerkItem1); echo "[".$DataMerkItem1['kditem']."]".$DataMerkItem1['merk']." , ";
			//menampilkan data kditem2 c3
			$MerkItem2=mysqli_query("SELECT * FROM item WHERE kditem='$C3kditem2' ") or die(mysqli_error());
			$DataMerkItem2=mysqli_fetch_array($MerkItem2); echo "[".$DataMerkItem2['kditem']."]".$DataMerkItem2['merk']." , ";
			//menampilkan data kditem3 c3
			$MerkItem3=mysqli_query("SELECT * FROM item WHERE kditem='$C3kditem3' ") or die(mysqli_error());
			$DataMerkItem3=mysqli_fetch_array($MerkItem3); echo "[".$DataMerkItem3['kditem']."]".$DataMerkItem3['merk']."<br></strong>";
			//initializing data transaksi
			$strTransaksi=mysqli_query("SELECT * FROM transaksi GROUP BY kdtransaksi ORDER BY kdtransaksi ASC");
			$NumT=mysqli_num_rows($strTransaksi); echo "num t $NumT<br>";
				while($dataTransaksi=mysqli_fetch_array($strTransaksi)){
				$kdtransaksi=$dataTransaksi['kdtransaksi']; echo "kode transaksi =$kdtransaksi<br>";
				$strSql = "SELECT kditem FROM transaksi WHERE kdtransaksi='$kdtransaksi' ";
				$display = mysqli_query($strSql);
					$arrResult = Array();
					$cnt=0;
					while ($data = mysqli_fetch_row($display))
					{ $arrResult[$cnt++] = $data[0]; }
				if (in_array($C3kditem1,  $arrResult)&&in_array($C3kditem2, $arrResult)&&in_array($C3kditem3, $arrResult))
				  {
					  $support_count=$support_count+1;
					  echo "jumlah support_count = ".$support_count ."<br>";
				  echo "Match found<br>";
				  }
				else
				  {
				  echo "Match not found<br>";
				  }
				  $persen=$support_count/$NumT*100; echo "persen= ". substr($persen,0,5)."%<br>";
				  $udpateC3=mysqli_query("update itemc3 set support_count='$support_count',persen_support='$persen' WHERE kditem1='$C3kditem1' AND kditem2='$C3kditem2' AND kditem3='$C3kditem3' ");
				}
				$support_count="0";
			//end transaksi
			?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<?php }
		?>
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
    </tr>
		
</table>
<p>&nbsp;</p>
</div>
</body>
</html>