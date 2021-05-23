<?php 
// mulai session
session_start();
if (!isset($_SESSION["ses_username"])) {
    header("location: ../user/login.php");
} else{
    $data_id=$_SESSION["ses_id"];
    $data_username=$_SESSION["ses_username"];
    $data_password=$_SESSION["ses_password"];
    $data_name=$_SESSION["ses_name"];
}
// koneksi db
include '../../inc/koneksi.php';

$target='../../dist/img/store/';
$a=1;
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Captain Order | Home</title>
  <link rel="stylesheet" href="../../dist/css/style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  <header class="head-home-end">
    <div>
      <input type="checkbox" id="check">
      <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
      </label>
      <div class="sidemenu">
        <input type="text" placeholder="Search">
        <ul>
          <li><a href="../user/profile.php"><i class="fas fa-user"></i>Profile</a></li>
          <li><a href="../order/orders.php"><i class="fas fa-history"></i>History</a></li>
        </ul>
        <div class="logout"><a href="../user/logout.php">Log Out</a></div>
      </div>
    </div>
    <div class="konten-head">
      <img src="../../dist/img/brand/logo.png" alt="logo captain order">
    </div>
    <div class="konten-head">
      <p>Hi<br><?= $data_name; ?></p>
    </div>                   
  </header>
  <main>
    <div class="container-home">
    <!-- start stores -->
    <?php 
    $sql_cek="SELECT id, name, image FROM store";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    while($data_cek= mysqli_fetch_array($query_cek)) :?>
      <section class="toko">
        <a href="../product/products.php?kode=<?= $data_cek['id']; ?>">
          <img src="<?= $target.$data_cek['image']; ?>" alt="logo toko">
          <p><?= $data_cek['name']; ?></p>
        </a>
      </section>
    <?php endwhile ?>
    </div>
  </main>
  <footer>
    <p>Copyright 2021 | by COTeam</p>
  </footer>
</body>
</html>