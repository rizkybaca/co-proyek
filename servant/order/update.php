<?php 
if (isset($_GET['kode'])) {
	$sql_cek="SELECT * FROM orders WHERE id='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek,MYSQLI_ASSOC);
  $b=$data_cek['status'];
}


function active_radio_button($value,$input){
	$result=$value==$input?'checked':'';
	return $result;
}
 ?>
<div class="head">
	<div class="tittle">
		<p>Checkout Order</p>
	</div>
</div>
<div class="cont-add-product">
	<form action="" method="POST">
		<input type="hidden" name="id" readonly value="<?= $data_cek['id']; ?>">
			<div class="input">
			<div class="col2">
				<div class="tittle">
					<p>Update status here</p>
				</div>
				<div class="radio">
					<input type="radio" name="status" value="bb" id="bb" <?= active_radio_button("bb", $b) ?>>
					<label for="bb">Belum Bayar</label>
				</div>
				<div class="radio">
					<input type="radio" name="status" value="sb" id="sb" <?= active_radio_button("sb", $b) ?>>
					<label for="sb">Sudah Bayar</label>
				</div>
				<div class="radio">
					<input type="radio" name="status" value="ex" id="ex" <?= active_radio_button("ex", $b) ?>>
					<label for="ex">expired</label>
				</div>
				<div class="radio">
					<input type="radio" name="status" value="cc" id="cc" <?= active_radio_button("cc", $b) ?>>
					<label for="cc">cancel</label>
				</div>
			</div>
			</div>
		<div class="button">
			<a href="index_v.php">Cancel</a>
			<input type="submit" name="save" value="Save">
		</div>
	</form>
</div>

<?php 
if (isset ($_POST['save'])){

  $sql_ubah = "UPDATE orders SET
   status='".$_POST['status']."',
   id_cashier='".$data_id."'
   WHERE id='".$_POST['id']."'"
   ;
  $query_ubah = mysqli_query($koneksi, $sql_ubah);
  mysqli_close($koneksi);

  if ($query_ubah) {
  	echo "
  		<script>
				alert('Edit Data Berhasil!');
				document.location.href = 'index_v.php';
			</script>
		";
  } else{
  	echo "
  		<script>
				alert('Edit Data Gagal!');
				document.location.href = 'index_v.php';
			</script>
		";
  }
}