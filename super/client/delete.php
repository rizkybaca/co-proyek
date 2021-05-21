<?php 
if(isset($_GET['kode'])){
	$sql_cek = "SELECT * FROM client WHERE id='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}

$image_ic= $data_cek['id_card'];
$target_ic='dist/img/client/ic/';
if (file_exists($target_ic.$image_ic)){
    unlink($target_ic.$image_ic);
}

$image_pp= $data_cek['profile_picture'];
$target_pp='dist/img/client/pp/';
if (file_exists($target_pp.$image_pp)){
    unlink($target_pp.$image_pp);
}

$image_bl= $data_cek['business_license'];
$target_bl='dist/img/client/bl/';
if (file_exists($target_bl.$image_bl)){
    unlink($target_bl.$image_bl);
}

$sql_hapus = "DELETE FROM client WHERE id='".$_GET['kode']."'";
$query_hapus = mysqli_query($koneksi, $sql_hapus);
if ($query_hapus) {
  echo "
		<script>
			alert('Hapus Data Berhasil!');
			document.location.href = 'index_u.php?page=data-client';
		</script>
		";
}else{
  echo "
		<script>
			alert('Hapus Data Gagal!');
			document.location.href = 'index_u.php?page=data-client';
		</script>
	";
}



 ?>