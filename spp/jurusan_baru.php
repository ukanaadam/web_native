<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$idjurusan = $_REQUEST['idjurusan'];
		$jurusan = $_REQUEST['jurusan'];
		
		$sql = mysqli_query($koneksi,"INSERT INTO jurusan VALUES('$idjurusan','$jurusan')");
		
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=jurusan');
			die();
		} else {
			echo 'ada ERROR dg query';
		}
	} else {
?>
<h2>Tambah Jurusan</h2>
<hr>
<form method="post" action="admin.php?hlm=master&sub=jurusan&aksi=baru" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="idjurusan" class="col-sm-2 control-label">Kode Jurusan</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="idjurusan" name="idjurusan" placeholder="Kode Jurusan" required autofocus>
		</div>
	</div>
	<div class="form-group">
		<label for="jurusan" class="col-sm-2 control-label">Nama Jurusan</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Nama Jurusan" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-default">Simpan</button>
			<a href="./admin.php?hlm=master&sub=jurusan" class="btn btn-link">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>