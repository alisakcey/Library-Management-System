<?php

	require "database_conn.php";
	require "header.php";
    $err="";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/my.css" />
    <link rel="stylesheet" type="text/css" href="css/footerheader.css" />
</head>

<body>
    <?php 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST["email"];
                $password = md5($_POST["password"]);
                 
     // Check if the email and password match a record in the database
     $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
          //   SELECT * FROM users WHERE email='pandeysubash404@gmail.com' AND password='subash';
                $result = $con->query($query);
                /* $result = array(
                array("name"=>"Subash Pandey","email"=>"pandeysubash404@gmail.com","password"=>"subash"),
                array("name"=>"Subash Pandey","email"=>"pandeysubash404@gmail.com","password"=>"subash"),
                array("name"=>"Subash Pandey","email"=>"pandeysubash404@gmail.com","password"=>"subash")
                );
                */
                if ($result->num_rows > 0) {
                    $row=mysqli_fetch_assoc($result);
                    //$row = array("name"=>"Subash Pandey","email"=>"pandeysubash404@gmail.com","password"=>"subash");
                   // echo $row["name"];
                    $name=$row["name"];
                    //$name="Subash Pandey";
                   $valid=true;
                  // Login successful
                  if ($valid) {
                   // Start the session
                   session_start();
                   
                   // Store the user's information in the session
                   $_SESSION["email"] = $email;
                   $_SESSION["name"] = $name;
                   
                   // Save the user's activity using cookies
                   setcookie("last_activity", time(), time() + (60 * 60 * 24 * 30));
                   //setcookie("cookieName","startingTime","EndTime");
                   //echo date();
                   //echo time(); 32812832 ms
                   //32812832+60 * 60 * 24 * 30=67367367
                   
                   // Redirect to the home page
                   $_SESSION["logged_in"] = true;
                //   header("location:librarian/index.php");
                header("location:admin/admin.php");
                 exit;
                } 
            }else {
                // Login failed
                $err="Invalid email or password";
              }
        }
   ?>
  
        <div class="signin">
            <span id="loginError" style="color: red;"><?php echo $err; ?></span>
            <h1>Sign-In</h1>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST"
                onsubmit="return validateForm()">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
                <span id="emailError" style="color: red;"></span>
                <br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <a href="forget_pass.php">forget password ?</a>
                <br><br>

                <input type="submit" name="submit" value="Sign in" id="sigin">
            </form>
            <br><br>
            <p>Don't Have Account ? <a href="register.php">Register</a></p>
        </div>
    <br><br>
    <?php
     if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
        ?>
<script>
    var error = "success";
    var message = "<?php echo $msg ?>";
    var color = "green";
    var style = "background-color:" + color +
        "; color: white; padding: 10px; border-radius: 5px; text-align: center; position: fixed; top: 15%; left: 80%; transform: translate(-50%, -50%); z-index: 9999;"

    var popup = document.createElement("div");
    popup.setAttribute("style", style);
    popup.innerHTML = message;

    document.body.appendChild(popup);

    // Hide the popup after 3 seconds
    setTimeout(function() {
        document.body.removeChild(popup);
    }, 5000);
    </script>
        <?php
	}
    ?>

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