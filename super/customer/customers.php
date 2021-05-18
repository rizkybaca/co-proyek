<?php 
$a=1;
 ?>
<div class="head">
	<div class="tittle">
		<p>Customers</p>
	</div>
	<div class="button">
		<a href="?page=add-customer">Add Customer</a>
	</div>
</div>
<div class="cont-show-customer">
	<table border="1" width="100%" style="border-collapse: collapse;">
		<tr>
			<th>No.</th>
			<th>Name</th>
			<th>Join Date</th>
			<th>Email</th>
			<th>Phone Number</th>
			<th>Actions</th>
		</tr>
		<?php 
		$sql_cek="SELECT *FROM customer";
		$query_cek = mysqli_query($koneksi, $sql_cek);
	  while($data_cek= mysqli_fetch_array($query_cek)) :?>
		<tr>
			<td><?= $a++; ?></td>
			<td><?= $data_cek['name']; ?></td>
			<td><?= $data_cek['join_date']; ?></td>
			<td><?= $data_cek['email']; ?></td>
			<td><?= $data_cek['phone_number']; ?></td>
			<td>
				<a href="?page=detail-customer&kode=<?=$data_cek['id']; ?>">Detail</a>
				<a href="?page=edit-customer&kode=<?=$data_cek['id']; ?>">Edit</a>
				<a href="?page=del-customer&kode=<?=$data_cek['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')">Delete</a>
			</td>
		</tr>
	<?php endwhile ?>
	</table>
</div>