<?php
require "header.php";

	require "database_conn.php";
    /*
	require "../message_display.php";
	require "../verify_logged_out.php";
*/
$error=$sucess=$email="";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
   <link rel="stylesheet" type="text/css" href="css/my.css" /> 
    <link rel="stylesheet" type="text/css" href="css/forgen.css" /> 
    <link rel="stylesheet" type="text/css" href="css/footerheader.css" />
</head>

<body>


<?php 
 if (isset($_POST["submit"])) {
                $email = trim($_POST["email"]);
        if($email==""){
            $error="Enter an email";
        }
                 
     // Check if the email and password match a record in the database
     $query = "SELECT email FROM users WHERE email='$email'";
            
                $result = $con->query($query);
                
                if ($result->num_rows > 0) {
                    header("location:password.php?email=$email");
        }
        $error="Email didn't found !";
 }
 ?>
    <div class="form-container">
    <span  style="color: red;"><?php echo $error; ?></span>
        <h1>Forgot Password</h1>
        <form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
                <span id="emailError" style="color: red;"></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" name="submit">
            </div>
        </form>
        <p><a href="index.php">
                << Go Back</a>
        </p>
    </div>
    <br><br>
    <script>
function validateForm() {
    var email = document.getElementById("email").value;
    var emailError = document.getElementById("emailError");
    
    if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
      emailError.innerHTML = "Please enter a valid email address.";
      return false;
    } else {
      emailError.innerHTML = "";
      return true;
    }
   
  }
  </script>
    <?php  include("footer.php"); ?>
</body>

</html>