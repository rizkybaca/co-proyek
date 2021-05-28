<?php 
if (isset($_GET['kode'])) {
	$sql_cek="SELECT * FROM customer WHERE id='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek,MYSQLI_ASSOC);
}
 ?>
<div class="head">
	<div class="tittle">
		<p>Edit Customer</p>
	</div>
</div>
<div class="cont-add-customer">
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
				<input type="text" name="name" id="name" placeholder="type name here" value="<?= $data_cek['name']; ?>">
			</div>
			<div class="col">
				<label for="email">E-Mail</label>
				<input type="text" name="email" id="email" placeholder="type email here" value="<?= $data_cek['email']; ?>">
			</div>
			<div class="col">
				<label for="contact">Phone Number</label>
				<input type="text" name="phone_number" id="contact" placeholder="type number phone here" value="<?= $data_cek['phone_number']; ?>">
			</div>
		</div>
		<div class="button">
			<a href="?page=data-customer">Cancel</a>
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

	if ($data_u['username']===$_POST['username']) {
		echo "
  		<script>
				alert('Username sudah ada!');
				document.location.href = 'index_u.php?page=add-client';
			</script>
		";
	} else {

  $sql_ubah = "UPDATE customer SET
   username='".$_POST['username']."',
   password='".$_POST['password']."',
   name='".$_POST['name']."',
   email='".$_POST['email']."',
   phone_number='".$_POST['phone_number']."'
   WHERE id='".$_POST['id']."'"
   ;
  $query_ubah = mysqli_query($koneksi, $sql_ubah);
  mysqli_close($koneksi);

  if ($query_ubah) {
  	echo "
  		<script>
				alert('Edit Data Berhasil!');
				document.location.href = 'index_u.php?page=data-customer';
			</script>
		";
  } else{
  	echo "
  		<script>
				alert('Edit Data Gagal!');
				document.location.href = 'index_u.php?page=edit-customer';
			</script>
		";
  }
}
}