<?php 
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from menu where id='$id'");
header("location:menu.php");

?>