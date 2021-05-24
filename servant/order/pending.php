<?php 
$sql="SELECT * FROM orders WHERE req='pd'";
$query=mysqli_query($koneksi, $sql);
$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
$effect=mysqli_num_rows($query);

if ($effect==1) :
	 ?>
<table border="1" width="100%" style="border-collapse: collapse;">
		<tr>
			<th style="width: 50px;">No.</th>
			<th>Order Number</th>
			<th>Date</th>
			<th>Total</th>
			<th>Customer Name</th>
			<th>Order Status</th>
			<th>Actions</th>
		</tr>
		<?php 
		$sql_cek="SELECT DISTINCT o.id, o.date_o, o.total, o.status, c.name 
        FROM orders AS o
        JOIN customer AS c ON o.id_customer=c.id
        JOIN detail_order AS do ON do.id_order=o.id
        JOIN products AS p ON p.id_p=do.id_product
        JOIN store AS s ON s.id=p.id_store
        JOIN servant AS v ON v.id_store_v=s.id
        WHERE o.req='pd' AND s.id=$b";
		$query_cek = mysqli_query($koneksi, $sql_cek);
	  while($data_cek= mysqli_fetch_array($query_cek,MYSQLI_ASSOC)):?>
		<tr>
			<td style="width: 50px;"><?= $a++; ?></td>
			<td><?= $data_cek['id']; ?></td>
			<td><?= $data_cek['date_o']; ?></td>
			<td><?= $data_cek['total']; ?></td>
			<td><?= $data_cek['name']; ?></td>
			<td><?= $data_cek['status']; ?></td>
			<td>
				<a href="?page=detail-pd&kode=<?=$data_cek['id']; ?>">Detail</a>
			</td>
		</tr>
	<?php endwhile ?>
	</table>
	<?php endif ?>