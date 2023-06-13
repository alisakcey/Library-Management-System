<!-- delete-book.html -->
<!-- update-book.html -->
<?php
$errors=$err="";
require "../../session.php";
	require "../../database_conn.php";
  $title = $author = $isbn = $copies ="";
  if (isset($_GET['isbn'])) {
		$isbn = $_GET['isbn'];
		$update = true;
		$record = mysqli_query($con, "SELECT * FROM Book WHERE isbn='$isbn';");

		if ($record ->num_rows>0) {
			$n = mysqli_fetch_array($record); 
            $copies = $n['copies'];
		}
	}
?>

<?php 
    if(isset($_POST['submit'])){
     $copies = $_POST['copies'];
     $copi = $_POST['inp'];
     $results = mysqli_query($con, "SELECT * FROM Book WHERE isbn='$isbn';") or die(); 
     $rowcount=mysqli_num_rows($results);
     if ($rowcount <=0) {
      // ISBN number NOT exists in the database
      $errors=$isbn. " : ISBN number not found !";
      $err="err";
     } else {
      // ISBN number  exists in the database
        $row = mysqli_fetch_array($results);
if($row['copies']>$copi){
  mysqli_query($con,"UPDATE 'Book' SET 'copies'='$copi' WHERE ('isbn'='$isbn')") or die();
      $errors=$copi." of ".$isbn. " : ISBN number book sucessfully deleted !";
}else if($row['copies']<=$copi){
  mysqli_query($con,"DELETE FROM Book WHERE isbn='$isbn';") or die();
      $errors="All of ".$isbn. " : ISBN number book sucessfully deleted !";
}
      }
     }  
     
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Delete Book</title>
    <link rel="stylesheet" type="text/css" href="../../css/footerheader.css" />
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="css/delete.css" />
</head>

<body>
    <!-- Header -->
    <header class="header">
        <!-- navigation bar -->
        <nav>
            <a href="../index.php" class="nav-list"><button>Home</button></a>
            <a href="add.php" class="nav-list"><button>Add Book</button></a>
            <a href="view.php" class="nav-list"><button>View Books</button></a>
            <a href="update.php" class="nav-list"><button>Update Books</button></a>
            <a href="issuse.php" class="nav-list"><button>Issue Books</button></a>
        </nav>
        <div style="display: flex;">
        <p id="account"><b><?php echo $_SESSION["name"]; ?></b></p>
        <a href="../../logout.php" ><button id="logout">Logout</button></a>
        </div>

    </header>
    <!-- Main Content -->
    <span id=<?php echo $err=="er"?"error":"sucess";?>><?php echo $errors;?></span>
    <main id="main">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']).'?isbn='.$isbn; ?>" method="POST" id="form">
            <h2 id="delete">Delete Book</h2>
            <div class="containers">
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn" value="<?php echo $isbn; ?>" disabled>
            </div>
            <div class="containers">
                <label for="number-of-copies">Number of Copies:</label>
                <select name="copies">
                    <option value=$copies selected>All</option>
                    <option><input type="text" name="inp" value="<?php echo $copies; ?>"></option>
                </select>
                <div class="containers">
                    <button type="submit" name="submit">Delete Book</button>
                </div>
        </form>
    </main>
    <br><br>

    <?php  include("../../footer.php"); ?>
</body>

</html>