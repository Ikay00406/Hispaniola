<?php 
include('functions.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/front_end/style.css">
	<link rel="stylesheet" type="text/css" href="css/front_end/style_activities.css">
	<link rel="stylesheet" type="text/css" href="css/front_end/accomodations.css">
	<link rel="stylesheet" type="text/css" href="css/front_end/formstyle.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
	
	<title>Hispaniola | Book an Accommodation</title>
</head>
<body>
	<header>
		<div id="activities-header">
			<div class="titodiv" style="position: fixed; top:0; width: 100%; height: auto; z-index: 1">
<nav>
				<div class="upper_navbar">
					<div class="menu1">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="register.php">Sign Up</a></li>
							<li><a href="login.php">Log In</a></li>
						</ul>
					</div>
				</div>
				<div class="lower_navbar">
					<div class="lower_navbar_content">
						<div class="menu-icon">
							<i class="fas fa-bars fa-2x"></i>
						</div>
						<div class="logo">
						<a href="index.php"><img src="images/logomain.png" alt="logo" title="Source:(vectorstock, 2022)" style="height: 55px; width: 70px"></a>
						</div>
						<ul class="dropdown-menu">
							<li><a href="">What to do<i class="fas fa-caret-down"></i></a>
								<ul>
									<li><a href="activities.php">Activities</a></li>
									<li><a href="event-and-festivals.php">Events & Festivals</a></li>
								</ul>
							</li>
							<li><a href="">Where to go<i class="fas fa-caret-down"></i></a>
								<ul>
									<li><a href="attractions.php">Attractive Destinations</a></li>
									<li><a href="locations.php">Cities & Other Locations</a></li>
								</ul>
							</li>
							<li><a href="">Plan your trip<i class="fas fa-caret-down"></i></a>
								<ul>
									<li><a href="accomodations.php">Book an Accomodation</a></li>
									<li><a href="about.php">About Hispaniola</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			</div>
			 
			<div class="header-title">
				<div id="main-title">Book Your <span>apartment</span></div>
				<div id="sub-title">stay & feel free</div>
			</div>
		</div>
	</header>

	<section class="page-content">
		<!-- BOOKINGS -->
		<div class="header">
			<h2>Book a Lodge</h2>
		</div>
		<form action="accomodations.php" method="POST">
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
				<?php if (isset($_SESSION['msg'])) : ?>
					<div class="error" >
						<h3>
							<?php 
								echo $_SESSION['msg']; 
								unset($_SESSION['msg']);
							?>
						</h3>
					</div>
				<?php endif ?>
			</div>
			<div class="input-group outline">
				<label for="name">Name:</label>
				<input type="text" name="name" placeholder="name" required>
			</div>
			<div class="input-group outline">
				<label for="email">Email:</label>
				<input type="email" name="email" placeholder="example@gmail.com" required>
			</div>
			<div class="input-group outline">
				<label for="name">Phone:</label>
				<input type="text" name="phone" placeholder="phone" required>
			</div>
			<div class="input-group outline">
				<label for="address">Address:</label>
				<input type="text" name="address" placeholder="address" required>
			</div>
			<div class="input-group">
				<label>Lodge</label>
				<select name="lodge" id="lodge" >
				<option value="" selected>------Choose your preferred lodge------</option>
					<option value="Marriott Port-au-Prince Hotel">Marriott Port-au-Prince Hotel</option>
					<option value="Plazahaiti Villa">Plazahaiti Villa</option>
					<option value="Auberge de la Cigogne & Star House">Auberge de la Cigogne & Star House</option>
					<option value="Tripadvisor Guest House">Tripadvisor Guest House</option>
					<option value="PuntaCanaseven Beaches">PuntaCanaseven Beaches</option>
					<option value="Coin perdu guest house">Coin perdu guest house</option>
				</select>
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="bookings_btn">Submit</button>
			</div>
		</form>
	</section>
	<div class="footer">
		<div class="footer-content">
			<div class="footer-refs-content-1">
				<h5>Tourism <b>Agencies</b></h5>
                <ul>
                	<li><a href="javascript:void(0);">Dominica Tourism Bureau</a></li>
                	<li><a href="javascript:void(0);">Caribbean Tourism Development Authority</a></li>
                	<li><a href="javascript:void(0);">Department of Tourism</a></li>
                	<li><a href="javascript:void(0);">Hispaniola Aquatic Adventurers</a></li>
                	<li><a href="javascript:void(0);">Destination Hispaniola</a></li>
            	</ul>
			</div>
			<div class="footer-refs-content-2">
					<h5><b>References</b></h5>
		            <ul>
		                <li><a href="https://fontawesome.com/" target="_blank"> FontAwesome.com</a></li>
		                <li><a href="https://unsplash.com/" target="_blank"> Unsplash.com</a></li>
						<li><a href="https://flagcdn.com/" target="_blank"> flagcdn.com</a></li>
						<li><a href="https://www.exchangerate-api.com/" target="_blank">ExchangeRate-API.com</a></li>
		            </ul>
				</div>
			<div class="footer-refs-content-3">
				<h5>About the <b>Site</b></h5>
	            <ul>
	                <li><a href="javascript:void(0);">Terms & Conditions</a></li>
	                <li><a href="javascript:void(0);">Privacy Policy</a></li>
					<li><a href="javascript:void(0);">Contact Us</a></li>
					<li><a href="javascript:void(0);">info@hispaniola.com</a></li>
	            </ul>
			</div>
		</div>
		<div class="lower-footer">
			<div class="lower-footer-content">
				<div id="footer-align-left">
					All Rights Reserved. &#9400; 2022
				</div>
				<div id="footer-align-right">
					<a href="javascript:void(0);"><i class="fab fa-facebook-square fa-3x"></i></a>
					<a href="javascript:void(0);"><i class="fab fa-twitter-square fa-3x"></i></a>
					<a href="javascript:void(0);"><i class="fab fa-google-plus-square fa-3x"></i></a>
					<a href="javascript:void(0);"><i class="fab fa-youtube-square fa-3x"></i></a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>