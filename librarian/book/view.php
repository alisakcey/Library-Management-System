<!-- view-book-list.html -->

<?php
	require "../../session.php";
require "../../database_conn.php";
  $results = mysqli_query($con, "SELECT * FROM Book") or die; ?>
?
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>View Book List</title>
    <link rel="stylesheet" type="text/css" href="../../css/footerheader.css" />
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="css/view.css" /> 
   
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
    <h2 id="view">List of Books in the Library</h2>
      <table>
      <thead>
        <tr>
          <th>Book Title</th>
          <th>Author</th>
          <th>ISBN</th>
          <th>Number Of Copies</th>
          <th colspan="2" style=" text-align:center;">Action</th>
        </tr>
</thead>
        <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
          <td><?php echo $row['title']; ?></td>
          <td><?php echo $row['author']; ?></td>
          <td><?php echo $row['isbn'];?> 
          <a href="../member/show.php?isbn=<?php echo $row['isbn']; ?>" id="eye"> &#x1F440;</a></td>
          <td><?php echo $row['copies']; ?></td>
          <td style=" text-align:center;">
				<a href="update.php?isbn=<?php echo $row['isbn']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td style=" text-align:center;">
				<a href="delete.php?isbn=<?php echo $row['isbn']; ?>" class="del_btn">Delete</a>
			</td>
        </tr>      
	<?php } ?>
        </table>
    </main>
  </body>
</html>