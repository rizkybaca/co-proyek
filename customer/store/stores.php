<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captain Order | Home</title>
    <link rel="stylesheet" href="../../dist/css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <header class="head-home-end">
        <div>
            <input type="checkbox" id="check">
            <label for="check">
                <i class="fas fa-bars" id="btn"></i>
                <i class="fas fa-times" id="cancel"></i>
            </label>
            <div class="sidemenu">
                <input type="text" placeholder="Search">
                <ul>
                    <li><a href="../user/profile.php"><i class="fas fa-user"></i>Profile</a></li>
                    <li><a href="../order/orders.php"><i class="fas fa-history"></i>History</a></li>
                </ul>
                <div class="logout"><a href="../user/logout.php">Log Out</a></div>
            </div>
        </div>
        <div class="konten-head">
            <img src="../../dist/img/brand/logo.png" alt="logo captain order">
        </div>
        <div class="konten-head">
            <p>Hi<br>Username</p>
        </div>                   
    </header>
    <main>
        <div class="container-home">
            <section class="toko">
                <img src="../../dist/img/brand/kfc@.jpg" alt="logo toko">
                <p>KFC</p>
            </section>
            <section class="toko">
                <a href="../product/products.php">
                    <img src="../../dist/img/brand/mcd@.jpg" alt="logo toko">
                <p>MCD</p>
                </a>
            </section>
            <section class="toko">
                <img src="../../dist/img/brand/starbucks@.jpg" alt="logo toko">
                <p>Starbucks</p>
            </section>
        </div>
    </main>
    <footer>
        <p>Copyright 2021 | by COTeam</p>
    </footer>
</body>
</html>