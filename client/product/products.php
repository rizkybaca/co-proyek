<?php 
$b=$_SESSION["ses_id_c"];

$target='dist/img/product/';
$a=1;
 ?>
<div class="head">
	<div class="tittle">
		<p>Products</p>
	</div>
</div>
<div class="cont-show-product">
	<table border="1" width="100%" style="border-collapse: collapse;">
		<tr>
			<th style="width: 50px;">No.</th>
			<th>Product Image</th>
			<th>Type</th>
			<th>Name</th>
			<th>Price</th>
			<th>Stocks</th>
			<th>Store Name</th>
		</tr>
		<?php 
		$sql_cek="SELECT p.id_p, p.types, p.name_p, p.price, p.stocks, p.image, p.id_store, s.name  FROM products AS p 
			LEFT JOIN store AS s ON p.id_store=s.id
			LEFT JOIN client AS c ON s.id_client=c.id
			WHERE s.id_client='$b'";
		$query_cek = mysqli_query($koneksi, $sql_cek);
	  while($data_cek= mysqli_fetch_array($query_cek)) :?>
		<tr>
			<td style="width: 50px;"><?= $a++; ?></td>
			<td>
				<img width="100px" src="<?= $target.$data_cek['image']; ?>">
			</td>
			<td><?= $data_cek['types']; ?></td>
			<td><?= $data_cek['name_p']; ?></td>
			<td><?= $data_cek['price']; ?></td>
			<td><?= $data_cek['stocks']; ?></td>
			<td><?= $data_cek['name']; ?></td>
		</tr>
	<?php endwhile ?>
	</table>
</div>