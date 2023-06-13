<?php
require("../../database_conn.php");
require "../../session.php";
 // require "../header1.php";
 $error=$errors=$sid=$name=$email="";
 if (isset($_GET['id'])) {
    $sid = $_GET['id'];
    $update = true;
    $sql = "SELECT name, email FROM students WHERE id='$sid';";
$record = mysqli_query($con, $sql);

// Check if there are any records returned
if ($record ->num_rows > 0) {
$row = mysqli_fetch_array($record)or die();   
$name = $row['name'];
$email = $row['email'];
}
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../admin/styles.css">
    <link rel="stylesheet" type="text/css" href="../book/css/update.css" /> 
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
            <a href="addmember.php">
                <li><img src="../../img/addmember.png" alt="">&nbsp; <span>Add Member</span></li>
            </a>
            <a href="memberviews.php">
                <li><img src="../../img/addmember.png" alt="">&nbsp; <span>View Member</span></li>
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
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
   
      mysqli_query($con, "UPDATE students SET name='$name', email='$email' WHERE id='$sid';") or die(); 
      $error="success";
      $message= $sid." :  updated !";
      $color = "green";
      
     ?>
     
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
     
     <?php } ?>

    <!-- Main Content -->
    <main id="main">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']).'?id='.$sid; ?>" method="POST" id="form" onsubmit="return validateForm()">
            <h2 id="update">Update Member</h2>
            <div class="containers">
                <label for="isbn">ID:</label>
                <input type="text" id="sid" name="sid" value="<?php echo $sid; ?>" <?php echo $sid==''?"":"disabled"; ?>>
            </div>
            <div class="containers">
                <label for="title">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $name; ?> ">
            </div>
            <div class="containers">
                <label for="author">Email:</label>
                <input type="text" id="email" name="email" value="<?php echo $email; ?> ">
                <span id="emailError" style="color: red;"></span>
            </div>
            <div class="containers">
                <button type="submit" id="submit" name="submit">Update Member</button>
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