<div class="head">
	<div class="tittle">
		<p>Add New Client</p>
	</div>
</div>
<div class="cont-add-client">
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
				<label for="address">Address</label>
				<textarea id="address" placeholder="type address here" name="address"></textarea>
			</div>
			<div class="col">
				<label for="contact">Phone Number</label>
				<input type="text" name="phone_number" id="contact" placeholder="type number phone here" required>
			</div>
			<div class="col">
				<label for="email">E-Mail</label>
				<input type="email" name="email" id="email" placeholder="type email here" required>
			</div>

			<!-- <div class="col2">
				<label for="id_card">Id Card</label>
				<input type="file" name="id_card" id="id_card" required>
			</div>
			<div class="col2">
				<label for="profile_picture">Profile Picture</label>
				<input type="file" name="profile_picture" id="profile_picture" required>
			</div>
			<div class="col2">
				<label for="business_license">Business License</label>
				<input type="file" name="business_license" id="business_license" required>
			</div> -->

			<div class="col">
				<label for="id_card">Id Card</label>
				<input type="text" name="id_card" id="id_card" required>
			</div>
			<div class="col">
				<label for="profile_picture">Profile Picture</label>
				<input type="text" name="profile_picture" id="profile_picture" required>
			</div>
			<div class="col">
				<label for="business_license">Business License</label>
				<input type="text" name="business_license" id="business_license" required>
			</div>

		</div>
		<div class="button">
			<a href="?page=data-client">Cancel</a>
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
  $sql_simpan = "INSERT INTO client (username,password,name_c,address,phone_number,email,id_card,profile_picture,business_license) VALUES (
  '".$_POST['username']."',
  '".$_POST['password']."',
  '".$_POST['name']."',
  '".$_POST['address']."',
  '".$_POST['phone_number']."',
  '".$_POST['email']."',
  '".$_POST['id_card']."',
  '".$_POST['profile_picture']."',
  '".$_POST['business_license']."')";
  $query_simpan = mysqli_query($koneksi, $sql_simpan);
  mysqli_close($koneksi);

  if ($query_simpan) {
  	echo "
  		<script>
				alert('Tambah Data Berhasil!');
				document.location.href = 'index.php?page=data-client';
			</script>
		";
  } else{
  	echo "
  		<script>
				alert('Tambah Data Gagal!');
				document.location.href = 'index.php?page=add-client';
			</script>
		";
  }
}