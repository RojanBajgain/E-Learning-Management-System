<?php
if(!isset($_SESSION)) {
    session_start();
}

include('./stuInclude/header.php');
include_once('../dbConnection.php');

if(isset($_SESSION['is_login'])) {
    $stuEmail = $_SESSION['stuLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}

$sql = "SELECT * FROM student WHERE stu_email = '$stuEmail'";
$result = $conn -> query($sql);
if($result -> num_rows == 1) {
    $row = $result -> fetch_assoc();
    $stuId = $row["stu_id"];
    $stuName = $row["stu_name"];
    $stuOcc = $row["stu_occ"];
    $stuImg = $row["stu_img"];
}

if(isset($_REQUEST['updateStuNameBtn'])) {
    if(($_REQUEST['stuName'] == "")) {
        // msg displayed if required field missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields </div>';
    } else {
        $stuName = $_REQUEST["stuName"];
        $stuOcc = $_REQUEST["stuOcc"];
        $stu_image = $_FILES["stuImg"]['name'];
        $stu_image_temp = $_FILES["stuImg"]['tmp_name'];
        $img_folder = '../images/stu/' .$stu_image;
        move_uploaded_file($stu_image_temp, $img_folder);

        $sql = "UPDATE student SET stu_name = '$stuName', stu_occ = '$stuOcc', stu_img = '$img_folder' WHERE stu_email = '$stuEmail'";
        if($conn -> query($sql) == TRUE) {
            // below msg display on from submit success
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully.</div>';
        } else {
            // below msg display on from submit failed
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update..</div>';
        }
    }
}
?>

<div class="col-sm-6 mt-5">
<p class="bg-dark text-white p-2 mx-4 text-center">Profile</p>
    <form class="mx-4" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stuId">Student ID</label>
            <input type="text" class="form-control" id="stuId" name="stuId" value="<?php if(isset($stuId)) {echo $stuId;} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stuEmail">Email</label>
            <input type="email" class="form-control" id="stuEmail" name="stuEmail" value="<?php { echo $stuEmail; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stuName">Name</label>
            <input type="text" class="form-control" id="stuName" name="stuName" value="<?php if(isset($stuName)) { echo $stuName; } ?>">
        </div>
        <div class="form-group">
            <!-- Student doesn't mean school it also means learner -->
            <label for="stuOcc">Occupation</label>
            <input type="text" class="form-control" id="stuOcc" name="stuOcc" value="<?php if(isset($stuOcc)) { echo $stuOcc; } ?>">
        </div>
        <div class="form-group">
            <label for="stuImg">Upload Image</label>
            <input type="file" class="form-control-file" id="stuImg" name="stuImg">
        </div>
        <div>
            <img id="StudentImagePrev" src="#" alt="Uploaded Image" style="max-width: 250px; display: none;">
        </div>
        <script>
            const stuImgInput = document.getElementById('stuImg');
            const StudentImagePrev = document.getElementById('StudentImagePrev');

            stuImgInput.addEventListener('change', function(event) {
                const file = event.target.files[0];

                if (file) {
                    const reader = new FileReader();
                    
                    reader.addEventListener('load', function() {
                        StudentImagePrev.src = reader.result;
                        StudentImagePrev.style.display = 'block';
                    });

                    reader.readAsDataURL(file);
                } else {
                    StudentImagePrev.src = '#';
                    StudentImagePrev.style.display = 'none';
                }
            });
        </script>
        <button type="submit" class="btn btn-primary mt-3" name="updateStuNameBtn">Update</button>
        <?php if(isset($passmsg)) {echo $passmsg; } ?>
    </form>
</div>