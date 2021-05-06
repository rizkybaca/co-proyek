<?php 
if (isset($_GET['kode'])) {
	$sql_cek="SELECT *FROM client WHERE id='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
 ?>
<div class="head">
	<div class="tittle">
		<p>Update Client</p>
	</div>
</div>
<div class="cont-add-client">
	<form action="" method="POST">
		<input type="hidden" name="id" readonly value="<?= $data_cek['id']; ?>">
		<div class="input">
			<div class="col">
				<label for="username">Username</label>
				<input type="text" name="username" id="username" placeholder="type username here" value="<?= $data_cek['username']; ?>">
			</div>
			<div class="col">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" placeholder="type password here" value="<?= $data_cek['password']; ?>">
				<!-- <div class="checkbox">
				  <input type="checkbox" name="look-password" id="mybutton" onclick="change()">
				  <label for="look-password">lihat password</label>
				</div> -->
			</div>
			<div class="col">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" placeholder="type name here" value="<?= $data_cek['name']; ?>">
			</div>
			<div class="col">
				<label for="address">Address</label>
				<textarea id="address" placeholder="type address here"><?= $data_cek['address']; ?></textarea>
			</div>
			<div class="col">
				<label for="contact">Phone Number</label>
				<input type="text" name="phone_number" id="contact" placeholder="type number phone here" value="<?= $data_cek['phone_number']; ?>">
			</div>
			<div class="col">
				<label for="email">E-Mail</label>
				<input type="text" name="email" id="email" placeholder="type email here" value="<?= $data_cek['email']; ?>">
			</div>
<!-- 			<div class="col2">
				<label for="id_card">Id Card</label>
				<input type="file" name="id_card" id="id_card">
			</div>
			<div class="col2">
				<label for="profile_picture">Profile Picture</label>
				<input type="file" name="profile_picture" id="profile_picture">
			</div>
			<div class="col2">
				<label for="business_license">Business License</label>
				<input type="file" name="business_license" id="business_license">
			</div> -->

			<div class="col">
				<label for="id_card">Id Card</label>
				<input type="text" name="id_card" id="id_card" placeholder="type id card here" value="<?= $data_cek['id_card']; ?>">
			</div>
			<div class="col">
				<label for="profile_picture">Profile Picture</label>
				<input type="text" name="profile_picture" id="profile_picture" placeholder="type profile picture here" value="<?= $data_cek['profile_picture']; ?>">
			</div>
			<div class="col">
				<label for="business_license">Business License</label>
				<input type="text" name="business_license" id="business_license" placeholder="type business lisence here" value="<?= $data_cek['business_license']; ?>">
			</div>

		</div>
		<div class="button">
			<a href="">Cancel</a>
			<input type="submit" name="save" value="Save">
		</div>
	</form>
</div>
<!-- <script type="text/javascript">
	function change(){
	  var x = document.getElementById('pass').type;
	  if (x == 'password') {
      document.getElementById('pass').type = 'text';
      document.getElementById('mybutton').innerHTML;
	  } else{
      document.getElementById('pass').type = 'password';
      document.getElementById('mybutton').innerHTML;
	  }
	}
</script> -->
<?php 

if (isset ($_POST['save'])){
//mulai proses simpan data
	// if ($_POST['ini_level']=='Administrator'){
	// 	$jenis="ADM";
	// } else{
	// 	$jenis="PAN";
	// }
  $sql_ubah = "UPDATE client SET
   username='".$_POST['username']."',
   password='".$_POST['password']."',
   name='".$_POST['name']."',
   address='".$_POST['address']."',
   phone_number='".$_POST['phone_number']."',
   email='".$_POST['email']."',
   id_card='".$_POST['id_card']."',
   profile_picture='".$_POST['profile_picture']."',
   business_license='".$_POST['business_license']."'";
  $query_ubah = mysqli_query($koneksi, $sql_ubah);
  mysqli_close($koneksi);

  if ($query_ubah) {
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
				document.location.href = 'index.php?page=edit-client';
			</script>
		";
  }
}