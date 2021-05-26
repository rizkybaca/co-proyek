<?php 
if (isset($_GET['kode'])) {
	$sql_cek="SELECT v.id AS id_v, v.username, v.password, v.name AS name_v, v.join_date, v.role, v.id_store_v, s.name FROM servant AS v LEFT JOIN store AS s ON v.id_store_v=s.id WHERE v.id='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek,MYSQLI_ASSOC);
}
 ?>
<div class="head">
	<div class="tittle">
		<p>Servant Details</p>
	</div>
</div>
<div class="cont-add-servant">
	<form action="" method="POST">
		<div class="input">
			<div class="col">
				<label for="username">Username</label>
				<input readonly type="text" name="username" id="username" value="<?= $data_cek['username']; ?>">
			</div>
			<div class="col">
				<label for="password">Password</label>
				<input readonly type="password" name="password" id="password" value="<?= $data_cek['password']; ?>">
				<div class="checkbox">
				  <input type="checkbox" name="look-password" id="mybutton" onclick="change()">
				  <label for="mybutton">check to see password</label>
				</div>
			</div>
			<div class="col">
				<label for="name">Name</label>
				<input readonly type="text" name="name" id="name" value="<?= $data_cek['name_v']; ?>">
			</div>
			<div class="col">
				<label for="date">Join Date</label>
				<input readonly type="text" name="date" id="date" value="<?= $data_cek['join_date']; ?>" required>
			</div>
			<div class="col">
				<label for="id_store_v">Store Name</label>
				<input readonly type="text" name="id_store_v" id="id_store_v" value="<?= $data_cek['name']; ?>" required>
			</div>			
			<?php $rl=$data_cek['role']=='product_admin'?'Product Admin':'Cashier';?>
			<div class="col">
				<label for="role">Role</label>
				<input readonly type="text" name="role" id="role" value="<?= $rl; ?>">
			</div>
		</div>
		<div class="button">
			<a href="?page=data-servant">Back</a>
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