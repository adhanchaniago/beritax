<?php require ('includes/config.php'); ?>
<?php require ('function/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap-4.5.2/dist/css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900">
    <link rel="stylesheet" href="assets/css/blog.css">
    <!-- CSS COSTUM SENDIRI-->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Web Berita Terupdate & Terpercaya | Beritax Company</title>
  </head>
  <body>

<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <nav class="navbar navbar-light bg-transparent">
      <form class="form-inline">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      </nav>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="index.php">BERITAX</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center navbar navbar-light">
        <a href="admin/login.php" class="badge"><button class="btn btn-sm btn-outline-secondary ml-1" id="login_show" href="admin/login.php">Login</button></a>
        <button class="btn btn-sm btn-outline-secondary ml-2" id="register_show" data-toggle="modal" data-target="#myModalTambahBerita">Sign up</button> 
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
    <?php 
    $sql12 = "SELECT nama_kategori FROM kategori ORDER BY nama_kategori ASC LIMIT 12";
    $result12 = mysqli_query($conn, $sql12);
    //associative array
    while($row12 = mysqli_fetch_assoc($result12)){
    ?>
      <a class="p-2 text-muted" href="#"><?=$row12['nama_kategori']?></a>
    <?php } ?>
      </nav>
  </div>