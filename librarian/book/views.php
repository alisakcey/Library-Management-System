<?php
require("../../database_conn.php");
require "../../session.php";
$results = mysqli_query($con, "SELECT * FROM Book") or die; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" type="text/css" href="css/add.css" /> -->
    <link rel="stylesheet" href="../../admin/styles.css">
    <link rel="stylesheet" type="text/css" href="css/view.css" />
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
            <a href="adds.php">
                <li><img src="../../img/addbook.png" alt="">&nbsp;<span>Add Book</span>
                </li>
            </a>
            <a href="deletes.php">
                <li><img src="../../img/book.png" alt="">&nbsp;<span>Delete Book</span>
                </li>
            </a>
            <a href="updates.php">
                <li><img src="../../img/edit.png" alt="">&nbsp;<span>Edit Book</span></li>
            </a>
            <a href="issuses.php">
                <li><img src="../../img/issusebook.png" alt="">&nbsp;<span>Issue Book</span>
                </li>
            </a>
            <a href="../member/addmember.php">
                <li><img src="../../img/addmember.png" alt="">&nbsp; <span>Add Member</span></li>
            </a>
            <a href="../member/updatemember.php">
                <li><img src="../../img/addmember.png" alt="">&nbsp; <span>Edit Member</span></li>
            </a>
            <a href="../member/deletemember.php">
                <li><img src="../../img/addmember.png" alt="">&nbsp; <span>Delete Member</span></li>
            </a>
            <a href="../member/memberviews.php">
                <li><img src="../../img/addmember.png" alt="">&nbsp; <span>View Member</span></li>
            </a>
            <a href="../member/booktaken.php">
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
            <h2 id="view">List of Books in the Library</h2>
            <table>
                <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>ISBN</th>
                        <th>Number Of Copies</th>
                        <th colspan="3" style=" text-align:center;">Action</th>
                    </tr>
                </thead>
                <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['isbn'];?> </td>
                    <td><?php echo $row['copies']; ?></td>
                    <td style=" text-align:center;">
                        <a href="../member/shows.php?isbn=<?php echo $row['isbn']; ?>" class="view_btn">View</a>
                    </td>
                    <td style=" text-align:center;">
                        <a href="updates.php?isbn=<?php echo $row['isbn']; ?>" class="edit_btn">Edit</a>
                    </td>
                    <td style=" text-align:center;">
                        <a href="deletes.php?isbn=<?php echo $row['isbn']; ?>" class="del_btn">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </main>
    </div>
</body>

</html>