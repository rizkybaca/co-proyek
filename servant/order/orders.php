<?php
$b=$data_id_store; 
$a=1;
 ?>
<div class="head">
	<div class="tittle">
		<p>Orders</p>
	</div>
</div>
<div class="cont-show-customer">

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
        WHERE o.status='bb' AND o.req='rp' AND s.id=$b";
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
				$status='Not yet paid';
			} elseif ($data_cek['status']=='cc') {
				$status='Canceled';
			} elseif ($data_cek['status']=='ex') { 
				$status='Expired';	
			}  elseif ($data_cek['status']=='sb') { 
				$status='Success';
			}
			
			 ?>
			<td><?= $status; ?></td>
			<td>
				<a href="?page=detail-order&kode=<?=$data_cek['id']; ?>">Detail</a>
				<a href="?page=edit-order&kode=<?=$data_cek['id']; ?>">Update</a>
			</td>
		</tr>
	<?php endwhile ?>
	</table>

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
		$cek_sql="SELECT DISTINCT o.id, o.date_o, o.total, o.status, c.name 
        FROM orders AS o
        JOIN customer AS c ON o.id_customer=c.id
        JOIN detail_order AS do ON do.id_order=o.id
        JOIN products AS p ON p.id_p=do.id_product
        JOIN store AS s ON s.id=p.id_store
        JOIN servant AS v ON v.id_store_v=s.id
        WHERE o.status<>'bb' AND s.id=$b";
		$cek_query = mysqli_query($koneksi, $cek_sql);
	  while($cek_data= mysqli_fetch_array($cek_query,MYSQLI_ASSOC)):?>
		<tr>
			<td style="width: 50px;"><?= $a++; ?></td>
			<td><?= $cek_data['id']; ?></td>
			<td><?= $cek_data['date_o']; ?></td>
			<td>Rp. <?= $cek_data['total']; ?></td>
			<td><?= $cek_data['name']; ?></td>
			<?php 
			if ($cek_data['status']=='cc') {
				$stat='Canceled';
			} elseif ($cek_data['status']=='ex') { 
				$stat='Expired';	
			}  elseif ($cek_data['status']=='sb') { 
				$stat='Success';
			} else{
				$stat='Unpaid';
			}
			
			 ?>
			<td><?= $stat; ?></td>
			<td>
				<a href="?page=detail-order&kode=<?=$cek_data['id']; ?>">Detail</a>
			</td>
		</tr>
	<?php endwhile ?>
	</table>
</div>