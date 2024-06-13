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

</script>
</head>
<body>
<div class="konten_tabel">
<h2 class="art-postheader">Data Proses C3</h2>
<a style="padding:3px 6px 3px 6px; border:1px solid #06F;"  href="hal_admin.php?page=proses">Proses C1</a>
<a style="padding:3px 6px 3px 6px; border:1px solid #06F;"  href="hal_admin.php?page=proses-c2">Proses C2</a>
<a style="padding:3px 6px 3px 6px; border:1px solid #06F;"  href="hal_admin.php?page=proses-c3">Proses C3</a>
<?php
include "koneksi.php";
?>
<form name="form1" method="post" enctype="multipart/form-data" action="simpan-item.php">
  
</form></div>
<div class="view_data">
<table width="504" border="1" align="left" cellpadding="0" cellspacing="2" style="border:thin; border-color:#399; padding-left:3px; margin-top:5px;">
<tr style="background:linear-gradient(to top, #CF0, #FF3);">
  <td colspan="6"><span class="style7"><a  href="hal_admin.php?page=proses-c3_hasil">>> Lanjutkan Proses C3</a></span></td>
</tr>
<tr style="background:linear-gradient(to top, #CCC, #999 );">
  <td colspan="6">Data Hasil Pembentukan C2 Sebelumnya</td>
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
<table width="750" border="1" align="left" cellpadding="0" cellspacing="2" style="border:thin; border-color:#399; padding-left:3px; margin-top:5px;">
<tr style="background:linear-gradient(to top, #CCC, #999 );">
  <td colspan="6"><strong>Inisialisasi Proses Pembentukan Item C3 (3 itemset)</strong>| <?php 
  $QuerySumItemC1=mysqli_query("SELECT * FROM itemc2");
  $SumItemC1=mysqli_num_rows($QuerySumItemC1);
  echo "Jumlah Item = " .$SumItemC1; ?></td>
  </tr>
<tr style="background:linear-gradient(to top, #CCC, #999 );">
  <td width="79">No</td>
			<td width="268"><span class="style7">Itemset</span></td>
			<td width="385"></td>
	</tr>
		<tr>
		  <td colspan="2"><?php
		$nomor=0;
		//$qryTotalItem1=mysqli_query(" SELECT * FROM itemc2,item WHERE itemc2.kditem1=item.kditem GROUP BY itemc2.kditem1 ORDER BY itemc2.kditem1 ASC  ");
		$qryTotalItem1=mysqli_query(" SELECT * FROM itemc2 GROUP BY kditem1  ");
		$SumTotalItem1=mysqli_num_rows($qryTotalItem1); 
		$NumRecord=$SumTotalItem1; 
		$Limit1=1; $Limit2=$NumRecord;
		//kosongkan tabel itemc2
		mysqli_query("DELETE FROM itemc3")or die(mysqli_error());
		//menampilkan data dasar itemc1
		while($row = mysqli_fetch_array($qryTotalItem1))
		{
			$kditem1=$row['kditem1']; $kditem2=$row['kditem2'];
			echo "<hr>";echo $row['kditem1'].",".$row['kditem2']."<br>"; //.",".$data_LimitC2['kditem2'];
			$query_LimitC2=mysqli_query("SELECT * FROM itemc2 WHERE kditem1='$kditem1' LIMIT 1,$NumRecord ");
			while($data_LimitC2=mysqli_fetch_array($query_LimitC2)){
				echo $kditem1.",".$kditem2.",".$data_LimitC2['kditem2']."<br>";
				$kditem3=$data_LimitC2['kditem2'];
				$str_InputC2=mysqli_query("INSERT INTO itemc3 (kditem1,kditem2,kditem3) VALUES ('$kditem1','$kditem2','$kditem3') ");
				}
				//$NumRecord=0;
		}
        ?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
		  <td colspan="3"></td>
    </tr>

</table>
<br /><br />
<p>&nbsp;</p>
</div>
</body>
</html>