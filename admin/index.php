<?php

require ('includes/topheader.php');
require ('includes/leftsidebar.php');

 ?>

<?php if (isset($_GET['pesan'])) { ?>
<div class="alert alert-success" role="alert">
  <strong>Yap!</strong><?php  echo $_GET['pesan'].' '.$result['name']; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<?php } ?>

  
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard</h1>
  <?php require ('includes/config.php');
  $query = mysqli_query($conn, "SELECT * FROM users WHERE id='$_SESSION[id]'") or die(mysql_error());
  $fetch = mysqli_fetch_assoc($query); 
  echo "<h2 class='text-succes'>".$fetch['username']."</h2>";
?>
</div>
<div class="card w-25 d-inline-block mt-2">
  <div class="card-body">
    <h5 class="card-title">Total Berita</h5>
    <?php $query = mysqli_query($conn,"SELECT * FROM berita"); 
          $countber = mysqli_num_rows($query);
    ?>
    <p class="card-text h2"><?php echo htmlentities($countber); ?><i class="fa fa-newspaper-o ml-2" aria-hidden="true"></i></p>
    
  </div>
</div>
<div class="card w-25 d-inline-block mt-2">
  <div class="card-body">
    <h5 class="card-title">Total Kategori</h5>
    <?php $query = mysqli_query($conn,"SELECT * FROM kategori"); 
          $countkat = mysqli_num_rows($query);
    ?>
    <p class="card-text h2"><?php echo htmlentities($countkat); ?><i class="fa fa-database ml-2" aria-hidden="true"></i></p>
  </div>
</div>
<div class="card w-25 d-inline-block mt-2">
  <div class="card-body">
    <h5 class="card-title">Total Pengguna</h5>
    <?php $query = mysqli_query($conn,"SELECT * FROM users"); 
          $countser = mysqli_num_rows($query);
    ?>
    <p class="card-text h2"><?php echo htmlentities($countser); ?><i class="fa fa-users ml-2" aria-hidden="true"></i></p>
  </div>
</div>
<div class="card w-25 d-inline-block  mt-2">
  <div class="card-body">
    <h5 class="card-title">User Accepted</h5>
    <?php $query = mysqli_query($conn,"SELECT * FROM users WHERE status = 1"); 
          $countser = mysqli_num_rows($query);
    ?>
    <p class="card-text h2"><?php echo htmlentities($countser); ?><i class="fa fa-user-o ml-2" aria-hidden="true"></i></p>
  </div>
</div>
<div class="card w-25 d-inline-block mt-2">
  <div class="card-body">
    <h5 class="card-title">User Disaccepted</h5>
    <?php $query = mysqli_query($conn,"SELECT * FROM users WHERE status = 0"); 
          $countser = mysqli_num_rows($query);
    ?>
    <p class="card-text h2"><?php echo htmlentities($countser); ?><i class="fa fa-user-times ml-2" aria-hidden="true"></i></p>
  </div>
</div>
<div class="card w-25 d-inline-block mt-2">
  <div class="card-body">
    <h5 class="card-title">User Online</h5>
    <?php $query = mysqli_query($conn,"SELECT * FROM users WHERE username = 'admin'"); 
          $countser = mysqli_num_rows($query);
    ?>
    <p class="card-text h2"><?php echo htmlentities($countser); ?><i class="fa fa-eye ml-2" aria-hidden="true"></i></p>
  </div>
</div>
<hr>
</main>
  </div>
</div>

<?php require('includes/footer.php'); ?>