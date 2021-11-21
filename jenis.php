
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
		<li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
	</ol>
</nav>
<div class="card">
	<div class="card-header">
		<strong class="card-title">Jenis Bayar</strong>
	</div>
	<div class="card-body">
		<a style="margin-bottom: 20px" href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-primary btn-xs"><i style="margin-right=20px "></i> Tambah Data</a> <table class="table table-bordered">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Tahun Pelajaran</th>
					<th scope="col">Kelas</th>
					<th scope="col">Jumlah nominal</th>

					<th scope="col">Aksi</th>
				</tr>
			</thead>
			<?php
			include 'koneksi.php';
			$sql = mysqli_query($koneksi,"SELECT * from jenis_bayar");
			?>
			<tbody>
				<?php   

				$no=1;
				while(list($th_pelajaran,$tingkat,$jumlah)=mysqli_fetch_array($sql)){?>
					<tr>
						<th scope="row"><?php echo $no?></th>
						<td><?php echo $th_pelajaran?></td>

						<td><?php echo $tingkat?></td>
						<td><?php echo $jumlah?></td>
						<td>
							<button data-toggle="modal" data-target="#hapus<?php echo $tingkat?>" type="button" class="btn btn-outline-danger btn-xs">
								<i>
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
										<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
										<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
									</svg>
								</i>
							</button>
							<div class="modal fade" id="hapus<?php echo $tingkat?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<h5>Apa Anda Yakin Akan Menghapus jenis bayar <b><?php echo $th_pelajaran  ?></b></h5>
										</div>
										<div class="modal-footer">
											<a href="admin.php?halaman=hapus_jenis&id=<?php echo $tingkat?>"class="btn btn-danger">Hapus</a>
										</div>
									</div>
								</div>
							</div>
							<a href="admin.php?halaman=jenis_edit&tapel=<?php echo $th_pelajaran?>&tingkat=<?php echo $tingkat?>" data-target=""  class="btn btn-outline-primary btn-xs">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
									<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
								</svg>
							</a>
							<div class="modal fade" id="edit_jenis<?php echo $tingkat?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											
										</div>
										
								</div>
							</div>
							
							

						</td>
					</tr>
					<?php $no++?>
					
				<?php }?>
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="post">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">jenis bayar </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputEmail4">Tahun Pelajaran</label>
							<input name="tahun" type="text" class="form-control" id="inputEmail4" placeholder="Tahun Pelajaran">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">Kelas</label>
							<input name="kelas" type="text" class="form-control" id="inputPassword4" placeholder="Masukan Kelas">
						</div>
						<div class="form-group col-md-12">
							<label>Nominal</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text">Rp</div>
								</div>
								<input type="text" name="nominal"  class="form-control" id="inlineFormInputGroup" placeholder="Nominal">
							</div>
						</div>
					</div>
					<hr>
					<button style="margin-top: 20px" name="tambah"  class="btn btn-primary">Tambah</button>


				</form>
				<?php
				if (isset($_POST['tambah'])) 
				{
					$tahun=$_POST['tahun'];
					$kelas=$_POST['kelas'];
					$nominal=$_POST['nominal'];
					$koneksi->query("INSERT INTO jenis_bayar VALUES ('$tahun','$kelas','$nominal') ");
					echo "<script>location='admin.php?halaman=jenis'</script>";
				}
				?>
			</div>

		</div>
	</div>
</div>
