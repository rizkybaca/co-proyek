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



$sql_simpan = "INSERT INTO orders (date_o,total,id_customer,status,id_cashier,req) VALUES (
  'ini tanggal',
  '$total',
  '$u',
  'bb',
  '',
  'pd')";
  $query_simpann = mysqli_query($koneksi, $sql_simpan);
if (!$query_simpann) {
  echo mysqli_error($koneksi);
}
  $id_order=mysqli_insert_id($koneksi);

  for ($i=0; $i < count($cart); $i++) { 
    $id=$cart[$i]['id_p'];
    $cont=$cart[$i]['cont'];

    $sql="SELECT * FROM products WHERE id_p='$id'";
    $query=mysqli_query($koneksi, $sql);
    $data=mysqli_fetch_array($query);

    $sisa=$data['stocks']-$cont;

    $sql_simpan = "INSERT INTO detail_order (id_order,id_product,cont,notes) VALUES (
      '$id_order',
      '$id',
      '$cont',
      'ini order')";

    $sql_ubah = "UPDATE products SET stocks='$sisa' WHERE id_p='$id'";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($sisa==0) {
      $sql_ubahh="UPDATE products SET status='empty' WHERE id_p='$id'";
      $query_ubahh = mysqli_query($koneksi, $sql_ubah);
    }

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