<?php 

$a=1;
 ?>
<div class="head">
	<div class="tittle">
		<p>Clients</p>
	</div>
	<div class="button">
		<a href="?page=add-client">Add Client</a>
	</div>
</div>
<div class="cont-show-client">
	<table>
		<tr>
			<th style="width: 50px;">No.</th>
			<th>Name</th>
			<th>Actions</th>
		</tr>
		<?php 
		$sql_cek="SELECT *FROM client";
		$query_cek = mysqli_query($koneksi, $sql_cek);
	  while($data_cek= mysqli_fetch_array($query_cek,MYSQLI_ASSOC)) :?>
		<tr>
			<td style="width: 50px;"><?= $a++; ?></td>
			<td><?= $data_cek['name_c']; ?></td>
			<td id="act">
				<a href="?page=detail-client&kode=<?=$data_cek['id']; ?>">
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
				<a href="?page=edit-client&kode=<?=$data_cek['id']; ?>">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M20 14.66V20C20 20.5304 19.7893 21.0391 19.4142 21.4142C19.0391 21.7893 18.5304 22 18 22H4C3.46957 22 2.96086 21.7893 2.58579 21.4142C2.21071 21.0391 2 20.5304 2 20V6C2 5.46957 2.21071 4.96086 2.58579 4.58579C2.96086 4.21071 3.46957 4 4 4H9.34" stroke="#495057" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M18 2L22 6L12 16H8V12L18 2Z" stroke="#495057" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</a>
				<a href="?page=del-client&kode=<?=$data_cek['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M3 6H5H21" stroke="#495057" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#495057" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</a>
			</td>
		</tr>
	<?php endwhile ?>
	</table>
	
</div>