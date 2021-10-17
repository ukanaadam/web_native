<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$nis = $_REQUEST['nis'];
		$sql = mysqli_query($koneksi,"DELETE FROM siswa WHERE nis='$nis'");
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=siswa');
			die();
		} else {
			echo 'ada ERROR dengan query';
		}
	} else {
		$nis = $_REQUEST['nis'];
		$sql = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nis='$nis'");
		list($nis,$siswa,$idjurusan) = mysqli_fetch_array($sql);
		
		echo '<div class="alert alert-danger">Yakin akan menghapus Siswa:';
		echo '<br>Nama  : <strong>'.$siswa.'</strong>';
		echo '<br>NIS   : '.$nis;
		
		$qprodi = mysqli_query($koneksi,"SELECT jurusan FROM jurusan WHERE idjurusan='$idjurusan'");
		list($jurusan) = mysqli_fetch_array($qprodi);
		
		echo '<br>Jurusan : '.$jurusan.' ('.$idjurusan.')<br><br>';
		echo '<a href="./admin.php?hlm=master&sub=siswa&aksi=hapus&submit=ya&nis='.$nis.'" class="btn btn-sm btn-success">Ya, Hapus</a> ';
		echo '<a href="./admin.php?hlm=master&sub=siswa" class="btn btn-sm btn-default">Tidak</a>';
		echo '</div>';
	}
}
?>