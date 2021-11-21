<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Beranda</a></li>
		<li class="breadcrumb-item active" aria-current="page">Edit Jurusan</li>
	</ol>
</nav>
<div class="card">
	<div class="card-header">
		EDIT JURUSAN <?php echo $_GET['nis'];
		?>
	</div>

	<div class="card-body">
		<?php
		include 'koneksi.php';
		$id=$_GET['nis'];
		$ambil=$koneksi->query("SELECT * FROM siswa WHERE nis='$id'");
		$pecah=$ambil->fetch_assoc();
		?>
		<form method="post">
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-2 col-form-label">NIS</label>
				<div class="col-sm-10">
					<input type="text" name="nis" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $id?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-10">
					<input name="nama" type="Text" class="form-control" value="<?php echo $pecah['nama']?> " id="inputPassword" placeholder="Jurusan">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Jurusan</label>
				<div class="col-sm-10">
					<div class="form-group">
						<select name="jurusan" class="form-control" id="exampleFormControlSelect1">
							<?php
							$qprodi = mysqli_query($koneksi,"SELECT * FROM jurusan ORDER BY idjurusan");
							while(list($id,$jurusan)=mysqli_fetch_array($qprodi)){
								echo '<option value="'.$id.'"';
								echo ($id==$pecah['idjurusan'] ) ? 'selected' : '';
								echo '>'.$jurusan.'</option>';

								
							}?>
						</select>
					</div>
				</div>
			</div>
			<button name="submit" style="margin-top: 20px" class="btn btn-primary">
				EDIT
			</button>
		</form>
		<?php
		if( isset( $_REQUEST['submit'] ))
		{
			$nis = $_REQUEST['nis'];
			$nama = $_REQUEST['nama'];
			$jurusan = $_REQUEST['jurusan'];

			$sql = mysqli_query($koneksi,"UPDATE siswa SET nama='$nama',idjurusan='$jurusan' WHERE nis='$nis'");
			
			echo "<script>location='admin.php?halaman=siswa'</script>";
			
		}
		?>
	</div>

</div>