<?php 
include 'config.php';
$nama_menu=$_POST['nama_menu'];
$harga=$_POST['harga'];

$qry="INSERT into menu values('','$nama_menu','$harga')";
$insert=mysql_query($qry) or die (mysql_error());
if ($insert) {
			echo "<script>alert('Data Berhasil Di Tambahkan')
			location.replace('menu.php')</script>";
		} else {
			echo "<script>alert('Data Gagal Di Tambahkan')
			location.replace('menu.php')</script>";
		}

 ?>