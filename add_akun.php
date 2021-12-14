<?php 
include 'config.php';
$nama=$_POST['nama'];
$username=$_POST['username'];
$password=$_POST['password'];
$level=$_POST['level'];


$qry="INSERT into user values('','$nama','$username', '$password', '$level')";
$insert=mysql_query($qry) or die (mysql_error());
if ($insert) {
			echo "<script>alert('Data Berhasil Di Tambahkan')
			location.replace('index.php')</script>";
		} else {
			echo "<script>alert('Data Gagal Di Tambahkan')
			location.replace('index.php')</script>";
		}

 ?>