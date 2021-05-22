<?php
if (isset($_GET['kode'])) {
  $b=$_GET['kode'];
}

// koneksi db
include '../../inc/koneksi.php';


if (isset($_POST['id'], $_POST['cont'])) {
 
 $id = $_POST['id'];
 $pembelian = $_POST['cont'];

$sql_cek="SELECT  * FROM products WHERE id_p='$b'";
$query_cek = mysqli_query($koneksi, $sql_cek);
$data_cek = mysqli_fetch_array($query_cek,MYSQLI_ASSOC);

 if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

 $index = -1;
 $cart = unserialize(serialize($_SESSION['cart']));

 // jika produk sudah ada dalam cart maka pembelian akan diupdate
 for ($i=0; $i<count($cart); $i++) {
  if ($cart[$i]['id_produk'] == $id) {
   $index = $i;
   $_SESSION['cart'][$i]['pembelian'] = $pembelian;
   break;
  }
 }

 // jika produk belum ada dalam cart
 if ($index == -1) {
  $_SESSION['cart'][] = [
   'id_produk' => $id,
   'nama_produk' => $data_cek['name_p'],
   'harga' => $data_cek['price'],
   'pembelian' => $pembelian
  ];
 }
}

if (!empty($_SESSION['cart'])) { 
 ?>
  <link rel="stylesheet" href="../../dist/css/style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <h4>Daftar Belanja Anda</h4>
  <br>
  <table>
   <tr align="center">
    <th>#</th>
    <th>Nama Produk</th>
    <th>Pembelian</th>
    <th>Harga</th>
    <th>Total</th>
    <th>Aksi</th>
   </tr>

   <?php
   if(isset($_SESSION['cart'])) {
    $cart = unserialize(serialize($_SESSION['cart']));
    $index = 0;
    $no = 1;
    $total = 0;
    $total_bayar = 0;

    for ($i=0; $i<count($cart); $i++) {
     $total = $_SESSION['cart'][$i]['harga'] * $_SESSION['cart'][$i]['pembelian'];
     $total_bayar += $total;
     ?>

     <tr>
      <td align="center"><?= $no++; ?></td>
      <td><?= $cart[$i]['nama_produk']; ?></td>
      <td align="center"><?= $cart[$i]['pembelian']; ?></td>
      <td><?= $cart[$i]['harga']; ?></td>
      <td><?= $total; ?></td>
      <td align="center">
       <a href="?index=<?= $index; ?>">
        <button><i class="fa fa-trash"></i></button>
       </a>  
      </td>
     </tr>

     <?php
     $index++;
    }

  // hapus produk dalam cart
    if(isset($_GET['index'])) {
     $cart = unserialize(serialize($_SESSION['cart']));
     unset($cart[$_GET['index']]);
     $cart = array_values($cart);
     $_SESSION['cart'] = $cart;
    }
   }
   ?>

   <tr>
    <td align="right"><strong>Total Bayar</strong></td>
    <td><strong><?= $total_bayar; ?></strong></td>
    <td align="center">
     <a href="#">
      <button>Checkout</button>
     </a>
    </td>
   </tr>

  </table>
  <br><hr>

<?php
}

if (isset($_GET['index'])) {
 header('Location: ../../index.php');
}
?>