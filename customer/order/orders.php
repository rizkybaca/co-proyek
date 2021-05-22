<?php 
session_start();
include '../../inc/koneksi.php';
if (isset($_SESSION["ses_id"])) {
  $b=$_SESSION["ses_id"];
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Captain Order | Profil</title>
  <link rel="stylesheet" href="../../dist/css/style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  <header class="head-profil">
    <a href="../store/stores.php"><i class="fas fa-long-arrow-alt-left" id="arrow"></i></a>
    <h2>History</h2>
  </header>
    <main>
      <div class="konten-history">
        <p>Order Now :</p>
        <?php 
        $sql_cek="SELECT DISTINCT o.id, s.name 
        FROM orders AS o
        RIGHT JOIN customer AS c ON o.id_customer=c.id
        LEFT JOIN detail_order AS do ON do.id_order=o.id
        LEFT JOIN products AS p ON p.id_p=do.id_product
        LEFT JOIN store AS s ON s.id=p.id_store
        WHERE o.status='bb' AND c.id='$b'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        while($data_cek= mysqli_fetch_array($query_cek,MYSQLI_ASSOC)) :?>
        <p class="store"><?= $data_cek['name']; ?></p>
        <a href="./detail.php?kode=<?= $data_cek['id']; ?>">Detail</a>
        <?php endwhile ?>
      </div>
      <div class="konten-history">
        <p>Daftar Riwayat</p>
        <table>
          <?php 
          $sql_cek="SELECT DISTINCT o.id, o.date_o, s.name 
          FROM orders AS o
          RIGHT JOIN customer AS c ON o.id_customer=c.id
          LEFT JOIN detail_order AS do ON do.id_order=o.id
          LEFT JOIN products AS p ON p.id_p=do.id_product
          LEFT JOIN store AS s ON s.id=p.id_store
          WHERE o.status='sb' OR o.status='ex' OR o.status='cc' AND c.id=$b";
          $query_cek = mysqli_query($koneksi, $sql_cek);
          while($data_cek= mysqli_fetch_array($query_cek,MYSQLI_ASSOC)) :?>
          <tr>
            <td><?= $data_cek['name']; ?></td>
            <td><?= $data_cek['date_o']; ?></td>
            <td><a href="./detail.php?kode=<?= $data_cek['id']; ?>">Detail</a></td>
          </tr>
          <?php endwhile ?>
        </table>
      </div>
    </main>
</body>
</html>