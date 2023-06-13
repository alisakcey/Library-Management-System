<?php
require("../../database_conn.php");
require "../../session.php";
 // require "../header1.php";
 $error=$errors=""; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../admin/styles.css">
    <link rel="stylesheet" type="text/css" href="css/addmember.css" /> 
    <title>Add Book</title>
</head>

<body>
    <div class="side-menu">
        <div class="user-name">
            <h3><?php echo $_SESSION["name"]; ?></h3>
        </div>
        <ul>
            <a href="../../admin/admin.php">
                <li><img src="../../img/textbook.png" alt="">&nbsp;<span>Home</span></li>
            </a>
            <a href="../book/adds.php">
                <li><img src="../../img/addbook.png" alt="">&nbsp;<span>Add Book</span>
                </li>
            </a>
            <a href="../book/views.php">
                <li><img src="../../img/viewbook.png" alt="">&nbsp;<span>View Book </span>
                </li>
            </a>
            <a href="../book/deletes.php">
                <li><img src="../../img/book.png" alt="">&nbsp;<span>Delete Book</span>
                </li>
            </a>
            <a href="../book/updates.php">
                <li><img src="../../img/edit.png" alt="">&nbsp;<span>Edit Book</span></li>
            </a>
            <a href="../book/issuses.php">
                <li><img src="../../img/issusebook.png" alt="">&nbsp;<span>Issue Book</span>
                </li>
            </a>
            <a href="memberviews.php">
                <li><img src="../../img/addmember.png" alt="">&nbsp; <span>View Member</span></li>
            </a>
            <a href="updatemember.php">
                <li><img src="../../img/addmember.png" alt="">&nbsp; <span>Edit Member</span></li>
            </a>
            <a href="deletemember.php">
                <li><img src="../../img/addmember.png" alt="">&nbsp; <span>Delete Member</span></li>
            </a>
            <a href="booktaken.php">
                <li><img src="../../img/addmember.png" alt="">&nbsp; <span>Book Taken</span></li>
            </a>
        </ul>
        <!-- logout-->
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
      <div class="user">
                    <a href="../../admin/admin.php">
                        <div><h1>Libary Management System</h1></div>
                    </a>  
            <a href="../../logout.php" class="btn">Logout</a>
                    </div> 
                </div>
            </div>
            <?php 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST["email"];
                $name = $_POST["name"];
                $sid=$_POST["sid"];
                 
     // Check if the email and password match a record in the database
     $query = "SELECT * FROM students WHERE id='$sid'";
                $result = $con->query($query);
                if ($result->num_rows > 0) {
                    // email matched 
                    $error="error";
                    $message=$sid." : already exist !";
                    $color = "red";
               }
                else{
                    mysqli_query($con, "INSERT INTO students (id, name,email) VALUES ('$sid','$name', '$email')") or die(); 
                    // Display popup message
                    $error="success";
                    $message="New member added !";
                    $color = "green";
                }?>

                <!-- Modify the existing script to display the message in the center with different colors based on success or error -->
                <script>
                  var error = "<?php echo $error ?>";
                  var message = "<?php echo $message ?>";
                  var color = "<?php echo $color ?>";
                  var style = "background-color:" + color + "; color: white; padding: 10px; border-radius: 5px; text-align: center; position: fixed; top: 15%; left: 80%; transform: translate(-50%, -50%); z-index: 9999;"
                  
                  var popup = document.createElement("div");
                  popup.setAttribute("style", style);
                  popup.innerHTML = message;
                  
                  document.body.appendChild(popup);
                  
                  // Hide the popup after 3 seconds
                  setTimeout(function() {
                    document.body.removeChild(popup);
                  }, 3000);
                </script>
                
                <?php
                }  
                ?>


            
    <!-- Main Content -->
    <main id="main">
      <form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" id="form" onsubmit="return validateForm()">
        <h2 id="add">Add Member</h2>
        <div class="containers">
          <label for="sid">ID:</label>
          <input type="text" id="sid" name="sid">
        </div>
        <div class="containers">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" >
        </div>
        <div class="containers">
          <label for="email">Email:</label>
          <input type="text" id="email" name="email" >
          <span id="emailError" style="color: red;"></span>
        </div>
        <div class="containers">
          <button type="submit" id="submit"  name="submit">Add Member</button>
        </div>
      </form>
    </main>
    <br><br>
    </div>
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
</body>
</html>