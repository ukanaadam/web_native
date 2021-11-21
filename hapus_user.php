<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Beranda</a></li>
		<li class="breadcrumb-item active" aria-current="page">Hapus User</li>
	</ol>
</nav>
<?php
include 'koneksi.php';
if( empty( $_SESSION['iduser'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if(isset($_REQUEST['submit'])){
		$id = $_REQUEST['id'];
		$sql = mysqli_query($koneksi,"DELETE FROM user WHERE iduser='$id'");
		
		if($sql > 0){
			 echo "<script>location='admin.php?halaman=user'</script>";
		} else {
			echo '<div class="alert alert-warning" role="alert">ada ERROR dengan query!</div>';
		}
	} else {
		//tampilkan konfirmasi hapus user
		$id = $_REQUEST['id'];
		$sql = mysqli_query($koneksi,"SELECT username,fullname FROM user WHERE iduser='$id'");
		list($username,$fullname) = mysqli_fetch_array($sql);
		
		echo '<div class="alert alert-danger">Yakin akan menghapus User: <strong>'.$fullname.' ('.$username.')</strong> ?<br><br>';
		echo '<a href="./admin.php?halaman=hapus_user&aksi=hapus&submit=ya&id='.$id.'" class="btn btn-sm btn-success">Ya, Hapus</a> ';
		echo '<a href="./admin.php?hlm=master" class="btn btn-sm btn-default">Tidak</a>';
		echo '</div>';
	}
}
?>