<?php 
session_start();
include '../../inc/koneksi.php';
if (isset($_SESSION["ses_id"])) {
  $b=$_SESSION["ses_id"];
}

if (isset($_GET['kode'])) {
  $a=$_GET['kode'];
}


  $sql_cek="SELECT s.name 
    FROM orders AS o
    LEFT JOIN detail_order AS do ON do.id_order=o.id
    LEFT JOIN products AS p ON p.id_p=do.id_product
    LEFT JOIN store AS s ON s.id=p.id_store
    WHERE o.id='$a'";
  $query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek= mysqli_fetch_array($query_cek,MYSQLI_ASSOC);
  $total=0;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Captain Order | History</title>
	<link rel="stylesheet" href="../../dist/css/style.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  <header class="head-profil">
    <a href="./orders.php"><i class="fas fa-long-arrow-alt-left" id="arrow"></i></a>
    <h2>Order Now</h2>
  </header>
  <main>
    <div class="konten-order">
      <div style="align-self: center">
        <p><?= $data_cek['name']; ?></p>
      </div>
      <div>
        <p>Time Order</p>
        <p class="time">02 : 30 PM</p>
      </div>
    </div>
    <div class="konten-order1">
      <table>
        <tr>
          <th>Nama</th>
          <th>Jumlah</th>
          <th>Harga</th>
        </tr>
        <?php
        $cek_sql="SELECT p.name_p, do.cont, p.price 
        FROM orders AS o
        RIGHT JOIN customer AS c ON o.id_customer=c.id
        LEFT JOIN detail_order AS do ON do.id_order=o.id
        LEFT JOIN products AS p ON p.id_p=do.id_product
        LEFT JOIN store AS s ON s.id=p.id_store
        WHERE o.status='bb' AND c.id='$b'";
        $cek_query = mysqli_query($koneksi, $cek_sql);
        while($cek_data= mysqli_fetch_array($cek_query,MYSQLI_ASSOC)) {?>
        <tr>
          <td><?= $cek_data['name_p']; ?></td>
          <td><?= $cek_data['cont']; ?></td>
          <td>Rp. <?= $a=$cek_data['price'] * $cek_data['cont']; ?></td>
        </tr>
        <?php $total += $a; } ?>
      </table>
      <table class="total">
        <tr>
          <td>Total</td>
          <td></td>
          <td>Rp. <?= $total; ?></td>
        </tr>
      </table>
    </div>
  </main>
</body>
</html>