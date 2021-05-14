<div class="head">
	<div class="tittle">
		<p>Add New Customer</p>
	</div>
</div>
<div class="cont-add-customer">
	<form action="" method="POST">
		<div class="input">
			<div class="col">
				<label for="username">Username</label>
				<input type="text" name="username" id="username" placeholder="type username here" required>
			</div>
			<div class="col">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" placeholder="type password here" required>
			</div>
			<div class="col">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" placeholder="type name here" required>
			</div>
			<div class="col">
				<label for="date">Join Date</label>
				<input type="text" name="date" id="date" placeholder="type join date here" required>
			</div>
			<div class="col">
				<label for="email">E-Mail</label>
				<input type="email" name="email" id="email" placeholder="type email here" required>
			</div>
			<div class="col">
				<label for="contact">Phone Number</label>
				<input type="text" name="phone_number" id="contact" placeholder="type number phone here" required>
			</div>
		</div>
		<div class="button">
			<a href="?page=data-customer">Cancel</a>
			<input type="submit" name="save" value="Save">
		</div>
	</form>
</div>

<?php 

if (isset ($_POST['save'])){
//mulai proses simpan data
	// if ($_POST['ini_level']=='Administrator'){
	// 	$jenis="ADM";
	// } else{
	// 	$jenis="PAN";
	// }
  $sql_simpan = "INSERT INTO customer (username,password,name,join_date,email,phone_number) VALUES (
  '".$_POST['username']."',
  '".$_POST['password']."',
  '".$_POST['name']."',
  '".$_POST['date']."',
  '".$_POST['email']."', 
  '".$_POST['phone_number']."')";
  $query_simpan = mysqli_query($koneksi, $sql_simpan);
  mysqli_close($koneksi);

  if ($query_simpan) {
  	echo "
  		<script>
				alert('Tambah Data Berhasil!');
				document.location.href = 'index.php?page=data-customer';
			</script>
		";
  } else{
  	echo "
  		<script>
				alert('Tambah Data Gagal!');
				document.location.href = 'index.php?page=add-customer';
			</script>
		";
  }
}