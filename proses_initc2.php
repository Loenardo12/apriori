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
<h2 class="art-postheader">Inisialisasi C2</h2>
<?php
include "koneksi.php";
?>
<form name="form1" method="post" enctype="multipart/form-data" action="simpan-item.php">
  
</form></div>
<div class="view_data">
<table width="750" border="1" align="left" cellpadding="0" cellspacing="2" style="border:thin; border-color:#399; padding-left:3px; margin-top:5px;">
<tr style="background:linear-gradient(to top, #CCC, #999 );">
  <td colspan="6"><strong>Pembentukan Item C2 (2 itemset)</strong>| <?php 
  $QuerySumItemC1=mysqli_query("SELECT * FROM itemc1");
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
		
		$qryTotalItem1=mysqli_query(" SELECT * FROM itemc1,item WHERE itemc1.kditem=item.kditem ORDER BY itemc1.kditem ASC ");
		$SumTotalItem1=mysqli_num_rows($qryTotalItem1); 
		$NumRecord=$SumTotalItem1-1; 
		$Limit1=1; $Limit2=$NumRecord;
		//kosongkan tabel itemc2
		mysqli_query("DELETE FROM itemc2")or die(mysqli_error());
		//menampilkan data dasar itemc1
		while($row = mysqli_fetch_array($qryTotalItem1))
		{
			//echo "<hr>";echo $row['merk'];
			
		?>
            <?php
			$i=1;
			$nomor=$nomor+1; //echo $nomor." | <br>";
			//echo $row['merk'] ;
			if(!$NumRecord==0){

				$queryItem2=mysqli_query("SELECT * FROM itemc1,item WHERE itemc1.kditem=item.kditem  ORDER BY itemc1.kditem ASC LIMIT $Limit1,$Limit2 ");
				while ($DataItem2=mysqli_fetch_array($queryItem2)){
					//echo $row['merk'].",".$DataItem2['merk']."<br>";
					$kdItem1=$row['kditem']; $kdItem2=$DataItem2['kditem'];
					
					$qryInsertC2=mysqli_query("INSERT INTO itemc2(kditem1,kditem2) VALUES ('$kdItem1','$kdItem2') ")or die(mysqli_error());
					//cari jumlah itemset di tabel transaksi
					$queryFindC2=mysqli_query(" SELECT ");
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
		  <td colspan="3"><table width="700" border="1" align="left" cellpadding="0" cellspacing="2" style="border:thin; border-color:#399; padding-left:3px; margin-top:5px;">
<tr style="background:linear-gradient(to top, #CCC, #999 );">
  <td colspan="5">Pembentukan Item C2 (2 itemset)</td>
  </tr>
<tr style="background:linear-gradient(to top, #CCC, #999 );">
			<td width="198">Itemset</td>
			<td width="488"><span class="style7">Support %</span></td>
		</tr>
	<?php
		//kosong tmp transaksi
		
 		$result=mysqli_query("SELECT * FROM itemc2 ORDER BY kditem1,kditem2 ASC ");
		while($rowC2 = mysqli_fetch_array($result))
		{
		?>
		<tr>
			<td><?php 
			$delTmpC2=mysqli_query("DELETE FROM tmp_c2");
			$delTmpT=mysqli_query("DELETE FROM tmp_trans");
			$C2kditem1=$rowC2['kditem1']; $C2kditem2=$rowC2['kditem2'];
			//menampilkan data kditem1 c2
			$MerkItem1=mysqli_query("SELECT * FROM item WHERE kditem='$C2kditem1' ") or die(mysqli_error());
			$DataMerkItem1=mysqli_fetch_array($MerkItem1); echo "[".$DataMerkItem1['kditem']."]".$DataMerkItem1['merk']." , ";
			//menampilkan data kditem2 c2
			$MerkItem2=mysqli_query("SELECT * FROM item WHERE kditem='$C2kditem2' ") or die(mysqli_error());
			$DataMerkItem2=mysqli_fetch_array($MerkItem2); echo "[".$DataMerkItem2['kditem']."]".$DataMerkItem2['merk'];
			?></td>
			<td><?php
			$C2K1=$DataMerkItem1['kditem']; mysqli_query("INSERT INTO tmp_c2 (kditem)values('$C2K1') ");
			$C2K2=$DataMerkItem2['kditem']; mysqli_query("INSERT INTO tmp_c2 (kditem)values('$C2K2') ");
			echo $kalimat="$C2K1,$C2K2<br>"; 
			//echo $kalimat."$kalimat<br><hr>";
            echo "kode c2 = ".$C2K1.",".$C2K2."<br>";
			//mencari data di tabel transaksi
			$queryFindTransaksiC2=mysqli_query("SELECT * FROM transaksi WHERE kdtransaksi='02' ORDER BY kdtransaksi ASC ")or die(mysqli_error());
			while ($dataFindTransaksiC2=mysqli_fetch_array($queryFindTransaksiC2)){
				//echo $dataFindTransaksiC2['kditem']."<br>";
				echo "kode transaksi=".$dataFindTransaksiC2['kdtransaksi']."<br>";
				$dataT=$dataFindTransaksiC2['kditem'];
				$kdFtransaksi=$dataFindTransaksiC2['kdtransaksi'];
				$kditemT=$dataFindTransaksiC2['kditem'];
				$queryInsertT=mysqli_query("INSERT INTO tmp_trans (kditem,kdtransaksi) VALUES ('$kditemT','$kdFtransaksi') ");
				//echo $kalimat2;
				}
			$query_TC2=mysqli_query("select * from tmp_c2,tmp_trans WHERE tmp_c2.kditem=tmp_trans.kditem ORDER BY tmp_c2.kditem ASC");
			$num_TC2=mysqli_num_rows($query_TC2); echo "Jumlah transaksi sama = ".$num_TC2."<br>";
			if($num_TC2=="2"){
				echo "data ad yang sama";
				}else { echo "data tidak ad";}
			$delTmpC2=mysqli_query("DELETE FROM tmp_c2");
		$delTmpT=mysqli_query("DELETE FROM tmp_trans");
			//while($dataTC2=mysqli_fetch_array($query_TC2)){
				//echo $dataTC2['kditem'];
				//}
			?></td>
		</tr>
		<?php }
		?>
</table></td>
    </tr>

</table>
<br /><br />
<p>&nbsp;</p>
</div>
</body>
</html>