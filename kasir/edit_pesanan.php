<?php 
include 'header.php';
session_start();

	if(!isset($_SESSION['username'])){
		header("location: ../index.php");
	}

	if($_SESSION['level']!='kasir'){
		die('Anda bukan kasir');
	}
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Pesanan</h3>
<a class="btn" href="pesanan.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id=mysql_real_escape_string($_GET['id']);
$det=mysql_query("select * from pesanan where id='$id'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="update_pesanan.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Pelanggan</td>
				<td><select name="id_pelanggan" class="form-control">
					<option value="">--Pilih--
					<?php
					$qry_plg= @mysql_query("select * from pelanggan");
					while ($d_plg = @mysql_fetch_array($qry_plg))
					{
					?>
		            <option value="<?php echo $d_plg["id"];?>"
					<?php
						if($d_plg["id"]==$d["id_pelanggan"])
							{
								echo "selected";
							}
					?>>
					<?php echo $d_plg["nama_pelanggan"];
					}
					?>
				</select>
				</td>
			</tr>
			<tr>
				<td>Nama Menu</td>
				<td><select name="id_menu" class="form-control">
					<option value="">--Pilih--
					<?php
					$qry_plg= @mysql_query("select * from menu");
					while ($d_plg = @mysql_fetch_array($qry_plg))
					{
					?>
		            <option value="<?php echo $d_plg["id"];?>"
					<?php
						if($d_plg["id"]==$d["id_menu"])
							{
								echo "selected";
							}
					?>>
					<?php echo $d_plg["nama_menu"];
					}
					?>
				</select>
				</td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="text" class="form-control" name="jumlah" value="<?php echo $d['jumlah'] ?>"></td>
			</tr>
			<tr>
				<td>User</td>
				<td><input type="text" name="id_user" size="10" maxlength="100" value="<?php echo $_SESSION['id']?>" readonly> &nbsp;</td>
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