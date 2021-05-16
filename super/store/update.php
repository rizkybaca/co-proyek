<?php 
if (isset($_GET['kode'])) {
	$sql_cek="SELECT * FROM store WHERE id='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek,MYSQLI_ASSOC);
}
function active_radio_button($value,$input){
	$result=$value==$input?'checked':'';
	return $result;
}
$b=$data_cek['status'];
 ?>
<div class="head">
	<div class="tittle">
		<p>Edit Store</p>
	</div>
</div>
<div class="cont-add-store">
	<form action="" method="POST">
		<input type="hidden" name="id" readonly value="<?= $data_cek['id']; ?>">
		<div class="input">
			<div class="col">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" placeholder="type name here" value="<?=$data_cek['name'] ?>">
			</div>
			<div class="col">
				<label for="address">Address</label>
				<textarea id="address" name="address" placeholder="type address here"><?=$data_cek['address'] ?></textarea>
			</div>
			<div class="col">
				<label for="contact">Phone Number</label>
				<input type="text" name="phone_number" id="contact" placeholder="type phonenumber here" value="<?=$data_cek['phone_number'] ?>">
			</div>
			<div class="col">
				<label for="name_client">Client Name</label>
				<input type="text" name="name_client" id="name_client" placeholder="type name client here" value="<?=$data_cek['name_client'] ?>">
			</div>
			<div class="col2">
				<div class="tittle">
					<p>choose store status here</p>
				</div>
				<div class="radio">
					<input type="radio" name="status" value="active" id="active" required <?= active_radio_button("active", $b) ?>>
					<label for="active">Active</label>
				</div>
				<div class="radio">
					<input type="radio" name="status" value="deactive" id="deactive" <?= active_radio_button("deactive", $b) ?>>
					<label for="deactive">Deactive</label>
				</div>
			</div>
		</div>
		<div class="button">
			<a href="?page=data-store">Cancel</a>
			<input type="submit" name="save" value="Save">
		</div>
	</form>
</div>

<?php 

if (isset ($_POST['save'])){
  $sql_ubah = "UPDATE store SET
   name='".$_POST['name']."',
   address='".$_POST['address']."',
   phone_number='".$_POST['phone_number']."',
   status='".$_POST['status']."',
   name_client='".$_POST['name_client']."'   
   WHERE id='".$_POST['id']."'"
   ;
  $query_ubah = mysqli_query($koneksi, $sql_ubah);
  mysqli_close($koneksi);

  if ($query_ubah) {
  	echo "
  		<script>
				alert('Edit Data Berhasil!');
				document.location.href = 'index.php?page=data-store';
			</script>
		";
  } else{
  	echo "
  		<script>
				alert('Edit Data Gagal!');
				document.location.href = 'index.php?page=edit-store';
			</script>
		";
  }
}