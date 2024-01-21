<?php 
    if(!isset($_SESSION)) {
        session_start();
    }

    // include('./stuInclude/header.php');
    include_once('../dbConnection.php');

    if(isset($_SESSION['is_login'])) {
        $stuLogEmail = $_SESSION['stuLogEmail'];
    } else {
        echo "<script> location.href='../index.php'; </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Course</title>

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
</head>
<body>
    <div class="container-fluid bg-dark p-2">
        <h3 class="text-center p-2" style="color: white;">My Courses</h3>
        <a href="./myCourse.php" class="btn btn-danger">Back To Profile</a>
    </div>

    <!-- <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 border-right bg-light">
                <h4 class="text-center p-3">Lessons</h4>
                <ul id="playlist" class="nav flex-column">
                    <?php
                        // if(isset($_GET['course_id'])) {
                        //     $course_id = $_GET['course_id'];
                        //     $sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
                        //     $result = $conn -> query($sql);
                        //     if($result -> num_rows > 0) {
                        //         while($row = $result -> fetch_assoc()) {
                        //             echo '<li class="nav-item border-bottom py-2 nav-link list-group-item list-group-item-action list-group-item-secondary" 
                        //                 movieurl='.$row['lesson_link'].' style="cursor: pointer;">'.$row['lesson_name'].'</li>';
                        //         }
                        //     }
                        // }
                    ?>
                </ul>
            </div>
                <div class="col-sm-8">
                    <video id="videoarea" src="" class="mt-3 w-75 ml-2" controls></video>
                </div>
        </div>
    </div> -->

    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 border-right bg-light">
            <h4 class="text-center p-3">Lessons</h4>
            <ul id="playlist" class="nav flex-column">
                <?php
                if (isset($_GET['course_id'])) {
                    $course_id = $_GET['course_id'];
                    $sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<li class="nav-item border-bottom py-2 nav-link list-group-item list-group-item-action list-group-item-secondary" 
                                    data-movieurl="' . $row['lesson_link'] . '" data-description="' . $row['lesson_desc'] . '"
                                    style="cursor: pointer;">' . $row['lesson_name'] . '</li>';
                        }
                    }
                }
                ?>
            </ul>
        </div>
        <div class="col-sm-8">
            <video id="videoarea" src="" class="mt-3 w-75 ml-2" controls></video>
            <div>
            <b>Description</b>
            </div>
            <div id="lessonDescription" class="mt-3 ml-2"></div>
        </div>
    </div>
</div>

<script>
    // Add JavaScript to update the video and lesson description when a lesson is clicked
    var playlistItems = document.querySelectorAll('#playlist .nav-item');
    var videoArea = document.getElementById('videoarea');
    var lessonDescription = document.getElementById('lessonDescription');

    playlistItems.forEach(function(item) {
        item.addEventListener('click', function() {
            var movieUrl = item.getAttribute('data-movieurl');
            var description = item.getAttribute('data-description');

            videoArea.src = movieUrl;
            lessonDescription.innerHTML = '<p>' + description + '</p>';
        });
    });
</script>


    

<!-- Jquery and Bootstrap Javascript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Popper CSS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>

<!-- Bootstrap-js CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Font Awesome JS -->
<!-- <script src="../js/all.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

<!-- Student Ajax Call Javascript -->
<!-- <script type="text/javascript" src="js/ajaxrequest.js"></script> -->

<!-- Custom Javascript -->
<script type="text/javascript" src="../js/lessonCustom.js"></script>
</body>
</html>