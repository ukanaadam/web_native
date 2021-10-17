<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		//simpan perubahan jenis pembayaran
		$tapel = $_REQUEST['tapel'];
		$tingkat = $_REQUEST['tingkat'];
		$jumlah = $_REQUEST['jumlah'];
		
		$sql = mysqli_query($koneksi,"UPDATE jenis_bayar SET jumlah='$jumlah' WHERE th_pelajaran='$tapel' AND tingkat='$tingkat'");
		
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=jenis');
			die();
		} else {
			echo 'ada ERROR dg query';
		}
	} else {
		//form edit jenis pembayaran
		$tapel = $_REQUEST['tapel'];
		$tingkat = $_REQUEST['tingkat'];
		
		$sql = mysqli_query($koneksi,"SELECT * FROM jenis_bayar WHERE th_pelajaran='$tapel' AND tingkat='$tingkat'");
		list($thn,$tk,$jml) = mysqli_fetch_array($sql);
?>
<h2>Edit Jenis Bayar</h2>
<hr>
<form method="post" action="admin.php?hlm=master&sub=jenis&aksi=edit" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="tapel" class="col-sm-2 control-label">Tahun Pelajaran</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="tapel" name="tapel" value="<?php echo $thn; ?>" required autofocus>
		</div>
	</div>
	<div class="form-group">
		<label for="tingkat" class="col-sm-2 control-label">Tingkat</label>
		<div class="col-sm-2">
			<select name="tingkat" id="tingkat" class="form-control">
				<option value="X"<?php echo ($tk=='X') ? 'selected' : ''; ?>>X (sepuluh)</option>
				<option value="XI"<?php echo ($tk=='XI') ? 'selected' : ''; ?>>XI (sebelas)</option>
				<option value="XII"<?php echo ($tk=='XII') ? 'selected' : ''; ?>>XII (dua belas)</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="jumlah" class="col-sm-2 control-label">Jumlah Nominal</label>
		<div class="col-sm-3">
			<div class="input-group">
			<span class="input-group-addon">Rp.</span>
			<input type="text" class="form-control" id="jumlah" name="jumlah" value="<?php echo $jml; ?>" required>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-default">Simpan</button>
			<a href="./admin.php?hlm=master&sub=jenis" class="btn btn-link">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>