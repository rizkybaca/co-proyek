<?php 
include '../../inc/koneksi.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>login</title>
	<link href="../../dist/css/login.css" rel="stylesheet" />
</head>
<body>
	<div class="container">
		<div class="brand">
			<div class="image">
				<img src="../../dist/img/brand/logo.png">
			</div>
			<div class="tittle">
				<p>Captain Order</p>
			</div>
		</div>
		<div class="content">
			<form action="" method="POST">
				<div class="input">
					<div class="col">
						<label for="u">Username</label>
						<input id="u" type="text" name="username" placeholder="type username here" required>
					</div>
					<div class="col">
						<label for="p">Password</label>
						<input id="p" type="password" name="password" placeholder="type password here" required>
					</div>
				</div>
				<div class="button">
					<input type="submit" name="login" value="Login">
				</div>
			</form>
		</div>
	</div>
</body>
</html>

<?php 

if (isset($_POST['login'])) {
	$username=mysqli_real_escape_string($koneksi,$_POST['username']);
	$password=mysqli_real_escape_string($koneksi,$_POST['password']);

	$sql_login="SELECT * FROM client WHERE BINARY username='$username' AND password='$password'";
	$query_login=mysqli_query($koneksi, $sql_login);
	$data_login=mysqli_fetch_array($query_login, MYSQLI_ASSOC);
	$jumlah_login=mysqli_num_rows($query_login);

	if ($jumlah_login==1) {
		session_start();
		$_SESSION["ses_id_c"]=$data_login["id"];
		$_SESSION["ses_username_c"]=$data_login["username"];
		$_SESSION["ses_password_c"]=$data_login["password"];
		$_SESSION["ses_name_c"]=$data_login["name_c"];

		echo "
  		<script>
				alert('Login Berhasil!');
				document.location.href = '../../index_c.php';
			</script>
		";
	} else{
		echo "
  		<script>
				alert('Login Gagal!');
				document.location.href = 'login.php';
			</script>
		";
	}
}

?>