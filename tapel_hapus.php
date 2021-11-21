<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Beranda</a></li>
		<li class="breadcrumb-item active" aria-current="page">Hapus Tapel</li>
	</ol>
</nav>
<div class="card">
	<div class="card-body">
		<?php
		include 'koneksi.php';
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
					echo "<script>location='admin.php?halaman=tapel'</script>";
				} else {
					echo 'ada ERROR dengan query';
				}
			} else {
				$id = $_REQUEST['id'];
				$sql = mysqli_query($koneksi,"SELECT tapel FROM tapel WHERE id='$id'");
				list($tapel) = mysqli_fetch_array($sql);

				echo '<div class="alert alert-danger">Yakin akan menghapus Tahun Pelajaran: <strong>'.$tapel.'</strong><br><br>';
				echo '<a href="./admin.php?halaman=tapel_hapus&sub=tapel&aksi=hapus&submit=ya&id='.$id.'" class="btn btn-sm btn-success">Ya, Hapus</a> ';
				echo '<a href="./admin.php?hlm=master&sub=tapel" class="btn btn-sm btn-default">Tidak</a>';
				echo '</div>';
			}
		}
		?>
	</div>
</div>