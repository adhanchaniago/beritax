<?php function today() { ?>
	<p align="right">Hari ini, <i><?php 
echo date("d F Y");
 ?></i>
	</p>
<?php } ?>

<?php function signup() { ?>
	<div id="signup" class="col-md-4 position-relative font-weight-bold">
  <h2 id="create_user">Create New User</h2>

<form action="proses_reg_user.php" method="POST">
  <div class="form-group">
    <label for="name">Nama</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Anda">
  </div>
  <div class="form-group">
    <label for="username">Username / Email address</label>
    <input type="text" class="form-control" name="username" id="username" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
   <div class="form-group">
    <label for="konfirmasi_password">Konfirmasi Password</label>
    <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password">
  </div>
  <button type="submit" name="register_submit" class="btn btn-primary" id="register_show">Buat Akun</button>
  
</form>
<button name="register_hide" class="btn btn-secondary mt-1" id="register_hide">Cancel</button>
</div>
<?php } ?>

<?php function tambah_kategori(){ ?>
<div class="modal fade" id="myModalTambahKategori">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal headernya-->
			<div class="modal-header">
				<h4 class="modal-title">Tambah Kategori</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal bodynya-->
			<div class="modal-body">
<form action="proses_tambah_kategori.php" method="POST">
  <div class="form-group">
    <label for="nama_kategori">Kategori</label>
    <input type="text" class="form-control" name="nama_kategori" id="input_tambah_nama_kategori" placeholder="Masukkan Kategori" required>
  </div>
  <button type="submit" name="tambah_kategori_submit" class="btn btn-success">Tambah Kategori</button>
</form>
</div>
			</div>
			<!-- Modal footernya-->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>

<?php } ?>

<?php function edit_kategori(){ ?>
<!-- Modal nya-->
<div class="modal fade" id="myModalEditKategori">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal headernya-->
			<div class="modal-header">
				<h4 class="modal-title">Edit Kategori</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal bodynya-->
			<div class="modal-body">
<form action="proses_edit_kategori.php" method="POST">
  <div class="form-group">
    <label for="id">ID Kategori</label>
    <input type="number" class="form-control" name="id" id="id" placeholder="Masukkan Nomor Kategori" required>
  </div>
  <div class="form-group">
    <label for="nama_kategori">Kategori</label>
    <input type="text" class="form-control" name="nama_kategori" id="input_edit_nama_kategori" placeholder="Masukkan Kategori" required>
  </div>
  <button type="submit" name="edit_kategori_submit" class="btn btn-success">Edit Kategori</button>
</form>
</div>
			</div>
			<!-- Modal footernya-->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
<?php } ?>

<?php function tambah_berita(){ ?>
<?php require '../includes/config.php'; ?>
<!-- Modal nya-->
<div class="modal fade" id="myModalTambahBerita">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal headernya-->
			<div class="modal-header">
				<h4 class="modal-title">Tambah berita</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal bodynya-->
			<div class="modal-body">
<form action="proses_tambah_berita.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="nama_kategori">Kategori</label>
    <select class="custom-select" name="nama_kategori" id="nama_kategori" required>
    <option disabled selected>--Pilih Kategori</option>
    <?php 
      $query=mysqli_query($conn,"SELECT * FROM kategori");
      while ($row=mysqli_fetch_array($query)) {
      ?>
    <option value="<?=$row['nama_kategori']?>"><?=$row['nama_kategori']?></option>
    <?php } ?>
    </select>
  </div>

  <div class="form-group">
    <label for="judul_berita">Judul Berita</label>
    <input type="text" class="form-control" name="judul_berita" id="input_tambah_judul_berita" placeholder="Masukkan Judul Berita" required>
  </div>
  <div class="form-group">
    <label for="isi_berita">Isi Berita</label>
    <textarea class="form-control" name="isi_berita" id="input_tambah_isi_berita" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="gambar">Gambar</label>
    <input type="file" class="form-control-file" name="gambar" id="gambar">
  </div>
  <button type="submit" name="tambah_berita_submit" class="btn btn-success">Tambah Berita</button>
</form>
</div>
			</div>
			<!-- Modal footernya-->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
<?php } ?>

