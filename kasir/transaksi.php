<?php 
include 'header.php';
include 'config.php';

	session_start();

	if (empty($_SESSION['username']))
		{
			echo "<script>alert('Login Dulu')
				location.replace('../index.php')</script>";
        }            


	if($_SESSION['level']!='kasir'){
		die('Anda bukan kasir');
	}
	//gaatek else a
	// g
		
?>
<html>
<body>
	
<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Transaksi</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Transaksi</button>
<br/>
<br/>

<form action="cari_trx.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari transaksi di sini .." aria-describedby="basic-addon1" name="cari">	
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
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Transaksi Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_trx_act.php" method="post">
					<div class="form-group">
						<label>ID Pesanan</label>
						<select name="id_pesanan" id="id_pesanan" class="form-control">
							<option value="-- Pilih pesanan-nya --" selected>-- Pilih pesanan-nya --</option>
							<optgroup label="Pesanan">
								<?php 
								$q_ord = @mysql_query("SELECT * from pesanan order by id ASC");
								while ($iord = @mysql_fetch_array($q_ord)){?>
									<?php 
										$id_menu = $iord['id_menu'];
										// GAE NJEPET REGO MENU
										$__ = @mysql_query("SELECT * FROM menu WHERE id = '$id_menu'");
										$fq = @mysql_fetch_array($__);
									?>
									<option value="<?php echo $iord['id']?>" total="<?php echo $fq['harga']*$iord['jumlah']?>">[<?php echo $iord['id']?>] - <?php echo $iord['id_pelanggan']?></option>
								<?php } ?>
							</optgroup>
						</select>
					</div>		
					<div class="form-group">
						<label>Total</label>
						<input type="text" name="total" placeholder="Total" id="total" class="form-control" readonly>
					</div>											
					<div class="form-group">
						<label>Bayar</label>
						<input type="text" name="bayar" placeholder="Bayar" class="form-control" required>
					</div>			
					<!-- Cobaken se -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	const id_pesanan = document.getElementById('id_pesanan')
	const total = document.getElementById('total')

	// EVENT
	id_pesanan.addEventListener('change', function(e) {
		total.value = this.options[this.selectedIndex].getAttribute('total')
	})
</script>


</body>
</html>
<?php 
include 'footer.php';

?>