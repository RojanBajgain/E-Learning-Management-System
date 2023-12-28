<?php
/*
    include('./dbConnection.php');
    session_start();
    if(!isset($_SESSION['stuLogEmail'])) {
        echo "<script> location.href = 'loginorsignup.php' </script>";
    } else {
        $stuEmail = $_SESSION['stuLogEmail'];

    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">    

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/style.css">

        <title>Checkout</title>

        <!-- Website Logo -->
        <link rel="Website icon" type="png" href="./images/book-top.png">
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-6 offset-sm-3 jumbotron">
                    <h3 class="mb-5">Welcome to Checkout page</h3>
                    <!-- For redirecting after clicking Ok -->
                    <form action="./Student/myCourse.php" method="post" onsubmit="return checkMessage();">
                        <div class="form-group row">
                            <label for="ORDER_ID" class="col-sm-4 col-form-label">ORDER ID:</label>
                            <div class="col-sm-8">
                                <input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" 
                                value="<?php echo "ORDS" .rand(10000, 99999999) ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="CUST_ID" class="col-sm-4 col-form-label">Student Email:</label>
                            <div class="col-sm-8">
                                <input id="CUST_ID" class="form-control" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" 
                                value="<?php if(isset($stuEmail)) {echo $stuEmail ;} ?>" readonly>
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <input type="submit" value="Checkout" class="btn btn-primary" onclick="">
                            <a href="./courses.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                    <small class="form-text text-muted">Note: Complete by clicking checkout Button</small>
                </div>
            </div>
        </div>
        <!-- Message display div -->
        <div id="messageDiv" class="fixed-bottom"></div>



    </body>
    </html>

<?php
    }

*/
?>

<!-- <script>
    function checkMessage() {
        // Display the message in the messageDiv
        var messageDiv = document.getElementById("messageDiv");
        messageDiv.innerHTML = '<div class="alert alert-success text-center">Thank You For Purchasing Our Course!!</div>';

        setTimeout(function() {
            window.location.href = "./Student/myCourse.php";
        }, 5000); 

        return false;
    }
</script> -->