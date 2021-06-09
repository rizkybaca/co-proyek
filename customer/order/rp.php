<?php 

include '../../inc/koneksi.php';
session_start();
if (!isset($_SESSION['ini_order'])) {
	header("location: ../../index.php");
}
$id=$_SESSION['ini_order'];
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Captain Order | Note!</title>
  <link rel="stylesheet" href="../../dist/css/style.css">
  <link rel="shortcut icon" href="../../dist/icon/logo.png">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script>
    function refreshpage() {
      setTimeout(function() {
        location.reload();
      }, 800);
    }
  </script>
</head>
<body>
  <header class="note-head">
    <img src="../../dist/img/brand/logo.png" alt="logo captain order">
  </header>
  <div class="nav-keranjang">
    <p>Note!</p>
  </div>
  <main class="main-note">
    <div class="container-note">
      <p>Estimasi waktu pesanan anda :</p>
      <p>15 menit setelah anda mendapatkan pesan ini</p>
      <p class="note">nomor pesanan <br> <?= $id; ?> </p>
    <?php 
    $p="SELECT * FROM orders WHERE id='$id'";
    $pp=mysqli_query($koneksi, $p);
    $ppp=mysqli_fetch_array($pp);
    if ($ppp['req']=='pd') { ?>
      <p>tunggu resto, refresh secara berkala</p>
      <a href="cc.php">Cancel</a>
    <?php } elseif ($ppp['req']=='rp' && $ppp['status']=='cc') { ?>
      <p>mohon maaf, resto tidak bisa proses orderan</p>
      <?php unset($_SESSION['cart']); ?>
      <a href="../store/stores.php">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z" stroke="#047B6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M9 22V12H15V22" stroke="#047B6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </a>
    <?php } elseif ($ppp['req']=='rp' && $ppp['status']=='bb') {
      $cart=$_SESSION['cart'];
      for ($i=0; $i < count($cart); $i++) { 
        $id=$cart[$i]['id_p'];
        $cont=$cart[$i]['cont'];

        $sql="SELECT stocks FROM products WHERE id_p='$id'";
        $query=mysqli_query($koneksi, $sql);
        $data=mysqli_fetch_array($query);

        $sisa=$data['stocks']-$cont;

        $sql_ubah = "UPDATE products SET stocks='$sisa' WHERE id_p='$id'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

        if ($sisa==0) {
          $sql_ubahh="UPDATE products SET status='empty' WHERE id_p='$id'";
          $query_ubahh = mysqli_query($koneksi, $sql_ubahh);
        }
      }
        unset($_SESSION['cart']);
    ?>
      <p>resto telah merespon, silakan membayar pesanan di kasir</p>
      <a href="../store/stores.php">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z" stroke="#047B6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M9 22V12H15V22" stroke="#047B6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </a>
    <?php } ?>
    </div>
  </main>
</body>
</html>