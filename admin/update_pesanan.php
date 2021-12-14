<?php 
include 'config.php';
$id=$_POST['id'];
$id_pelanggan=$_POST['id_pelanggan'];
$id_menu=$_POST['id_menu'];
$jumlah=$_POST['jumlah'];

mysql_query("update pesanan set id_pelanggan='$id_pelanggan', id_menu='$id_menu', jumlah='$jumlah' where id='$id'");
header("location:pesanan.php");

?>