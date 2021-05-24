<div class="head">
	<div class="tittle">
		<p>Add New product</p>
	</div>
</div>
<div class="cont-add-product">
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="input">
			<div class="col">
				<label for="image">Product Image</label>
				<input type="file" name="image" id="image" required>
			</div>
			<div class="col">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" placeholder="type name here" required>
			</div>
			<div class="col">
				<label for="price">Price</label>
				<input type="text" name="price" id="price" placeholder="type product price here" required>
			</div>
			<div class="col">
				<label for="stock">Stock</label>
				<input type="text" name="stock" id="stock" placeholder="type product stock here" required>
			</div>
			<div class="col2">
				<div class="tittle">
					<p>choose product type here</p>
				</div>
				<div class="radio">
					<input type="radio" name="types" value="foods" id="foods" required>
					<label for="foods">Foods</label>
				</div>
				<div class="radio">
					<input type="radio" name="types" value="drinks" id="drinks">
					<label for="drinks">Drinks</label>
				</div>
				<div class="radio">
					<input type="radio" name="types" value="snacks" id="snacks">
					<label for="snacks">Snacks</label>
				</div>
			</div>
		
			<div class="col2">
				<div class="tittle">
					<p>choose product status here</p>
				</div>
				<div class="radio">
					<input type="radio" name="status" value="ready" id="ready" required>
					<label for="ready">Ready</label>
				</div>
				<div class="radio">
					<input type="radio" name="status" value="empty" id="empty">
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

	if (!in_array($ext, $ekstensi)) {
		echo "
		  		<script>
						alert('Ekstensi foto salah!');
						document.location.href = 'index_v.php?page=add-product';
					</script>
				";
	} else{
		if ($ukuran<=5000000) {
			$image=$rand.'_'.$file_name;
			move_uploaded_file($temp, $target.$image);
			$d=$data_id_store;
			$sql_simpan = "INSERT INTO products (types,name_p,price,stocks,image,id_store,status) VALUES (
			'".$_POST['types']."',
			'".$_POST['name']."',
			'".$_POST['price']."',
			'".$_POST['stock']."',
			'$image',
			'$d',
			'".$_POST['status']."')";
		  $query_simpan = mysqli_query($koneksi, $sql_simpan);
		  mysqli_close($koneksi);

		  if ($query_simpan) {
		  	echo "
		  		<script>
						alert('Tambah Data Berhasil!');
						document.location.href = 'index_v.php?page=data-product';
					</script>
				";
		  } else{
		  	echo "
		  		<script>
						alert('Tambah Data Gagal!');
						document.location.href = 'index_v.php?page=add-product';
					</script>
				";
		  }

		} else{
			echo "
		  		<script>
						alert('ukuran foto terlalu besar!');
						document.location.href = 'index_v.php?page=add-product';
					</script>
				";
		}
	}
}
