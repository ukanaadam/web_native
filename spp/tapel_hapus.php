<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$id = $_REQUEST['id'];
		$sql = mysqli_query($koneksi,"DELETE FROM tapel WHERE id='$id'");
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=tapel');
			die();
		} else {
			echo 'ada ERROR dengan query';
		}
	} else {
		$id = $_REQUEST['id'];
		$sql = mysqli_query($koneksi,"SELECT tapel FROM tapel WHERE id='$id'");
		list($tapel) = mysqli_fetch_array($sql);
		
		echo '<div class="alert alert-danger">Yakin akan menghapus Tahun Pelajaran: <strong>'.$tapel.'</strong><br><br>';
		echo '<a href="./admin.php?hlm=master&sub=tapel&aksi=hapus&submit=ya&id='.$id.'" class="btn btn-sm btn-success">Ya, Hapus</a> ';
		echo '<a href="./admin.php?hlm=master&sub=tapel" class="btn btn-sm btn-default">Tidak</a>';
		echo '</div>';
	}
}
?>