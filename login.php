<?php 
include './inc/koneksi.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link href="./dist/css/login.css" rel="stylesheet" />
</head>
<body>
	<div class="container">
		<div class="brand">
			<div class="image"></div>
			<div class="tittle">
				<p>captain order</p>
			</div>
		</div>
		<div class="content">
			<form action="" method="POST">
				<div class="input">
					<div class="col">
						<label>username</label>
						<input type="text" name="username" required>
					</div>
					<div class="col">
						<label>password</label>
						<input type="password" name="password" required>
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

	$sql_login="SELECT * FROM super_user WHERE BINARY username='$username' AND password='$password'";
	$query_login=mysqli_query($koneksi, $sql_login);
	$data_login=mysqli_fetch_array($query_login, MYSQLI_ASSOC);
	$jumlah_login=mysqli_num_rows($query_login);

	if ($jumlah_login==1) {
		session_start();
		$_SESSION["ses_id"]=$data_login["id"];
		$_SESSION["ses_username"]=$data_login["username"];
		$_SESSION["ses_password"]=$data_login["password"];
		$_SESSION["ses_name"]=$data_login["name"];

		echo "
  		<script>
				alert('Login Berhasil!');
				document.location.href = 'index.php';
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