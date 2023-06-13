<?php
require("../database_conn.php");
//require "../session.php";
?>

<!-- index.html -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Librarian Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/footerheader.css" /> 
    <link rel="stylesheet" type="text/css" href="css/dashboard1.css" />
  </head>
  <body>

  <?php
require "header1.php";
?>

    <!-- Main Content -->
    <main>
      <div class="dash" >
        <!-- Book Management Card -->
        <div class="container">
          <h2 class="title">Book Management</h2>
          <ul class="list">
            <li><a href="book/add.php"><button class="list-button">Add a Book</button></a></li>
            <li><a href="book/update.php"><button class="list-button">Update a Book</button></a></li>
            <li><a href="book/delete.php"><button class="list-button">Delete a Book</button></a></li>
            <li><a href="book/view.php"><button class="list-button">View Books</button></a></li>
            <li><a href="book/issuse.php"><button class="list-button">Issuse Books</button></a></li>
          </ul>
        </div>

        <!-- Member Management Card
        <div class="container">
          <h2 class="title">Member Management</h2>
          <ul class="list">
            <li><a href="#"><button class="list-button">Add a Member</button></a></li>
            <li><a href="#"><button class="list-button">Update a Member</button></a></li>
            <li><a href="#"><button class="list-button">Delete a Member</button></a></li>
            <li><a href="#"><button class="list-button">View Members</button></a></li>
          </ul>
        </div>
      </div>
       -->
    </main>
  
   <?php include("../footer.php"); ?>
</body>

</html>