<?php
$errors=$err="";
require "../../session.php";
	require "../../database_conn.php";
  $title = $author = $isbn = $copies ="";
  if (isset($_GET['isbn'])) {
		$isbn = $_GET['isbn'];
		$update = true;
		$record = mysqli_query($con, "SELECT * FROM Book WHERE isbn='$isbn';");

		if ($record ->num_rows>0) {
			$n = mysqli_fetch_array($record); 
            $copies = $n['copies'];
		}
	}
?>
<?php 
if(isset($_POST["submit"])){
    $results=mysqli_query($con,"SELECT * FROM Book WHERE isbn='$isbn' ");
    if ($results->num_rows > 0) {
        // ISBN number  exists in the database
        $row = mysqli_fetch_array($results);

        if(isset($_POST["inp"])){
            $copi=$_POST["inp"];
        }else{$copi=$row['copies'];}
    
        if($row['copies']>$copi){
        mysqli_query($con,"UPDATE Book SET copies='$copi' WHERE isbn='$isbn' ") or die();
        $error="success";
            $message= $copi." of ".$isbn." : ISBN number book successfully deleted !";
            $color = "green";
        }else if($row['copies']<=$copi){
        mysqli_query($con,"DELETE FROM Book WHERE isbn='$isbn';") or die();
            $error="success";
            $message= "All of ".$isbn." : ISBN number book successfully deleted !";
            $color = "green";
            header("Location:deletes.php");
          }
        }
    else{
        $error="error";
        $message=$isbn." ISBN number not found !";
        $color="red";
     } ?>
     <script>
        var error = "<?php echo $error ?>";
        var message = "<?php echo $message ?>";
        var color = "<?php echo $color ?>";
        var style = "background-color:" + color + "; color: white; padding: 10px; border-radius: 5px; text-align: center; position: fixed; top: 15%; left: 80%; transform: translate(-50%, -50%); z-index: 9999;"
        
        var popup = document.createElement("div");
        popup.setAttribute("style", style);
        popup.innerHTML = message;
        
        document.body.appendChild(popup);
        
        // Hide the popup after 3 seconds
        setTimeout(function() {
          document.body.removeChild(popup);
        }, 3000);
      </script>
<?php
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
    <link rel="stylesheet" type="text/css" href="css/delete.css" /> 
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
            <a href="views.php">
                <li><img src="../../img/viewbook.png" alt="">&nbsp;<span>View Book</span></li>
            </a>
            <a href="updates.php">
                <li><img src="../../img/edit.png" alt="">&nbsp;<span>Edit Book</span>
                </li>
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
                        <div><h1>Libary Management System</h1></div>
                    </a>  
            <a href="../../logout.php" class="btn">Logout</a>
                    </div> 
                </div>
            </div>
      <!-- Main Content -->
    <span id=<?php echo $err=="er"?"error":"sucess";?>><?php echo $errors;?></span>
    <main id="main">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']).'?isbn='.$isbn; ?>" method="POST" id="form">
            <h2 id="delete">Delete Book</h2>
            <div class="containers">
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn" value="<?php echo $isbn; ?>" <?php echo $isbn==''?"":"disabled"; ?>>
            </div>
            <div class="containers">
                <label for="number-of-copies">Number of Copies:</label><br>
                <!-- <input type="radio" id="html" name="inp" value="<?php echo $copies; ?>">
                <label for="inp">All</label> 
                 <input type="text" id="css" name="inp"  value="<?php echo $copies; ?>"> -->
                <select name="copies">
                    <option value="all" selected>All</option>
                    <option><input type="text" name="inp" value="<?php echo $copies; ?> "></option>
                </select>
                <div class="containers">
                    <button type="submit" name="submit">Delete Book</button>
                </div>
        </form>
    </main>
    <br><br>

    </div>
</body>

</html>