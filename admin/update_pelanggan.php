<?php 
include 'config.php';
$id=$_POST['id'];
$nama_pelanggan=$_POST['nama_pelanggan'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$no_hp=$_POST['no_hp'];
$alamat=$_POST['alamat'];

mysql_query("update pelanggan set nama_pelanggan='$nama_pelanggan', jenis_kelamin='$jenis_kelamin', no_hp='$no_hp', alamat='$alamat' where id='$id'");
header("location:pelanggan.php");

?>