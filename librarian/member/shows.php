<?php
$errors="";
require "../../session.php";
	require "../../database_conn.php";
  $title = $author = $isbn = $copies ="";
  if (isset($_GET['isbn'])) {
    $isbn = $_GET['isbn'];
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
    <link rel="stylesheet" type="text/css" href="../book/css/view.css" />
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
                <li><img src="../../img/viewbook.png" alt="">&nbsp;<span>View Book</span></li>
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
            <a href="booktaken.php">
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
    <h2 id="view">Books Taken ISBN : <?php echo $isbn; ?></h2>
      <table>
      <thead>
        <tr>
          <th>Name</th>
          <th colspan="2" style=" text-align:center;">Action</th>
        </tr>
</thead>
<?php
        if (isset($_GET['isbn'])) {
		$isbn = $_GET['isbn'];
		$update = true;
		$sql = "SELECT name FROM students
        WHERE id IN (SELECT student_id FROM book_taken WHERE isbn ='$isbn')";
$results = mysqli_query($con, $sql);
if ($results->num_rows > 0) {
    while ($row = mysqli_fetch_array($results)) {  ?>
 <tr>
          <td><?php echo $row['name']; ?></td>
     <td style=" text-align:center;">
				<a href="#" class="edit_btn" >Edit</a>
			</td>
			<td style=" text-align:center;">
				<a href="#" class="del_btn">Delete</a>
			</td>
        </tr>    
<?php }} else{ ?>
<tr>
 <td colspan="2">No Result Found !<td>
</tr>
<?php }   }?> 
  
</table>
    </main>
  </body>
</html>