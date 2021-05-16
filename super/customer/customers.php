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
	<table border="1">
		<tr>
			<th>No.</th>
			<th>Name</th>
			<th>Actions</th>
		</tr>
		<?php 
		$sql_cek="SELECT *FROM customer";
		$query_cek = mysqli_query($koneksi, $sql_cek);
	  while($data_cek= mysqli_fetch_array($query_cek)) :?>
		<tr>
			<td><?= $a++; ?></td>
			<td><?= $data_cek['name']; ?></td>
			<td>
				<a href="">Detail</a>
				<a href="?page=edit-customer&kode=<?=$data_cek['id']; ?>">Edit</a>
				<a href="?page=del-customer&kode=<?=$data_cek['id']; ?>">Delete</a>
			</td>
		</tr>
	<?php endwhile ?>
	</table>
</div>