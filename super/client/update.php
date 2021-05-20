<?php 
if (isset($_GET['kode'])) {
	$sql_cek="SELECT *FROM client WHERE id='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek,MYSQLI_ASSOC);
}

$target_ic='dist/img/client/ic/';
$target_pp='dist/img/client/pp/';
$target_bl='dist/img/client/bl/';
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
				<div class="checkbox">
				  <input type="checkbox" name="look-password" id="mybutton" onclick="change()">
				  <label for="mybutton">lihat password</label>
				</div>
			</div>
			<div class="col">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" placeholder="type name here" value="<?= $data_cek['name_c']; ?>">
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
				<input type="email" name="email" id="email" placeholder="type email here" value="<?= $data_cek['email']; ?>">
			</div>
			<div class="col">
				<label for="id_card">Id Card</label>
				<input type="file" name="ic" id="id_card">
				<img width="100px" src="<?= $target_ic.$data_cek['id_card']; ?>">
			</div>
			<div class="col">
				<label for="profile_picture">Profile Picture</label>
				<input type="file" name="pp" id="profile_picture">
				<img width="100px" src="<?= $target_ic.$data_cek['profile_picture']; ?>">
			</div>
			<div class="col">
				<label for="business_license">Business License</label>
				<input type="file" name="bl" id="business_license">
				<img width="100px" src="<?= $target_ic.$data_cek['business_license']; ?>">
			</div>

		</div>
		<div class="button">
			<a href="?page=data-client">Cancel</a>
			<input type="submit" name="save" value="Save">
		</div>
	</form>
</div>

<script type="text/javascript">
	function change(){
	  var x = document.getElementById('password').type;
	  if (x == 'password') {
      document.getElementById('password').type = 'text';
      document.getElementById('mybutton').innerHTML;
	  } else{
      document.getElementById('password').type = 'password';
      document.getElementById('mybutton').innerHTML;
	  }
	}
</script>

<?php 

if (isset ($_POST['save'])){
  $sql_ubah = "UPDATE client SET
   username='".$_POST['username']."',
   password='".$_POST['password']."',
   name='".$_POST['name']."',
   address='".$_POST['address']."',
   phone_number='".$_POST['phone_number']."',
   email='".$_POST['email']."',
   id_card='".$_POST['id_card']."',
   profile_picture='".$_POST['profile_picture']."',
   business_license='".$_POST['business_license']."'
   WHERE id='".$_POST['id']."'";
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