<?php
session_start();
// koneksi db
include '../../inc/koneksi.php';
if (isset($_GET['kode'])) {
  if (!isset($_SESSION['store'])) {
    $_SESSION['id_store']=$_GET['kode'];
  }
  
}

$b=$_SESSION['id_store'];

$cek_sql="SELECT name FROM store WHERE id='$b'";
$cek_querry = mysqli_query($koneksi, $cek_sql);
$cek_data = mysqli_fetch_array($cek_querry,MYSQLI_ASSOC);


$target='../../dist/img/product/';
$a=1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Captain Order | <?= $cek_data['name']; ?></title>
  <link rel="stylesheet" href="../../dist/css/style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  <header class="store-head">
    <div>
      <a href="../store/stores.php"><i class="fas fa-long-arrow-alt-left" id="arrow"></i></a>
    </div>
    <div>
      <h2><?= $cek_data['name']; ?></h2>
    </div>
    <?php if (isset($_SESSION['cart'])) : ?>
    <div>
      <a href="../order/cart.php?kode=<?=$b; ?>">
        <i class="fas fa-shopping-cart"></i>
      </a>
    </div>
  <?php endif ?>
  </header>
  <div class="nav-store">
    <ul>
      <li><a href="">Foods</a></li>
      <li><a href="">Drinks</a></li>
      <li><a href="">Snacks</a></li>
    </ul>
  </div>
  <main>
    <div class="container-store">
      <!-- start products -->
    <?php 
    $sql_cek="SELECT p.id_p,p.types,p.name_p,p.price,p.stocks,p.image,p.id_store FROM products AS p JOIN store AS s ON p.id_store=s.id WHERE s.id='$b'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    while($data_cek= mysqli_fetch_array($query_cek)) :?>    
      <section>
        <div>
          <img src="<?= $target.$data_cek['image']; ?>" alt="foto nasi uduk">
          <p class="stok">tersedia @<?=$data_cek['stocks']; ?></p>
        </div>
        <div>
          <h3><?=$data_cek['name_p']; ?></h3>
          <p>Rp. <?=$data_cek['price']; ?></p>
          <a href="./detail.php?kode=<?= $data_cek['id_p']; ?>">Tambah Data</a>
        </div>
      </section>
    <?php endwhile ?>
    </div>
  </main>
  <footer class="foot-store">
    <p>Copyright 2021 | by COTeam</p>
  </footer>
</body>
</html>