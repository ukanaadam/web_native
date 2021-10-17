<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$id = $_REQUEST['id'];
		$tapel = $_REQUEST['tapel'];		
		$sql = mysqli_query($koneksi,"INSERT INTO tapel VALUES('','$tapel')");
		
		if($sql > 0){
			header('location: ./admin.php?hlm=master&sub=tapel');
			die();
		} else {
			echo 'ada ERROR dg query';
		}
	} else {
?>
<h2>Tambah Tahun Pelajaran</h2>
<hr>
<form method="post" action="admin.php?hlm=master&sub=tapel&aksi=baru" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="tapel" class="col-sm-2 control-label">Tahun Pelajaran</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="tapel" name="tapel" placeholder="mmmm/nnnn" required autofocus>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-4">
			<button type="submit" name="submit" class="btn btn-default">Simpan</button>
			<a href="./admin.php?hlm=master&sub=tapel" class="btn btn-link">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>