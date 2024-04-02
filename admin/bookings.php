<?php 
include('../functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in as 'ADMIN' first";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}

if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in as 'ADMIN' first";
  header('location: ../login.php');
  exit;
}

global $db;
	$sql = "SELECT * FROM bookings ORDER by id DESC";
	$result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Bookings</title>
    <link rel="stylesheet" type="text/css" href="../css/back_end/bookingstyle.css">
	  <link rel="stylesheet" type="text/css" href="../css/back_end/dashboardstyle.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  </head>
  <body>
  <nav class="navbar">
      <!-- LOGO -->
      <div class="logo">Hispanola</div>
      <!-- NAVIGATION MENU -->
      <ul class="nav-links">
        <!-- USING CHECKBOX HACK -->
        <input type="checkbox" id="checkbox_toggle" />
        <label for="checkbox_toggle" class="hamburger">&#9776;</label>
        <!-- NAVIGATION MENUS -->
        <div class="menu">
          <li><a href="home.php"><i class="fas fa-home"></i> Dashboard</a></li>
          <li class="active"><a href="bookings.php"><i class="fas fa-comment-dots"></i> Bookings</a></li>
		    <li><a href="create_user.php"><i class="fas fa-comment-dots"></i> New User</a></li>
          <li><a href="home.php?logout='1'"><i class="fas fa-arrow-circle-left"></i> Logout</a></li>
        </div>
      </ul>
    </nav>

    <div class="maindiv">
        <div class="subdiv">
            <h2>BOOKINGS</h2>
            <table id="mytable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Lodge</th>
                    <th>Time Booked</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=0; $i++;
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($data = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$i++."</td>";
                    echo "<td>".$data['name']."</td>";
                    echo "<td>".$data['email']."</td>";
                    echo "<td>".$data['phone']."</td>";
                    echo "<td>".$data['address']."</td>";
                    echo "<td>".$data['lodge']."</td>";
                    echo "<td>".$data['time_stamp']."</td>";
                    "<form method="."post"."action="."delete_bookings".">"."<input type="."submit"."name="."delete_bookings"."value="."Delete".">"."</form>";
                    echo "<td>"."<div>"."<button"." name="."delete_bookings"."class="."deletebtn"." title="."delete".">"."<span>Delete</span>"."</button>"."</div>"."</td>";
                    echo "<tr>";
                    
                    if (isset($_REQUEST['delete_bookings'])) {
                        global $db;
                        $id = $data['id'];
                        $sql = "DELETE FROM bookings WHERE id='$id'";
                        $delete = mysqli_query($db, $sql);
                        $_SESSION['success']  = "Record deleted successfully!!";
                        header('location: bookings.php');
                    }
                    
                }
                } else {
                    echo "<tr>";
                    echo "<td colspan=6 style="."text-align:center".">"."No Bookings Available Yet."."</td>";
                    echo "<tr>";
                }
                ?>
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>