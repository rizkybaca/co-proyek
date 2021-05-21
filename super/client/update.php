<?php 
if (isset($_GET['kode'])) {
	$sql_cek="SELECT *FROM client WHERE id='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek,MYSQLI_ASSOC);
}

if (isset($_GET['alert'])) {
	$alert=$_GET['alert'];
	switch ($alert) {
		case 'bl_sz':
				echo "
		  		<script>
						alert('Gagal, silakan unggah business lisence dengan ukuran sesuai ketentuan!');
						document.location.href = 'index_u.php?page=data-client';
					</script>
				";
			break;
		case 'bl_xt':
				echo "
		  		<script>
						alert('Gagal, silakan unggah business lisence sesuai ekstensi!');
						document.location.href = 'index_u.php?page=data-client';
					</script>
				";
			break;
	}
}
$target_bl='dist/img/client/bl/';
 ?>
<div class="head">
	<div class="tittle">
		<p>Update Client</p>
	</div>
</div>
<div class="cont-add-client">
	<form action="" method="POST" enctype="multipart/form-data">
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
				  <label for="mybutton">lihat password</label>
				</div>
			</div>
			<div class="col">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" placeholder="type name here" value="<?= $data_cek['name_c']; ?>">
			</div>
			<div class="col">
				<label for="address">Address</label>
				<textarea id="address" name="address" placeholder="type address here"><?= $data_cek['address']; ?></textarea>
			</div>
			<div class="col">
				<label for="contact">Phone Number</label>
				<input type="text" name="phone_number" id="contact" placeholder="type number phone here" value="<?= $data_cek['phone_number']; ?>">
			</div>
			<div class="col">
				<label for="email">E-Mail</label>
				<input type="email" name="email" id="email" placeholder="type email here" value="<?= $data_cek['email']; ?>">
			</div>
			<div class="col">
				<label for="business_license">Business License</label>
				<input type="file" name="bl" id="business_license">
				<img width="100px" src="<?= $target_bl.$data_cek['business_license']; ?>">
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

	$rand=rand();
	$ekstensi=array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG');
	$file_name=$_FILES['bl']['name'];
	$ukuran=$_FILES['bl']['size'];
	$temp=$_FILES['bl']['tmp_name'];
	$ext=pathinfo($file_name, PATHINFO_EXTENSION);
	$target='dist/img/client/bl/';

	if (!empty($temp)) {
		if (!in_array($ext, $ekstensi)) {
			header("location:index_u.php?page=edit-client&alert=bl_xt");
		} elseif (in_array($ext, $ekstensi)) {
			if ($ukuran<=5000000) {
				
				$foto=$data_cek['business_license'];
				if (file_exists($target.$foto)) {
					unlink($target.$foto);
				}

				$image=$rand.'_'.$file_name;
				move_uploaded_file($temp, $target.$image);

				$sql_ubah = "UPDATE client SET
			   username='".$_POST['username']."',
			   password='".$_POST['password']."',
			   name_c='".$_POST['name']."',
			   address='".$_POST['address']."',
			   phone_number='".$_POST['phone_number']."',
			   email='".$_POST['email']."',
			   business_license='$image'
			   WHERE id='".$_POST['id']."'";
			  $query_ubah = mysqli_query($koneksi, $sql_ubah);
			  mysqli_close($koneksi);
			  if ($query_ubah) {
			  	echo "
			  		<script>
							alert('Edit Data Berhasil!');
							document.location.href = 'index_u.php?page=data-client';
						</script>
					";
			  } else {
			  	echo "
			  		<script>
							alert('Edit Data Gagaaaaaaaal!');
							document.location.href = 'index_u.php?page=data-client';
						</script>
					";
			  }
			} elseif ($ukuran>5000000) {
				header("location:index_u.php?page=edit-client&alert=bl_sz");
			}
		}
	} elseif (empty($temp)){
		$sql_ubah = "UPDATE client SET
	   username='".$_POST['username']."',
	   password='".$_POST['password']."',
	   name_c='".$_POST['name']."',
	   address='".$_POST['address']."',
	   phone_number='".$_POST['phone_number']."',
	   email='".$_POST['email']."'
	   WHERE id='".$_POST['id']."'";
	  $query_ubah = mysqli_query($koneksi, $sql_ubah);
	  mysqli_close($koneksi);

	  if ($query_ubah) {
	  	echo "
	  		<script>
					alert('Edit Data Berhasil!');
					document.location.href = 'index_u.php?page=data-client';
				</script>
			";
	  } else {
	  	echo "
	  		<script>
					alert('Edit Data Gagal bro!');
					document.location.href = 'index_u.php?page=data-client';
				</script>
			";
	  }
	}
}