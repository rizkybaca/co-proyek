<?php 

if (isset($_GET['alert'])) {
	$alert=$_GET['alert'];
	switch ($alert) {
		case 'ic_mt':
				echo "
					<script>
						alert('Gagal, id card wajib diisi!');
						document.location.href = 'index.php?page=add-client';
					</script>
				";
			break;
		case 'ic_sz':
				echo "
		  		<script>
						alert('Gagal, silakan unggah id card dengan ukuran sesuai ketentuan!');
						document.location.href = 'index.php?page=add-client';
					</script>
				";
			break;
		case 'ic_xt':
				echo "
		  		<script>
						alert('Gagal, silakan unggah id card sesuai ekstensi!');
						document.location.href = 'index.php?page=add-client';
					</script>
				";
			break;
		case 'pp_mt':
				echo "
					<script>
						alert('Gagal, profile picture wajib diisi!');
						document.location.href = 'index.php?page=add-client';
					</script>
				";
			break;
		case 'pp_sz':
				echo "
		  		<script>
						alert('Gagal, silakan unggah profile picture dengan ukuran sesuai ketentuan!');
						document.location.href = 'index.php?page=add-client';
					</script>
				";
			break;
		case 'pp_xt':
				echo "
		  		<script>
						alert('Gagal, silakan unggah profile picture sesuai ekstensi!');
						document.location.href = 'index.php?page=add-client';
					</script>
				";
			break;
		case 'bl_mt':
				echo "
					<script>
						alert('Gagal, business lisence wajib diisi!');
						document.location.href = 'index.php?page=add-client';
					</script>
				";
			break;
		case 'bl_sz':
				echo "
		  		<script>
						alert('Gagal, silakan unggah business lisence dengan ukuran sesuai ketentuan!');
						document.location.href = 'index.php?page=add-client';
					</script>
				";
			break;
		case 'bl_xt':
				echo "
		  		<script>
						alert('Gagal, silakan unggah business lisence sesuai ekstensi!');
						document.location.href = 'index.php?page=add-client';
					</script>
				";
			break;
	}
}

 ?>

<div class="head">
	<div class="tittle">
		<p>Add New Client</p>
	</div>
</div>
<div class="cont-add-client">
	<form action="" method="POST" enctype="multipart/form-data">
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
				<label for="address">Address</label>
				<textarea id="address" placeholder="type address here" name="address"></textarea>
			</div>
			<div class="col">
				<label for="contact">Phone Number</label>
				<input type="text" name="phone_number" id="contact" placeholder="type number phone here" required>
			</div>
			<div class="col">
				<label for="email">E-Mail</label>
				<input type="email" name="email" id="email" placeholder="type email here" required>
			</div>
			<div class="col">
				<label for="id_card">Id Card</label>
				<input type="file" name="ic" id="id_card" required>
			</div>
			<div class="col">
				<label for="profile_picture">Profile Picture</label>
				<input type="file" name="pp" id="profile_picture" required>
			</div>
			<div class="col">
				<label for="business_license">Business License</label>
				<input type="file" name="bl" id="business_license" required>
			</div>

		</div>
		<div class="button">
			<a href="?page=data-client">Cancel</a>
			<input type="submit" name="save" value="Save">
		</div>
	</form>
</div>

<?php 

// ###############################################
	function upload_ic(){
	$rand_ic=rand();
	$ekstensi_ic=array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG');
	$file_name_ic=$_FILES['ic']['name'];
	$size_ic=$_FILES['ic']['size'];
	$temp_ic=$_FILES['ic']['tmp_name'];
	$error_ic=$_FILES['ic']['error'];
	$ext_ic=pathinfo($file_name_ic, PATHINFO_EXTENSION);
	$target_ic='dist/img/client/ic/';

	if ($error===4) {
		header("location:index.php?page=add-client&alert=ic_mt");
	}

	if(in_array($ext_ic, $ekstensi_ic)){
		if ($size_ic>=5000000) {
			header("location:index.php?page=add-client&alert=ic_sz");
		} else {
		$image_ic=$rand_ic.'_'.$file_name_ic;
		move_uploaded_file($temp_ic, $target_ic.$image_ic);

		return $image_ic;	
		} 
	}else {
		header("location:index.php?page=add-client&alert=ic_xt");
	}
}

	function upload_pp(){
	$rand_pp=rand();
	$ekstensi_pp=array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG');
	$file_name_pp=$_FILES['pp']['name'];
	$size_pp=$_FILES['pp']['size'];
	$temp_pp=$_FILES['pp']['tmp_name'];
	$error_pp=$_FILES['pp']['error'];
	$ext_pp=pathinfo($file_name_pp, PATHINFO_EXTENSION);
	$target_pp='dist/img/client/pp/';

	if ($error===4) {
		header("location:index.php?page=add-client&alert=pp_mt");
	}

	if(in_array($ext_pp, $ekstensi_pp)){
		if ($size_pp>=5000000) {
			header("location:index.php?page=add-client&alert=pp_sz");
		} else {
		$image_pp=$rand_pp.'_'.$file_name_pp;
		move_uploaded_file($temp_pp, $target_pp.$image_pp);

		return $image_pp;	
		} 
	}else {
		header("location:index.php?page=add-client&alert=pp_xt");
	}
}

	function upload_bl(){
	$rand_bl=rand();
	$ekstensi_bl=array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG');
	$file_name_bl=$_FILES['bl']['name'];
	$size_bl=$_FILES['bl']['size'];
	$temp_bl=$_FILES['bl']['tmp_name'];
	$error_bl=$_FILES['bl']['error'];
	$ext_bl=pathinfo($file_name_bl, PATHINFO_EXTENSION);
	$target_bl='dist/img/client/bl/';

	if ($error===4) {
		header("location:index.php?page=add-client&alert=bl_mt");
	}

	if(in_array($ext_bl, $ekstensi_bl)){
		if ($size_bl>=5000000) {
			header("location:index.php?page=add-client&alert=bl_sz");
		} else {
		$image_bl=$rand_bl.'_'.$file_name_bl;
		move_uploaded_file($temp_bl, $target_bl.$image_bl);

		return $image_bl;	
		} 
	}else {
		header("location:index.php?page=add-client&alert=bl_xt");
	}
}


	// ###############################################


if (isset ($_POST['save'])){


	$ic=upload_ic();
	$pp=upload_pp();
	$bl=upload_bl();

  $sql_simpan = "INSERT INTO client (username,password,name_c,address,phone_number,email,id_card,profile_picture,business_license) VALUES (
  '".$_POST['username']."',
  '".$_POST['password']."',
  '".$_POST['name']."',
  '".$_POST['address']."',
  '".$_POST['phone_number']."',
  '".$_POST['email']."',
  '$ic',
  '$pp',
  '$bl')";
  $query_simpan = mysqli_query($koneksi, $sql_simpan);
  mysqli_close($koneksi);

  if ($query_simpan) {
  	echo "
  		<script>
				alert('Tambah Data Berhasil!');
				document.location.href = 'index.php?page=data-client';
			</script>
		";
  } else{
  	echo "
  		<script>
				alert('Tambah Data Gagal!');
				document.location.href = 'index.php?page=add-client';
			</script>
		";
  }
}