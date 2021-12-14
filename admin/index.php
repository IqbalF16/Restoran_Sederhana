<?php 
include 'header.php';

	error_reporting(0);
	session_start();
		if (empty($_SESSION['username']))
			{
				echo "<script>alert('Login Dulu')
					location.replace('../index.php')</script>";
            }             

?>

<div class="col-md-10" align="center">
	<br><br><br>
	<h3>Selamat datang <b><?php echo $_SESSION['nama']; ?></b></h3>	
    <h3> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></h3>
    <h3></h3>
</div>
<!-- kalender -->
<div class="pull-right">
	<div id="kalender"></div>
</div>

<?php 
include 'footer.php';

?>