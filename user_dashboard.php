<?php 
	include('functions.php');

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: login.php");
  }
  if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in as 'USER' first";
    header('location: login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User | Dashboard</title>
    <!-- <link rel="stylesheet" type="text/css" href="css/back_end/style.css"> -->
    <link rel="stylesheet" type="text/css" href="css/back_end/formstyle.css">
	  <link rel="stylesheet" type="text/css" href="css/back_end/dashboardstyle.css">
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
          <li class="active"><a href="user_dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
          <li><a href="user_profile.php"><i class="fas fa-user"></i> Profile</a></li>
          <li><a href="user_dashboard.php?logout='1'"><i class="fas fa-arrow-circle-left"></i> Logout</a></a></li>
        </div>
      </ul>
    </nav>

	
    <div class="maindiv">
        <div class="alertdiv">
          <!-- notification message -->
          <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
              <h3>
                <?php 
                  echo $_SESSION['success']; 
                  unset($_SESSION['success']);
                ?>
              </h3>
            </div>
          <?php endif ?>
        </div>
        <h2 class="myh2">User Dashboard</h2>
        <hr>
        <?php  if (isset($_SESSION['user'])) : ?>
          <p>Welcome back, "<span style="color: red"> <?php echo $_SESSION['user']['username']; ?> </span>" !</p>
        <?php endif ?>
    </div>
  </body>
</html>