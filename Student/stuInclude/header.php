<?php
    define('PAGE', 'profile');
    include_once('../dbConnection.php');
    if(!isset($_SESSION)) {
        session_start();
    }

    if(isset($_SESSION['is_login'])) {
        $stuLogEmail = $_SESSION['stuLogEmail'];
    }
    // else {
        // echo "<script> location.href='../index.php'; </script>";
    // }

    if(isset($stuLogEmail)) {
        $sql = "SELECT stu_img FROM student WHERE stu_email = '$stuLogEmail'";
        $result = $conn -> query($sql);
        $row = $result -> fetch_assoc();
        $stu_img = $row['stu_img'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">    

     <!-- Google Font CDN -->
     <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">

     <!-- Font Awesome CDN -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 
     <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

    <!-- Website Logo -->
    <link rel="Website icon" type="png" href="../images/book-top.png">

    <!-- <script type="text/javascript" src="../js/main.js"></script> -->

</head>
<body>
    <!-- Top NavBar -->
    <nav class="navbar navbar-dark bg-dark fixed-top flex-md-nowrap p-0 shadow">
    <div>
        <img src="../images/book-top.png" alt="ALT-1" style="width:50px;" class="rounded-pill p-2">
        <a href="../index.php" class="navbar-brand col-sm-3 col-md-2 mr-0">Learn IT</a>
    </div>
    </nav>

    <!-- Side Bar -->
    <div class="container-fluid mb-5" style="margin-top: 40px;">
        <div class="row">
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3">
                            <img src="<?php echo $stu_img ?>" alt="studentImage" class="img-thumbnail rounded-pill">
                        </li>
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link list-group-item list-group-item-action list-group-item-light" style="color: black;">
                                <i class="fa-solid fa-house"></i>
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link list-group-item list-group-item-action list-group-item-secondary <?php if(PAGE == 'profile') {echo 'active'; } ?>" href="studentProfile.php">
                                <i class="fa-solid fa-user-secret"></i>Profile <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="myCourse.php" class="nav-link list-group-item list-group-item-action list-group-item-secondary">
                                <i class="fa-solid fa-book-open"></i>
                                My Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="stufeedback.php" class="nav-link list-group-item list-group-item-action list-group-item-secondary">
                                <i class="fa-solid fa-comments"></i>
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="studentChangePass.php" class="nav-link list-group-item list-group-item-action list-group-item-secondary">
                                <i class="fa-solid fa-key"></i>
                                Change Password
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link list-group-item list-group-item-action list-group-item-secondary">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Logout 
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
