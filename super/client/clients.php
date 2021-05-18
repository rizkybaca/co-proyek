<?php 

$a=1;
 ?>
<div class="head">
	<div class="tittle">
		<p>Clients</p>
	</div>
	<div class="button">
		<a href="?page=add-client">Add Client</a>
	</div>
</div>
<div class="cont-show-client">
	<table border="1" width="100%" style="border-collapse: collapse;">
		<tr>
			<th>No.</th>
			<th>Name</th>
			<th>Actions</th>
		</tr>
		<?php 
		$sql_cek="SELECT *FROM client";
		$query_cek = mysqli_query($koneksi, $sql_cek);
	  while($data_cek= mysqli_fetch_array($query_cek,MYSQLI_ASSOC)) :?>
		<tr>
			<td><?= $a++; ?></td>
			<td><?= $data_cek['name_c']; ?></td>
			<td>
				<a href="?page=detail-client&kode=<?=$data_cek['id']; ?>">Detail</a>
				<a href="?page=edit-client&kode=<?=$data_cek['id']; ?>">Edit</a>
				<a href="?page=del-client&kode=<?=$data_cek['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')">Delete</a>
			</td>
		</tr>
	<?php endwhile ?>
	</table>
	
</div>