<?php 

include '../../inc/koneksi.php';


  $sql_cek="SELECT * FROM customer WHERE id='".$_GET['kode']."'";
  $query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek,MYSQLI_ASSOC);

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
    <h2>Profil</h2>
  </header>
  <main>
    <div class="konten-profil">
      <h3>Sunting Akun : </h3>
      <form action="" method="POST">
        <input type="hidden" name="id" readonly value="<?= $data_cek['id']; ?>">
        <label for="name">Name :</label><br>
        <input type="text" id="name" name="name" value="<?= $data_cek['name']; ?>" required><br>
        <label for="username">Username :</label><br>
        <input type="text" id="username" name="username" value="<?= $data_cek['username']; ?>" required><br>
        <label for="password">Password :</label><br>
        <input type="password" id="password" name="password" value="<?= $data_cek['password']; ?>" required><br>
        <input type="checkbox" name="look-password" id="mybutton" onclick="change()"><br>
        <label for="mybutton">lihat password</label><br><br>
        <input type="submit" name="save" value="Submit">
      </form> 
    </div>
  </main>
</body>
</html>

<script type="text/javascript">
  function change(){
    var x = document.getElementById('password').type;
    if (x == 'password') {
      document.getElementById('password').type = 'text';
      document.getElementById('mybutton').innerHTML;
    } else{
      document.getElementById('password').type = 'password';
      document.getElementById('mybutton').innerHTML;
    }
  }
</script>

<?php 

if (isset ($_POST['save'])){
//mulai proses simpan data
  $sql_ubah = "UPDATE customer SET
   username='".$_POST['username']."',
   password='".$_POST['password']."',
   name='".$_POST['name']."'
   WHERE id='".$_POST['id']."'";
  $query_ubah = mysqli_query($koneksi, $sql_ubah);
  mysqli_close($koneksi);

  if ($query_ubah) {
    $_SESSION["ses_name"]=$_POST['name'];
    echo "
      <script>
        alert('Ubah Data Berhasil!');
        document.location.href = './profile.php';
      </script>
    ";
  } else{
    echo "
      <script>
        alert('Ubah Data Gagal!');
        document.location.href = './setting.php';
      </script>
    ";
  }
}