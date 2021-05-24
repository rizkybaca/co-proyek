<?php 
if (isset($_GET['kode'])) {
	$sql_cek="SELECT * FROM products WHERE id_p='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek, MYSQLI_ASSOC);
  $b=$data_cek['types'];
  $s=$data_cek['status'];
}
function active_radio_button1($value,$input){
	$result=$value==$input?'checked':'';
	return $result;
}
function active_radio_button2($value,$input){
	$result=$value==$input?'checked':'';
	return $result;
}
$target='dist/img/product/';
 ?>
<div class="head">
	<div class="tittle">
		<p>Edit Product</p>
	</div>
</div>
<div class="cont-add-product">
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="input">
			<input type="hidden" name="id" readonly value="<?= $data_cek['id_p']; ?>">
			<div class="col">
				<label for="image">Product Image</label>
				<input type="file" name="image" id="image">
				<img width="100px" src="<?= $target.$data_cek['image']; ?>">
			</div>
			<div class="col">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" placeholder="type name here" value="<?= $data_cek['name_p']; ?>" required>
			</div>
			<div class="col">
				<label for="price">Price</label>
				<input type="text" name="price" id="price" value="<?= $data_cek['price']; ?>" placeholder="type product price here" required>
			</div>
			<div class="col">
				<label for="stock">Stock</label>
				<input type="text" name="stock" id="stock" value="<?= $data_cek['stocks']; ?>" placeholder="type product stock here" required>
			</div>
			<div class="col2">
				<div class="tittle">
					<p>choose product type here</p>
				</div>
				<div class="radio">
					<input type="radio" name="types" value="foods" id="foods" <?= active_radio_button1("foods", $b) ?>>
					<label for="foods">Foods</label>
				</div>
				<div class="radio">
					<input type="radio" name="types" value="drinks" id="drinks" <?= active_radio_button1("drinks", $b) ?>>
					<label for="drinks">Drinks</label>
				</div>
				<div class="radio">
					<input type="radio" name="types" value="snacks" id="snacks" <?= active_radio_button1("snacks", $b) ?>>
					<label for="snacks">Snacks</label>
				</div>
			</div>
			<div class="col2">
				<div class="tittle">
					<p>choose product status here</p>
				</div>
				<div class="radio">
					<input type="radio" name="status" value="ready" id="ready" <?= active_radio_button2("ready", $s) ?>>
					<label for="ready">Ready</label>
				</div>
				<div class="radio">
					<input type="radio" name="status" value="empty" id="empty" <?= active_radio_button2("empty", $s) ?>>
					<label for="empty">Empty</label>
				</div>
			</div>
		</div>
		<div class="button">
			<a href="?page=data-product">Cancel</a>
			<input type="submit" name="save" value="Save">
		</div>
	</form>
</div>
 
<?php
if (isset ($_POST['save'])){

	$rand=rand();
	$ekstensi=array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG');
	$file_name=$_FILES['image']['name'];
	$ukuran=$_FILES['image']['size'];
	$temp=$_FILES['image']['tmp_name'];
	$ext=pathinfo($file_name, PATHINFO_EXTENSION);
	$target='dist/img/product/';

	if(!empty($temp)){
		if (!in_array($ext, $ekstensi)) {
		header("location:index_v.php?page=data-product&alert=xt");
		} elseif (in_array($ext, $ekstensi)){
			if ($ukuran<=5000000) {
				$foto=$data_cek['image'];
					if (file_exists($target.$foto)) {
						unlink($target.$foto);
					}
				$image=$rand.'_'.$file_name;
				move_uploaded_file($temp, $target.$image);
				$sql_ubah = "UPDATE products SET
				   types='".$_POST['types']."',
				   name_p='".$_POST['name']."',
				   price='".$_POST['price']."',
				   stocks='".$_POST['stock']."',
				   image='$image',
				   status='".$_POST['status']."'   
				   WHERE id_p='".$_POST['id']."'"
				;
			  $query_ubah = mysqli_query($koneksi, $sql_ubah);
			  mysqli_close($koneksi);

				if ($query_ubah) {
					echo "
						<script>
							alert('Edit Data Berhasil!');
							document.location.href = 'index_v.php?page=data-product';
						</script>
					";
				} else {
					echo "
						<script>
							alert('Edit Data Gagaaaaal!');
							document.location.href = 'index_v.php?page=data-product';
						</script>
					";
				}
			} elseif($ukuran>5000000) {
			header("location:index_v.php?page=data-product&alert=size");
			}
		}
	} elseif (empty($temp)){
		$sql_ubah = "UPDATE products SET
		types='".$_POST['types']."',
		name_p='".$_POST['name']."',
		price='".$_POST['price']."',
		stocks='".$_POST['stock']."',
		status='".$_POST['status']."' 
		WHERE id_p='".$_POST['id']."'"
		;
		$query_ubah = mysqli_query($koneksi, $sql_ubah);
		mysqli_close($koneksi);

		if ($query_ubah) {
		echo "
		<script>
			alert('Edit Data Berhasil!');
			document.location.href = 'index_v.php?page=data-product';
		</script>
		";
		} else {
		echo "
		<script>
			alert('Edit Data Gagal nih!');
			document.location.href = 'index_v.php?page=data-product';
		</script>
		";
		}
	}
}
