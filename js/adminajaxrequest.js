// Ajax Call For Admin Login Verification 
function checkAdminLogin() {
    // console.log("Login");
    // console.log("Button Clicked");
     
    var adminLogEmail = $("#adminLogemail").val();
    var adminLogPass = $("#adminLogpass").val();

    // $("#statusAdminLogMsg").html(
    //   '<div class="text-primary">Logging in....</div>'
    // );
  
    $.ajax({
      url: "Admin/admin.php",
      method: "POST",
      data: {
        checkLogemail: "checkLogemail",
        adminLogEmail: adminLogEmail,
        adminLogPass: adminLogPass,
      },
      success: function (data) {
        // console.log(data);
        if(data == 0) {
          $("#statusAdminLogMsg").html('<small class="alert alert-danger">Invalid Email ID or Password !</small>');
        } 
        else if (data == 1) {
          $('#statusAdminLogMsg').html('<div class="spinner-border text-success" role="status"></div>');
          setTimeout(() => {
            window.location.href = "Admin/adminDashboard.php";
          }, 2000);
        }
      },
    })
  }