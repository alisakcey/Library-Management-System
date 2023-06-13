<?php
require "../session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/dashboard1.css" />
    <title>Document</title>
</head>
<body>
     <!-- Header -->
<header>
  <h1 style="margin: 0;">Library Management System</h1>
  <div style="display: flex;">
    <p id="account"><b><?php echo $_SESSION["name"]; ?></b></p>
    <a href="../logout.php" ><button id="logout">Logout</button></a>
  </div>
</header>
</body>
</html>