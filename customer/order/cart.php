<?php 

// koneksi db
include '../../inc/koneksi.php';
session_start();

$b=$_SESSION['id_store'];

$sql_cek="SELECT name FROM store WHERE id='$b'";
$querry_cek = mysqli_query($koneksi, $sql_cek);
$data_cek = mysqli_fetch_array($querry_cek,MYSQLI_ASSOC);


// if (!empty($_SESSION['cart'])) {

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Captain Order | Keranjang</title>
  <link rel="stylesheet" href="../../dist/css/style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  <header class="cart-head">
    <a href="../product/products.php?store=<?=$b; ?>">
      <svg id="arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M19 12H5" stroke="#047B6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M12 19L5 12L12 5" stroke="#047B6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </a>
    <h2><?=$data_cek['name']; ?></h2>
  </header>
  <div class="nav-keranjang">
      <p>Cart</p>
  </div>
  <main class="main-cart">
    <?php
    if (!isset($_POST['submit'])&&!isset($_SESSION['cart'])){
      echo "<center><p style='font-size: 1rem; color: red; padding-top: 50px;'>Keranjang Masih Kosong</p></center>";

    }elseif (isset($_POST['submit']) || !isset($_SESSION['cart'])) {

      $cont=$_POST['cont'];
      $id = $_POST['id'];

      $cek_sql="SELECT  * FROM products WHERE id_p='$id'";
      $cek_querry = mysqli_query($koneksi, $cek_sql);
      $cek_data = mysqli_fetch_array($cek_querry,MYSQLI_ASSOC);

      if (!isset($_SESSION['cart'])) {
        $_SESSION['cart']=[];
      }

      $index=-1;
      $cart=unserialize(serialize($_SESSION['cart']));

      // jika produk sudah ada dalam cart maka pembelian akan diupdate
      for ($i=0; $i<count($cart); $i++){
        if ($cart[$i]['id_p']==$id) {
          $index=$i;
          $_SESSION['cart'][$i]['cont']=$cont;
          break;
        }
      }

       // jika produk belum ada dalam cart
      if ($index==-1) {
        $_SESSION['cart'][]=[
          'id_p'=> $id,
          'name_p'=> $cek_data['name_p'],
          'price'=> $cek_data['price'],
          'cont'=> $cont
        ];
      }
     ?>
    
    <div class="container-cart">
      <table>
        <tr>
          <th id="no">No</th>
          <th>Nama</th>
          <th>Jumlah</th>
          <th >Harga</th>
        </tr>
        <?php 
        if (isset($_SESSION['cart'])) {
          $cart=unserialize(serialize($_SESSION['cart']));
          $index=0;
          $a=1;
          $subtotal=0;
          $total=0;

          for ($i=0; $i<count($cart); $i++){
            $subtotal=$_SESSION['cart'][$i]['price'] * $_SESSION['cart'][$i]['cont'];
            $total += $subtotal;?>
        <tr>
          <td id="no"><?= $a++ ?></td>
          <td><?= $cart[$i]['name_p']; ?></td>
          <td><?= $cart[$i]['cont']; ?></td>
          <td id="hg">Rp. <?= $subtotal; ?></td>
        </tr>
        <?php $index++; } ?>
      </table>
      <table class="total">
        <tr>
          <td>Total</td>
          <td></td>
          <td>Rp. <?= $total; ?></td>
        </tr>
      </table>
      <?php 
      } ?>
      <a href="./process.php"><button>Order</button></a>
    </div>
  <?php } elseif(isset($_SESSION['cart'])){ ?>
    
    <div class="container-cart">
      <table>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Jumlah</th>
          <th >Harga</th>
        </tr>
        <?php 
        if (isset($_SESSION['cart'])) {
          $cart=unserialize(serialize($_SESSION['cart']));
          $index=0;
          $a=1;
          $subtotal=0;
          $total=0;

          for ($i=0; $i<count($cart); $i++){
            $subtotal=$_SESSION['cart'][$i]['price'] * $_SESSION['cart'][$i]['cont'];
            $total += $subtotal;?>
        <tr>
          <td><?= $a++ ?></td>
          <td><?= $cart[$i]['name_p']; ?></td>
          <td><?= $cart[$i]['cont']; ?></td>
          <td id="hg">Rp. <?= $subtotal; ?></td>
        </tr>
        <?php $index++; } ?>
      </table>
      <table class="total">
        <tr>
          <td>Total</td>
          <td></td>
          <td>Rp. <?= $total; ?></td>
        </tr>
      </table>
      <?php 
      } ?>
      <a href="./process.php"><button>Order</button></a>
    </div>
  <?php } ?>
  </main>
</body>
</html>

<?php 

// }
 ?>