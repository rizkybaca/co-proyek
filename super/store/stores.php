<?php 

if (isset($_GET['alert'])) {
	if ($_GET['alert']=="ext") {
		echo "
			  		<script>
							alert('Ekstensi foto salah!');
							document.location.href = 'index.php_u?page=data-store'
						</script>
					"
		;
	} elseif ($_GET['alert']=="size") {
		echo "
			  		<script>
							alert('Ukuran foto terlalu besar!');
							document.location.href = 'index.php_u?page=data-store'
						</script>
					"
		;
	}
}
$target='dist/img/store/';
$a=1;
 ?>
<div class="head">
	<div class="tittle">
		<p>Stores</p>
	</div>
	<div class="button">
		<a href="?page=add-store">Add Store</a>
	</div>
</div>
<div class="cont-show-store">
	<table>
		<tr>
			<th style="width: 50px;">No.</th>
			<th>Profile Image</th>
			<th>Name</th>
			<th>Address</th>
			<th>Phone Number</th>
			<th>Status</th>
			<th>Client Name</th>
			<th>Actions</th>
		</tr>
		<?php 
		$sql_cek="SELECT s.id, s.id_client, s.image, s.name, s.address, s.phone_number, s.status, c.name_c FROM store as s LEFT JOIN client as c ON s.id_client=c.id";
		$query_cek = mysqli_query($koneksi, $sql_cek);
	  while($data_cek= mysqli_fetch_array($query_cek)) :?>
		<tr>
			<td style="width: 50px;"><?= $a++; ?></td>
			<td>
				<img width="100px" src="<?= $target.$data_cek['image']; ?>">
			</td>
			<td><?= $data_cek['name']; ?></td>
			<td><?= $data_cek['address']; ?></td>
			<td><?= $data_cek['phone_number']; ?></td>
			<td><?= $data_cek['status']; ?></td>
			<td>
				<?= $data_cek['name_c']; ?>					
			</td>
			<td>
				<a href="?page=edit-store&kode=<?=$data_cek['id']; ?>">Edit</a>
				<a href="?page=del-store&kode=<?=$data_cek['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')">Delete</a>
			</td>
		</tr>
	<?php endwhile ?>
	</table>
</div>