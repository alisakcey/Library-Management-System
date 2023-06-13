<!-- issue-book.html -->
<?php
	require "../../session.php";
	require "../../database_conn.php";
$errors=$err="";
date_default_timezone_set("Asia/Kathmandu");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Issue Book</title>
    <link rel="stylesheet" type="text/css" href="../../css/footerheader.css" />
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="css/issuse.css" /> 
  </head>
  <body>
    <!-- Header -->
    <header class="header">
  <!-- navigation bar -->
  <nav>
    <a href="../index.php" class="nav-list"><button>Home</button></a>
    <a href="add.php" class="nav-list"><button>Add Book</button></a>
    <a href="view.php" class="nav-list"><button>View Books</button></a>
    <a href="delete.php" class="nav-list"><button>Delete Books</button></a>
    <a href="update.php" class="nav-list"><button>Update Books</button></a>
  </nav>
  <div style="display: flex;">
        <p id="account"><b><?php echo $_SESSION["name"]; ?></b></p>
        <a href="../../logout.php" ><button id="logout">Logout</button></a>
        </div>

</header>

<?php 

if(isset($_POST['submit'])){
 $id = $_POST['student-id'];
$due_date = $_POST['due-date'];
$isbn = $_POST['isbn'];
$today = date("Y-m-d");
$results = mysqli_query($con, "SELECT copies FROM Book WHERE isbn='$isbn';") or die(); 
if (mysqli_num_rows($results) > 0) {
// ISBN number exists in the database
/*$row = mysqli_fetch_array($results);
if($row['copies']>$copi){
  */
  mysqli_query($con, "INSERT INTO `book_taken` (`student_id`, `isbn`, `taken_date`, `due_date`)
  VALUES ('$id', '$isbn','$today', '$due_date')");
  
$errors=$isbn. " : ISBN number book sucessfully issued !";
//}
} else {
  $errors=$isbn. " : ISBN number  book not exists !";
$err="error";

}  
}
?>
    <!-- Main Content -->
    <span id=<?php echo $err=="error" ? "error": "sucess";?>><?php echo $errors;?></span>
    <main id="main">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" id="form">
        <h2 id="issuse">Issue Book</h2>
        <div class="containers">
          <label for="student-id">Student Id:</label>
          <input type="text" id="student-id" name="student-id" >
        </div>
        <div class="containers">
          <label for="isbn">ISBN:</label>
          <input type="text" id="isbn" name="isbn" >
        </div>
        <div class="containers">
          <label for="due-date">Due Date:</label>
          <input type="date" id="due-date" name="due-date" >
        </div>
        <div class="containers">
          <button type="submit" id="submit"  name="submit">Issue Book</button>
        </div>
      </form>
    </main>
    <br><br>
    <?php  include("../../footer.php"); ?>
  </body>
</html>
