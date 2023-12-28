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

if(isset($_REQUEST['courseSubmitBtn'])) {
    // Checking for Empty Fields

    if(($_REQUEST['course_name'] == "" ) || ($_REQUEST['course_desc'] == "" ) || ($_REQUEST['course_author'] == "" )
     || ($_REQUEST['course_duration'] == "" ) || ($_REQUEST['course_price'] == "" )) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
     } else {

        $course_name = $_REQUEST['course_name'];
        $course_desc = $_REQUEST['course_desc'];
        $course_author = $_REQUEST['course_author'];
        $course_duration = $_REQUEST['course_duration'];
        $course_price = $_REQUEST['course_price'];
        $course_original_price = $_REQUEST['course_original_price'];
        $course_image = $_FILES['course_img']['name'];
        $course_image_temp = $_FILES['course_img']['tmp_name'];
        $img_folder = '../images/courseimg/' .$course_image;
        move_uploaded_file($course_image_temp, $img_folder);


        $sql = "INSERT INTO course (course_name, course_desc, course_author, course_img, course_duration, course_price, course_original_price) 
        VALUES ('$course_name', '$course_desc', '$course_author', '$img_folder', ' $course_duration', '$course_price', '$course_original_price')";

        if($conn -> query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Added Successfully.</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Course..</div>';
        }
     }
}
?>

<div class="col-sm-6 mx-3 jumbotron">
    <h2 class="text-center">Add New Course</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea class="form-control" id="course_desc" name="course_desc" row="2" style="height: 150px"></textarea>
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" class="form-control" id="course_author" name="course_author">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration" placeholder="Eg: 12 days or months" title="e.g. 12 months">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course Original Price</label>
            <input type="text" class="form-control" id="course_original_price" name="course_original_price" pattern="[0-9]+(\.[0-9]+)?" title="Please enter price in number">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" class="form-control" id="course_price" name="course_price">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <input type="file" class="form-control-file" id="course_img" name="course_img">
        </div>
        <div>
            <img id="CourseImgPrev" src="#" alt="Uploaded Image" style="max-width: 400px; display: none;">
        </div>
        <script>
            const stuImgInput = document.getElementById('course_img');
            const CourseImgPrev = document.getElementById('CourseImgPrev');

            stuImgInput.addEventListener('change', function(event) {
                const file = event.target.files[0];

                if (file) {
                    const reader = new FileReader();
                    
                    reader.addEventListener('load', function() {
                        CourseImgPrev.src = reader.result;
                        CourseImgPrev.style.display = 'block';
                    });

                    reader.readAsDataURL(file);
                } else {
                    CourseImgPrev.src = '#';
                    CourseImgPrev.style.display = 'none';
                }
            });
        </script>

        <div class="text-center">
            <button type="submit" class="btn btn-info mt-3" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
            <a href="courses.php" class="btn btn-secondary mt-3">Close</a>
        </div>
        <?php
        if(isset($msg)) {echo $msg;}
        ?>
    </form>
</div>

</div>  <!-- div Row close from header -->
</div>  <!-- div container-fluid close from header -->


<?php
include('./admininclude/footer.php');
?>
