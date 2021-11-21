<?php 
include 'koneksi.php';
$id=$_GET['id'];
$koneksi->query("DELETE FROM jenis_bayar WHERE tingkat='$id'");
{
	echo "<script>location='admin.php?halaman=jenis'</script>";
}
?>