<?php 

include '../../inc/koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Captain Order | Daftar Akun</title>
  <link rel="stylesheet" href="../../dist/css/style.css">
</head>
<body>
  <div class="container-signup">
    <h2>Daftar Akun</h2>
    <form action="" method="POST">
      <label for="nama">Nama Lengkap</label><br>
      <input type="text" name="name">
      <br>
      <label for="username">Username</label><br>
      <input type="text" name="username">
      <br>
      <label for="password">Password</label><br>
      <input type="password" name="password">
      <br>
<!--       <label for="konf password">Konfirmasi Password</label><br>
      <input type="password">
      <br> -->
      <label for="email">E-Mail</label><br>
      <input type="email" name="email" id="email" placeholder="type email here" required>
      <br>
      <label for="contact">Phone Number</label><br>
      <input type="text" name="phone_number" id="contact" placeholder="type number phone here" required>
      <br>
      <button type="submit" name="save">Daftar</button>
      <br>
      <p>Sudah punya akun? login di <a href="./login.php"> sini</a></p>
    </form>
  </div>
</body>
</html>

<?php 

if (isset ($_POST['save'])){

  $sql_simpan = "INSERT INTO customer (username,password,name,join_date,email,phone_number) VALUES (
  '".$_POST['username']."',
  '".$_POST['password']."',
  '".$_POST['name']."',
  'ini tanggal',
  '".$_POST['email']."', 
  '".$_POST['phone_number']."')";
  $query_simpan = mysqli_query($koneksi, $sql_simpan);
  mysqli_close($koneksi);

  if ($query_simpan) {
    echo "
      <script>
        alert('Register Berhasil!');
        document.location.href = './login.php';
      </script>
    ";
  } else{
    echo "
      <script>
        alert('Register Gagal!');
        document.location.href = './register.php';
      </script>
    ";
  }
}
 ?>