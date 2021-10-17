<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		//load sub-halaman yang sesuai
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'jenis_baru.php';
				break;
			case 'edit':
				include 'jenis_edit.php';
				break;
			case 'hapus':
				include 'jenis_hapus.php';
				break;
		}
	} else {
		//tampilkan daftar jenis_pembayaran
		$sql = mysqli_query($koneksi,"SELECT * FROM jenis_bayar ORDER BY th_pelajaran DESC, tingkat ASC");
		
		echo '<h2>Jenis Bayar</h2><hr>';
      echo '<div class="row">';
		echo '<div class="col-md-7"><table class="table table-bordered">';
		echo '<tr class="info"><th>#</th><th width="200">Tahun Pelajaran</th><th>Kelas</th><th>Jumlah Nominal</th>';
		echo '<th width="200"><a href="admin.php?hlm=master&sub=jenis&aksi=baru" class="btn btn-default btn-xs">Tambah Data</a></th></tr>';
		
		if(mysqli_num_rows($sql) > 0){
			$no = 1;
			while(list($tapel,$tingkat,$jumlah) = mysqli_fetch_array($sql)){
				echo '<tr><td>'.$no.'</td>';
				echo '<td>'.$tapel.'</td><td>'.$tingkat.'</td><td>Rp <span class="pull-right">'.$jumlah.'</span></td><td>';
				echo '<a href="admin.php?hlm=master&sub=jenis&aksi=edit&tapel='.$tapel.'&tingkat='.$tingkat.'" class="btn btn-success btn-xs">Edit</a> ';
				echo '<a href="admin.php?hlm=master&sub=jenis&aksi=hapus&tapel='.$tapel.'&tingkat='.$tingkat.'" class="btn btn-danger btn-xs">Hapus</a>';
				echo '</td></tr>';
				$no++;
			}
		} else {
			echo '<tr><td colspan="5"><em>Belum ada data!</em></td></tr>';
		}
		
		echo '</table></div></div>';
	}
}
?>