<?php
session_start();
include '../../inc/koneksi.php'; 
    $sql_cek="SELECT *FROM customer WHERE id='".$_SESSION['ses_id']."'";
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
            <h3>Personal Akun : </h3>
            <table>
                <tr>
                    <td>Username</td>
                    <td><?=$data_cek['username'] ;?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?=$data_cek['email'] ;?></td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td><?= $data_cek['phone_number']; ?></td>
                </tr>
            </table>
            <a href="./setting.php?kode=<?= $data_cek['id']; ?>"><button>Edit</button></a>
        </div>
        <div class="note-profil">
            <p>Terima Kasih</p>
            <p>Sudah Menggunakan Captain Order</p>
            <p>Semoga Hari Anda Menyenangkan</p>
            <p>dan Sehat Selalu</p>
        </div>
    </main>
</body>
</html>