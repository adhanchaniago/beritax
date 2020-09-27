<?php 
//setelah di klik
if (isset($_POST['edit_user_submit'])) {

//koneksi sql
require_once 'includes/config.php';
// $id = $_GET['id'];

//tampung valuenya
$id = mysqli_real_escape_string($conn, trim($_POST['id'])); 
$nama = mysqli_real_escape_string($conn, trim($_POST['name'])); 
$username = mysqli_real_escape_string($conn, trim($_POST['username']));
$password = mysqli_real_escape_string($conn, trim(md5($_POST['password'])));
$check_id =  mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users WHERE id = '$id'"));
// cek apakah id ditemukan atau tidak
if ($check_id > 0) {
	//proses inser atau register
	$sql = "UPDATE `users` SET `name` = '$nama', `username` = '$username', `password` = '$password' WHERE `users`.`id` = '$id'";
	mysqli_query($conn, $sql);
	header('location: users.php?pesan_sukses=edit user success');
	
} else {
	// jika user id tidak ada
	header('location: users.php?pesan_gagal=ID user yang anda masukkan salah');
}

}


 ?>