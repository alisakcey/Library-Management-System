<?php
require "../../session.php";
require "../../database_conn.php";
$id ="";
  
if (isset($_GET['id'])) {
      $id = $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" type="text/css" href="css/add.css" /> -->
    <link rel="stylesheet" href="../../admin/styles.css">
    <link rel="stylesheet" type="text/css" href="css/booktaken.css" />
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
            <a href="updatemember.php">
                <li><img src="../../img/addmember.png" alt="">&nbsp; <span>Edit Member</span></li>
            </a>
            <a href="deletemember.php">
                <li><img src="../../img/addmember.png" alt="">&nbsp; <span>Delete Member</span></li>
            </a>
            <a href="memberviews.php">
                <li><img src="../../img/addmember.png" alt="">&nbsp; <span>View Member</span></li>
            </a>
        </ul>
        <!-- logout-->
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="user">
                <a href="../../admin/admin.php">
                        <div>
                            <h1>Libary Management System</h1>
                        </div>
                    </a>
                    <a href="../../logout.php" class="btn">Logout</a>
                </div>
            </div>
        </div>
        
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
