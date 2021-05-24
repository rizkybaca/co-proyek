<?php 
$b=$_SESSION["ses_id_v"];

$target='dist/img/product/';
$a=1;
 ?>
<div class="head">
	<div class="tittle">
		<p>Products</p>
	</div>
	<div class="button">
		<a href="?page=add-product">Add Product</a>
	</div>	
</div>
<div class="cont-show-product">
	<table border="1" width="100%" style="border-collapse: collapse;">
		<tr>
			<th style="width: 50px;">No.</th>
			<th>Product Image</th>
			<th>Name</th>
			<th>Type</th>
			<th>Price</th>
			<th>Stocks</th>
			<th>Status</th>
			<th>Store Name</th>
			<th>Actions</th>
		</tr>
		<?php 
		$sql_cek="SELECT p.id_p, p.types, p.name_p, p.price, p.stocks, p.image, p.id_store,p.status, s.name FROM products as p 
			LEFT JOIN store as s ON p.id_store=s.id";
		$query_cek = mysqli_query($koneksi, $sql_cek);
	  while($data_cek= mysqli_fetch_array($query_cek)) :?>
		<tr>
			<td style="width: 50px;"><?= $a++; ?></td>
			<td>
				<img width="100px" src="<?= $target.$data_cek['image']; ?>">
			</td>
			<td><?= $data_cek['name_p']; ?></td>
			<td><?= $data_cek['types']; ?></td>
			<td><?= $data_cek['price']; ?></td>
			<td><?= $data_cek['stocks']; ?></td>
			<td><?= $data_cek['status']; ?></td>
			<td><?= $data_cek['name']; ?></td>
			<td>
				<a href="?page=edit-product&kode=<?=$data_cek['id_p']; ?>">Edit</a>
				<a href="?page=del-product&kode=<?=$data_cek['id_p']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')">Delete</a>
			</td>			
		</tr>
	<?php endwhile ?>
	</table>
</div>