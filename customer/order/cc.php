<?php 
session_start();
include '../../inc/koneksi.php';

$id=$_SESSION['ini_order'];
$p="UPDATE orders SET status='cc', req='rp' WHERE id=$id";
$pp=mysqli_query($koneksi, $p);

if ($pp) {
	echo "
	  		<script>
					alert('Pesanan berhasil dibatalkan!');
					document.location.href = '../store/stores.php';
				</script>
			";
}

 ?>