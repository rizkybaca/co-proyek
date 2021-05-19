<?php 
$sql_cek="SELECT * FROM client"; //andi lau, anaaa
$query_cek=mysqli_query($koneksi, $sql_cek);

?>
<div class="head">
	<div class="tittle">
		<p>Add New Store</p>
	</div>
</div>
<div class="cont-add-store">
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="input">
			<div class="col">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" placeholder="type name here" required>
			</div>
			<div class="col">
				<label for="address">Address</label>
				<textarea name="address" id="address" placeholder="type address here" required></textarea>
			</div>
			<div class="col">
				<label for="contact">Phone Number</label>
				<input type="text" name="phone_number" id="contact" placeholder="type number phone here" required>
			</div>
			<div class="col">
				<label for="id_client">Client Name</label>
				<select name="id_client" id="id_client" required>
					<option>--pilih client dibawah ini--</option>
					<?php while ($a=mysqli_fetch_array($query_cek)): ?>
						<option value="<?= $a['id']; ?>">
							<?= $a['name_c']; ?>
						</option>						
					<?php endwhile ?>
				</select>
			</div>
			<div class="col">
				<label for="image">Profile Image</label>
				<input type="file" name="image" id="image" required>
			</div>
			<div class="col2">
				<div class="tittle">
					<p>choose store status here</p>
				</div>
				<div class="radio">
					<input type="radio" name="status" value="active" id="active">
					<label for="active">Active</label>
				</div>
				<div class="radio">
					<input type="radio" name="status" value="deactive" id="deactive">
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

	$rand=rand();
	$ekstensi=array('png', 'jpg', 'jpeg');
	$file_name=$_FILES['image']['name'];
	$ukuran=$_FILES['image']['size'];
	$temp=$_FILES['image']['tmp_name'];
	$ext=pathinfo($file_name, PATHINFO_EXTENSION);
	$target='dist/img/store/';

	if (!in_array($ext, $ekstensi)) {
		echo "
		  		<script>
						alert('Ekstensi foto salah!');
						document.location.href = 'index.php?page=add-store';
					</script>
				";
		header("location:index.php?page=add-store");
	} else{
		if ($ukuran<5000000) {
			$image=$rand.'_'.$file_name;
			move_uploaded_file($temp, $target.$image);

			 $sql_simpan = "INSERT INTO store (name,address,phone_number,status,id_client,image) VALUES (
		  '".$_POST['name']."',
		  '".$_POST['address']."',
		  '".$_POST['phone_number']."',
		  '".$_POST['status']."',
		  '".$_POST['id_client']."',
			'$image')";
		  $query_simpan = mysqli_query($koneksi, $sql_simpan);
		  mysqli_close($koneksi);

		  if ($query_simpan) {
		  	echo "
		  		<script>
						alert('Tambah Data Berhasil!');
						document.location.href = 'index.php?page=data-store';
					</script>
				";
		  } else{
		  	echo "
		  		<script>
						alert('Tambah Data Gagal!');
						document.location.href = 'index.php?page=add-store';
					</script>
				";
		  }

		} else{
			echo "
		  		<script>
						alert('ukuran foto terlalu besar!');
						document.location.href = 'index.php?page=add-store';
					</script>
				";
		}
	}
}
