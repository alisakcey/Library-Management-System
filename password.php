<?php
require "header.php";
$email ="";
	require "database_conn.php";
    // Get the email from the previous page
    if(isset( $_GET["email"])){
$email = $_GET["email"];
echo "Email address: " . $email;
    }
$error=$sucess="";
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

 if (isset($_POST["submit"])){
    $password = trim($_POST["password"]);
 $query = "UPDATE users SET password='$password' WHERE email='$email'";
 $result = $con->query($query);
                
 if ($result) {
    $sucess="Passowrd reset sucessfully !";
                }
                else{
    $error="Can't password reset !";
                }
            
 }
 ?>

<div class="form-container">
<span  style="color: green;"><?php echo $sucess; ?></span>
<span  style="color: red;"><?php echo $error; ?></span>
        <h1>Enter New Password</h1>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']).'?email='.$email; ?>" method="POST">
        <div class="form-group">
                <input type="hidden" id="email" name="email" value="<?php echo $email; ?>" >
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" name="submit">
            </div>
        </form>
        <p><a href="index.php">
                << Go Back</a>
        </p>
    </div>
    <?php  include("footer.php");   $con->close(); ?>
</body>

</html>
