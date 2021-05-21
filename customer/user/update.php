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
      <form action="./profile.php">
        <label for="fname">Username :</label><br>
        <input type="text" id="fname" name="fname" value="John"><br>
        <label for="lname">Password :</label><br>
        <input type="text" id="lname" name="lname" value="Doe"><br><br>
        <input type="submit" value="Submit">
      </form> 
    </div>
  </main>
</body>
</html>