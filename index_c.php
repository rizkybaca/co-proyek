<?php 
// mulai session
session_start();
if (!isset($_SESSION["ses_username_c"])) {
	header("location: ./super/user/login.php");
} else{
	$data_id=$_SESSION["ses_id_c"];
	$data_username=$_SESSION["ses_username_c"];
	$data_password=$_SESSION["ses_password_c"];
	$data_name=$_SESSION["ses_name_c"];
}
// koneksi db
include './inc/koneksi.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
	<link href="./dist/css/main.css" rel="stylesheet" />
	<title>Capt. Order</title>
</head>
<body>
	<div class="header">
		<div class="brand">
			<div class="image">

			</div>
			<div class="text">
				<p>Captain Order</p>
			</div>
		</div>
		<div class="greet">
			<p>Hello, <?= $data_name; ?></p>
		</div>
	</div>
	<div class="container">
		<div class="aside">
			<div class="navbar">
				<div class="nav">
					<div class="image"></div>
					<a href="?page=data-store">Stores</a>
				</div>
				<div class="nav">
					<div class="image"></div>
					<a href="?page=data-servant">Servant</a>
				</div>
				<div class="nav">
					<div class="image"></div>
					<a href="?page=data-product">Products</a>
				</div>				
				<div class="nav">
					<div class="image"></div>
					<a href="?page=edit-user">User Setting</a>
				</div>
			</div>
			<div class="logout">
				<div class="log">
					<div class="image"></div>
					<a href="./client/user/logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?')">Logout</a>
				</div>
			</div>
		</div>

		

		<!-- start content -->
		<div class="content">
			<?php
				if (isset($_GET['page'])) {
				 	$hal=$_GET['page'];
				 	switch ($hal) {
				 		
				 		case 'data-store':
				 			include './client/store/stores.php';
				 			break;

				 		case 'data-servant':
				 			include './client/servant/servants.php';
				 			break;
			 			case 'detail-servant':
				 			include './client/servant/detail.php';
				 			break;
				 		case 'add-servant':
				 			include './client/servant/add.php';
				 			break;
				 		case 'edit-servant':
				 			include './client/servant/update.php';
				 			break;
				 		case 'del-servant':
				 			include './client/servant/delete.php';
				 			break;

				 		case 'data-product':
				 			include './client/product/products.php';
				 			break;
			 			case 'detail-product':
				 			include './client/product/detail.php';
				 			break;
				 		case 'add-product':
				 			include './client/product/add.php';
				 			break;
				 		case 'edit-product':
				 			include './client/product/update.php';
				 			break;
				 		case 'del-product':
				 			include './client/product/delete.php';
				 			break;

			 			case 'edit-user':
				 			include './client/user/setting.php';
				 			break;

				 		default:
				 			echo "<center><h1> ERROR !</h1></center>";
				 			break;
				 	}
				 } 
			?>
		</div>
		<!-- end of content -->
	</div>
</body>
</html>