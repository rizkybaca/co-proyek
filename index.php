<?php 
// mulai session
session_start();
if (!isset($_SESSION["ses_username"])) {
	header("location: login.php");
} else{
	$data_id=$_SESSION["ses_id"];
	$data_username=$_SESSION["ses_username"];
	$data_password=$_SESSION["ses_password"];
	$data_name=$_SESSION["ses_name"];
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
			<p>Hello, Admin</p>
		</div>
	</div>
	<div class="container">
		<div class="aside">
			<div class="navbar">
				<div class="nav">
					<div class="image"></div>
					<a href="?page=data-client">Clients</a>
				</div>
				<div class="nav">
					<div class="image"></div>
					<a href="?page=data-store">Stores</a>
				</div>
				<div class="nav">
					<div class="image"></div>
					<a href="?page=data-customer">Customers</a>
				</div>
				<div class="nav">
					<div class="image"></div>
					<a href="?page=edit-user">User Setting</a>
				</div>
			</div>
			<div class="logout">
				<div class="log">
					<div class="image"></div>
					<a href="./logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?')">Logout</a>
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
				 			include './super/store/stores.php';
				 			break;
			 			case 'detail-store':
				 			include './super/store/detail.php';
				 			break;
				 		case 'add-store':
				 			include './super/store/add.php';
				 			break;
				 		case 'edit-store':
				 			include './super/store/update.php';
				 			break;
				 		case 'del-store':
				 			include './super/store/delete.php';
				 			break;

				 		case 'data-client':
				 			include './super/client/clients.php';
				 			break;
			 			case 'detail-client':
				 			include './super/client/detail.php';
				 			break;
				 		case 'add-client':
				 			include './super/client/add.php';
				 			break;
				 		case 'edit-client':
				 			include './super/client/update.php';
				 			break;
				 		case 'del-client':
				 			include './super/client/delete.php';
				 			break;

				 		case 'data-customer':
				 			include './super/customer/customers.php';
				 			break;
			 			case 'detail-customer':
				 			include './super/customer/detail.php';
				 			break;
				 		case 'add-customer':
				 			include './super/customer/add.php';
				 			break;
				 		case 'edit-customer':
				 			include './super/customer/update.php';
				 			break;
				 		case 'del-customer':
				 			include './super/customer/delete.php';
				 			break;	

			 			case 'edit-user':
				 			include './super/user/setting.php';
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