<?php 
include 'header.php';
?>

<?php
error_reporting(0);
$a = mysql_query("select * from user");
?>

<div class="col-md-10" align="center">
	<br><br><br>
	<h3>Selamat datang</h3>	
    <h3><b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></h3>
    <h3></h3>
</div>
<!-- kalender -->
<div class="pull-right">
	<div id="kalender"></div>
</div>

<?php 
include 'footer.php';

?>