<?php 
if(isset($_GET['kode'])){
	$sql_cek = "SELECT * FROM customer WHERE id='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
$sql_hapus = "DELETE FROM customer WHERE id='".$_GET['kode']."'";
$query_hapus = mysqli_query($koneksi, $sql_hapus);
if ($query_hapus) {
  echo "
		<script>
			alert('Hapus Data Berhasil!');
			document.location.href = 'index_u.php?page=data-customer';
		</script>
		";
}else{
  echo "
		<script>
			alert('Hapus Data Gagal!');
			document.location.href = 'index_u.php?page=data-customer';
		</script>
	";
}



 ?>