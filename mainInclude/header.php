<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->
    
    <!-- Google Font CDN -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    
    <!-- Website Logo -->
    <link rel="Website icon" type="png" href="./images/book-top.png">
    
    <title id="dynamic-title">Learn IT</title>
</head>
<body>

<!-- Start Navigation -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark pl-5 fixed-top">
  <div class="container-fluid">
  <img src="./images/book-top.png" alt="ALT-1" style="width:40px;" class="rounded-pill p-1">
    <a class="navbar-brand" href="index.php">Learn IT</a>
    <span class="navbar-text">Learn and Implement vision</span>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav custom-nav pl-5">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item custom-nav-item">
          <a class="nav-link" href="courses.php">Courses</a>
        </li>

        <?php
          session_start();
          if(isset($_SESSION['is_login'])){
            echo '<li class="nav-item custom-nav-item">
                  <a href="student/studentProfile.php" class="nav-link">My Profile</a>
                  </li>
                  <li class="nav-item custom-nav-item">
                    <a href="logout.php" class="nav-link">Logout</a>
                  </li>';
          } else {
            echo '<li class="nav-item custom-nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#stuLoginModalCenter">Login</a>
                  </li>
                  <li class="nav-item custom-nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#stuRegModalCenter">Signup</a>
                  </li>';
            }
        ?>
        <li class="nav-item custom-nav-item">
          <a class="nav-link" href="index.php" title="Call here-> 01-1234567">Contact</a>
        </li>
        <li class="nav-item custom-nav-item">
           <a class="nav-link" href="aboutus.php" target="_blank">About Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navigation -->