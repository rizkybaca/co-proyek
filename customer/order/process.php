<?php 
$tgl=date("Y-m-d H:i:s");
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
  '$tgl',
  '$total',
  '$u',
  'bb',
  '',
  'pd')";
  $query_simpan = mysqli_query($koneksi, $sql_simpan);

  $id_order=mysqli_insert_id($koneksi);

  for ($i=0; $i < count($cart); $i++) { 
    $id=$cart[$i]['id_p'];
    $cont=$cart[$i]['cont'];

    $sql="SELECT * FROM products WHERE id_p='$id'";
    $query=mysqli_query($koneksi, $sql);
    $data=mysqli_fetch_array($query);

    $sql_simpann = "INSERT INTO detail_order (id_order,id_product,cont,notes) VALUES (
      '$id_order',
      '$id',
      '$cont',
      'ini order')";
    $query_simpann = mysqli_query($koneksi, $sql_simpann);

  }

  $p="SELECT * FROM orders WHERE id=$id_order";
  $pp=mysqli_query($koneksi, $p);
  $ppp=mysqli_fetch_array($pp);
  $id=$ppp['id'];

  if (!isset($query_simpan)) {
  echo mysqli_error($koneksi);
  } elseif (isset($query_simpan)){
    $_SESSION['ini_order']=$id;
    header('location: rp.php');
  }

 ?>
