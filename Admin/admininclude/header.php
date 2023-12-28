<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGE</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">

    <!-- Font Awesome CSS CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">

    <!-- Custom Admin CSS -->
    <link rel="stylesheet" href="../css/adminstyle.css">

     <!-- Website Logo -->
     <link rel="Website icon" type="png" href="../images/book-top.png">
</head>
<body>

    <!-- Top Navbar -->
    <nav class="navbar navbar-dark bg-dark fixed-top p-0 shadow" style="background-color: #c552c5;">
    <a href="adminDashboard.php" class="navbar-brand col-sm-3 col-md-2 mr-0">Learn IT
        <small class="text-white">Admin Area</small></a>
    </nav>
    
    <!-- Side Bar -->
    <div class="container-fluid mb-5" style="margin-top: 40px;">
    <div class="row">
        <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="adminDashboard.php" class="nav-link list-group-item list-group-item-action active" aria-current="true" style="background-color: black;">
                            <i class="fa-solid fa-tachometer-alt"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="students.php" class="nav-link list-group-item list-group-item-action list-group-item-light" style="color: black;">
                            <i class="fas fa-users"></i>
                            Students
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="courses.php" class="nav-link list-group-item list-group-item-action list-group-item-light" style="color: black;">
                            <i class="fa-solid fa-book-open-reader"></i>
                            Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="lessons.php" class="nav-link list-group-item list-group-item-action list-group-item-light" style="color: black;">
                            <i class="fa-solid fa-person-chalkboard"></i>
                            Lessons
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="sellReport.php" class="nav-link list-group-item list-group-item-action list-group-item-light" style="color: black;">
                            <i class="fa-solid fa-receipt"></i>
                            Report
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-table-list"></i>
                            Status
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a href="feedback.php" class="nav-link list-group-item list-group-item-action list-group-item-light" style="color: black;">
                            <i class="fa-solid fa-comments"></i>
                            Feedback
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="adminChangePass.php" class="nav-link list-group-item list-group-item-action list-group-item-light" style="color: black;">
                            <i class="fas fa-key"></i>
                            Change Password
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../logout.php" class="nav-link list-group-item list-group-item-action list-group-item-light" style="color: blue;">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>