<?php 
include('../functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
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
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/back_end/formstyle.css">
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
        <li class="active"><a href="home.php"><i class="fas fa-home"></i> Dashboard</a></li>
          <li><a href="bookings.php"><i class="fas fa-comment-dots"></i> Bookings</a></li>
		      <li><a href="create_user.php"><i class="fas fa-comment-dots"></i> New User</a></li>
          <li><a href="home.php?logout='1'"><i class="fas fa-arrow-circle-left"></i> Logout</a></li>
        </div>
      </ul>
    </nav>

	
    <div class="maindiv">
      <div class="homediv">
        <h2 class="myh2">Admin Dashboard</h2>
        <hr>
        <p>
          Welcome back, "<span style="color: red"> <?php echo $_SESSION['user']['username']; ?> </span>" !
          <br>
          <br>
          Email: "<span style="color: red"> <?php echo $_SESSION['user']['email']; ?> </span>" !
        </p>
      </div>
      
    </div>
  </body>
</html>