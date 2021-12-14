<?php 
session_start();
error_reporting(0);
include 'admin/config.php';

$username=$_POST['username'];
$password=$_POST['password'];

$login=mysql_query("select * from user where username='$username' and password='$password'")or die(mysql_error());
$cek = mysql_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){
	$data = mysql_fetch_assoc($login);

	$_SESSION['id'] = $data['id'];
	$_SESSION['username'] = $data['username'];
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['level'] = $data['level'];
	// cek jika user login sebagai admin
	if($data['level']=="admin"){

		// buat session login dan username
		$_SESSION['id'] = $data['id'];
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/index.php");
	}
	// cek jika user login sebagai pegawai
	else if($data['level']=="waiter"){
		// buat session login dan username
		$_SESSION['id'] = $data['id'];
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "waiter";
		// alihkan ke halaman dashboard waiter
		header("location:waiter/index.php");

	}else if($data['level']=="kasir"){
		// buat session login dan username
		$_SESSION['id'] = $data['id'];
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "kasir";
		// alihkan ke halaman dashboard kasir
		header("location:kasir/index.php");

	}else if($data['level']=="owner"){
		// buat session login dan username
		$_SESSION['id'] = $data['id'];
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "owner";
		// alihkan ke halaman dashboard owner
		header("location:owner/index.php");

	

	}else{
		header("location:index.php?pesan=gagal")or die(mysql_error());
		// mysql_error();
	}

}
else{
	header("location:index.php?pesan=gagal");
}
 ?>