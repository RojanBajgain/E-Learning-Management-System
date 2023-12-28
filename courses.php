<!-- Start Including Header -->
<?php
  include('./dbConnection.php');
  include('./mainInclude/header.php');
?>
<!-- End Including Header -->
    
<!-- Start Courses Page Banner -->
<div class="container-fluid bg-dark">
  <div class="row">
    <img src="./images/back-course.jpg" alt="courses" style="height: 500px; width: 100%; object-fit: cover; box-shadow: 10px;"/>
  </div>
</div>
<!-- End Courses Page Banner -->



<!-- Start ALL Courses -->
<div class="container mt-5">
    <h1 class="text-center" style="color: #c552c5;">All Course</h1>
      <div class="row mt-4">
        <?php
          $sql = "SELECT * FROM course";
          $result = $conn -> query($sql);
          if($result -> num_rows > 0) {
            while($row = $result -> fetch_assoc()) {
              $course_id = $row['course_id'];
              echo '
              <div class="col-sm-4 mb-4">
              <a href="coursedetails.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding: 0px; margin: 0px;">
              <div class="card">
                <img src=" ' . str_replace('..', '.', $row['course_img']).' " class="card-img-top" alt="Courses-images" style="width: 345px; height: 150px"/>
                  <div class=" card-body">
                    <h5 class="card-title">'.$row['course_name'].'</h5>
                    <p class="card-text"
                    style="width: auto; height: 100px; white-space: normal; overflow: hidden; text-overflow: ellipsis;"
                    >'.$row['course_desc'].'</p>
                  </div>
                <div class="card-footer">
                  <p class="card-text d-incline">Price: <small><del>&#x0930;&#x0942;'.$row['course_original_price'].'</del></small>
                  <span class="font-weight-bolder">FREE</span></p>
                  <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_id='.$course_id.'">Enroll</a>
                </div>
              </div> </a>
              </div>';
            }
          }
        ?>
        <!-- For course_original_price in line 41(if necessary) -->
        <!-- <span class="font-weight-bolder">&#x0930;&#x0942; '.$row['course_price'].'</span></p> -->
      </div> <!-- End all courses row -->
    
</div>
<!-- End All Courses -->




<!-- Start Including Footer -->
<?php
  include('./mainInclude/footer.php');
?>
<!-- End Including Footer -->