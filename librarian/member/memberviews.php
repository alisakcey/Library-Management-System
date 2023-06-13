<?php
	require "../../session.php";
require "../../database_conn.php";
  $results = mysqli_query($con, "SELECT * FROM students") or die; ?>
?

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../admin/styles.css">
    <link rel="stylesheet" type="text/css" href="css/memberview.css" />
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
            <a href="booktaken.php">
                <li><img src="../../img/addmember.png" alt="">&nbsp; <span>Book Taken</span></li>
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
        <div class="mid">
        <main id="main">
            <!-- <div class="search">
                <input type="text" placeholder="Search..">
                <button type="submit"><img src="img/search.png" alt=""></button>
            </div> -->
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
                        <th colspan="3" style=" text-align:center;">Action</th>
                    </tr>
                </thead>
                <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email'];?> </td>
                    <td style=" text-align:center;">
                        <a href="#?id=<?php echo $row['id']; ?>" class="view_btn">View</a>
                    </td>
                    <td style=" text-align:center;">
                        <a href="updatemember.php?id=<?php echo $row['id']; ?>" class="edit_btn">Edit</a>
                    </td>
                    <td style=" text-align:center;">
                        <a href="deletemember.php?id=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </main>
                </div>
    </div>
</body>

</html>