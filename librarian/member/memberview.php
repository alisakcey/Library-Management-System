<!-- view-book-list.html -->

<?php
	require "../../session.php";
require "../../database_conn.php";
  $results = mysqli_query($con, "SELECT * FROM students") or die; ?>
?
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>View Member List</title>
    <link rel="stylesheet" type="text/css" href="../../css/footerheader.css" />
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="css/memberview.css" /> 
   
  </head>
  <body>
    <!-- Header -->
    <header class="header">
  <!-- navigation bar -->
  <nav>
    <a href="../index.php" class="nav-list"><button>Home</button></a>
    <a href="#" class="nav-list"><button>Add Member</button></a>
    <a href="#" class="nav-list"><button>Update Member</button></a>
    <a href="#" class="nav-list"><button>Delete Member</button></a>
  </nav>
  <div style="display: flex;">
        <p id="account"><b><?php echo $_SESSION["name"]; ?></b></p>
        <a href="../../logout.php" ><button id="logout">Logout</button></a>
        </div>
</header>
    <!-- Main Content -->
    <main id="main">
    <h2 id="view">List of Member</h2>
      <table>
      <thead>
        <!--`id` int(11)  PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL-->
        <tr>
          <th>Student ID</th>
          <th>Name</th>
          <th>Email</th>
          <th colspan="2" style=" text-align:center;">Action</th>
        </tr>
</thead>
        <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
          <td><?php echo $row['id']; ?>
          <a href="../member/showbook.php?id=<?php echo $row['id']; ?>" id="eye"> &#x1F440;</a></td></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['email'];?> 
          <td style=" text-align:center;">
				<a href="#?id=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td style=" text-align:center;">
				<a href="#?id=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
        </tr>      
	<?php } ?>
        </table>
    </main>
  </body>
</html>