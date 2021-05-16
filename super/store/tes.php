<?php 
$sql_cek="SELECT name FROM client"; //andi lau, anaaa
$query_cek=mysqli_query($koneksi, $sql_cek);
while ($a=mysqli_fetch_array($query_cek, MYSQLI_ASSOC)) {
	print_r($a); //nampil 2 nama
	echo "<br>";
}