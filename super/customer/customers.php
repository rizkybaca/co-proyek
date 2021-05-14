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
		$sql=$koneksi->query("SELECT * FROM customer");
		while($data=$sql->fetch_assoc()): ?>
		<tr>
			<td><?= $a++; ?></td>
			<td><?= $data['name']; ?></td>
			<td>
				<a href="">Detail</a>
				<a href="?page=edit-customer&kode=<?=$data['id']; ?>">Edit</a>
				<a href="">Delete</a>
			</td>
		</tr>
	<?php endwhile ?>
	</table>
</div>