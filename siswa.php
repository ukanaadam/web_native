<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
		<li class="breadcrumb-item active" aria-current="page">Siswa</li>
	</ol>
</nav>
<div class="card">
	<div class="card-header">
		<strong class="card-title">Daftar Siswa</strong>
	</div>
	<div class="card-body">
		<a style="margin-bottom: 20px" href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-primary btn-xs"><i style="margin-right=20px "></i> Tambah Data</a> <table class="table table-bordered">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Nis</th>
					<th scope="col">Nama</th>
					<th scope="col">Jurusan</th>
					<th scope="col">Aksi</th>
				</tr>
			</thead>
			<?php
			include 'koneksi.php';
			$sql = mysqli_query($koneksi,"SELECT * from siswa ");
			?>
			<tbody>
				<?php   

				$no=1;
				while(list($nis,$nama,$idjurusan)=mysqli_fetch_array($sql)){?>
					<tr>
						<th scope="row"><?php echo $no?></th>
						<td><?php echo $nis?></td>

						<td><?php echo $nama?></td>
						<td>
							<?php
							$ambil=$koneksi->query("SELECT * FROM jurusan WHERE idjurusan='$idjurusan'");
							$pecah=$ambil->fetch_assoc();
							echo $pecah['jurusan'];
							?>
						</td>
						<td>
							<button data-toggle="modal" data-target="#hapus<?php echo $nis?>" type="button" class="btn btn-outline-danger btn-xs">
								<i>
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
										<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
										<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
									</svg>
								</i>
							</button>
							<a href="admin.php?halaman=edit_siswa&nis=<?php echo $nis?>"  class="btn btn-outline-primary btn-xs">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
									<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
								</svg>
							</a>
							<div class="modal fade" id="hapus<?php echo $nis?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<h5>Apa Anda Yakin Akan Menghapus <b><?php echo $nama?></b></h5>
										</div>
										<div class="modal-footer">
											<a href="admin.php?halaman=siswa_hapus&nis=<?php echo $nis?>"class="btn btn-danger">Hapus</a>
										</div>
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
					<h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputEmail4">NIS</label>
							<input name="nis" type="text" class="form-control" id="inputEmail4" placeholder="Masukan NIS">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">Nama</label>
							<input name="nama" type="text" class="form-control" id="inputPassword4" placeholder="Nama Siswa">
						</div>
						<div class="form-group col-md-12">
							<label for="inputPassword4">Jurusan</label>
							<select name="jurusan" class="form-control">
								<?php
								$ambil=$koneksi->query("SELECT * FROM jurusan");
								while ($pecah=$ambil->fetch_assoc()) 
								{?>
									<option value="<?php echo $pecah['idjurusan']?>"><?php echo $pecah['jurusan']?></option>

								<?php }?>
							</select>
						</div>
					</div>
					<hr>
					<button style="margin-bottom: 20px" name="tambah"  class="btn btn-primary">Tambah</button>


				</form>
				<?php
				if (isset($_POST['tambah'])) 
				{
					$nis=$_POST['nis'];
					$nama=$_POST['nama'];
					$jurusan=$_POST['jurusan'];
					$koneksi->query("INSERT INTO siswa VALUES ('$nis','$nama','$jurusan') ");
					echo "<script>location='admin.php?halaman=siswa'</script>";
				}
				?>
			</div>

		</div>
	</div>
</div>
