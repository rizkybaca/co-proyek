<?php 
// mulai session
session_start();
if (!isset($_SESSION["ses_username_v"])) {
	header("location: ./servant/user/login.php");
} else{
	$data_id=$_SESSION["ses_id_v"];
	$data_username=$_SESSION["ses_username_v"];
	$data_password=$_SESSION["ses_password_v"];
	$data_name=$_SESSION["ses_name_v"];
	$data_role=$_SESSION["ses_role_v"];
	$data_id_store=$_SESSION["ses_id_store_v"];
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
	<?php 
	if ($data_role=='product_admin') { ?>
		<div class="aside">
			<div class="navbar">
				<div class="nav">
					<div class="image"></div>
					<a href="?page=data-store">Store</a>
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
					<a href="./servant/user/logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?')">Logout</a>
				</div>
			</div>
		</div>
	<?php 
	} elseif ($data_role=='cashier'){ ?>
		<div class="aside">
			<div class="navbar">
				<div class="nav">
					<div class="image"></div>
					<a href="?page=data-store">Store</a>
				</div>
				<div class="nav">
					<div class="image"></div>
					<a href="?page=data-co">Captain Orders</a>
				</div>				
				<div class="nav">
					<div class="image"></div>
					<a href="?page=data-order">Orders</a>
				</div>				
				<div class="nav">
					<div class="image"></div>
					<a href="?page=edit-user">User Setting</a>
				</div>
			</div>
			<div class="logout">
				<div class="log">
					<div class="image"></div>
					<a href="./servant/user/logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?')">Logout</a>
				</div>
			</div>
		</div>	
	<?php 
	}
	?>
		<!-- start content -->
		<div class="content">
			<?php
				if (isset($_GET['page'])) {
				 	$hal=$_GET['page'];
				 	switch ($hal) {
				 		
				 		case 'data-store':
				 			include './servant/store/stores.php';
				 			break;

				 		case 'data-co':
				 			include './servant/order/co.php';
				 			break;

				 		case 'data-order':
				 			include './servant/order/orders.php';
				 			break;
			 			case 'detail-order':
				 			include './servant/order/detail.php';
				 			break;
				 		case 'edit-order':
				 			include './servant/order/update.php';
				 			break;
				 		case 'del-order':
				 			include './servant/order/delete.php';
				 			break;

				 		case 'data-product':
				 			include './servant/product/products.php';
				 			break;
				 		case 'add-product':
				 			include './servant/product/add.php';
				 			break;
				 		case 'edit-product':
				 			include './servant/product/update.php';
				 			break;
				 		case 'del-product':
				 			include './servant/product/delete.php';
				 			break;

			 			case 'edit-user':
				 			include './servant/user/setting.php';
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