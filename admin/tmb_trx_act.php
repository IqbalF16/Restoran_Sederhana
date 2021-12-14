<?php 
include 'config.php';
$id_pesanan=$_POST['id_pesanan'];
$total=$_POST['total'];
$bayar=$_POST['bayar'];

$qry="INSERT into transaksi values('','$id_pesanan','$total','$bayar')";
$insert=mysql_query($qry) or die (mysql_error());
if ($insert) {
			echo "<script>alert('Data Berhasil Di Tambahkan')
			location.replace('transaksi.php')</script>";
		} else	{ echo "<script>alert('Data Gagal Di Tambahkan')
			location.replace('transaksi.php')</script>";
		
}
?>