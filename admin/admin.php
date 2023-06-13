<?php
require("../database_conn.php");
require "sessionss.php";

$results = mysqli_query($con, "SELECT * FROM users") or die(mysqli_error($con)); ?>
<!-- /*
$results=array(
array("name"=>"Alisa Kunwar" ,"email"=>	"alishakunwar611@gmail.com","password"=>"alisha"),
array(Subash Pandey	pandeysubash404@gmail.com	subash),
Subash Pandey	pandeysubash404@gmail.com	subash
Subash Pandey	pandeysubash404@gmail.com	subash
Dipak Ghimere	diapk@gmail.com	dipak
Sita Pandey	sitapandey606@gmail.com	sita
Krishna	krishna@gmail.com	krishna
Vinay Thapa	vinaythapa@llgmail.com	vinay
	abc123@gmail.com	dnkngkvndl

);
*/ -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/footerheader.css" />
    <link rel="stylesheet" type="text/css" href="css/dashboard.css" />
    <link rel="stylesheet" href="styles.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="side-menu">
        <div class="user-name">
            <h3><?php echo $_SESSION["name"]; ?></h3>
        </div>
        <ul>
            <a href="../librarian/book/adds.php">
                <li><img src="../img/addbook.png" alt="">&nbsp; <span>Add Book</span></li>
            </a>
            <a href="../librarian/book/views.php">
                <li><img src="../img/viewbook.png" alt="">&nbsp;<span>View Book</span></li>
            </a>
            <a href="../librarian/book/deletes.php">
                <li><img src="../img/book.png" alt="">&nbsp;<span>Delete Book</span>
                </li>
            </a>
            <a href="../librarian/book/updates.php">
                <li><img src="../img/edit.png" alt="">&nbsp;<span>Edit Book</span>
                </li>
            </a>
            <a href="../librarian/book/issuses.php">
                <li><img src="../img/issusebook.png" alt="">&nbsp;<span>Issue Book</span>
                </li>
            </a>
            <a href="../librarian/member/addmember.php">
                <li><img src="../img/addmember.png" alt="">&nbsp; <span>Add Member</span></li>
            </a>
            <a href="../librarian/member/updatemember.php">
                <li><img src="../img/addmember.png" alt="">&nbsp; <span>Edit Member</span></li>
            </a>
            <a href="../librarian/member/deletemember.php">
                <li><img src="../img/addmember.png" alt="">&nbsp; <span>Delete Member</span></li>
            </a>
            <a href="../librarian/member/memberviews.php">
                <li><img src="../img/addmember.png" alt="">&nbsp; <span>View Member</span></li>
            </a>
            <a href="../librarian/member/booktaken.php">
                <li><img src="../img/editmember.png" alt="">&nbsp;<span>Book Taken</span>
                </li>
            </a>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <!--
                <div class="search">
                    <input type="text" placeholder="Search..">
                    <button type="submit"><img src="img/search.png" alt=""></button>
                </div>
-->
                <div class="user">
                    <a href="#">
                        <div>
                            <h1>Libary Management System</h1>
                        </div>
                    </a>
                    <a href="../logout.php" class="btn">Logout</a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>
                            <?php
                        $res= mysqli_query($con, "SELECT COUNT(*) as total FROM students") or die;
                        $row = mysqli_fetch_assoc($res);
                        echo $row["total"];
                        ?>
                        </h1>
                        <h3>Member</h3>
                    </div>
                    <div class="icon-case">
                        <img src="img/students.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>
                            <?php 
                             $resu= mysqli_query($con, "SELECT COUNT(*) as total FROM users") or die;
                             $rows = mysqli_fetch_assoc($resu);
                             echo $rows["total"];?>
                        </h1>
                        <h3>Admin</h3>
                    </div>
                    <div class="icon-case">
                        <img src="img/teachers.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1><?php $resul= mysqli_query($con, "SELECT SUM(copies) as total FROM Book") or die;
                    $rowss= mysqli_fetch_assoc($resul);
                    echo $rowss["total"];
                    ?></h1>
                        <h3>Book</h3>
                    </div>
                    <div class="icon-case">
                        <img src="img/schools.png" alt="">
                    </div>
                </div>
            </div>

            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Admin List</h2>
                    </div>
                    <table>
                        <tr>
                            <th>S.N</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <!-- <th>Option</th> -->
                        </tr>
                        <!-- array("name"=>"Alisa Kunwar" ,"email"=>	"alishakunwar611@gmail.com","password"=>"alisha"), -->
                        <?php $count=1; while ($row = mysqli_fetch_array($results)) { ?>
                        <tr>
                            <td><?php echo $count;  $count++;?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <!--     <td><a href="#" class="btn">Delete</a></td> -->
                        </tr>
                        <?php } ?>

                


                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>