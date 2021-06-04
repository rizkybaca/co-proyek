<?php 
session_start();
// koneksi db
include '../../inc/koneksi.php';
if (isset($_GET['kode'])) {
	$b=$_GET['kode'];
	$s=$_SESSION['id_store'];
}


$target='../../dist/img/product/';
$sql_cek="SELECT  * FROM products WHERE id_p='$b'";
$query_cek = mysqli_query($koneksi, $sql_cek);

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
    <a href="./products.php?kode=<?=$s; ?>">
    	<svg id="arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M19 12H5" stroke="#047B6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M12 19L5 12L12 5" stroke="#047B6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </a>
    <h2>Order Now</h2>
  </header>
  <main>
    <div class="konten-order">
      <div style="align-self: center">
        <?php 
        while ($data_cek = mysqli_fetch_array($query_cek,MYSQLI_ASSOC)):?>

        	<form method="POST" action="../order/cart.php">
        		<input type="hidden" name="id" value="<?= $data_cek['id_p']; ?>">
        		<div>
		          <img src="<?= $target.$data_cek['image']; ?>" alt="foto nasi uduk">
		          <p class="stok">tersedia @<?=$data_cek['stocks']; ?></p>
		        </div>
		        <div>
		          <h3><?=$data_cek['name_p']; ?></h3>
		          <p>Rp. <?=$data_cek['price']; ?></p>
		          <input style="width: 106px" type="number" name="cont" value="1" min="1" max="<?= $data_cek['stocks']; ?>">
		          <button type="submit" name="submit">Add to cart</button>
		        </div>
        	</form>
        <?php endwhile ?>	
      </div>
    </div>
  </main>
</body>
</html>

