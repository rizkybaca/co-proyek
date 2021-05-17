<?php 

$a=1;
 ?>
<div class="head">
	<div class="tittle">
		<p>Customers</p>
	</div>
	<div class="button">
		<a href="?page=add-store">Add Store</a>
	</div>
</div>
<div class="cont-show-store">
	<table border="1" width="100%">
		<tr>
			<th>No.</th>
			<th>Profile Image</th>
			<th>Name</th>
			<th>Address</th>
			<th>Phone Number</th>
			<th>Status</th>
			<th>Client Name</th>
			<th>Actions</th>
		</tr>
		<?php 
		$sql_cek="SELECT * FROM store LEFT JOIN client as c ON store.id_client=c.id";
		$query_cek = mysqli_query($koneksi, $sql_cek);
	  while($data_cek= mysqli_fetch_array($query_cek)) :?>
		<tr>
			<td><?= $a++; ?></td>
			<td><?= $data_cek['image']; ?></td>
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