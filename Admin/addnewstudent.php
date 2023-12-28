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

if(isset($_REQUEST['newStuSubmitBtn'])) {
    // Checking for Empty Fields

    if(($_REQUEST['stu_name'] == "" ) || ($_REQUEST['stu_email'] == "" ) || ($_REQUEST['stu_pass'] == "" )
     || ($_REQUEST['stu_occ'] == "" )) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
     } else {

        $stu_name = $_REQUEST['stu_name'];
        $stu_email = $_REQUEST['stu_email'];
        $stu_pass = $_REQUEST['stu_pass'];
        $stu_occ = $_REQUEST['stu_occ'];

        if (!filter_var($stu_email, FILTER_VALIDATE_EMAIL)) {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Invalid Email Format</div>';
        } else {
            // Check if the email already exists in the database
            $check_email_sql = "SELECT * FROM student WHERE stu_email = '$stu_email'";
            $result = $conn->query($check_email_sql);
            if ($result->num_rows > 0) {
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Email already in use.</div>';
            } else {

        $sql = "INSERT INTO student (stu_name, stu_email, stu_pass, stu_occ) 
        VALUES ('$stu_name', '$stu_email', '$stu_pass', '$stu_occ')";

        if($conn -> query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Student Added Successfully.</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Student..</div>';
        }
     }
     }
     }
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Student</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_name">Name*</label>
            <input type="text" class="form-control" id="stu_name" name="stu_name" required>
        </div>
        <div class="form-group">
            <label for="stu_email">Email*</label>
            <input type="text" class="form-control" id="stu_email" name="stu_email" required>
        </div>

        <!-- <div class="form-group">
            <label for="stu_pass">Password*</label>
            <input type="text" class="form-control" id="stu_pass" name="stu_pass" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$">
            <small class="form-text text-muted">
                Password must be at least 8 characters long and contain at least one uppercase letter, 
                one lowercase letter, one digit, and one special character (@, $, !, %, *, ?, or &).
            </small>
        </div> -->
        <div class="form-group">
            <label for="stu_pass">Password*</label>
            <div class="input-group">
                <input type="password" class="form-control" id="stu_pass" name="stu_pass" 
                    required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$">
                <div class="input-group-append">
                <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
                </div>
            </div>
                <small class="form-text text-muted">
                Password must be at least 8 characters long and contain at least one uppercase letter, 
                one lowercase letter, one digit, and one special character (@, $, !, %, *, ?, or &).
                </small>
        </div>

        <div class="form-group">
            <label for="stu_occ">Occupation</label>
            <input type="text" class="form-control" id="stu_occ" name="stu_occ">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="newStuSubmitBtn" name="newStuSubmitBtn">Submit</button>
            <a href="students.php" class="btn btn-secondary">Close</a>
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


<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('stu_pass');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        // Change the icon based on the password visibility
        this.querySelector('i').className = type === 'password' ? 'fa fa-eye' : 'fa fa-eye-slash';
    });
</script>
