<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Pelanggan</h3>
<a class="btn" href="pelanggan.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id=mysql_real_escape_string($_GET['id']);
$det=mysql_query("select * from pelanggan where id='$id'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="update_pelanggan.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Pelanggan</td>
				<td><input type="text" class="form-control" name="nama_pelanggan" value="<?php echo $d['nama_pelanggan'] ?>"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<?php $jenis_kelamin = $d['jenis_kelamin']; ?>
				<td><select name="jenis_kelamin" class="form-control" required="required">
							<option <?php echo ($jenis_kelamin == 'Laki-laki') ? "selected": "" ?>>Laki-laki</option>
							<option <?php echo ($jenis_kelamin == 'Perempuan') ? "selected": "" ?>>Perempuan</option>
					</select>       
				</td>
			</tr>
			<tr>
				<td>No HP</td>
				<td><input type="text" class="form-control" name="no_hp" value="<?php echo $d['no_hp'] ?>"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" class="form-control" name="alamat" value="<?php echo $d['alamat'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
<?php include 'footer.php'; ?>