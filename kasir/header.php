<!DOCTYPE html>
<html>
<head>
	<?php 
	error_reporting(0);
	session_start();
	include 'cek.php';
	include 'config.php';
	include 'login_act.php';
	?>
	<title>Restoran</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>	
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#"><?php echo $_SESSION['username']  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="row">
			

				<div class="col-xs-6 col-md-12">
				</div>
				
		</div>

		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>
			<?php 
			$level = $_SESSION['level'] == 'kasir';
			if($level){
			?>
			<li><a href="pesanan.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Pesanan</a></li>
			<li><a href="transaksi.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Transaksi</a></li>
			<?php } else { ?>
			<li><a href="pelanggan.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Pelanggan</a></li>        								
			<li><a href="menu.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Menu</a></li>
			
			<?php } ?>
			<li><a onclick="if(confirm('Apakah anda yakin ingin Logout?')){ location.href='logout.php ?>' }"><span class="glyphicon glyphicon-log-out"></span>  Log Out</a>		
		</ul>
	</div>
	<div class="col-md-10">