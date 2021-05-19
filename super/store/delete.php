<?php 
if(isset($_GET['kode'])){
	$sql_cek = "SELECT * FROM store WHERE id='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}

$image= $data_cek['image'];
$target='dist/img/store/';
if (file_exists($target.$image)){
    unlink($target.$image);
}

$sql_hapus = "DELETE FROM store WHERE id='".$_GET['kode']."'";
$query_hapus = mysqli_query($koneksi, $sql_hapus);
if ($query_hapus) {
  echo "
		<script>
			alert('Hapus Data Berhasil!');
			document.location.href = 'index.php?page=data-store';
		</script>
		";
}else{
  echo "
		<script>
			alert('Hapus Data Gagal!');
			document.location.href = 'index.php?page=data-store';
		</script>
	";
}



 ?>