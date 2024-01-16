<!-- index.php -->

<!-- Start Including Header -->
<?php
  include('./dbConnection.php');
  include('./mainInclude/header.php');
?>
<!-- End Including Header -->


  <!-- Start video background -->
    <div class="container-fluid remove-vid-marg">
        <div class="vid-parent">
            <video playsinline autoplay muted loop>
              <source src="video/book-ani.mp4">
            </video>
            <div class="vid-overlay"></div>
        </div>
        <div class="vid-content">
          <h1 class="my-content">Welcome to Learn IT</h1>
          <small class="my-content">Learn For Better Future</small><br>

          <?php
            if(!isset($_SESSION['is_login'])){
              echo ' <a href="#" class="btn btn-danger mt-3" data-toggle="modal" data-target="#stuRegModalCenter">Register Now!</a>';
            } else {
              echo '<a href="student/studentProfile.php" class="btn btn-primary mt-3">My Profile</a>';
            }
          ?>
        </div>
    </div>
<!-- End video background -->

<!-- Start Text Banner -->
<div class="container-fluid bg-dark text-banner">
    <div class="row bottom-banner">
      <div class="col-sm">
        <h5><i class="fa-solid fa-book-open-reader fa-shake mr-1"></i>E-Books</h5>
      </div>
      <div class="col-sm">
        <h5><i class="fa-solid fa-book fa-fade mr-1"></i>Popular Courses</h5>
      </div>
      <div class="col-sm">
        <h5><i class="fa-regular fa-keyboard fa-shake mr-1"></i>LifeTime Access</h5>
      </div>
      <div class="col-sm">
        <h5><i class="fa-solid fa-chalkboard-user fa-fade mr-1"></i>E-Learning Platform</h5>
      </div>
    </div>
  </div>
<!-- End Text Banner -->

<!-- Start Most Popular Courses -->
  <div class="container mt-5">
    <h1 class="text-center" style="color: #bb21bb;">Popular Course</h1>
    <!-- Start Most Popular course 1st card Deck -->
    <div class="card-deck mt-4">
      <?php 
        $sql = "SELECT * FROM course LIMIT 3";
        $result = $conn -> query($sql);
        if($result -> num_rows > 0) {
          while($row = $result -> fetch_assoc()) {
            $course_id = $row['course_id'];
            echo '<a href="coursedetails.php?course_id='.$course_id.'" 
                    class="btn" style="text-align: left; padding: 0px; margin: 0px;">
              <div class="card">
                <img src=" ' . str_replace('..', '.', $row['course_img']).' " class="card-img-top" alt="image1" style="width: 345px; height: 150px"/>
                <div class="card-body">
                  <h5 class="card-title">'.$row['course_name'].'</h5>
                  <p class="card-text" 
                      style="width: auto; height: 100px; white-space: normal; overflow: hidden; text-overflow: ellipsis;"
                    >'.$row['course_desc'].'</p>
                </div>
                <div class="card-footer">
                  <p class="card-text d-incline">Price: <small><del>&#x0930;&#x0942; '.$row['course_original_price'].'</del></small>
                  <span class="font-weight-bolder">FREE</span></p>
                  <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_id='.$course_id.'">Enroll</a>
                </div>
              </div>
            </a>';
          }
        }
      ?>
  </div>
  <!-- For the course_original_price (if necessary in line 74 ) -->
  <!-- <span class="font-weight-bolder">&#x0930;&#x0942; '.$row['course_price'].'</span></p> -->
