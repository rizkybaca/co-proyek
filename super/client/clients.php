<?php 

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
		<?php 
		$sql=$koneksi->query("SELECT * FROM client");
		while($data=$sql->fetch_assoc()): ?>
		<tr>
			<td><?= $a++; ?></td>
			<td><?= $data['name']; ?></td>
			<td>
				<a href="">Detail</a>
				<a href="?page=edit-client&kode=<?=$data['id']; ?>">Edit</a>
				<a href="">Delete</a>
			</td>
		</tr>
	<?php endwhile ?>
	</table>
	
</div>