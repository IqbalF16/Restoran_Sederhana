<?php 
include 'header.php';
include 'config.php';

session_start();
	if (empty($_SESSION['username']))
		{
			echo "<script>alert('Login Dulu')
				location.replace('../index.php')</script>";
        }            

	if($_SESSION['level']!='admin'){
		die('Anda bukan admin');
	}
	//gaatek else a
	// g
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Pelanggan</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Pelanggan</button>
<br/>
<br/>

<form action="cari_plg.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari Data Pelanggan di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-2">Nama Pelanggan</th>
		<th class="col-md-2">Jenis Kelamin</th>
		<th class="col-md-2">No HP</th>
		<th class="col-md-2">Alamat</th>
		<th class="col-md-2">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("SELECT * from pelanggan where nama_pelanggan like '%$cari%'");
	}else{
		$brg=mysql_query("SELECT * from pelanggan");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['nama_pelanggan'] ?></td>
			<td><?php echo $b['jenis_kelamin'] ?></td>
			<td><?php echo $b['no_hp'] ?></td>
			<td><?php echo $b['alamat'] ?></td>
			<td>
				<a href="edit_pelanggan.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_pelanggan.php?id=<?php echo $b['id']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
</table>
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Pelanggan Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_plg_act.php" method="post">
					<div class="form-group">
						<label>Nama Pelanggan</label>
						<input name="nama_pelanggan" type="text" class="form-control" placeholder="Nama Pelanggan .." required="required">
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<select name="jenis_kelamin" class="form-control" required="required">
							<option value="">--Pilih--</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>													
					<div class="form-group">
						<label>NO HP</label>
						<input name="no_hp" type="text" class="form-control" required="required" placeholder="No HP..">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input name="alamat" type="text" class="form-control" required="required" placeholder="Alamat ..">
					</div>
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