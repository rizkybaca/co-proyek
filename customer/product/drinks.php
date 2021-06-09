<div class="container-store">
      <!-- start products -->
    <?php 
    $sql_cek="SELECT p.id_p,p.types,p.name_p,p.price,p.stocks,p.image,p.id_store FROM products AS p JOIN store AS s ON p.id_store=s.id WHERE s.id='$b' AND p.types='drinks'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    while($data_cek= mysqli_fetch_array($query_cek)) :?>    
      <section>
        <div>
          <img src="<?= $target.$data_cek['image']; ?>" alt="foto nasi uduk">
          <p class="stok">Available @<?=$data_cek['stocks']; ?></p>
        </div>
        <div>
          <h3><?=$data_cek['name_p']; ?></h3>
          <p>Rp. <?=$data_cek['price']; ?></p>
          <a href="./detail.php?kode=<?= $data_cek['id_p']; ?>">add to chart</a>
        </div>
      </section>
    <?php endwhile ?>
    </div>