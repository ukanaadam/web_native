<?php
include 'koneksi.php';
?>
<div class="card">
  <div class="card-header">
    Pembayaran SPP
  </div>
  <div class="card-body">
  	<form method="post">
  		<input required type="text" placeholder="masukan NIS" class="form-control" name="nis">
  		<button name="cari"  style="margin-top: 30px" class="btn btn-primary">
  			cari
  		</button>
  		
  	</form>
  	<div style="margin-top: 20px">
  		<?php
  	if (isset($_POST['cari'])) 
  	{
  		$nis=$_POST['nis'];
$qsiswa = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nis='$nis'");
		list($nis,$nama,$idprodi) = mysqli_fetch_array($qsiswa);
  		echo '<div class="row">';
		echo '<div class="col-sm-9"><table class="table table-bordered">';
		echo '<tr><td colspan="2">Nomor Induk</td><td colspan="3">'.$nis.'</td>';
      echo '<td><a href="./cetak.php?nis='.$nis.'" target="_blank" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> cetak semua</a></td></tr>';
		echo '<tr><td colspan="2">Nama Siswa</td><td colspan="4">'.$nama.'</td></tr>';
      
		echo '<tr><td colspan="2">Pembayaran</td><td colspan="4">';
  		echo '</td></tr>';
		echo '<tr class="info"><th width="50">#</th><th width="100">Kelas</th><th>Bulan</th><th>Tanggal Bayar</th><th>Jumlah</th>';
		echo '<th>&nbsp;</th>';
		echo '</tr>';
		$qbayar = mysqli_query($koneksi,"SELECT kelas,bulan,tgl_bayar,jumlah FROM pembayaran WHERE nis='$nis' ORDER BY tgl_bayar DESC");
		if(mysqli_num_rows($qbayar) > 0){
			$no = 1;
			while(list($kelas,$bulan,$tgl,$jumlah) = mysqli_fetch_array($qbayar)){
				echo '<tr><td>'.$no.'</td>';
				echo '<td>'.$kelas.'</td>';
				echo '<td>'.$bulan.'</td>';
				echo '<td>'.$tgl.'</td>';
				echo '<td>'.$jumlah.'</td><td>';
				
				if( $_SESSION['admin'] == 1 ){
					echo '<a href="./admin.php?hlm=bayar&submit=hapus&kls='.$kelas.'&nis='.$nis.'&bln='.$bulan.'" class="btn btn-danger btn-xs">Hapus</a>';
				}
            echo ' <a href="./cetak.php?submit=nota&kls='.$kelas.'&nis='.$nis.'&bln='.$bulan.'" target="_blank" class="btn btn-success btn-xs"><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
  <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
  <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
</svg></i></a>';
				echo '</td></tr>';
				
				$no++;
			}
		} else {
			echo '<tr><td colspan="6"><em>Belum ada data!</em></td></tr>';
		}
  	}
  	?>
  	</div>
  </div>
</div>