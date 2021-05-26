<?php 
	$sql_cek="SELECT * FROM client WHERE id='".$data_id."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek,MYSQLI_ASSOC);

 ?>
<div class="head">
	<div class="tittle">
		<p>User Setting</p>
	</div>
</div>
<div class="cont-setting">
	<form action="" method="POST">
		<input type="hidden" name="id" readonly value="<?= $data_cek['id']; ?>">
		<div class="input">
			<div class="col">
				<label for="username">Username</label>
				<input type="text" name="username" id="username" placeholder="type username here" value="<?= $data_cek['username']; ?>" required>
			</div>
			<div class="col">
				<label for="password">Password</label>
				<input required type="password" name="password" id="password" placeholder="type password here" value="<?= $data_cek['password']; ?>">
				<div class="checkbox">
				  <input type="checkbox" name="look-password" id="mybutton" onclick="change()">
				  <label for="mybutton">check to see password</label>
				</div>
			</div>
			<div class="col">
				<label for="name">Name</label>
				<input required type="text" name="name" id="name" placeholder="type name here" value="<?= $data_cek['name_c']; ?>">
			</div>
			<div class="col">
				<label for="address">address</label>
				<textarea type="text" name="address" id="address" placeholder="type address here" required><?= $data_cek['address']; ?></textarea>
			</div>
			<div class="col">
				<label for="email">Email</label>
				<input required type="email" name="email" id="email" placeholder="type email here" value="<?= $data_cek['email']; ?>">
			</div>
			<div class="col">
				<label for="phone_number">Phone Number</label>
				<input type="text" name="phone_number" id="phone_number" placeholder="type phone number here" value="<?= $data_cek['phone_number']; ?>">
			</div>
			
		</div>
		<div class="button">
			<a href="index_c.php">Cancel</a>
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
//mulai proses simpan data
  $sql_ubah = "UPDATE client SET
   username='".$_POST['username']."',
   password='".$_POST['password']."',
   name_c='".$_POST['name']."'
   WHERE id='".$_POST['id']."'";
  $query_ubah = mysqli_query($koneksi, $sql_ubah);
  mysqli_close($koneksi);

  if ($query_ubah) {
  	$_SESSION["ses_name_c"]=$_POST['name'];
  	echo "
  		<script>
				alert('Ubah Data Berhasil!');
				document.location.href = 'index_c.php';
			</script>
		";
  } else{
  	echo "
  		<script>
				alert('Ubah Data Gagal!');
				document.location.href = 'index.php?page=edit-user';
			</script>
		";
  }
}