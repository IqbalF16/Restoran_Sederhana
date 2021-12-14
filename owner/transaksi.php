<?php 
include 'header.php';
include 'config.php';

	session_start();

	if (empty($_SESSION['username']))
		{
			echo "<script>alert('Login Dulu')
				location.replace('../index.php')</script>";
        }            


	if($_SESSION['level']!='owner'){
		die('Anda bukan owner');
	}
	//gaatek else a
	// g
		
?>
<html>
<body>
	
<h3><span class="glyphicon glyphicon-briefcase"></span>  Laporan Transaksi</h3>

<br/>
<br/>

<form action="cari_trx.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari ID pesanan di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-2">Id Pesanan</th>
		<th class="col-md-2">Total</th>
		<th class="col-md-2">Bayar</th>
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("SELECT * from transaksi where id_pesanan like '%$cari%'");
	}else{
		$brg=mysql_query("SELECT * from transaksi");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['id_pesanan'] ?></td>
			<td><?php echo $b['total'] ?></td>
			<td><?php echo $b['bayar'] ?></td>
			<!-- <td>Rp.<?php echo number_format($b['harga']) ?>,-</td> -->
			<td>
				<!-- <a href="cetak.php?id=<?php echo $b['id']?>" target="_blank" class="btn btn-info" onclick="return confirm('Anda ingin mencetak data ini ?')">Cetak</a> -->
				<a onclick="if(confirm('Apakah anda yakin ingin mencetak data ini ??')){ location.href='cetak.php?id=<?php echo $b['id']?>' }" target="_blank" class="btn btn-info">Cetak</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_transaksi.php?id=<?php echo $b['id']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
</table>
<!-- <ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul> -->
<!-- modal input -->


</body>
</html>
<?php 
include 'footer.php';

?>