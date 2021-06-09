<?php
$b=$data_id_store; 
$a=1;
 ?>
<div class="head">
	<div class="tittle">
		<p>Orders</p>
	</div>
</div>
<div class="cont-show-order">

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
        WHERE o.status='bb' AND o.req='rp' AND s.id=$b
        ORDER BY o.date_o DESC
        ";
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
			<td id="act">
				<a href="?page=detail-order&kode=<?=$data_cek['id']; ?>">
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
				<a href="?page=edit-order&kode=<?=$data_cek['id']; ?>">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M20 14.66V20C20 20.5304 19.7893 21.0391 19.4142 21.4142C19.0391 21.7893 18.5304 22 18 22H4C3.46957 22 2.96086 21.7893 2.58579 21.4142C2.21071 21.0391 2 20.5304 2 20V6C2 5.46957 2.21071 4.96086 2.58579 4.58579C2.96086 4.21071 3.46957 4 4 4H9.34" stroke="#495057" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M18 2L22 6L12 16H8V12L18 2Z" stroke="#495057" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</a>
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
        WHERE o.status<>'bb' AND s.id=$b
        ORDER BY o.date_o DESC
        ";
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
			<td id="act">
				<a href="?page=detail-order&kode=<?=$cek_data['id']; ?>">
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