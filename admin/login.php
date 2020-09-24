<?php  
require ('includes/config.php');
session_start();
if (isset($_COOKIE['id']) && isset($_COOKIE['key']))
{
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];
	$query = mysqli_query($mysqli,"SELECT username FROM users WHERE id = '$id' ");
	$row = mysqli_fetch_assoc($query);
	if (hash('sha384', $row['username']) == $key )
	{
		$_SESSION['id'] = true;
	}
}
if (isset($_SESSION['id'])) {
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/floating-labels.css">
	<!-- costum css -->
	<link rel="stylesheet" href="../assets/css/style.css">
	<title>Halaman Login</title>
</head>
<body>
<a href="../index.php" class="btn btn-info">Kembali ke Portal</a>
	<form class="form-signin" action="proses_login.php" method="POST">
  <div class="text-center mb-4">
    <img class="mb-4" src="https://getbootstrap.com/docs/4.5/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Login/Masuk</h1>
    
  </div>

  <div class="form-label-group">
    <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
    <label for="inputUsername">Username</label>
  </div>

  <div class="form-label-group">
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <label for="inputPassword">Password</label>
  </div>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" name="remember-me" value="remember-me"> Remember me
    </label>
  </div>
  <i class="text-danger">
    <?php if (isset($_GET['pesan'])): 
    echo $_GET['pesan'];
    ?>
    </i>
      
  <?php endif ?>
  <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Masuk"></input>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2020- Beritax Company</p>
</form>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!--     <script type="text/javascript" src="./assets/js/jquery.js"></script>
 	<script type="text/javascript" src="./assets/js/popper.js"></script>
 	<script type="text/javascript" src="./assets/js/bootstrap.js"></script> -->
</body>
</html>