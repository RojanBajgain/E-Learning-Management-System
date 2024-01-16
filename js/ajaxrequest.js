$(document).ready(function() {
  // Ajax Call Form Already Exists Email Verification
  $("#stuemail").on("keypress blur", function() {
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var stuemail = $("#stuemail").val();
    $.ajax({
      url: "Student/addstudent.php",
      method: "POST",
      data: {
        checkemail: "checkemail",
        stuemail: stuemail,
      },
      success: function(data) {
        // console.log(data);
        if(data != 0) {
          $("#statusMsg2").html(
            '<small style="color: red;">Email ID Already in Use</small>'
          );
          $("#signup").attr("disabled", true);
    } else if (data == 0 && reg.test(stuemail)) {
          $("#statusMsg2").html(
          '<small style="color: green;">You may Continue</small>'
          );
          $("#signup").attr("disabled", false);
      } else if(!reg.test(stuemail)) {
        $("#statusMsg2").html(
          '<small style="color: red;">Please Enter Valid Email! e.g. example@mail.com</small>'
        );
        $("#signup").attr("disabled", true);
      } 
      if(stuemail == "") {
        $("#statusMsg2").html(
          '<small style="color: red;">Please Enter Email! e.g. example@mail.com</small>'
        );
      }
      },
    });
  });
});


// For Adding Student
function addStu() {
  var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
  var stuname = $("#stuname").val();
  var stuemail = $("#stuemail").val();
  var stupass = $("#stupass").val();
  var regUpperCase = /[A-Z]/;
  var regNumber = /\d/;
  var regSpecialSymbol = /[!@#$%^&*_+]/;

  // Checking Form Fields on Form Submission
  if(stuname.trim() == "") {
    $("#statusMsg1").html(
      '<small style="color: red;">Please Enter Name!</small>'
    );
    $("$stuname").focus();
    return false;
  } if(!/^[a-zA-Z]+$/.test(stuname.trim())) {
    $("#statusMsg1").html(
      '<small style="color: red;">Name must contain only letters!</small>'
    );
    $("#stuname").focus();
    return false;
  }
  else if(stuemail.trim() == "") {
    $("#statusMsg2").html(
      '<small style="color: red;">Please Enter Email!</small>'
    );
    $("$stuemail").focus();
    return false;
    } else if (stuemail.trim() != "" && !reg.test(stuemail)){
      $("#statusMsg2").html(
        '<small style="color: red;">Please Enter Valid Email! e.g. example@mail.com</small>'
    );
    $("$stuemail").focus();
    return false;
  } 
    // Password Fields Checks
    else if(stupass.trim() == "") {
      $("#statusMsg3").html(
        '<small style="color: red;">Please Enter Password!</small>'
      );
      $("$stupass").focus();
      return false;
    } 
    // Checking For Password Validation
    else if(stupass.length < 6) {
      $("#statusMsg3").html(
        '<small style="color: red;">Password Must Be At Least 6 Character Long!</small>'
      );
      $("$stupass").focus();
      return false;
    } else if(!regUpperCase.test(stupass)) {
      $("#statusMsg3").html(
        '<small style="color: red;">Password Must Contain At Least One Uppercase Letter!</small>'
      );
      $("#stupass").focus();
      return false;
    } else if (!regNumber.test(stupass)) {
      $("#statusMsg3").html(
        '<small style="color: red;">Password Must Contain At Least One Number!</small>'
      );
      $("#stupass").focus();
      return false;
    } else if (!regSpecialSymbol.test(stupass)) {
      $("#statusMsg3").html(
        '<small style="color: red;">Password Must Contain At Least One Special Symbol (e.g., !@#$%^&*()_+)!</small>'
      );
      $("#stupass").focus();
      return false;
    }
    else {
      $.ajax({
        url: "Student/addstudent.php",
        method: "POST",
        dataType: "json",
        data: {
          stusignup: "stusignup",
          stuname: stuname,
          stuemail: stuemail,
          stupass: stupass,
        },
        success: function(data) {
          console.log(data);
          if(data == "OK") {
            $("#successMsg").html("<span class='alert alert-success'>Registration Successful!</span>");
            clearStuRegField();
          } else if(data == "Failed") {
            $("#successMsg").html("<span class='alert alert-danger'>Unable To Registration!!</span>");
          }
        },
      });
    }
}

// Empty All Fields
function clearStuRegField() {
  $("#stuRegForm").trigger("reset");
  $("#statusMsg1").html(" ");
  $("#statusMsg2").html(" ");
  $("#statusMsg3").html(" ");
}


// Ajax Call For Student Login Verification 
function checkStuLogin() {
  // console.log("Login");
   
  var stuLogEmail = $("#stuLogemail").val();
  var stuLogPass = $("#stuLogpass").val();

  $.ajax({
    url: "Student/addstudent.php",
    method: "POST",
    data: {
      checkLogemail: "checkLogemail",
      stuLogEmail: stuLogEmail,
      stuLogPass: stuLogPass,
    },
    success: function (data) {
      // console.log(data);
      if(data == 0) {
        $("#statusLogMsg").html('<small class="alert alert-danger">Invalid Email ID or Password !</small>');
      } 
        else if (data == 1) {
          $("#statusLogMsg").html(
            '<div class="spinner-border text-success" role="status"></div>'
          );
          setTimeout(() => {
            window.location.href = "index.php";
          }, 1000);
      }
    },
  })
}