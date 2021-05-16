<?php 
	$sql_cek="SELECT * FROM store"; //andi lau, anaaa
	$query_cek=mysqli_query($koneksi, $sql_cek);

 ?>
<div class="head">
	<div class="tittle">
		<p>Stores</p>
	</div>
	<div class="button">
		<a href="?page=add-store">Add Stores</a>
	</div>
</div>
<div class="cont-show-store">
	<?php while($a=mysqli_fetch_array($query_cek, MYSQLI_ASSOC)): ?>
	<a href="?page=edit-store&kode=<?=$a['id']; ?>">
		<div class="store">
			<div class="image"></div>
			<div class="desc">
				<div class="tittle">
					<p><?= $a['name']; ?></p>
				</div>
				<div class="sub">
					<p><?= $a['address']; ?></p>
				</div>
				<div class="button"></div>
			</div>
		</div>
	</a>
	<?php endwhile ?>
</div>