<?php 

if(isset($_GET['kode'])){
	$sql_cek = "SELECT * FROM orders WHERE id='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);


$sql="UPDATE orders SET req='rp' WHERE id='".$_GET['kode']."'";
$query=mysqli_query($koneksi, $sql);
mysqli_close($koneksi);

if ($query) {
		  	echo "
		  		<script>
						alert('Pesanan Berhasil Diterima!');
						document.location.href = 'index_v.php?page=data-order';
					</script>
				";
		  } else{
		  	echo "
		  		<script>
						alert('Pesanan Gagal Diterima!');
						document.location.href = 'index_v.php?page=data-order';
					</script>
				";
		  }
}
 ?>