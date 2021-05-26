<?php 
$sql_cek="SELECT * FROM store WHERE id_client='$data_id'"; //andi lau, anaaa
$query_cek=mysqli_query($koneksi, $sql_cek);

?>
<div class="head">
	<div class="tittle">
		<p>Add New Servant</p>
	</div>
</div>
<div class="cont-add-servant">
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
				<label for="id_store_v">Store Name</label>
				<select name="id_store_v" id="id_store_v" required>
					<option>--choose store here--</option>
					<?php while ($a=mysqli_fetch_array($query_cek)): ?>
						<option value="<?= $a['id']; ?>">
							<?= $a['name']; ?>
						</option>						
					<?php endwhile ?>
				</select>
			</div>			
			<div class="col2">
				<div class="tittle">
					<p>choose servant role here</p>
				</div>
				<div class="radio">
					<input type="radio" name="role" value="product_admin" id="product_admin" required>
					<label for="product_admin">Product Admin</label>
				</div>
				<div class="radio">
					<input type="radio" name="role" value="cashier" id="cashier">
					<label for="cashier">Cashier</label>
				</div>
			</div>
		</div>
		<div class="button">
			<a href="?page=data-servant">Cancel</a>
			<input type="submit" name="save" value="Save">
		</div>
	</form>
</div>

<?php 

if (isset ($_POST['save'])){

	$sql_u="SELECT username FROM servant";
	$query_u=mysqli_query($koneksi, $sql_u);
	$data_u=mysqli_fetch_array($query_u);

	if ($data_u['username']===$_POST['username']) {
		echo "
  		<script>
				alert('Username sudah ada!');
				document.location.href = 'index_u.php?page=add-servant';
			</script>
		";
	} else {

  $sql_simpan = "INSERT INTO servant (username,password,name,join_date,id_store_v,role) VALUES (
  '".$_POST['username']."',
  '".$_POST['password']."',
  '".$_POST['name']."',
  '".$_POST['date']."', 
  '".$_POST['id_store_v']."',
  '".$_POST['role']."')";
  $query_simpan = mysqli_query($koneksi, $sql_simpan);
  mysqli_close($koneksi);

  if ($query_simpan) {
  	echo "
  		<script>
				alert('Tambah Data Berhasil!');
				document.location.href = 'index_c.php?page=data-servant';
			</script>
		";
  } else{
  	echo "
  		<script>
				alert('Tambah Data Gagal!');
				document.location.href = 'index_c.php?page=add-servant';
			</script>
		";
  }
}
}