<?php

$koneksi = mysqli_connect("localhost","root","","ukana_native");

// check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>