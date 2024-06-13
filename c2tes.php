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
<h2 class="art-postheader">Data Tes</h2>
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
<tr style="background:linear-gradient(to top, #CF0, #FF3);">
  <td colspan="6"><a href="hal_admin.php?page=itemc2">>> Lanjutkan Hasil Proses C2</a></td>
</tr>
<tr style="background:linear-gradient(to top, #CCC, #999 );">
  <td colspan="6">Pembentukan Item C2 (2 itemset)</td>
  </tr>
<tr style="background:linear-gradient(to top, #CCC, #999 );">
			<td width="198">Itemset</td>
			<td width="488"><span class="style7">Support %</span></td>
			<td width="488">&nbsp;</td>
		</tr>
	<?php
		//kosong tmp transaksi
		$sql = "SELECT * FROM itemc2 ORDER BY kditem1 , kditem2 ASC LIMIT 0,1";
 		$result = mysqli_query($koneksi, $sql);
		while($rowC2 = mysqli_fetch_array($result))
		{
		?>
		<tr>
			<td><?php 
			$sql = "DELETE FROM tmp_c2";
			$delTmpC2=mysqli_query($koneksi,$sql);
			$sql = "DELETE FROM tmp_trans";
			$delTmpT=mysqli_query($koneksi,$sql);
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
			$sql = "INSERT INTO tmp_c2 (kditem)values('$C2K1')";
			$C2K1=$DataMerkItem1['kditem']; mysqli_query($koneksi,$sql) ;
			$sql = "INSERT INTO tmp_c2 (kditem)values('$C2K2') ";
			$C2K2=$DataMerkItem2['kditem']; mysqli_query($koneksi,$sql);
			echo $kalimat="$C2K1,$C2K2<br>"; 
			//echo $kalimat."$kalimat<br><hr>";
            echo "kode c2 = ".$C2K1.",".$C2K2."<br>";
			//mencari data di tabel transaksi
			$sql = "SELECT * FROM transaksi WHERE kdtransaksi='02' ORDER BY kdtransaksi ASC ";
			$queryFindTransaksiC2=mysqli_query($koneksi,$sql);
			while ($dataFindTransaksiC2=mysqli_fetch_array($queryFindTransaksiC2)){
				//echo $dataFindTransaksiC2['kditem']."<br>";
				echo "kode transaksi=".$dataFindTransaksiC2['kdtransaksi']."<br>";
				$dataT=$dataFindTransaksiC2['kditem'];
				$kdFtransaksi=$dataFindTransaksiC2['kdtransaksi'];
				$kditemT=$dataFindTransaksiC2['kditem'];
				$sql = "INSERT INTO tmp_trans (kditem,kdtransaksi) VALUES ('$kditemT','$kdFtransaksi') ";
				$queryInsertT=mysqli_query($koneksi,$sql);
				//echo $kalimat2;
				}
			$sql = "SELECT * FROM tmp_c2,tmp_trans WHERE tmp_c2.kditem=tmp_trans.kditem ORDER BY tmp_c2.kditem ASC";
			$query_TC2=mysqli_query($koneksi,$sql);
			$num_TC2=mysqli_num_rows($query_TC2); echo "Jumlah transaksi sama = ".$num_TC2."<br>";
			if($num_TC2=="2"){
				echo "data ad yang sama";
				}else { echo "data tidak ad";}
			$sql = "DELETE FROM tmp_c2";
			$delTmpC2=mysqli_query($koneksi,$sql);
			$sql = "DELETE FROM tmp_trans";
			$delTmpT=mysqli_query($koneksi,$sql);
			//while($dataTC2=mysqli_fetch_array($query_TC2)){
				//echo $dataTC2['kditem'];
				//}
			?></td>
			<td>&nbsp;</td>
		</tr>
		<?php }
		?>
		<tr>
		  <td>&nbsp;</td>
		  <td><?php 
	$sql = "SELECT * FROM itemc2 ";
	$query_C2=mysqli_query($koneksi,$sql);
	$support_count="0";
	while ($dataC2=mysqli_fetch_array($query_C2)){
	echo $dataC2['kditem1'].",".$dataC2['kditem2']."<br>";
	$item1=$dataC2['kditem1']; $item2=$dataC2['kditem2'];
	//find transaksi
	//$query_T=mysqli_query("SELECT * FROM transaksi WHERE kditem='$item1' OR kditem='$item2' ORDER BY kdtransaksi ASC")or die(mysqli_error());
	//while($data_Transaksi=mysqli_fetch_array($query_T)){
		//echo "kode item = ".$data_Transaksi['kditem']." | kode transaksi = ".$data_Transaksi['kdtransaksi']."<br>";
		//$d=array($data_Transaksi['kditem'],);
		//}
		//echo $d;
		$sql = "SELECT * FROM transaksi GROUP BY kdtransaksi ORDER BY kdtransaksi ASC";
		$strTransaksi=mysqli_query($koneksi,$sql);
		$NumT=mysqli_num_rows($strTransaksi); echo "num t $NumT<br>";
		while($dataTransaksi=mysqli_fetch_array($strTransaksi)){
		$kdtransaksi=$dataTransaksi['kdtransaksi'];
		$sql = "SELECT kditem FROM transaksi WHERE kdtransaksi='$kdtransaksi' ";
		$display = mysqli_query($koneksi,$sql);
			$arrResult = Array();
			$cnt=0;
			while ($data = mysqli_fetch_row($display))
			{ $arrResult[$cnt++] = $data[0]; }
		if (in_array($item1,  $arrResult)&&in_array($item2, $arrResult))
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
		  $sql = "update itemc2 set support_count='$support_count',persen_support='$persen' WHERE kditem1='$item1' AND kditem2='$item2' ";
		  $udpateC2=mysqli_query($koneksi,$sql);
		}
		$support_count="0";
		//end transaksi
	}

		  ?></td>
		  <td>&nbsp;</td>
    </tr>
		
</table>
<p>&nbsp;</p>
</div>
</body>
</html>