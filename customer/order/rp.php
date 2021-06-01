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
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script>
    function refreshpage() {
      setTimeout(function() {
        location.reload();
      }, 800);
    }
  </script>
</head>
<body onload="refreshpage()">
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
    </div>
    <?php 
    $p="SELECT * FROM orders WHERE id='$id'";
    $pp=mysqli_query($koneksi, $p);
    $ppp=mysqli_fetch_array($pp);
    if ($ppp['req']=='pd') { ?>
      <p>tunggu resto</p>
      <a href="cc.php">Cancel</a>
    <?php } elseif ($ppp['req']=='rp' && $ppp['status']=='cc') { ?>
      <p>mohon maaf, resto tidak bisa proses orderan</p>
      <?php unset($_SESSION['cart']); ?>
      <a href="../store/stores.php"><i class="fas fa-home"></i></a>
    <?php } elseif ($ppp['req']=='rp' && $ppp['status']=='bb') { ?>
      <p>resto telah merespon, silakan membayar pesanan di kasir</p>
      <?php unset($_SESSION['cart']); ?>
      <a href="../store/stores.php"><i class="fas fa-home"></i></a>
  <?php } ?>
  </main>
</body>
</html>