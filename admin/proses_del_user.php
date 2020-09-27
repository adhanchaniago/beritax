<?php 

require_once "includes/config.php";

$id = $_GET['id'];

$query = mysqli_query($conn,"DELETE from users where id = '$id'");

if ($query) {
	header('location:users.php?pesan_sukses=delete-account-success');
}else{
	header('location:users.php?pesan_gagal=User Gagal dihapus');
}

 ?>