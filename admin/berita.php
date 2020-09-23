<?php require ('includes/topheader.php'); ?>
<?php require ('includes/leftsidebar.php'); ?>

<?php tambah_berita();
 ?>
 <?php edit_berita();
 ?>

<h1 id="list_berita" class="h2">List Berita</h1>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalTambahBerita">Tambah Berita</button>
<br>
<!-- <hr>
<a href="tambah_berita.php"><button type="button" class="btn btn-primary">Tambah Berita</button></a><br>
<br> -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul</th>
      <th scope="col">Kategori</th>
      <th scope="col">Gambar</th>
      <th scope="col">Penulis</th>
      <th scope="col">Tanggal Input</th>
      <th scope="col">Waktu</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $sql = "SELECT * FROM berita LIMIT 10";
    $result = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_assoc($result)) {
     ?>
    <tr>
      
      <th scope="row"><?=$data['id_berita'];?></th>
      <td><?=$data['judul_berita'];?></td>
      <td><?=$data['kategori'];?></td>
      <td><img src="../img/<?= $data['gambar']; ?>" class="rounded mx-auto d-block" alt="<?= $data['gambar']; ?>" style="width: 50px; height: 50px;">
      </td>
      <td><?=$data['penulis'];?></td>
      <td><?=date("d F Y",strtotime($data['tgl_input']));?></td>
      <td><?=date("h:i A",strtotime($data['tgl_input']));?></td>
     <!--  echo date("d F Y",strtotime($row['tgl_input'])); -->
      <td>
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalEditBerita">Edit</button>
      <a href="proses_del_berita.php?id=<?=$data['id_berita'];?>"><button type="button" class="btn btn-danger">Delete</button></a>
    </td>
    <?php } ?>
    </tr>
  </tbody>
</table>
<hr>
</main>
<?php require ('includes/footer.php'); ?>