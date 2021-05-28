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
			<th style="min-width: 50px;">No.</th>
			<th style="min-width: 120px;">Profile Image</th>
			<th style="min-width: 150px;">Name</th>
			<th style="min-width: 120px;">Address</th>
			<th style="min-width: 150px">Phone Number</th>
			<th>Status</th>
			<th style="min-width:150px">Client Name</th>
			<th style="min-width: 80px;">Actions</th>
		</tr>
		<?php 
		$sql_cek="SELECT s.id, s.id_client, s.image, s.name, s.address, s.phone_number, s.status, c.name_c FROM store as s LEFT JOIN client as c ON s.id_client=c.id";
		$query_cek = mysqli_query($koneksi, $sql_cek);
	  while($data_cek= mysqli_fetch_array($query_cek)) :?>
		<tr>
			<td style="min-width: 50px;"><?= $a++; ?></td>
			<td style="min-width: 120px;">
				<img width="100px" src="<?= $target.$data_cek['image']; ?>">
			</td>
			<td style="min-width: 150px;"><?= $data_cek['name']; ?></td>
			<td style="min-width: 120px;"><?= $data_cek['address']; ?></td>
			<td style="min-width: 150px"><?= $data_cek['phone_number']; ?></td>
			<td><?= $data_cek['status']; ?></td>
			<td style="min-width:150px">
				<?= $data_cek['name_c']; ?>					
			</td>
			<td style="min-width: 80px;">
				<a href="?page=edit-store&kode=<?=$data_cek['id']; ?>">Edit</a>
				<a href="?page=del-store&kode=<?=$data_cek['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')">Delete</a>
			</td>
		</tr>
	<?php endwhile ?>
	</table>
</div>