<?php
$errors="";
require "../../session.php";
	require "../../database_conn.php";
  $title = $author = $isbn = $copies ="";
  
  if (isset($_GET['isbn'])) {
		$isbn = $_GET['isbn'];
		$update = true;
		$sql = "SELECT name FROM students
        WHERE id IN (SELECT student_id FROM book_taken WHERE isbn ='$isbn')";
$results = mysqli_query($con, $sql);
if ($results->num_rows > 0) {
  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>View Book List</title>
    <link rel="stylesheet" type="text/css" href="../../css/footerheader.css" />
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="../book/css/view.css" /> 
   
  </head>
  <body>
    <!-- Header -->
    <header class="header">
  <!-- navigation bar -->
  <nav>
    <a href="../index.php" class="nav-list"><button>Home</button></a>
    <a href="add.php" class="nav-list"><button>Add Book</button></a>
    <a href="update.php" class="nav-list"><button>Update Books</button></a>
    <a href="delete.php" class="nav-list"><button>Delete Books</button></a>
    <a href="issuse.php" class="nav-list"><button>Issue Books</button></a>
  </nav>
  <div style="display: flex;">
  <p id="account"><b><?php echo $_SESSION["name"]; ?></b></p>
    <a href="../../logout.php" ><button id="logout">Logout</button></a>
  </div>
</header>
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
        <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
          <td><?php echo $row['name']; ?></td>
     <td style=" text-align:center;">
				<a href="#" class="edit_btn" >Edit</a>
			</td>
			<td style=" text-align:center;">
				<a href="#" class="del_btn">Delete</a>
			</td>
        </tr>      
	<?php }
    }
 } ?>
        </table>
    </main>
  </body>
</html>