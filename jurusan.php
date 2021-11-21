<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
		<li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
	</ol>
</nav>
<div class="card">
	<div class="card-header">
		<strong class="card-title">Daftar Jurusan</strong>
	</div>
	<div class="card-body">
		<a style="margin-bottom: 20px" href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-primary btn-xs"><i style="margin-right=20px "></i> Tambah Data</a> <table class="table table-bordered">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Kode Jurusan</th>
					<th scope="col">Nama</th>
					<th scope="col">Aksi</th>
				</tr>
			</thead>
			<?php
			include 'koneksi.php';
			$sql = mysqli_query($koneksi,"SELECT * from jurusan");
			?>
			<tbody>
				<?php   

				$no=1;
				while(list($idjurusan,$jurusan)=mysqli_fetch_array($sql)){?>
					<tr>
						<th scope="row"><?php echo $no?></th>
						<td><?php echo $idjurusan?></td>

						<td><?php echo $jurusan?></td>
						<td>
							<button data-toggle="modal" data-target="#hapus<?php echo $idjurusan?>" type="button" class="btn btn-outline-danger btn-xs">
								<i>
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
										<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
										<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
									</svg>
								</i>
							</button>
							<a href="admin.php?halaman=edit_jurusan&id=<?php echo $idjurusan?>" data-target="#edit<?php echo $idjurusan?>"  class="btn btn-outline-primary btn-xs">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
									<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
								</svg>
							</a>
							<div class="modal fade" id="hapus<?php echo $idjurusan?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<h5>Apa Anda Yakin Akan Menghapus <b><?php echo $jurusan?></b></h5>
										</div>
										<div class="modal-footer">
											<a href="admin.php?halaman=hapus_jurusan&id=<?php echo $idjurusan?>"class="btn btn-danger">Hapus</a>
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
					<h5 class="modal-title" id="exampleModalLabel">Tambah Jurusan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputEmail4">Kode Jurusan</label>
							<input name="kode" type="text" class="form-control" id="inputEmail4" placeholder="Kode">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">Nama Jurusan</label>
							<input name="jurusan" type="text" class="form-control" id="inputPassword4" placeholder="Nama Jurusan">
						</div>
					</div>
					<hr>
					<button style="margin-bottom: 20px" name="tambah"  class="btn btn-primary">Tambah</button>


				</form>
				<?php
				if (isset($_POST['tambah'])) 
				{
					$idjurusan=$_POST['kode'];
					$jurusan=$_POST['jurusan'];
					$koneksi->query("INSERT INTO jurusan VALUES ('$idjurusan','$jurusan') ");
					echo "<script>location='admin.php?halaman=jurusan'</script>";
				}
				?>
			</div>

		</div>
	</div>
</div>
