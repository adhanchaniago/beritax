<?php require ('includes/topheader.php'); ?>
<?php require ('includes/leftsidebar.php'); ?>
<?php tambah_kategori();
 ?>
<?php edit_kategori();
 ?>

<?php pesan(); ?>

<h1 id="list_kategori" class="h2">List Kategori</h1>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalTambahKategori">Tambah Kategori</button>
<br>

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Kategori</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $sql = "SELECT * FROM kategori";
    $result = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_assoc($result)) {
     ?>
    <tr>
      
      <th scope="row"><?=$data['id_kategori'];?></th>
      <td><?=$data['nama_kategori'];?></td>
      <td>
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalEditKategori">Edit</button>
      <a href="proses_del_kategori.php?id=<?=$data['id_kategori'];?>" onclick="return confirm('Apakah anda yakin akan menghapus?')"><button type="button" class="btn btn-danger">Delete</button></a>
    </td>
    <?php } ?>
    </tr>
  </tbody>
</table>

<?php require ('includes/footer.php'); ?>