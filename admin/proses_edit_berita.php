<?php 
//setelah di klik
if (isset($_POST['edit_berita_submit'])) {

//koneksi sql
require_once 'includes/config.php';
// $id = $_GET['id'];

//tampung valuenya /menampung data dari form index.php ke dalam variable
$id = mysqli_real_escape_string($conn, trim($_POST['id'])); 
$kategori = mysqli_real_escape_string($conn, trim($_POST['nama_kategori'])); 
$judul = mysqli_real_escape_string($conn, trim($_POST['judul_berita']));
$isi = mysqli_real_escape_string($conn, trim($_POST['isi_berita']));
$gambar = $_FILES['gambar']['name'];
$check_id =  mysqli_num_rows(mysqli_query($conn,"SELECT * FROM berita WHERE id_berita = '$id'"));

//pindahkan file gambar
if(!empty($gambar)){
	move_uploaded_file($_FILES['gambar']['tmp_name'],"../img/".$gambar);
	$query = mysqli_query($conn,"UPDATE berita SET gambar = '$gambar' WHERE id_berita = '$id'");
}

if (strlen($judul) < 5) {
	// jika ada username yang sama
	header('location: berita.php?pesan_gagal=judul-minimal-5-karakter');
}  else if ($check_id > 0) {
	//proses inser atau register
	$sql = "UPDATE `berita` SET `judul_berita` = '$judul', `kategori` = '$kategori', `isi_berita` = '$isi', `gambar` = '$gambar', `tgl_update` = 'now()' WHERE `berita`.`id_berita` = '$id'";
	mysqli_query($conn, $sql);

	header('location: berita.php?pesan_sukses=edit-berita-success');
}	else{
	header('location:berita.php?pesan_gagal=edit berita gagal');
}
}

 ?>