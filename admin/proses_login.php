<?php 
require "includes/config.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, md5($_POST['password']));

	$query = "SELECT * FROM users WHERE username= '$username' AND password = '$password' AND status";
	$queryDB = mysqli_query($conn, $query);
	$check = mysqli_num_rows($queryDB);

	$agent=@$_SERVER[HTTP_USER_AGENT];
	$ip=@$_SERVER['REMOTE_ADDR'];
	//-------------------------------------------------------------------
	// $cek_status = "SELECT * FROM users WHERE username = '$username'"; 
    $data = mysqli_fetch_assoc($queryDB);
          	 
	//-------------------------------------------------------------------

	if ($check > 0 && $data['status'] == 1) {
		$_SESSION['username']=$data['username'];
		$getData = mysqli_fetch_array($queryDB);
		$_SESSION['name'] = $getData;
		$_SESSION['is_login'] = true;
		// cek remember-me
		if (isset($_POST['remember-me']))
		{
			setcookie('id', $data['id'], time()+ 10);
			setcookie('key', hash('sha384', $data['username']),time()+ 10);
		}

		//pindahke index.php
		header("location: index.php?pesan=Selamat! Anda telah berhasil login ");

		//catat history login ke tabel user log
		$sql = "INSERT INTO user_log(username,ip,agent,waktu) VALUES('$username','$ip','$agent',now())";
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		//update kolom lastactivity pada tabel user untuk catat login terakhir
		$sql = "UPDATE users set lastactivity =now(),login_ip = '$ip' where username= '$username'";
		$rs = mysqli_query($conn,$sql);
	} else {
		header("location: login.php?pesan=Email atau password yang anda input salah atau akun anda telah dinonaktifkan");
	}
}
	else {
		return "Anda ditolak untuk masuk";
	}

?>