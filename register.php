<?php
	require "header.php";
  require "database_conn.php";
  $errors=$err="";
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
                $name= $_POST["name"];
           if(filter_var($email,FILTER_VALIDATE_EMAIL)){

                 // Check if the email and password match a record in the database
     $query = "SELECT * FROM users WHERE email='$email'";
            
     $result = $con->query($query);
     
     if ($result->num_rows > 0) {
        $error="error";
            $message="Email ".$email." already exist ! <br>". '<a href="forget_pass.php">forget password ?</a>';
            $color = "red"; 
              }
             else{
                 // Insert the email and password  in the database
                 $querys = "INSERT INTO  users(name,email,password) VALUES('$name','$email','$password')";
                $results= $con->query($querys);
            $message="Remember <br>Email:".$email."<br>Password:".$password;
                                    header("location:index.php?msg=$message");
                                    exit;    
                                }
            }
            $error="error";
            $message="Enter a valid email";
            $color = "red";  

    ?>
    <script>
    var error = "<?php echo $error ?>";
    var message = "<?php echo $message ?>";
    var color = "<?php echo $color ?>";
    var style = "background-color:" + color +
        "; color: white; padding: 10px; border-radius: 5px; text-align: center; position: fixed; top: 15%; left: 80%; transform: translate(-50%, -50%); z-index: 9999;"

    var popup = document.createElement("div");
    popup.setAttribute("style", style);
    popup.innerHTML = message;

    document.body.appendChild(popup);

    // Hide the popup after 3 seconds
    setTimeout(function() {
        document.body.removeChild(popup);
    }, 3000);
    </script>

    <?php } ?>

    <span id="err" style="color: red;"></span>
    <div class="register">
        <h1>Register New Account</h1>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return validateForm()">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            <br><br>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email">
            <span id="emailError" style="color: red;"></span>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <br><br>
            <input type="submit" name="submit" value="Register">
        </form>
        <p>Have Account ? <a href="index.php">Sign In</a></p>
    </div>
    <br><br>
    

    <script>
    function validateForm() {
        var email = document.getElementById("email").value;
        var name = document.getElementById("name").value;
        var password = document.getElementById("password").value;
        var emailError = document.getElementById("emailError");

        if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
            emailError.innerHTML = "Please enter a valid email address.";
            return false;
        } else {
            emailError.innerHTML = "";
            return true;
        }
    }

    if (name == "" || password == "") {
        err.innerHtml = "Name and password must be filled out";
        return false;
    }
    return true;
    </script>



    <?php
    include("footer.php"); ?>
</body>

</html>