<?php 

require_once "includes/config.php";

$id = $_GET['id'];

$query = mysqli_query($conn,"DELETE from kategori where id_kategori = '$id'");

if ($query) {
	$del_msg="Kategori berhasil dihapus";
	header('location:kategori.php?pesan_sukses=Kategori berhasil dihapus');
} else {
	header('location:kategori.php?pesan_gagal=Kategori gagal dihapus');

}

 ?>