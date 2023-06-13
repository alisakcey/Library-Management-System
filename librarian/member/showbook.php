<?php
require "../../session.php";
require "../../database_conn.php";
$id ="";
  
if (isset($_GET['id'])) {
      $id = $_GET['id'];
}
?>

<!-- search-book-taken.html -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Search Book Taken</title>
    <link rel="stylesheet" type="text/css" href="../../css/footerheader.css" />
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="css/show.css" />
  </head>
  <body>
    <!-- Header -->
    <header class="header">
  <!-- navigation bar -->
  <nav>
    <a href="../index.php" class="nav-list"><button>Home</button></a>
    <a href="#" class="nav-list"><button>Add Member</button></a>
    <a href="memberview.php" class="nav-list"><button>View Member</button></a>
    <a href="#" class="nav-list"><button>Delete Member</button></a>
    <a href="#" class="nav-list"><button>Update Member</button></a>
  </nav>
  <div style="display: flex;">
        <p id="account"><b><?php echo $_SESSION["name"]; ?></b></p>
        <a href="../../logout.php" ><button id="logout">Logout</button></a>
        </div>
</header>
<?php


?>
<!-- Main Content -->
<main id="main">
  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']).'?id='.$id; ?>" method="POST" id="form">
    <h2 id="title">Search Book Taken</h2>
    <div class="containers">
      <label for="student-id">Id:</label>
      <input type="text" id="student-id" name="student-id"  value="<?php echo $id;?>">
      <button type="submit" id="submit"  name="search">Search</button>
    </div>
  </form>
  <?php 
  if(isset($_POST['search'])){
    $student_id = $_POST['student-id'];
    $result = mysqli_query($con, "SELECT book_taken.isbn, Book.title, book_taken.taken_date, book_taken.due_date FROM book_taken 
                                JOIN Book ON book_taken.isbn = Book.isbn 
                                WHERE book_taken.student_id = '$student_id'");
    if (mysqli_num_rows($result) > 0) {
      echo "<table><tr><th>ISBN</th><th>Title</th><th>Taken Date</th><th>Due Date</th><th colspan='2' style=' text-align:center;''>Action</th></tr>";
      while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <td><?php echo $row['isbn']; ?>
          <td><?php echo $row['title']; ?></td>
          <td><?php echo $row['taken_date'];?> 
          <td><?php echo $row['due_date'];?> 
          <td style=" text-align:center;">
				<a href="#?id=<?php echo $row['isbn']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td style=" text-align:center;">
				<a href="#?id=<?php echo $row['isbn']; ?>" class="del_btn">Delete</a>
			</td>
        </tr>      
	<?php }
      }
      echo "</table>";
    }
?>

    </body>
    </html>