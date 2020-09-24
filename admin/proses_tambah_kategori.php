<?php 
//setelah di klik
if (isset($_POST['tambah_kategori_submit'])) {

//koneksi sql
require_once 'includes/config.php';
// $id = $_GET['id'];

//tampung valuenya /menampung data pada variable
$kategori = mysqli_real_escape_string($conn, trim($_POST['nama_kategori'])); 
//cek kategori ada atau tidak
$kategori_check = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kategori WHERE nama_kategori = '$kategori'"));


if ($kategori_check > 0) {
	header('location: kategori.php?pesan_gagal=Kategori-sudah-ada');

} else {
	//proses inser atau register
	$sql = "INSERT INTO kategori SET nama_kategori = '$kategori'";
	mysqli_query($conn, $sql);

	$msg="Kategori berhasil ditambah";
	header('location: kategori.php?pesan_sukses=tambah-kategori-success');
}
}

 ?>