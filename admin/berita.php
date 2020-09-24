<?php require ('includes/topheader.php'); ?>
<?php require ('includes/leftsidebar.php'); ?>

<?php tambah_berita();?>

<?php pesan(); ?>
<h1 id="list_berita" class="h2">List Berita</h1>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalTambahBerita">Tambah Berita</button>
<br>

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">ID Berita</th>
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
    $query = mysqli_query($conn, "SELECT * FROM berita");
    $no = 1;
    while ($data = mysqli_fetch_assoc($query)) {
     ?>
    <tr>
      
      <th scope="row"><?php echo $no++; ?></th>
      <td><?=$data['id_berita'];?></td>
      <td><?=$data['judul_berita'];?></td>
      <td><?=$data['kategori'];?></td>
      <td><img src="../img/<?= $data['gambar']; ?>" class="rounded mx-auto d-block" alt="<?= $data['gambar']; ?>" style="width: 50px; height: 50px;">
      </td>
      <td><?=$data['penulis'];?></td>
      <td><?=date("d F Y",strtotime($data['tgl_input']));?></td>
      <td><?=date("h:i A",strtotime($data['tgl_input']));?></td>
     <!--  echo date("d F Y",strtotime($row['tgl_input'])); -->
      <td>
        <!-- button edit untuk panggil modal-->
      <a href="#" type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal<?php echo $data['id_berita'];?>">Edit</a>
      <a href="proses_del_berita.php?id=<?=$data['id_berita'];?>" onclick="return confirm('Apakah anda yakin akan menghapus?')"><button type="button" class="btn btn-danger">Delete</button></a>
    </td>
    </tr>

    <!--awal MODAL EDIT BERITA-->
    <!-- Modal nya-->
<div class="modal fade" id="myModal<?php echo $data['id_berita'];?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal headernya-->
      <div class="modal-header">
        <h4 class="modal-title">Edit Berita</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal bodynya-->
      <div class="modal-body">
      <form role="form" action="proses_edit_berita.php" method="POST" enctype="multipart/form-data">
  <?php 
  $id = $data['id_berita'];
  $query_edit = mysqli_query($conn,"SELECT * FROM berita WHERE id_berita='$id'");
  while($row = mysqli_fetch_array($query_edit)){
   ?>
  <input type="hidden" name="id" value="<?php echo $row['id_berita'];?>">

  <div class="form-group">
    <label for="nama_kategori">Kategori</label>
    <select class="custom-select" name="nama_kategori" id="nama_kategori">
    <option disabled selected value="<?=$row[1]?>"><?=$row[1]?></option>
    <?php 
    $query1=mysqli_query($conn,"SELECT * FROM kategori");
      while ($row1=mysqli_fetch_array($query1)) {
      ?>
    <option value="<?=$row1['nama_kategori']?>"><?=$row1['nama_kategori']?></option>
    <?php }?>
    </select>
  </div>
  <div class="form-group">
    <label for="judul_berita">Judul Berita</label>
    <input type="text" class="form-control" name="judul_berita" id="judul_kategori" value="<?php echo $row[2];?>">
  </div>
  <div class="form-group">
    <label for="isi_berita">Isi Berita</label>
    <input type="text" class="form-control" name="isi_berita" id="isi_berita" value="<?php echo $row[3];?>">
  </div>
<!--   <div class="form-group">
    <label for="isi_berita">Isi Berita</label>
    <textarea class="form-control" name="isi_berita" id="isi_kategori" rows="3" value="eidjeideididneidkede"></textarea>
  </div> -->
  <div class="form-group">
    <label for="gambar">Gambar</label>
    <input type="file" class="form-control-file" name="gambar" id="gambar">
  </div>
  <button type="submit" name="edit_berita_submit" class="btn btn-success">Perbarui</button>
  <?php }?>
</form>
</div>
      </div>
      <!-- Modal footernya-->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  <!-- akhir modal edit berita -->
<?php } ?>
  </tbody>
</table>
<hr>
</main>
<?php require ('includes/footer.php'); ?>