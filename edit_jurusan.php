<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Beranda</a></li>
		<li class="breadcrumb-item active" aria-current="page">Edit Jurusan</li>
	</ol>
</nav>
<div class="card">
	<div class="card-header">
		EDIT JURUSAN <?php echo $_GET['id'];
		?>
	</div>

	<div class="card-body">
		<?php
		include 'koneksi.php';
		$id=$_GET['id'];
		$ambil=$koneksi->query("SELECT * FROM jurusan WHERE idjurusan='$id'");
		$pecah=$ambil->fetch_assoc();
		?>
		<form method="post">
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-2 col-form-label">NIS</label>
				<div class="col-sm-10">
					<input type="text" name="idjurusan" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $id?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Jurusan</label>
				<div class="col-sm-10">
					<input name="jurusan" type="Text" class="form-control" value="<?php echo $pecah['jurusan']?> " id="inputPassword" placeholder="Jurusan">
				</div>
			</div>
			<button name="submit" style="margin-top: 20px" class="btn btn-primary">
				EDIT
			</button>
		</form>
		<?php
		if( isset( $_REQUEST['submit'] ))
		{
			$idjurusan = $_REQUEST['idjurusan'];
			$jurusan = $_REQUEST['jurusan'];

			$sql = mysqli_query($koneksi,"UPDATE jurusan SET jurusan='$jurusan' WHERE idjurusan='$idjurusan'");
			
			echo "<script>location='admin.php?halaman=jurusan'</script>";
			
		}
		?>
	</div>

</div>