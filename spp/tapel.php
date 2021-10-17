<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'tapel_baru.php';
				break;
			case 'edit':
				include 'tapel_edit.php';
				break;
			case 'hapus':
				include 'tapel_hapus.php';
				break;
		}
	} else {
		$sql = mysqli_query($koneksi,"SELECT * FROM tapel ORDER BY tapel DESC");
		echo '<h2>Konfigurasi Tahun Pelajaran</h2><hr>';
      echo '<div class="row">';
		echo '<div class="col-md-6"><table class="table table-bordered">';
		echo '<tr class="info"><th width="30">#</th><th width="100">Tahun Pelajaran</th>';
		echo '<th width="200"><a href="./admin.php?hlm=master&sub=tapel&aksi=baru" class="btn btn-default btn-xs">Tambah Data</a></th></tr>';
		
		if( mysqli_num_rows($sql) > 0 ){
			$no = 1;
			while(list($id,$tapel) = mysqli_fetch_array($sql)){
				echo '<tr><td>'.$no.'</td>';
				echo '<td>'.$tapel.'</td>';
				echo '<td><a href="./admin.php?hlm=master&sub=tapel&aksi=edit&id='.$id.'" class="btn btn-success btn-xs">Edit</a> ';
				echo '<a href="./admin.php?hlm=master&sub=tapel&aksi=hapus&id='.$id.'" class="btn btn-danger btn-xs">Hapus</a></td>';
				echo '</tr>';
				$no++;
			}
		} else {
			echo '<tr><td colspan="4"><em>Belum ada data</em></td></tr>';
		}
		
		echo '</table></div></div>';
	}
}
?>