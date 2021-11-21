<?php 
include 'koneksi.php';
$id=$_GET['id'];
$koneksi->query("DELETE FROM jurusan WHERE idjurusan='$id'");
{
	echo "<script>location='admin.php?halaman=jurusan'</script>";
}
?>