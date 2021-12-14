<?php 
include 'config.php';
$id=$_POST['id'];
$nama_menu=$_POST['nama_menu'];
$harga=$_POST['harga'];

mysql_query("update menu set nama_menu='$nama_menu', harga='$harga' where id='$id'");
header("location:menu.php");

?>