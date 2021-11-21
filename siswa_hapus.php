<?php 
include 'koneksi.php';
$nis=$_GET['nis'];
$koneksi->query("DELETE FROM siswa WHERE nis='$nis'");
{
	echo "<script>location='admin.php?halaman=siswa'</script>";
}
?>