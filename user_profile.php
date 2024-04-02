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

    global $db;
    $email = $_SESSION['user']['email'];
	$sql = "SELECT * FROM bookings WHERE email='$email' LIMIT 1";
	$result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User | Profile</title>
    <link rel="stylesheet" type="text/css" href="css/back_end/formstyle.css">
    <link rel="stylesheet" type="text/css" href="css/back_end/bookingstyle.css">
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
          <li><a href="user_dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
          <li class="active"><a href="user_profile.php"><i class="fas fa-user"></i> Profile</a></li>
          <li><a href="user_dashboard.php?logout='1'"><i class="fas fa-arrow-circle-left"></i> Logout</a></a></li>
        </div>
      </ul>
    </nav>
    <div id="newdiv">
        <h2 class="myh2"> User Profile</h2>
        <hr> 
        <?php  if (isset($_SESSION['user'])) : ?>
            <p>
                Name: "<span style="color: red"> <?php echo $_SESSION['user']['username']; ?> </span>" !
                <br>
                <br>
                Email: "<span style="color: red"> <?php echo $_SESSION['user']['email']; ?> </span>" !
            </p>
        <?php endif ?>
    </div>

    <div class="maindiv">
        <div class="subdiv">
            <h2>MY BOOKINGS</h2>
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
                    echo "<tr>";
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