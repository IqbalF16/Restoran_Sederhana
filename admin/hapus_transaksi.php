<?php 
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from transaksi where id='$id'");
header("location:transaksi.php");

?>