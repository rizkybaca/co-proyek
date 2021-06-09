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
if (isset($_SESSION['cart'])) {
  echo "
      <script>
        alert('Keranjang Anda dikosongkan!');
      </script>
    ";
    unset($_SESSION['cart']);
}
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
        <svg id="btn" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M3 12H21" stroke="#047B6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M3 6H21" stroke="#047B6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M3 18H21" stroke="#047B6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <svg id="cancel" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M18 6L6 18" stroke="#047B6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M6 6L18 18" stroke="#047B6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </label>
      <div class="sidemenu">
        <ul>
          <li>
            <a href="../user/profile.php">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="#1B4332" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="#1B4332" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <p>Profile</p>
            </a>
          </li>
          <li>
            <a href="../order/orders.php">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 6V12L16 14" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <p>History</p>
          </a>
        </li>
        </ul>
        <div class="logout"><a href="../user/logout.php">Log Out</a></div>
      </div>
    </div>
    <div class="konten-head">
      <img src="../../dist/img/brand/logo.png" alt="logo captain order">
    </div>
    <div class="konten-head">
      <p>Hi, <?= $data_name; ?></p>
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