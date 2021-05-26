<?php 
	$sql_cek="SELECT *FROM super_user WHERE id='".$data_id."'";
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
				<input type="text" name="username" id="username" placeholder="type username here" value="<?= $data_cek['username']; ?>">
			</div>
			<div class="col">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" placeholder="type password here" value="<?= $data_cek['password']; ?>">
				<div class="checkbox">
				  <input type="checkbox" name="look-password" id="mybutton" onclick="change()">
				  <label for="mybutton">check to see password</label>
				</div>
			</div>
			<div class="col">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" placeholder="type name here" value="<?= $data_cek['name']; ?>">
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
//mulai proses simpan data
  $sql_ubah = "UPDATE super_user SET
   username='".$_POST['username']."',
   password='".$_POST['password']."',
   name='".$_POST['name']."'
   WHERE id='".$_POST['id']."'";
  $query_ubah = mysqli_query($koneksi, $sql_ubah);
  mysqli_close($koneksi);

  if ($query_ubah) {
  	echo "
  		<script>
				alert('Tambah Data Berhasil!');
				document.location.href = 'index.php';
			</script>
		";
  } else{
  	echo "
  		<script>
				alert('Tambah Data Gagal!');
				document.location.href = 'index.php?page=edit-user';
			</script>
		";
  }
}