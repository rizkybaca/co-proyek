<?php
$b=$data_id_store; 
$a=1;
 ?>
<div class="head">
	<div class="tittle">
		<p>Captain Order</p>
	</div>
</div>
<div class="cont-show-customer">

<!-- pending -->
<table>
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
			<td>Rp. <?= $data_cek['total']; ?></td>
			<td><?= $data_cek['name']; ?></td>
			<?php 
			if ($data_cek['status']=='bb') {
				$a='Not yet paid';
			} elseif ($data_cek['status']=='cc') {
				$a='Canceled';
			} elseif ($data_cek['status']=='ex') { 
				$a='Expired';	
			}  elseif ($data_cek['status']=='sb') { 
				$a='Success';
			}
			
			 ?>
			<td><?= $a; ?></td>
			<td>
				<a href="?page=detail-pd&kode=<?=$data_cek['id']; ?>">Detail</a>
			</td>
		</tr>
	<?php endwhile ?>
	</table>
	
	
</div>