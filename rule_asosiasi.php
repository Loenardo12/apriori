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
<h2 class="art-postheader">Asosiasi Rule</h2>
<?php
include "koneksi.php";
?>
<form name="form1" method="post" enctype="multipart/form-data" action="simpan-item.php">
<table width="700" border="1" align="left" cellpadding="0" cellspacing="2" style="border:thin; border-color:#399; padding-left:3px; margin-top:5px;">
<tr style="background:linear-gradient(to top, #CCC, #999 );">
  <td colspan="6">Tabel 1 : Pembentukan Item C2 (2 itemset) yang memenuhi minum support count <?php
  $sql = "SELECT * FROM rule WHERE kdrule='R2' ";
  $strRule=mysqli_query($koneksi, $sql);
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
		$sql = "SELECT * FROM itemc2 WHERE persen_support >='$nRule' ";
 		$result=mysqli_query($koneksi , $sql);
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
			<td><?php echo $rowC2['support_count'];?></td>
			<td><?php echo substr($rowC2['persen_support'],0,5)."%";?></td>
		</tr>
		<?php }
		?>
</table> 
</form></div>
<div class="view_data">
<table width="700" border="1" align="left" cellpadding="0" cellspacing="2" style="border:thin; border-color:#399; padding-left:3px; margin-top:5px;">
<tr style="background:linear-gradient(to top, #CCC, #999 );">
  <td colspan="6">Tabel 2 : Pembentukan Aturan Asosiasi Item C2 , berdasarkan pada (Tabel 1) item C2</td>
  </tr>
<tr style="background:linear-gradient(to top, #CCC, #999 );">
			<td width="459">Aturan</td>
			<td colspan="2"><span class="style7">Confidence</span></td>
		</tr>
	<?php
		//kosong tmp transaksi
		$sql = "SELECT * FROM itemc2 WHERE persen_support >='$nRule' ";
 		$result=mysqli_query($koneksi,$sql);
		while($rowC2 = mysqli_fetch_array($result))
		{
		?>
		<tr>
			<td><?php
            $C2kditem1=$rowC2['kditem1']; $C2kditem2=$rowC2['kditem2'];
			//menampilkan data kditem1 c2
			$sql = "SELECT * FROM item WHERE kditem='$C2kditem1' ";
			$MerkItem1=mysqli_query($koneksi,$sql);
			echo "Jika Membeli ";
			$DataMerkItem1=mysqli_fetch_array($MerkItem1); echo "[".$DataMerkItem1['kditem']."]".$DataMerkItem1['merk']." , ";
			//menampilkan data kditem2 c2
			echo " Maka akan membeli "; 
			$sql ="SELECT * FROM item WHERE kditem='$C2kditem2' ";
			$MerkItem2=mysqli_query($koneksi,$sql) ;
			$DataMerkItem2=mysqli_fetch_array($MerkItem2); echo "[".$DataMerkItem2['kditem']."]".$DataMerkItem2['merk'];
			?></td>
			<td width="118"><?php
            //mencari nilai confidence
			$kditem=$C2kditem1;
			$sql = "SELECT * FROM transaksi WHERE kditem='$kditem' " ;
			$query_T=mysqli_query($koneksi,$sql);
			$num_T=mysqli_num_rows($query_T); echo $rowC2['support_count']."/".$num_T;

			?></td>
			<td width="105"><?php
            $support_count=$rowC2['support_count'];
			$Confidence=$support_count/$num_T*100; echo substr($Confidence,0,5)."%";
			?></td>
		</tr>
		<tr>
		  <td><?php
          //mencari data kebalikannya
			echo " Jika membeli ";
			$sql = "SELECT * FROM item WHERE kditem='$C2kditem2' ";
			$MerkItem2=mysqli_query($koneksi,$sql) ;
			$DataMerkItem2=mysqli_fetch_array($MerkItem2); echo "[".$DataMerkItem2['kditem']."]".$DataMerkItem2['merk'];
			
			$sql = "SELECT * FROM item WHERE kditem='$C2kditem1' ";
			$MerkItem1=mysqli_query($koneksi,$sql) ;
			echo " Maka akan membeli ";
			$DataMerkItem1=mysqli_fetch_array($MerkItem1); echo "[".$DataMerkItem1['kditem']."]".$DataMerkItem1['merk']." , ";
			//menampilkan data kditem2 c2
		  ?></td>
		  <td><?php
            //mencari nilai confidence
			$kditem=$C2kditem2;
			$sql ="SELECT * FROM transaksi WHERE kditem='$kditem' ";
			$query_T2=mysqli_query($koneksi,$sql);
			$num_T2=mysqli_num_rows($query_T2); echo $rowC2['support_count']."/".$num_T2;
			//while ($data_T=mysqli_fetch_array($query_T)){
				//echo $data_T['kditem']."<br>";
				//}
			?></td>
		  <td><?php
            $support_count2=$rowC2['support_count'];
			$Confidence2=$support_count2/$num_T2*100; echo substr($Confidence2,0,5)."%";
			?></td>
    </tr>
		<?php }
		?>
</table>

</div>
</body>
</html>