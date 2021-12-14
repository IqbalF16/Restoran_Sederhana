<?php 
include 'config.php';
$nama_pelanggan=$_POST['nama_pelanggan'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$no_hp=$_POST['no_hp'];
$alamat=$_POST['alamat'];

$qry="INSERT into pelanggan values('','$nama_pelanggan','$jenis_kelamin','$no_hp','$alamat')";
$insert=mysql_query($qry) or die (mysql_error());
if ($insert) {
			echo "<script>alert('Data Berhasil Di Tambahkan')
			location.replace('pelanggan.php')</script>";
		} else { echo "<script>alert('Data Gagal Di Tambahkan')
			location.replace('pelanggan.php')</script>";
		}
 ?>