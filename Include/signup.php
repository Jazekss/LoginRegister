<?php
use Classes\signupController;
error_reporting(E_ALL);
if(isset($_POST["submit"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	$password2 = $_POST["password2"];
	$email = $_POST["email"];

	include '../Classes/database.php';
	include '../Classes/signupClass.php';
	include '../Classes/signupController.php';

	$signup = new SignupController($username, $password, $password2, $email);
	$signup->signupUser();
	header("Location: ../index.php?error=none");
}