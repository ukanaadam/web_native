<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$tapel = $_REQUEST['tapel'];
		$tingkat = $_REQUEST['tingkat'];
		
		$sql = mysqli_query($koneksi,"DELETE FROM jenis_bayar WHERE th_pelajaran='$tapel' AND tingkat='$tingkat'");
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=jenis');
			die();
		} else {
			echo 'ada ERROR dengan query';
		}
	} else {
		$tapel = $_REQUEST['tapel'];
		$tingkat = $_REQUEST['tingkat'];
		
		$sql = mysqli_query($koneksi,"SELECT * FROM jenis_bayar WHERE th_pelajaran='$tapel' AND tingkat='$tingkat'");
		list($thn,$tk,$jml) = mysqli_fetch_array($sql);
		
		echo '<div class="alert alert-danger">Yakin akan menghapus Jenis Pembayaran: <strong>'.$tk.' ('.$thn.')</strong>: Rp. '.$jml.'<br><br>';
		echo '<a href="./admin.php?hlm=master&sub=jenis&aksi=hapus&submit=ya&tapel='.$thn.'&tingkat='.$tk.'" class="btn btn-sm btn-success">Ya, Hapus</a> ';
		echo '<a href="./admin.php?hlm=master&sub=jenis" class="btn btn-sm btn-default">Tidak</a>';
		echo '</div>';
	}
}
?>