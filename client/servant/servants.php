<?php 
$a=1;
 ?>
<div class="head">
	<div class="tittle">
		<p>Servants</p>
	</div>
	<div class="button">
		<a href="?page=add-servant">Add Servant</a>
	</div>
</div>
<div class="cont-show-servant">
	<table>
		<tr>
			<th style="width: 50px;">No.</th>
			<th>Name</th>
			<th>Join Date</th>
			<th>Store Name</th>
			<th>Role</th>
			<th>Actions</th>
		</tr>
		<?php 
		$sql_cek="SELECT v.id AS id_v, v.username, v.password, v.name AS name_v, v.join_date, v.role, v.id_store_v, s.name FROM servant AS v LEFT JOIN store AS s ON v.id_store_v=s.id";
		$query_cek = mysqli_query($koneksi, $sql_cek);
	  while($data_cek= mysqli_fetch_array($query_cek)) :?>
		<tr>
			<?php $rl=$data_cek['role']=='product_admin'?'Product Admin':'Cashier';?>
			<td style="width: 50px;"><?= $a++; ?></td>
			<td><?= $data_cek['name_v']; ?></td>
			<td><?= $data_cek['join_date']; ?></td>
			<td><?= $data_cek['name']; ?></td>
			<td><?= $rl; ?></td>
			<td>
				<a href="?page=detail-servant&kode=<?=$data_cek['id_v']; ?>">Detail</a>
				<a href="?page=edit-servant&kode=<?=$data_cek['id_v']; ?>">Edit</a>
				<a href="?page=del-servant&kode=<?=$data_cek['id_v']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')">Delete</a>
			</td>
		</tr>
	<?php endwhile ?>
	</table>
</div>