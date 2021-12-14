<?php 
include 'config.php';
$id_pelanggan=$_POST['id_pelanggan'];
$id_menu=$_POST['id_menu'];
$jumlah=$_POST['jumlah'];
$id=$_POST['id'];

$qry="INSERT into pesanan values('','$id_pelanggan','$id_menu','$jumlah','$id')";
$insert=mysql_query($qry) or die (mysql_error());
if ($insert) {
			echo "<script>alert('Data Berhasil Di Tambahkan')
			location.replace('pesanan.php')</script>";
		} else	{ echo "<script>alert('Data Gagal Di Tambahkan')
			location.replace('pesanan.php')</script>";
		}

?>