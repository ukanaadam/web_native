<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		//proses INSERT, UPDATE, dan DELETE
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'jurusan_baru.php';
				break;
			case 'edit':
				include 'jurusan_edit.php';
				break;
			case 'hapus':
				include 'jurusan_hapus.php';
				break;
		}
	} else {
		//menampilkan isi data dalam tabel
		$sql = mysqli_query($koneksi,"SELECT * FROM jurusan ORDER BY idjurusan");
		echo '<h2>Daftar Jurusan</h2><hr>';
      echo '<div class="row">';
		echo '<div class="col-md-9"><table class="table table-bordered">';
		echo '<tr class="info"><th>#</th><th width="100">Kode Jurusan</th><th>Nama Jurusan</th>';
		echo '<th width="200"><a href="./admin.php?hlm=master&sub=jurusan&aksi=baru" class="btn btn-default btn-xs">Tambah Data</a></th></tr>';
		
		if( mysqli_num_rows($sql) > 0 ){
			$no = 1;
			while(list($idjurusan,$jurusan) = mysqli_fetch_array($sql)){
				echo '<tr><td>'.$no.'</td>';
				echo '<td>'.$idjurusan.'</td>';
				echo '<td>'.$jurusan.'</td>';
				echo '<td><a href="./admin.php?hlm=master&sub=jurusan&aksi=edit&idjurusan='.$idjurusan.'" class="btn btn-success btn-xs">Edit</a> ';
				echo '<a href="./admin.php?hlm=master&sub=jurusan&aksi=hapus&idjurusan='.$idjurusan.'" class="btn btn-danger btn-xs">Hapus</a></td>';
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