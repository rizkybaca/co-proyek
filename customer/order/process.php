<?php 
session_start();
include '../../inc/koneksi.php';
$u=$_SESSION["ses_id"];
$b=$_SESSION['id_store'];

if (!isset($_SESSION['cart'])) {
  header('location:../store/stores.php');
}

$cart=unserialize(serialize($_SESSION['cart']));
$total=0;

for ($i=0; $i < count($cart); $i++) { 
  $total+=$cart[$i]['cont'] * $cart[$i]['price'];
}

$sql_simpan = "INSERT INTO orders (date_o,total,id_customer,status,id_cashier) VALUES (
  'ini tanggal',
  '$total',
  '$u',
  'bb',
  4)";
  $query_simpan = mysqli_query($koneksi, $sql_simpan);
  
  $id_order=mysqli_insert_id($koneksi);

  for ($i=0; $i < count($cart); $i++) { 
    $id=$cart[$i]['id_p'];
    $cont=$cart[$i]['cont'];

    $sql_simpan = "INSERT INTO detail_order (id_order,id_product,cont,notes) VALUES (
      '$id_order',
      '$id',
      '$cont',
      'ini order')";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);

  }

unset($_SESSION['cart']);

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
      <p class="note">nomor pesanan <br> <?= $id_order; ?> </p>
      <p>*Pesanan anda akan hilang jika anda belum sampai dalam 15 menit</p>
    </div>
    <a href="../store/stores.php"><i class="fas fa-home"></i></a>
  </main>
</body>
</html>