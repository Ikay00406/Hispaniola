<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost:3306', 'c2124090_new_tito', 'K-nzLnmuAK+u', 'c2124090_tito');

// variable declaration
$username = "";
$email    = "";
$errors   = array(); 


// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	//check if user already exist
	$check = "SELECT * FROM users WHERE username='$username' AND email='$email'";
	$answer = mysqli_query($db, $check);
	
	if ($answer->num_rows > 0) {
		array_push($errors, "User already exist, please login");
	}
		

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (username, email, user_type, password) 
					  VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New admin successfully created!!";
			header('location: create_user.php');
		}else{
			$query = "INSERT INTO users (username, email, user_type, password) 
					  VALUES('$username', '$email', 'user', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: login.php');				
		}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin/home.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: user_dashboard.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

// call the bookings() function if bookings_btn is clicked
if (isset($_POST['bookings_btn'])) {
	bookings();
}

// REGISTER BOOKINGS
function bookings(){
	global $db, $errors, $username, $email;
	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name    =  e($_POST['name']);
	$email   =  e($_POST['email']);
	$phone  =  e($_POST['phone']);
	$address  =  e($_POST['address']);
	$lodge = e($_POST['lodge']);

	// form validation: ensure that the form is correctly filled
	if (empty($name)) { 
		array_push($errors, "Name is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($phone)) { 
		array_push($errors, "Contack is required"); 
	}
	if (empty($address)) {
		array_push($errors, "Address is required");
	}
	if (empty($lodge)) {
		array_push($errors, "Lodge is required");
	}

	// register bookings if there are no errors in the form
	if (count($errors) == 0) {
		$user_type = e($_POST['user_type']);
		$query = "INSERT INTO bookings (name, email, phone, address, lodge) 
				  VALUES('$name', '$email', '$phone', '$address', '$lodge')";
		mysqli_query($db, $query);
		$_SESSION['success']  = "Bookings registered successfully!!";
		$_SESSION['msg'] = "Bookings registered successfully!!";
		header('location: accomodations.php');
	}
}

// call the deletebookings() function if delete_btn is clicked
if (isset($_POST['delete_bookings'])) {
	deletebookings();
}

// DELETE BOOKINGS
function deletebookings(){
	global $db, $errors, $username, $email;
	
    // defined the id
	$id    =  $data['id'];
	

	// delete bookings
		$query = "DELETE FROM bookings WHERE id=$id";
		mysqli_query($db, $query);
		$_SESSION['success']  = "Bookings deleted successfully!!";
		header('location: admin/bookings.php');

	
}
?>