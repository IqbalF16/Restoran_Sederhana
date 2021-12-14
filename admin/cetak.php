<?php
	require 'config.php';
	session_start();
	error_reporting(0);
	if(!isset($_SESSION['username'])){
		header("location: ../index.php");
	}

	
	//gaatek else a
	// g
	// Ambil query
	$id_trx = $_GET['id'];
	$show = mysql_query("SELECT * from transaksi where  id='$id_trx'");
	while ($ct = mysql_fetch_array($show))
	{
		?>

<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pembelian | Kode Transaksi : <?php echo $ct['id']?></title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<!-- Header -->
	<center>
		<h2>Struk Pembelian Resto Iqbal</h2>
		<h4>Jl. Pantura Gresik No. 99 <br><h5>No. 083923054853  Email : restoiqbal@shop.co.id</h6></h4>
	</center><hr>

	<p>
		Tgl cetak : <?php echo date('d-m-Y'); ?><br><br>User : <b><?php echo $_SESSION['nama']?></b>
	</p>
	<p>
		
	</p>

<!-- Isi -->
	<center>
		<table>
			<tr>
				<th colspan="10">Struk pembelian " Resto Iqbal "</th>
			</tr>
			<tr>
				<th>No</th>
				<th>No Transaksi</th>
				<th>ID Pesanan</th>
				<th>Total</th>
			</tr>

			<?php
			{
			
				$no++;
				?>

					<tr>
						<td align="center"><?php echo $no?></td>
						<td align="center"><?php echo $ct['id']?></td>
						<td align="center"><?php echo $ct['id_pesanan']?></td>
						<td align="center">Rp. <?php echo number_format ($ct['total']) ?>.00,-</td>
					</tr>

		</table><br>

		<table>
			<tr>
				<td align="center">Bayar</td>
				<td>Rp. <?php echo number_format ($ct['bayar'])?>.00,-</td>
				<td align="center">Kembalian</td>
				<td>Rp. <?php echo number_format ($ct['bayar']-$ct['total'])?>.00,-</td>
			</tr>
		</table>
						<?php	
						}
			?>

	</center><br>

	<center>
		<p style="font-size: 15px;">Barang yang sudah dibeli tidak boleh dikembalikan<br>kecuali ada perjanjian</p>
	</center><br>

	<center>
		<h3>Terima kasih sudah belanja di Resto Iqbal</h3>
	</center>

	<p style="position: absolute; bottom: 50px; right: -1px;">Hormat kami</p>

</body>
</html>
		<?php
	}
?>
	