<?php 

require_once "includes/config.php";

$id = $_GET['id'];

$query = mysqli_query($conn,"DELETE from berita where id_berita = '$id'");

if ($query) {
	header('location:berita.php?pesan_sukses=Berita berhasil dihapus');
}else {
	header('location:berita.php?pesan_gagal=Berita gagal dihapus');
}

 ?>