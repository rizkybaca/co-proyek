<?php 
if (isset($_GET['kode'])) {
	$sql_cek="SELECT * FROM servant WHERE id='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek,MYSQLI_ASSOC);
}
$rl=$data_cek['role']=='product_admin'?'Product Admin':'Cashier';
function active_radio_button($value,$input){
	$result=$value==$input?'checked':'';
	return $result;
}
$cek_sql="SELECT * FROM store WHERE id_client='$data_id'";
$cek_query=mysqli_query($koneksi, $cek_sql);
 ?>
<div class="head">
	<div class="tittle">
		<p>Edit Servant</p>
	</div>
</div>
<div class="cont-add-servant">
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
			<div class="col">
				<label for="date">Join Date</label>
				<input type="text" name="date" id="date" placeholder="type join date here" value="<?= $data_cek['join_date']; ?>" required>
			</div>
			<div class="col">
				<label for="id_store_v">Store Name</label>
				<select name="id_store_v" id="id_store_v" required>
					<option>--choose store here--</option>
					<?php while ($a=mysqli_fetch_array($cek_query)): ?>
						<option value="<?= $a['id']; ?>" <?= $data_cek['id_store_v']==$a['id']?'selected':''?>>
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
					<input type="radio" name="role" value="product_admin" id="product_admin" <?= active_radio_button("Product Admin", $rl) ?>>
					<label for="product_admin">Product Admin</label>
				</div>
				<div class="radio">
					<input type="radio" name="role" value="cashier" id="cashier" <?= active_radio_button("Cashier", $rl) ?>>
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
  $sql_ubah = "UPDATE servant SET
   username='".$_POST['username']."',
   password='".$_POST['password']."',
   name='".$_POST['name']."',
   join_date='".$_POST['date']."',
   id_store_v='".$_POST['id_store_v']."',
   role='".$_POST['role']."'
   WHERE id='".$_POST['id']."'"
   ;
  $query_ubah = mysqli_query($koneksi, $sql_ubah);
  mysqli_close($koneksi);

  if ($query_ubah) {
  	echo "
  		<script>
				alert('Edit Data Berhasil!');
				document.location.href = 'index_c.php?page=data-servant';
			</script>
		";
  } else{
  	echo "
  		<script>
				alert('Edit Data Gagal!');
				document.location.href = 'index_c.php?page=edit-servant';
			</script>
		";
  }
}