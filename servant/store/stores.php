<?php 
$b=$_SESSION["ses_id_v"];

$target='dist/img/store/';
$a=1;
 ?>
<div class="head">
	<div class="tittle">
		<p>Store</p>
	</div>
</div>
<div class="cont-show-store">
	<table border="1" width="100%" style="border-collapse: collapse;">
		<tr>
			<th style="width: 50px;">No.</th>
			<th>Profile Image</th>
			<th>Name</th>
			<th>Address</th>
			<th>Phone Number</th>
			<th>Status</th>
			<th>Client Name</th>
		</tr>
		<?php 
		$sql_cek="SELECT s.id, s.id_client, s.image, s.name, s.address, s.phone_number, s.status, c.name_c FROM store as s 
			LEFT JOIN client as c ON s.id_client=c.id 
			LEFT JOIN servant as v ON s.id=v.id_store_v 
			WHERE v.id='$b'";
		$query_cek = mysqli_query($koneksi, $sql_cek);
	  while($data_cek= mysqli_fetch_array($query_cek)) :?>
		<tr>
			<td style="width: 50px;"><?= $a++; ?></td>
			<td>
				<img width="100px" src="<?= $target.$data_cek['image']; ?>">
			</td>
			<td><?= $data_cek['name']; ?></td>
			<td><?= $data_cek['address']; ?></td>
			<td><?= $data_cek['phone_number']; ?></td>
			<td><?= $data_cek['status']; ?></td>
			<td>
				<?= $data_cek['name_c']; ?>					
			</td>
		</tr>
	<?php endwhile ?>
	</table>
</div>