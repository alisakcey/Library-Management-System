<!-- update-book.html -->
<?php
$errors="";
require "../../session.php";
	require "../../database_conn.php";
  $title = $author = $isbn = $copies ="";
  
  if (isset($_GET['isbn'])) {
		$isbn = $_GET['isbn'];
        echo $isbn;
		$update = true;
		$sql = "SELECT title, author, copies FROM Book WHERE isbn='$isbn';";
$record = mysqli_query($con, $sql);
	
// Check if there are any records returned
if ($record ->num_rows > 0) {
    $row = mysqli_fetch_array($record)or die();   
    $title = $row['title'];
    $author = $row['author'];
    $copies = $row['copies'];
}
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Update Book</title>
    <link rel="stylesheet" type="text/css" href="../../css/footerheader.css" />
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="css/update.css" />
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
            <a href="issuse.php" class="nav-list"><button>Issue Books</button></a>
        </nav>
        <div style="display: flex;">
        <p id="account"><b><?php echo $_SESSION["name"]; ?></b></p>
        <a href="../../logout.php" ><button id="logout">Logout</button></a>
        </div>
        </header>
        <?php 
    if(isset($_POST['submit'])){
      $title = $_POST['title'];
     $author = $_POST['author'];
     $copies = $_POST['copies'];
     echo $isbn;
     echo $author;
     $results = mysqli_query($con, "SELECT * FROM Book WHERE isbn='$isbn';") or die(); 
     $rowcount=mysqli_num_rows($results);
    
     if ($copies <=0) {
        mysqli_query($con, "DELETE FROM Book WHERE isbn='$isbn';") or die(); 
        $errors=$isbn. " : ISBN number Book Deleted !";
    
     } else {
      // ISBN number already exists in the database
      mysqli_query($con, "UPDATE Book SET title='$title', author='$author',copies='$copies' WHERE isbn='$isbn';") or die(); 
     $errors=$isbn. " : ISBN number Book Updated !";
     }  
      }
?>
<br>
    <span id="sucess"><?php echo $errors;?></span>
    <!-- Main Content -->
    <main id="main">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']).'?isbn='.$isbn; ?>" method="POST" id="form">
            <h2 id="update">Update Book</h2>
            <div class="containers">
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isb" value="<?php echo $isbn; ?>" disabled>
            </div>
            <div class="containers">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?php echo $title; ?> ">
            </div>
            <div class="containers">
                <label for="author">Author:</label>
                <input type="text" id="author" name="author" value="<?php echo $author; ?> ">
            </div>
            <div class="containers">
                <label for="number-of-copies">Number of Copies:</label>
                <input type="text" id="number-of-copies" name="copies" value="<?php echo $copies; ?> ">
            </div>
            <div class="containers">
                <button type="submit" id="submit" name="submit">Update Book</button>
            </div>
        </form>
    </main>
    <br><br>

    <?php  include("../../footer.php"); ?>
</body>

</html>