<!-- End Most Popular course 1st card Deck -->


    <!-- Start Most Popular course 2nd card Deck -->
    <div class="card-deck mt-4">
    <?php 
        $sql = "SELECT * FROM course LIMIT 3, 3";
        $result = $conn -> query($sql);
        if($result -> num_rows > 0) {
          while($row = $result -> fetch_assoc()) {
            $course_id = $row['course_id'];
            echo '
              <a href="coursedetails.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding: 0px; margin: 0px;">
              <div class="card">
                <img src=" ' . str_replace('..', '.', $row['course_img']).' " class="card-img-top " alt="image1" style="width: 345px; height: 150px"/>
                <div class="card-content">
                <div class=" card-body">
                  <h5 class="card-title">'.$row['course_name'].'</h5>
                  <p class="card-text" 
                    style="width: auto; height: 100px;  overflow: hidden; text-overflow: ellipsis;"
                  >'.$row['course_desc'].'</p>
                </div>
                </div>
                <div class="card-footer">
                  <p class="card-text d-incline">Price: <small><del>&#x0930;&#x0942; '.$row['course_original_price'].'</del></small>
                  <span class="font-weight-bolder">FREE</span></p>
                  <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_id='.$course_id.'">Enroll</a>
                </div>
              </div>
            </a>';
          }
        }
      ?>
    <!-- For the course_original_price (if necessary in line 110 ) -->
    <!-- <span class="font-weight-bolder">&#x0930;&#x0942; '.$row['course_price'].'</span></p> -->
  </div>
  <!-- End Popular course 2nd card Deck -->

    <div class="text-center m-2">
      <a href="courses.php" class="btn btn-danger btn-sm mt-3">View all courses</a>
    </div>
    </div>
    <!-- End Popular Courses -->

    <!-- Start Contact us -->
    <?php
    include('./contact.php');
    ?>
    <!-- End Contact us -->

<!-- Start Social Follow -->
<div class="container-fluid bg-dark">
    <div class="row text-white text-center p-1">
      <div class="col-sm">
        <a class="text-white social-hover" href="https://www.facebook.com/" target="_blank" style="text-decoration: none;">
          <i class="fab fa-facebook fa-bounce"></i>Facebook</a>
      </div>
      <div class="col-sm">
        <a class="text-white social-hover" href="https://twitter.com/i/flow/login?redirect_after_login=%2F" target="_blank" style="text-decoration: none;">
          <i class="fab fa-twitter fa-flip"></i>Twitter</a>
      </div>
      <div class="col-sm">
        <a class="text-white social-hover" href="https://www.instagram.com/" target="_blank" style="text-decoration: none;">
          <i class="fab fa-instagram fa-spin"></i>Instagram</a>
      </div>
      <div class="col-sm">
        <a class="text-white social-hover" href="https://www.viber.com/en/" target="_blank" style="text-decoration: none;">
          <i class="fab fa-viber fa-shake"></i> Viber</a>
      </div>
    </div>
  </div>
<!-- End Social Follow -->

<!-- Start About Section -->
  <div class="container-fluid p-4" style="background-color: #E9ECEF;">
    <div class="container" style="background-color: #E9ECEF;">
      <div class="row text-center">
        <div class="col-sm">
          <h5>About Us</h5>
          <p>
            Welcome to our online learning platform! Our platform is a space filled with educational content and resources that offer students everything they need in one place.
            Our platform offers a wide range of benefits including communication and critical thinking skills.
          </p>
        </div>
        <div class="col-sm">
          <h5>Categories</h5>
          <a href="courses.php" class="text-dark">Web Development</a><br>
          <a href="courses.php"class="text-dark">Web Designing</a><br>
          <a href="courses.php"class="text-dark">Android App Development</a><br>
          <a href="courses.php"class="text-dark">Web Application</a><br>
          <a href="courses.php"class="text-dark">Data Analysis</a><br>
        </div>
        <div class="col-sm">
          <h4>Contact Us</h4>
          <p>
            Learn IT <br/>
            Kathmandu, Nepal <br/>
            <strong>Email:</strong> LearnIT2023@gmail.com<br/>
            <strong>Phone No:</strong> 012345678</p>
        </div>
      </div>
    </div>
  </div>
<!-- End About Section -->


<!-- Start Including Footer -->
<?php
  include('./mainInclude/footer.php');
?>
<!-- End Including Footer -->
