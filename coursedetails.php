<!-- Start Including Header -->
<?php
  include('./dbConnection.php');
  include('./mainInclude/header.php');
?>
<!-- End Including Header -->
    
<!-- Start Courses Page Banner -->
<div class="container-fluid bg-dark">
  <div class="row">
    <img src="./images/library-Pic.jpg" alt="courses" style="height: 500px; width: 100%; object-fit: cover; box-shadow: 10px;"/>
  </div>
</div>
<!-- End Courses Page Banner -->

<!-- Start Main Content -->
<div class="container mt-5">
<?php
  if(isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];
    $_SESSION['course_id'] = $course_id;
    $sql = "SELECT * FROM course WHERE course_id = '$course_id'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();
  }

?>
  <div class="row">
  <div class="col-md-4">
    <img src="<?php echo str_replace('..', '.', $row['course_img']) ?>" class="card-img-top" alt="Images" />
  </div>
  <div class="col-md-8">
    <div class="card-body">
      <h5 class="card-title"><strong>Course Name:</strong> <?php echo $row['course_name'] ?></h5>
      <p class="card-text"><i><strong>Description:</strong><br> <?php echo $row['course_desc'] ?> </i></p>
      <p class="card-text"><i><strong>Duration:</strong> <?php echo $row['course_duration'] ?></i></p>

      <form id="FormDelay" action="./Student/myCourse.php" method="post">
        <p class="card-text d-inline"><strong>Price:</strong> <small><del>&#x0930;&#x0942; 
          <?php echo $row['course_original_price'] ?></del></small>
          <span class="font-weight-bolder">Free</span></p>

          
        <!-- <span class="font-weight-bolder">&#x0930;&#x0942; <?php /* echo $row['course_price'] */?></span></p> -->
        <!-- <input type="hidden" name="id" value="<?php /* $row['course_price'] */?>"> -->

        <input type="hidden" name="course_id" value="<?php echo $row['course_id']; ?>">
        <button type="submit" class="btn btn-danger text-white font-weight-bolder float-right mb-2" name="buy">Enroll</button>

      </form>
    </div>
  </div>
  </div>
</div>

<div class="container">
  <div class="row">
  <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col">Lesson No.</th>
          <th scope="col">Lesson Name</th>
        </tr>
      </thead>
      <tbody>
    <?php
      $sql = "SELECT * FROM lesson";
      $result = $conn -> query($sql);
      if($result -> num_rows > 0) {
        $num = 0;
        while($row = $result -> fetch_assoc()){
          if($course_id == $row['course_id']) {
            $num++;
          echo '<tr>
           <th scope="row">'.$num.'</th>
            <td>'.$row['lesson_name'].'</td>
        </tr>';
          }
        }
      }

    ?>
      </tbody>
    </table>
  </div>
</div>
<!-- End Main Content -->


<!-- Start Including Footer -->
<?php
  // include('./mainInclude/footer.php');
?>
<!-- End Including Footer -->

<script>
  document.getElementById('FormDelay').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting immediately

    // message to the user using alert
    // alert('\tYou have not logged-in! Please Login To Continue... \n\tIf You Are the New User Please Register to Enroll...');

    // Set a delay before submitting the form
    setTimeout(function() {
      document.getElementById('FormDelay').submit();
    }, 1000); //(3 seconds) delay
  });
</script>
