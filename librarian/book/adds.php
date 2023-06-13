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
    <!--<link rel="stylesheet" type="text/css" href="css/add.css" /> -->
    <link rel="stylesheet" href="../../admin/styles.css">
    <link rel="stylesheet" type="text/css" href="css/adds.css" /> 
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
            <a href="views.php">
                <li><img src="../../img/viewbook.png" alt="">&nbsp;<span>View Book</span></li>
            </a>
            <a href="deletes.php">
                <li><img src="../../img/book.png" alt="">&nbsp;<span>Delete Book</span>
                </li>
            </a>
            <a href="updates.php">
                <li><img src="../../img/edit.png" alt="">&nbsp;<span>Edit Book</span>
                </li>
            </a>
            <a href="issuses.php">
                <li><img src="../../img/issusebook.png" alt="">&nbsp;<span>Issue Book</span>
                </li>
            </a>
            <a href="../member/addmember.php">
                <li><img src="../../img/addmember.png" alt="">&nbsp; <span>Add Member</span></li>
            </a>
            <a href="../member/updatemember.php">
                <li><img src="../../img/addmember.png" alt="">&nbsp; <span>Edit Member</span></li>
            </a>
            <a href="../member/deletemember.php">
                <li><img src="../../img/addmember.png" alt="">&nbsp; <span>Delete Member</span></li>
            </a>
            <a href="../member/memberviews.php">
                <li><img src="../../img/addmember.png" alt="">&nbsp; <span>View Member</span></li>
            </a>
            <a href="../member/booktaken.php">
                <li><img src="../../img/editmember.png" alt="">&nbsp;<span>Book Taken</span>
                </li>
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
  $title = $_POST['title'];
  $author = $_POST['author'];
  $isbn = $_POST['isbn'];
  $copies = $_POST['copies'];
  $results = mysqli_query($con, "SELECT * FROM Book WHERE isbn='$isbn';") or die(); 
  if (mysqli_num_rows($results) > 0) {
    // ISBN number already exists in the database
    $error="error";
    $message=$isbn." : ISBN number already exists !";
    $color = "red";
  } else {
    mysqli_query($con, "INSERT INTO `Book` (`isbn`, `title`, `author`, `copies`) VALUES ('$isbn','$title', '$author','$copies')") or die(); 
    // Display popup message
    $error="success";
    $message= $isbn." : ISBN number book successfully added !";
    $color = "green";
  }
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

<?php
}  
?>

    <!-- Main Content -->
    <main id="main">
      <form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" id="form">
        <h2 id="add">Add Book</h2>
        <div class="containers">
          <label for="title">Title:</label>
          <input type="text" id="title" name="title">
        </div>
        <div class="containers">
          <label for="author">Author:</label>
          <input type="text" id="author" name="author" >
        </div>
        <div class="containers">
          <label for="isbn">ISBN:</label>
          <input type="text" id="isbn" name="isbn" >
        </div>
        <div  class="containers">
          <label for="number-of-copies">Number of Copies:</label>
          <input type="text" id="number-of-copies" name="copies" >
        </div>
        <div class="containers">
          <button type="submit" id="submit"  name="submit">Add Book</button>
        </div>
      </form>
    </main>
    <br><br>
    </div>
</body>
</html>