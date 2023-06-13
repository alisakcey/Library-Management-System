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
            <li><a href="../librarian/book/add.php"><img src="img/reading-book (1).png" alt="">&nbsp; <span>Add
                        Book</span> </a></li>
            <li><a href="../librarian/book/view.php"><img src="img/reading-book (1).png" alt="">&nbsp;<span>View
                        Book</span> </a></li>
            <li><a href="../librarian/book/delete.php"><img src="img/teacher2.png" alt="">&nbsp;<span>Delete Book</span>
            </li>
            <li><a href="../librarian/book/update.php"><img src="img/school.png" alt="">&nbsp;<span>Edit Book</span>
            </li>
            <li><a href="../librarian/book/issue.php"><img src="img/payment.png" alt="">&nbsp;<span>Issue Book</span>
            </li>
            <li><a href="../librarian/member/memberview.php"><img src="img/help-web-button.png" alt="">&nbsp; <span>View
                        Member</span></li>
            <li><a href="../librarian/member/show.php"><img src="img/settings.png" alt="">&nbsp;<span>Show Member</span>
            </li>
            <li><a href="../librarian/member/showbook.php"><img src="img/settings.png" alt="">&nbsp;<span>Show
                        Book</span> </li>
        </ul>
        <div class="logout">
            <a href="../logout.php"><button>Logout</button></a>
        </div>
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
                    <a href="index.php">
                        <div><h1>Libary Management System</h1></div>
                    </a>
                    <!-- 
                    <a href="#" class="btn">Add New</a>
                      <img src="notifications.png" alt="">
                 <div class="img-case">
                 <div style="display: flex;">
                            <p id="account"><b><?php echo $_SESSION["name"]; ?></b></p>
                            <a href="../logout.php"><button id="logout">Logout</button></a>
                          </div>
                    <img src="user.png" alt=""> 
                    </div>  -->
                </div>
            </div>
        </div>