<?php 
session_start();
if (isset($_SESSION["ses_name"])) {
    header("location: ../store/stores.php");
}
// koneksi db
include '../../inc/koneksi.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Captain Order | Login User</title>
  <link rel="stylesheet" href="../../dist/css/ln.css">
</head>
<body>
  <div class="container">
    <header>
      <img src="../../dist/img/brand/logo.png" alt="logo Captain Order">
    </header>
    <main>
      <div class="kotak-login">
        <form action="" method="POST">
          <input type="text" placeholder="Username..." name="username" required>
          <input type="password" placeholder="Password..." name="password" required>
          <input type="submit" name="login" value="Log in">
        </form>
        <a href="./register.php">Sign up</a>
      </div>
    </main>
    <footer>
      <p>Copyright 2021 | by COTeam</p>
    </footer>
  </div>
</body>
</html>

<?php 

if (isset($_POST['login'])) {
  $username=mysqli_real_escape_string($koneksi,$_POST['username']);
  $password=mysqli_real_escape_string($koneksi,$_POST['password']);

  $sql_login="SELECT * FROM customer WHERE BINARY username='$username' AND password='$password'";
  $query_login=mysqli_query($koneksi, $sql_login);
  $data_login=mysqli_fetch_array($query_login, MYSQLI_ASSOC);
  $jumlah_login=mysqli_num_rows($query_login);

  if ($jumlah_login==1) {
    // session_start();
    $_SESSION["ses_id"]=$data_login["id"];
    $_SESSION["ses_username"]=$data_login["username"];
    $_SESSION["ses_password"]=$data_login["password"];
    $_SESSION["ses_name"]=$data_login["name"];

    echo "
      <script>
        alert('Login Berhasil!');
        document.location.href = '../store/stores.php';
      </script>
    ";
  } else{
    echo "
      <script>
        alert('Login Gagal!');
        document.location.href = './login.php';
      </script>
    ";
  }
}

?>