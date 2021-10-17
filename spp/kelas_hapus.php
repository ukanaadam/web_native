<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		//hapus kelas beserta seluruh siswa di dalamnya
		$kelas = $_REQUEST['kelas'];
		$tapel = $_REQUEST['tapel'];
		
		$sql = mysqli_query($koneksi,"DELETE FROM kelas WHERE kelas='$kelas' AND th_pelajaran='$tapel'");
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=kelas');
			die();
		} else {
			echo 'ada ERROR dengan query';
		}
	} else {
		//dialog untuk memastikan proses hapus dilakukan secara sadar
		$kelas = $_REQUEST['kelas'];
		$tapel = $_REQUEST['tapel'];
		
		echo '<div class="alert alert-danger">Yakin akan menghapus Kelas beserta isinya:';
		echo '<br>Kelas  : <strong>'.$kelas.'</strong>';
		echo '<br>Tahun Pelajaran: '.$tapel;
		
		echo '<br><br>Aksi ini permanen!<br><br>';
		echo '<a href="./admin.php?hlm=master&sub=kelas&aksi=hapus&submit=ya&kelas='.$kelas.'&tapel='.$tapel.'" class="btn btn-sm btn-success">Ya, Hapus</a> ';
		echo '<a href="./admin.php?hlm=master&sub=kelas" class="btn btn-sm btn-default">Tidak</a>';
		echo '</div>';
	}
}
?>