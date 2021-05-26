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
		<p>Client Details</p>
	</div>
</div>
<div class="cont-add-client">
	<form action="" method="POST">
		<div class="input">
			<div class="col">
				<label for="username">Username</label>
				<input type="text" readonly name="username" id="username" placeholder="type username here" value="<?= $data_cek['username']; ?>">
			</div>
			<div class="col">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" placeholder="type password here" value="<?= $data_cek['password']; ?>" readonly>
				<div class="checkbox">
				  <input type="checkbox" name="look-password" id="mybutton" onclick="change()">
				  <label for="mybutton">check to see password</label>
				</div>
			</div>
			<div class="col">
				<label for="name">Name</label>
				<input type="text" readonly name="name" id="name" placeholder="type name here" value="<?= $data_cek['name_c']; ?>">
			</div>
			<div class="col">
				<label for="address">Address</label>
				<textarea readonly id="address" placeholder="type address here"><?= $data_cek['address']; ?></textarea>
			</div>
			<div class="col">
				<label for="contact">Phone Number</label>
				<input readonly type="text" name="phone_number" id="contact" placeholder="type number phone here" value="<?= $data_cek['phone_number']; ?>">
			</div>
			<div class="col">
				<label for="email">E-Mail</label>
				<input readonly type="email" name="email" id="email" placeholder="type email here" value="<?= $data_cek['email']; ?>">
			</div>
			<div class="col">
				<label for="id_card">Id Card</label>
				<img width="100px" src="<?= $target_ic.$data_cek['id_card']; ?>">
			</div>
			<div class="col">
				<label for="profile_picture">Profile Picture</label>
				<img width="100px" src="<?= $target_pp.$data_cek['profile_picture']; ?>">
			</div>
			<div class="col">
				<label for="business_license">Business License</label>
				<img width="100px" src="<?= $target_bl.$data_cek['business_license']; ?>">
			</div>

		</div>
		<div class="button">
			<a href="?page=data-client">Back</a>
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