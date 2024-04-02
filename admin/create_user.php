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
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | Add User</title>
	<link rel="stylesheet" type="text/css" href="../css/back_end/formstyle.css">
	<link rel="stylesheet" type="text/css" href="../css/back_end/dashboardstyle.css">
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
          <li><a href="bookings.php"><i class="fas fa-comment-dots"></i> Bookings</a></li>
			<li class="active"><a href="create_user.php"><i class="fas fa-comment-dots"></i> New User</a></li>
          <li><a href="home.php?logout='1'"><i class="fas fa-arrow-circle-left"></i> Logout</a></li>
        </div>
      </ul>
    </nav>

	<div class="header">
		<h2>Admin - create user</h2>
	</div>
	
	<form method="post" action="create_user.php" style="margin-bottom: 50px">

		<?php echo display_error(); ?>

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

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>User type</label>
			<select name="user_type" id="user_type" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn"> + Create user</button>
		</div>
	</form>
</body>
</html>


</html>