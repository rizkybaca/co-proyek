<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
	<link href="./main.css" rel="stylesheet" />
	<title>Document</title>
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
					<a href="#">Store</a>
				</div>
				<div class="nav">
					<div class="image"></div>
					<a href="#">Request</a>
				</div>
				<div class="nav">
					<div class="image"></div>
					<a href="#">List End-User</a>
				</div>
				<div class="nav">
					<div class="image"></div>
					<a href="#">User Setting</a>
				</div>
			</div>
			<div class="logout">
				<div class="log">
					<div class="image"></div>
					<a href="#">Logout</a>
				</div>
			</div>
		</div>
		<!-- start content -->
		<div class="content">
			<?php include './super/stores.php'; ?>
		</div>
		<!-- end of content -->
	</div>
</body>
</html>