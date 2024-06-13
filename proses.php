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
<tr > <td colspan="3" style="background:linear-gradient(to top, #09F, #0CC );">Pola Transaksi Penjualan</td>
</tr>
<tr style="background:linear-gradient(to top, #CCC, #999 );">
			<td width="58"><span class="style7">KD Transaksi</span></td>
			<td width="226">Item Terjual</td>
			<td width="120"><span class="style7">Tanggal</span></td>
		</tr>
	<?php
		$sql = "SELECT * FROM transaksi GROUP BY kdtransaksi ORDER BY kdtransaksi ASC";
	$result=mysqli_query($koneksi,$sql);
		while($row = mysqli_fetch_array($result))
		{
		?>
		<tr>
			<td><?php echo $row['kdtransaksi'];?></td>
			<td><?php
			$kdtransaksi=$row['kdtransaksi'];
			$sql = "SELECT * FROM transaksi,item WHERE item.kditem=transaksi.kditem AND transaksi.kdtransaksi='$kdtransaksi' ";
            $result2=mysqli_query($koneksi,$sql);
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
<table width="700" border="1">
<tr>
    <td><table width="350" border="1" align="left" cellpadding="0" cellspacing="2" style="border:thin; border-color:#399; padding-left:3px; margin-top:5px;">
<tr style="background:linear-gradient(to top, #CCC, #999 );">
<td colspan="5">Pembentukan Item C1 (1 itemset)</td>
</tr>
<tr style="background:linear-gradient(to top, #CCC, #999 );">
			<td width="72"><span class="style7">KD Item</span></td>
			<td width="162">Itemset</td>
			<td width="98"><span class="style7">Support %</span></td>
		</tr>
	<?php
	//kosongkan tabel itemc1
	$sql = "DELETE FROM itemc1";
	$EmptiItemc1=mysqli_query($koneksi,$sql);
	//#end kosong
		$sql = " SELECT * FROM transaksi GROUP BY kdtransaksi ";
		$qryTotalItem1=mysqli_query($koneksi,$sql);
		$SumTotalItem1=mysqli_num_rows($qryTotalItem1);
		$sql = "SELECT * FROM transaksi,item WHERE transaksi.kditem=item.kditem GROUP BY transaksi.kditem ORDER BY transaksi.kditem ASC";
	$result=mysqli_query($koneksi,$sql);
		
		while($row = mysqli_fetch_array($result))
		{
		?>
		<tr>
			<td><?php echo $row['kditem'];?></td>
			<td><?php echo $row['merk'];?></td>
			<td><?php
	$kditem=$row['kditem']; 
	$sql = "SELECT * FROM transaksi WHERE kditem='$kditem' ";
	$queryItem1=mysqli_query($koneksi,$sql) ;
	$countItem1=mysqli_num_rows($queryItem1);
	//echo $countItem1 ."/" .$SumTotalItem1;
	$PersentItem1=$countItem1/$SumTotalItem1*100; echo substr($PersentItem1,0,5) ."%";
	$sql = "INSERT INTO itemc1 (kditem,support_count,persen_support)VALUES('$kditem','$countItem1','$PersentItem1') ";
	$queryItemC1=mysqli_query($koneksi,$sql);
	?></td>
		</tr> <?php }
		?>
</table></td>
    <td><table width="350" border="1" align="left" cellpadding="0" cellspacing="2" style="border:thin; border-color:#399; padding-left:3px; margin-top:5px;">
<tr style="background:linear-gradient(to top, #CCC, #999 );">
	<td colspan="5">Pembentukan Item C1 (1 itemset)/Min Support =
	<?php
  $sql = "SELECT * FROM rule WHERE kdrule='R1' ";
	$queryRule1=mysqli_query($koneksi,$sql);
	$dataRule1=mysqli_fetch_array($queryRule1);
	echo $dataRule1['minsupport']."%";
	?>
	</td>
	</tr>
<tr style="background:linear-gradient(to top, #CCC, #999 );">
			<td width="72"><span class="style7">KD Item</span></td>
			<td width="162">Itemset</td>
			<td width="98"><span class="style7">Support %</span></td>
		</tr>
	<?php

	//#end kosong
		$minSupportR1=$dataRule1['minsupport'];
		$sql = "SELECT * FROM item,itemc1 WHERE itemc1.kditem=item.kditem AND itemc1.persen_support>='$minSupportR1' ORDER BY itemc1.kditem ASC";
	$queryMinItemc1=mysqli_query($koneksi,$sql);
		while($rowMinC1= mysqli_fetch_array($queryMinItemc1))
		{
		?>
		<tr>
			<td><?php echo $rowMinC1['kditem'];?></td>
			<td><?php echo $rowMinC1['merk'];?></td>
			<td><?php echo $rowMinC1['persen_support'];?>%</td>
		</tr>
	
		<?php }
		?>
</table></td>
	</tr>
</table>

<table width="750" border="1" align="left" cellpadding="0" cellspacing="2" style="border:thin; border-color:#399; padding-left:3px; margin-top:5px;">
<tr style="background:linear-gradient(to top, #CCC, #999 );">
	<td colspan="6"><strong>Pembentukan Item C2 (2 itemset)</strong>| <?php
  $sql = "SELECT * FROM itemc1"; 
	$QuerySumItemC1=mysqli_query($koneksi,$sql);
	$SumItemC1=mysqli_num_rows($QuerySumItemC1);
	echo "Jumlah Item = " .$SumItemC1; ?></td>
	</tr>
<tr style="background:linear-gradient(to top, #CCC, #999 );">
	<td width="79">No</td>
			<td width="268"><span class="style7">Itemset</span></td>
			<td width="385"><span class="style7">Support %</span></td>
	</tr>
		<tr>
	<td colspan="2"><?php
				
		$nomor=0;
		$sql = " SELECT * FROM itemc1,item WHERE itemc1.kditem=item.kditem ORDER BY itemc1.kditem ASC";
		$qryTotalItem1=mysqli_query($koneksi,$sql);
		$SumTotalItem1=mysqli_num_rows($qryTotalItem1); 
		$NumRecord=$SumTotalItem1-1; 
		$Limit1=1; $Limit2=$NumRecord;
		//kosongkan tabel itemc2
		$sql = "DELETE FROM itemc2";
		mysqli_query($koneksi,$sql);
		//menampilkan data dasar itemc1
		while($row = mysqli_fetch_array($qryTotalItem1))
		{
			echo "<hr>";echo $row['merk'];
			
		?>
            <?php
			$i=1;
			$nomor=$nomor+1; echo $nomor." | <br>";
			//echo $row['merk'] ;
			if(!$NumRecord==0){
				$sql = "SELECT * FROM itemc1,item WHERE itemc1.kditem=item.kditem  ORDER BY itemc1.kditem ASC LIMIT $Limit1,$Limit2 ";
				$queryItem2=mysqli_query($koneksi,$sql);
				while ($DataItem2=mysqli_fetch_array($queryItem2)){
					//echo $row['merk'].",".$DataItem2['merk']."<br>";
					$kdItem1=$row['kditem']; $kdItem2=$DataItem2['kditem'];
					$sql = "INSERT INTO itemc2(kditem1,kditem2) VALUES ('$kdItem1','$kdItem2') ";
					$qryInsertC2=mysqli_query($koneksi,$sql);
					//cari jumlah itemset di tabel transaksi
					$sql = " SELECT ";
					$queryFindC2=mysqli_query($koneksi,$sql);
					//end cari jumlah 
					}
					//menambahkan nilai limit atas , supaya recordset tergeser ke bawah "next.."
				$Limit1=$Limit1+1;
			}
			?>
	<?php }
		?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
	<td colspan="2"><table width="350" border="1" align="left" cellpadding="0" cellspacing="2" style="border:thin; border-color:#399; padding-left:3px; margin-top:5px;">
<tr style="background:linear-gradient(to top, #CCC, #999 );">
	<td colspan="5">Pembentukan Item C2 (2 itemset)</td>
	</tr>
<tr style="background:linear-gradient(to top, #CCC, #999 );">
			<td width="191">Itemset</td>
			<td width="115"><span class="style7">Support %</span></td>
		</tr>
	<?php
		//kosong tmp transaksi
		$sql = "DELETE * FROM tmp_trans";
		mysqli_query($koneksi,$sql);
		$sql = "SELECT * FROM itemc2 ORDER BY kditem1,kditem2 ASC";
	$result=mysqli_query($koneksi,$sql);
		while($rowC2 = mysqli_fetch_array($result))
		{
		?>
		<tr>
			<td><?php 
			$C2kditem1=$rowC2['kditem1']; $C2kditem2=$rowC2['kditem2'];
			//menampilkan data kditem1 c2
			$sql = "SELECT * FROM item WHERE kditem='$C2kditem1' ";
			$MerkItem1=mysqli_query($koneksi,$sql) ;
			$DataMerkItem1=mysqli_fetch_array($MerkItem1); echo "[".$DataMerkItem1['kditem']."]".$DataMerkItem1['merk']." , ";
			//menampilkan data kditem2 c2
			$sql = "SELECT * FROM item WHERE kditem='$C2kditem2' ";
			$MerkItem2=mysqli_query($koneksi,$sql) ;
			$DataMerkItem2=mysqli_fetch_array($MerkItem2); echo "[".$DataMerkItem2['kditem']."]".$DataMerkItem2['merk'];
			?></td>
			<td><?php
			$sql = "INSERT INTO tmp_c2 (kditem)values('$C2K1') ";
			$C2K1=$DataMerkItem1['kditem']; mysqli_query($koneksi,$sql);
			$C2K2=$DataMerkItem2['kditem']; mysqli_query($koneksi,$sql);
			echo $kalimat="$C2K1,$C2K2<br>"; 
			//echo $kalimat."$kalimat<br><hr>";
            echo "kode c2 = ".$C2K1.",".$C2K2."<br>";
			//mencari data di tabel transaksi
			$sql = "SELECT * FROM transaksi ORDER BY kdtransaksi ASC ";
			$queryFindTransaksiC2=mysqli_query($koneksi,$sql);
			while ($dataFindTransaksiC2=mysqli_fetch_array($queryFindTransaksiC2)){
				//echo $dataFindTransaksiC2['kditem']."<br>";
				$dataT=$dataFindTransaksiC2['kditem'];
				$kdFtransaksi=$dataFindTransaksiC2['kdtransaksi'];
				$kditemT=$dataFindTransaksiC2['kditem'];
				$sql = "INSERT INTO tmp_trans (kditem,kdtransaksi) VALUES ('$kditemT','$kdFtransaksi') ";
				$queryInsertT=mysqli_query($koneksi,$sql);
				//echo $kalimat2;
				}
			?></td>
		</tr>
	
		<?php }
		?>
</table></td>
	<td>&nbsp;</td>
    </tr>

</table>
<br /><br />
<p>&nbsp;</p>

<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
</body>
</html>