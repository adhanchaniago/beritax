<?php 
//setelah di klik
if (isset($_POST['edit_kategori_submit'])) {

//koneksi sql
require_once 'includes/config.php';
// $id = $_GET['id'];

//tampung valuenya /menampung data dari form index.php ke dalam variable
$id = mysqli_real_escape_string($conn, trim($_POST['id'])); 
$kategori = mysqli_real_escape_string($conn, trim($_POST['nama_kategori'])); 
$check_id =  mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kategori WHERE id_kategori = '$id'"));

if ($check_id > 0) {
	//proses inser atau register
	$sql = "UPDATE `kategori` SET `nama_kategori` = '$kategori' WHERE `kategori`.`id_kategori` = '$id'";
	mysqli_query($conn, $sql);

	header('location: kategori.php?pesan_sukses=edit-kategori-success');
}else{
	header('location:kategori.php?pesan_gagal=Berita gagal dihapus');
}
}

 ?>