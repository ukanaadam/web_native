<?php
//split teks, memilah teks menjadi beberapa bagian

$teks = "X-MIF-1";
$hasil = explode("-",$teks);

echo "Kelas: ".$teks;
echo '<br>';
//cara menampilkannya
echo $hasil[0];
echo '<br>';
echo $hasil[1];
echo '<br>';
echo $hasil[2];

?>