<?php function edit_berita(){ ?>
<?php require '../includes/config.php'; ?>

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
      <form role="form" action="proses_edit_berita.php" method="GET" enctype="multipart/form-data">
      
  <?php 
  $id = $data['id_berita'];
  $query_edit = mysqli_query($conn,"SELECT * FROM berita WHERE id_berita='$id'");
  while($row = mysqli_fetch_array($query_edit)){
   ?>
  
  <input type="hidden" name="id_mhs" value="<?php echo $row['id'];?>">

  <div class="form-group">
        <label for="id">ID Berita</label>
        <input type="number" class="form-control" name="id" id="id" placeholder="Masukkan Nomor Berita" required>
      </div>
  <div class="form-group">
    <label for="nama_kategori">Kategori</label>
    <select class="custom-select" name="nama_kategori" id="nama_kategori">
    <option disabled selected>--Pilih Kategori</option>
    <?php 
      $query=mysqli_query($conn,"SELECT * FROM kategori");
      while ($row=mysqli_fetch_array($query)) {
      ?>
    <option value="<?=$row['nama_kategori']?>"><?=$row['nama_kategori']?></option>
    <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="judul_berita">Judul Berita</label>
    <input type="text" class="form-control" name="judul_berita" id="input_edit_judul_berita" placeholder="Masukkan Judul Berita" value="<?php echo $row['judul_berita'];?>" required>
  </div>
  <div class="form-group">
    <label for="isi_berita">Isi Berita</label>
    <textarea class="form-control" name="isi_berita" id="input_edit_isi_berita" rows="3" value="<?php echo $row['isi_berita'];?>"></textarea required>
  </div>
  <div class="form-group">
    <label for="gambar">Gambar</label>
    <input type="file" class="form-control-file" name="gambar" id="gambar">
  </div>
  <button type="submit" name="edit_berita_submit" class="btn btn-success">Edit Berita</button>
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
<?php } ?>

<?php function tambah_user(){ ?>
<!-- Modal nya-->
<div class="modal fade" id="myModalTambahUser">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal headernya-->
			<div class="modal-header">
				<h4 class="modal-title">Buat User Baru</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal bodynya-->
			<div class="modal-body">
<form action="proses_reg_user.php" method="POST">
  <div class="form-group">
    <label for="name">Nama</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Anda" required>
  </div>
  <div class="form-group">
    <label for="username">Username / Email address</label>
    <input type="text" class="form-control" name="username" id="username" placeholder="name@example.com" required>
    <i class="text-danger">
    <?php if (isset($_GET['user_error'])){
    echo $_GET['user_error'];
    } ?>
    </i>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password" required>
  </div>
   <div class="form-group">
    <label for="konfirmasi_password">Konfirmasi Password</label>
    <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password" required>
  </div>
  <button type="submit" name="register_submit" class="btn btn-primary">Buat Akun</button>
</form>
</div>
			</div>
			<!-- Modal footernya-->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
<?php } ?>

<?php function edit_user(){ ?>
<!-- Modal nya-->
<div class="modal fade" id="myModalEditUser">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal headernya-->
			<div class="modal-header">
				<h4 class="modal-title">Edit User</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal bodynya-->
			<div class="modal-body">
<form action="proses_edit_user.php" method="POST">
  <div class="form-group">
    <label for="id">ID User</label>
    <input type="number" class="form-control" name="id" id="id" placeholder="Masukkan Nomor User">
  </div>
  <div class="form-group">
    <label for="name">Nama Baru</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Ubah Nama">
  </div>
  <div class="form-group">
    <label for="username">Username Baru</label>
    <input type="text" class="form-control" name="username" id="username" placeholder="Ubah Username">
  </div>
  <div class="form-group">
    <label for="password">Password Baru</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Ubah password">
  </div>
  <button type="submit" name="edit_user_submit" class="btn btn-success">Ubah User</button>
</form>
</div>
			</div>
			<!-- Modal footernya-->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
<?php } ?>

<?php function pesan() {?>
  <?php if (isset($_GET['pesan_sukses'])) { ?>
<div class="alert alert-success" role="alert">
  <strong>Yeah!</strong><?php  echo $_GET['pesan_sukses']; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<?php } ?>

<?php if (isset($_GET['pesan_gagal'])) { ?>
<div class="alert alert-danger" role="alert">
  <strong>Noo!</strong><?php  echo $_GET['pesan_gagal']; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<?php } ?>
<?php } ?>  