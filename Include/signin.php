<?php
use Classes\signinController;
error_reporting(E_ALL);
if (isset($_POST["submit"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	include '../Classes/database.php';
	include '../Classes/signinClass.php';
	include '../Classes/signinController.php';

	$signin = new SigninController($username, $password);
	$signin->signinUser();
	header("Location: ../index.php?error=none");
}