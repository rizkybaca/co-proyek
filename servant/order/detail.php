<?php

if (isset($_GET['kode'])) {
  $b=$_GET['kode'];
}

$a=1;

$cek_sql="SELECT s.name, o.total 
    FROM orders AS o
    LEFT JOIN detail_order AS do ON do.id_order=o.id
    LEFT JOIN products AS p ON p.id_p=do.id_product
    LEFT JOIN store AS s ON s.id=p.id_store
    WHERE o.id=$b";
$cek_query=mysqli_query($koneksi, $cek_sql);
$cek_data=mysqli_fetch_array($cek_query,MYSQLI_ASSOC);

 ?>
<div class="head">
	<div class="tittle">
		<p><?=$cek_data['name']; ?></p>
	</div>
</div>
<div class="cont-show-customer">
	<table border="1" width="100%" style="border-collapse: collapse;">
		<tr>
			<th style="width: 50px;">No.</th>
			<th>Product Name</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Notes</th>
		</tr>
		<?php 
		$sql_cek="SELECT p.name_p, do.cont, p.price, do.notes 
        FROM orders AS o
        JOIN detail_order AS do ON do.id_order=o.id
        JOIN products AS p ON p.id_p=do.id_product
        JOIN store AS s ON s.id=p.id_store
        WHERE o.id=$b";
		$query_cek = mysqli_query($koneksi, $sql_cek);
	  while($data_cek= mysqli_fetch_array($query_cek,MYSQLI_ASSOC)):?>
		<tr>
			<td style="width: 50px;"><?= $a++; ?></td>
			<td><?= $data_cek['name_p']; ?></td>
			<td><?= $data_cek['cont']; ?></td>
			<td><?= $data_cek['price']; ?></td>
			<td><?= $data_cek['notes']; ?></td>
		</tr>
	<?php endwhile ?>
	</table>
	<table>
		<tr>
			<th>Total</th>
			<td>Rp. <?= $cek_data['total']; ?></td>
		</tr>
	</table>
<a href="./index_v.php">Back</a>
</div>