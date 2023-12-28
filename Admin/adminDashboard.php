<?php
if(!isset($_SESSION)) {
    session_start();
}

include('./admininclude/header.php');
include('../dbConnection.php');

if(isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}
$sql = "SELECT * FROM course";
$result = $conn -> query($sql);
$totalcourse = $result -> num_rows;

$sql = "SELECT * FROM student";
$result = $conn -> query($sql);
$totalstu = $result -> num_rows;



?>

<div class="col-sm-9 mt-5">
    <p class="bg-dark text-white text-center p-3">Admin Dashboard</p>
    <div class="row mx-5 text-center">
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">Courses</div>
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo $totalcourse; ?>
                    </h4>
                    <a href="courses.php" class="btn text-white">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Students</div>
                <div class="card-body">
                    <h4 class="card-title">
                    <?php echo $totalstu; ?>
                    </h4>
                    <a href="students.php" class="btn text-white">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">Viewed</div>
                <div class="card-body">
                    <h4 class="card-title">
                    15
                    </h4>
                    <a href="sellReport.php" class="btn text-white">View</a>
                </div>
            </div>
        </div>
    </div>
    
</div>



</div> <!-- div row close from header-->
</div> <!-- div Container-fluid close from header-->


<?php
include('./admininclude/footer.php');
?>