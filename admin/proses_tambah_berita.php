<?php 
//setelah di klik
if (isset($_POST['tambah_berita_submit'])) {

//koneksi sql
require_once 'includes/config.php';
// $id = $_GET['id'];

//tampung valuenya /menampung data pada variable
$kategori = mysqli_real_escape_string($conn, trim($_POST['nama_kategori'])); 
$judul = mysqli_real_escape_string($conn, trim($_POST['judul_berita']));
$isi = mysqli_real_escape_string($conn, trim($_POST['isi_berita']));
$gambar = $_FILES['gambar']['name'];
//cek kategori ada atau tidak
$kategori_check = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kategori WHERE nama_kategori = '$kategori'"));

//pindahkan file gambar
if(!empty($gambar)){
	move_uploaded_file($_FILES['gambar']['tmp_name'],"../img/".$gambar);
}
// jika judul kurang dari 5 karakter
if (strlen($judul) < 5) {
	header('location: berita.php?pesan_gagal=judul-minimal-5-katakter');
} else {
	//proses inser atau register
	$sql = "INSERT INTO berita (judul_berita, kategori, isi_berita, tgl_input, gambar)
		VALUES ('$judul','$kategori','$isi',now(),'$gambar')";
	mysqli_query($conn, $sql);

	header('location: berita.php?pesan_sukses=tambah-berita-success');
}
}

 ?>