<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
		<li class="breadcrumb-item active" aria-current="page">User</li>
	</ol>
</nav>
<div class="card">
	<div class="card-body">
		<?php
		echo '<h2>Daftar User</h2><hr>';
		include 'koneksi.php';

		$sql = mysqli_query($koneksi,"SELECT iduser,username,admin,fullname FROM user ORDER BY iduser");

			//diasumsikan bahwa selalu ada user, minimal user awal yaitu: admin dan kasir
		$no = 1;
		echo '<div class="row">';
		echo '<div class="col-md-12">';
		echo '<table class="table table-bordered">';
		echo '<tr class="info"><th width="30">No.</th><th>Username</th><th>Nama Lengkap</th><th width="50">Admin</th>';
		echo '<th><a href="admin.php?halaman=tambah_user" class="btn btn-default btn-xs">Tambah</a></th></tr>';
		while(list($id,$username,$admin,$fullname) = mysqli_fetch_array($sql)){
			echo '<tr><td>'.$no.'</td>';
			echo '<td>'.$username.'</td>';
			echo '<td>'.$fullname.'</td>';
			echo '<td>';
			echo ($admin == 1) ? '<i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
			<path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
			</svg></i>' : '';
			echo '</td>';
			echo '<td><a href="admin.php?halaman=edit_user&id='.$id.'" class="btn btn-success btn-xs">Edit</a> ';
			echo '<a href="admin.php?halaman=hapus_user&id='.$id.'" class="btn btn-danger btn-xs">Hapus</a></td></tr>';
			$no++;
		}
		echo '</table>';
		echo '</div></div>';
		?>
	</div>
</div>