<!-- Start Footer -->
<footer class="container-fluid bg-dark text-center p-2">
  <small class="text-white">Copyright &copy; 2023 || Designed By --- || 
    <a href="#login" data-toggle="modal" data-target="#adminLoginModalCenter">Admin Login</a></small>
</footer>
<!-- End Footer -->

<!-- Start Student Registration Modal -->
    <!-- Modal -->
    <div class="modal fade" id="stuRegModalCenter" tabindex="-1" role="dialog" aria-labelledby="stuRegModalCenterLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title fs-5" id="stuRegModalCenterLabel">Student Registration</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          
          <div class="modal-body">
          <!-- Start Student Registration Form -->
            <?php 
              include('studentRegistration.php');
            ?>
          <!-- End Student Registration Form -->

          </div>
          <div class="modal-footer">
            <span id="successMsg"></span>
            <button type="button" class="btn btn-primary" onclick="addStu()" id="signup">Sign Up</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
<!-- End Student Registration Modal -->

<!-- Start Student Login Modal -->
    <!-- Modal -->
    <div class="modal fade" id="stuLoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="stuLoginModalCenterLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title fs-5" id="stuLoginModalCenterLabel">Student Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          
          <div class="modal-body">
            <!-- Start Student Login Form -->
            <form id="stuLoginForm">
              <div class="form-group">
                <i class="fa-solid fa-envelope"></i>
                <label for="stuLogemail" class="pl-2 font-weight-bold">E-mail</label>  
                <input type="email" class="form-control" placeholder="E-mail" name="stuLogemail" id="stuLogemail">
              </div>
              <div class="form-group">
                <i class="fa-solid fa-key"></i>
                <label for="stuLogpass" class="pl-2 font-weight-bold">Password</label>  
                <input type="password" class="form-control" placeholder="Password" name="stuLogpass" id="stuLogpass">
              </div>
            </form>
            <!-- End Student Login Form -->
          </div>

          <div class="modal-footer">
            <small id="statusLogMsg"></small>
            <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
<!-- End Student Student Modal -->


<!-- Start Admin Login Modal -->
    <!-- Modal -->
    <div class="modal fade" id="adminLoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="stuLoginModalCenterLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title fs-5" id="adminLoginModalCenterLabel">Admin Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <!-- Start Admin Login Form -->
            <form id="adminLoginForm">
              <div class="form-group">
                <i class="fa-solid fa-envelope"></i>
                <label for="adminLogemail" class="pl-2 font-weight-bold">E-mail</label> 
                <small id="AdminLog1"></small> 
                <input type="email" class="form-control" placeholder="E-mail" name="adminLogemail" id="adminLogemail">
              </div>
              <div class="form-group">
                <i class="fas fa-key"></i>
                <label for="adminLogpass" class="pl-2 font-weight-bold">Password</label>  
                <small id="AdminLog2"></small>
                <input type="password" class="form-control" placeholder="Password" name="adminLogpass" id="adminLogpass">
              </div>
            </form>
            <!-- End Admin Login Form -->
          </div>
          <div class="modal-footer">
          <small id="statusAdminLogMsg"></small>
            <button type="button" class="btn btn-primary" id="adminLoginBtn" onclick="checkAdminLogin()">Login</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
<!-- End Admin Login Modal -->




<!-- Jquery and Bootstrap Javascript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Popper CSS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>

<!-- Bootstrap-js CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Font Awesome JS -->
<!-- <script src="../js/all.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

<!-- Student Testimonial-Owl JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js"></script>

<!-- Student Ajax Call Javascript -->
<script type="text/javascript" src="js/ajaxrequest.js"></script>
<!-- Admin Ajax Call Javascript -->
<script type="text/javascript" src="js/adminajaxrequest.js"></script>


</body>
</html>