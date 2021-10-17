<?php
if( !empty( $_SESSION['iduser'] ) ){
?>
<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-fire"></span>SPP</a>
	</div>
	<div class="navbar-collapse collapse">
	  <ul class="nav navbar-nav">
		<li class="active"><a href="./admin.php">Home</a></li>
		<li><a href="./admin.php?hlm=bayar">Pembayaran</a></li>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan <b class="caret"></b></a>
		  <ul class="dropdown-menu">
			<li><a href="./admin.php?hlm=laporan">Rekap Pembayaran</a></li>
			<li><a href="./admin.php?hlm=laporan&sub=tagihan">Cetak Tagihan</a></li>
		  </ul>
		</li>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Master <b class="caret"></b></a>
		  <ul class="dropdown-menu">
			<li><a href="./admin.php?hlm=master&sub=jurusan">Jurusan</a></li>
			<li><a href="./admin.php?hlm=master&sub=siswa">Siswa</a></li>
			<li><a href="./admin.php?hlm=master&sub=kelas">Kelas</a></li>
			<?php
			if( $_SESSION['admin'] == 1 ){
			?>
			<li class="divider"></li>
			<li><a href="./admin.php?hlm=master&sub=jenis">Jenis Bayar</a></li>
			<li><a href="./admin.php?hlm=master">User</a></li>
			<li class="divider"></li>
			<li><a href="./admin.php?hlm=master&sub=tapel">Tahun Pelajaran</a></li>
			<?php
			}
			?>
		  </ul>
		</li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li class="dropdown active">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<?php echo $_SESSION['fullname']; ?> <b class="caret"></b>
		  </a>
		  <ul class="dropdown-menu">
			<li><a href="./admin.php?hlm=user">Profil</a></li>
			<li><a href="./admin.php?hlm=user&sub=pass">Ganti Password</a></li>
			<li class="divider"></li>
			<li><a href="logout.php">Logout</a></li>
		  </ul>
		</li>
	  </ul>
	</div><!--/.nav-collapse -->
  </div>
</div>
<?php
} else {
	header("Location: ./");
	die();
}
?>