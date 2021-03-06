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
  <link rel="shortcut icon" href="../../dist/icon/logo.png">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  <header class="store-head">
    <div>
      <a href="../store/stores.php">
        <svg id="arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M19 12H5" stroke="#047B6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M12 19L5 12L12 5" stroke="#047B6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </a>
    </div>
    <div>
      <h2><?= $cek_data['name']; ?></h2>
    </div>

    <div>
      <a href="../order/cart.php?kode=<?=$b; ?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M9 22C9.55228 22 10 21.5523 10 21C10 20.4477 9.55228 20 9 20C8.44772 20 8 20.4477 8 21C8 21.5523 8.44772 22 9 22Z" stroke="#047B6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M20 22C20.5523 22 21 21.5523 21 21C21 20.4477 20.5523 20 20 20C19.4477 20 19 20.4477 19 21C19 21.5523 19.4477 22 20 22Z" stroke="#047B6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M1 1H5L7.68 14.39C7.77144 14.8504 8.02191 15.264 8.38755 15.5583C8.75318 15.8526 9.2107 16.009 9.68 16H19.4C19.8693 16.009 20.3268 15.8526 20.6925 15.5583C21.0581 15.264 21.3086 14.8504 21.4 14.39L23 6H6" stroke="#047B6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </a>
    </div>

  </header>
  <div class="nav-store">
    <ul>
      <li><a href="?page=foods">Foods</a></li>
      <li><a href="?page=drinks">Drinks</a></li>
      <li><a href="?page=snacks">Snacks</a></li>
    </ul>
  </div>
  <main>
    <?php 
      if (isset($_GET['page'])) {
        $hal=$_GET['page'];
        switch ($hal) {
          case 'foods':
            include './foods.php';
            break;
          case 'drinks':
            include './drinks.php';
            break;
          case 'snacks':
            include './snacks.php';
            break;

          default:
            echo "<center><h1> ERROR !</h1></center>";
            break;
        }
      } else{
        include './foods.php';
      }

     ?>
  </main>
  <footer class="foot-store">
    <p>Copyright 2021 | by COTeam</p>
  </footer>
</body>
</html>