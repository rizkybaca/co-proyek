<?php 
$datanya=mysqli_query($koneksi, "SELECT * FROM client");
$a=1;
 ?>
<div class="head">
	<div class="tittle">
		<p>Clients</p>
	</div>
	<div class="button">
		<a href="?page=add-client">Add Clients</a>
	</div>
</div>
<div class="cont-show-client">
	<table>
		<tr>
			<th>No.</th>
			<th>Name</th>
			<th>Action</th>
		</tr>
		<?php foreach ($datanya as $b): ?>
		<tr>
			<td><?= $a; ?></td>
			<td><?= $b['name']; ?></td>
			<td>
				<a href="">Detail</a>
				<a href="?page=edit-client">Edit</a>
				<a href="">Delete</a>
			</td>
		</tr>
		<?php $a++; ?>
	<?php endforeach ?>
	</table>
	
</div>