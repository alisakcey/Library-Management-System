<!-- add-book.html -->
<?php
	require "../../session.php";
	require "../../database_conn.php";
 // require "../header1.php";
$errors=$err="";
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
<link rel="stylesheet" type="text/css" href="../../css/footerheader.css" />
   <link rel="stylesheet" type="text/css" href="../css/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="css/add.css" /> 
  </head>
  <body>

    <header class="header">

  <nav>
    <a href="../index.php" class="nav-list"><button>Home</button></a>
    <a href="update.php" class="nav-list"><button>Update Book</button></a>
    <a href="view.php" class="nav-list"><button>View Books</button></a>
    <a href="delete.php" class="nav-list"><button>Delete Books</button></a>
    <a href="issuse.php" class="nav-list"><button>Issue Books</button></a>
  </nav>
  <div style="display: flex;">
        <p id="account"><b><?php echo $_SESSION["name"]; ?></b></p>
        <a href="../../logout.php" ><button id="logout">Logout</button></a>
        </div>
</header>
  -

<?php 

if(isset($_POST['submit'])){
 $title = $_POST['title'];
$author = $_POST['author'];
$isbn = $_POST['isbn'];
$copies = $_POST['copies'];
$results = mysqli_query($con, "SELECT * FROM Book WHERE isbn='$isbn';") or die(); 
if (mysqli_num_rows($results) > 0) {
// ISBN number already exists in the database
$errors=$isbn. " : ISBN number already exists !";
$err="error";
} else {
mysqli_query($con, "INSERT INTO `Book` (`isbn`, `title`, `author`, `copies`) VALUES ('$isbn','$title', '$author','$copies')") or die(); 
$errors=$isbn. " : ISBN number book sucessfully added !";
}  
}
?>

<span id=<?php echo $err=="error" ? "error": "sucess";?>><?php echo $errors;?></span>
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


    
   <?php include("../../footer.php"); ?>
  </body>
</html>
