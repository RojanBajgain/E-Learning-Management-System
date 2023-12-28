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

if(isset($_REQUEST['stuPassUpdateBtn'])) {
    if(($_REQUEST['stuNewPass'] == "")) {
        // msg displayed if required field missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    } else {

        $sql = "SELECT * FROM student WHERE stu_email = '$stuEmail'";
        $result = $conn -> query($sql);
        if($result -> num_rows == 1) {
            $stuPass = $_REQUEST['stuNewPass'];
            $sql = "UPDATE student SET stu_pass = '$stuPass' WHERE stu_email = '$stuEmail'";
            if($conn -> query($sql) == TRUE) {
                // below msg display on from submit success
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully.</div>';
            } else {
                // below msg display on from submit failed
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update..</div>';
            }
        }
        
    }
}
?>


<div class="col-sm-9 col-md-10">
    <div class="row">
        <div class="col-sm-6">
            <form method="POST" class="mt-5 mx-4" onsubmit="return UpdatePass()">
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail"
                    value="<?php echo $stuEmail ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="inputnewpassword">New Password</label>
                    <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password" name="stuNewPass">
                </div>
                <button type="submit" class="btn btn-danger mr-3 mt-3" name="stuPassUpdateBtn">Update</button>
                <button type="reset" class="btn btn-dark mt-3">Reset</button>
                <?php if(isset($passmsg)) {echo $passmsg; } ?>
            </form>
        </div>
    </div>
</div>

</div> <!-- Close Row Div form header file -->

<?php
include('./stuInclude/footer.php')
?>

<script>
  function UpdatePass() {
    return confirm("Are you sure you want to update your password?");
  }
</script>
