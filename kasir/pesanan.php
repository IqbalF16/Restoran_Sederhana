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

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Pesanan</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Pesanan</button>
<br/>
<br/>

<form action="cari_psn.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari pesanan melalui nama pelanggan di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-1">ID Pesanan</th>
		<th class="col-md-2">Nama Pelanggan</th>
		<th class="col-md-2">Nama Menu</th>
		<th class="col-md-1">Jumlah</th>
		<th class="col-md-2">User</th>
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("SELECT P.id, C.nama_pelanggan, M.nama_menu, P.jumlah, U.nama from pesanan P, menu M, pelanggan C, user U where P.id_menu = M.id AND P.id_pelanggan = C.id AND P.id_user = U.id AND C.nama_pelanggan like '%$cari%'");
	}else{
		$brg=mysql_query("SELECT P.id, C.nama_pelanggan, M.nama_menu, P.jumlah, U.nama from pesanan P, menu M, pelanggan C, user U where P.id_menu = M.id AND P.id_pelanggan = C.id AND P.id_user = U.id");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['id'] ?></td>
			<td><?php echo $b['nama_pelanggan'] ?></td>
			<td><?php echo $b['nama_menu'] ?></td>
			<td><?php echo $b['jumlah'] ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td>
				<a href="edit_pesanan.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_pesanan.php?id=<?php echo $b['id']; ?>' }" class="btn btn-danger">Hapus</a>
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
				<h4 class="modal-title">Tambah Pesanan Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_psn_act.php" method="post">
					<div class="form-group">
						<label>Pelanggan</label>
						<select name="id_pelanggan" class="form-control">
							<option value="">--Pilih--</option>
							<?php
							$tampil=mysql_query("select * from pelanggan");
							while($w=mysql_fetch_array($tampil))
							{
							?>
							<option value="<?php echo $w["id"];?>"><?php echo $w["nama_pelanggan"];?>
							<?php
							}
							?>
						</select>
					</div>		
					<div class="form-group">
						<label>Nama Menu</label>
						<select name="id_menu" class="form-control">
							<option value="">--Pilih--</option>
							<?php
							$tampil=mysql_query("select * from menu");
							while($w=mysql_fetch_array($tampil))
							{
							?>
							<option value="<?php echo $w["id"];?>"><?php echo $w["nama_menu"];?>
							<?php
							}
							?>
						</select>
					</div>											
					<div class="form-group">
						<label>Jumlah</label>
						<input name="jumlah" type="number" class="form-control">
					</div>	
					<div class="form-group">
						<label>User</label>
						<input name="id" type="text" class="form-control" value="<?php echo $_SESSION['id']?>" title="Nama : <?php echo $_SESSION['nama']?>" readonly>

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



<?php 
include 'footer.php';

?>