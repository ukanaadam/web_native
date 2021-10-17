<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$idjurusan = $_REQUEST['idjurusan'];
		$sql = mysqli_query($koneksi,"DELETE FROM jurusan WHERE idjurusan='$idjurusan'");
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=jurusan');
			die();
		} else {
			echo 'ada ERROR dengan query';
		}
	} else {
		$idjurusan = $_REQUEST['idjurusan'];
		$sql = mysqli_query($koneksi,"SELECT * FROM jurusan WHERE idjurusan='$idjurusan'");
		list($idjurusan,$jurusan) = mysqli_fetch_array($sql);
		
		echo '<div class="alert alert-danger">Yakin akan menghapus Program Studi: <strong>'.$jurusan.' ('.$idjurusan.')</strong><br><br>';
		echo '<a href="./admin.php?hlm=master&sub=jurusan&aksi=hapus&submit=ya&idjurusan='.$idjurusan.'" class="btn btn-sm btn-success">Ya, Hapus</a> ';
		echo '<a href="./admin.php?hlm=master&sub=jurusan" class="btn btn-sm btn-default">Tidak</a>';
		echo '</div>';
	}
}
?>