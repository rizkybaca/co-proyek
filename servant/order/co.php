<?php
$b=$data_id_store; 
$a=1;
 ?>
<div class="head">
	<div class="tittle">
		<p>Captain Order</p>
	</div>
</div>
<div class="cont-show-order">

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
        WHERE o.req='pd' AND s.id=$b
        ORDER BY o.date_o ASC";
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
			<td id="act">
				<a href="?page=detail-pd&kode=<?=$data_cek['id']; ?>">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g clip-path="url(#clip0)">
						<path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#495057" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M12 16V12" stroke="#495057" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M12 8H12.01" stroke="#495057" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</g>
						<defs>
						<clipPath id="clip0">
						<rect width="24" height="24" fill="white"/>
						</clipPath>
						</defs>
					</svg>
				</a>
			</td>
		</tr>
	<?php endwhile ?>
	</table>
	
	
</div>