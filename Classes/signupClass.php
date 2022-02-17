<?php
namespace Classes;

class Signup extends Database
{
	protected function checkUser($username, $email)	{
		$statement = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

		if (!$statement->execute(array($username, $email))) {
			$statement = null;
			header("location: ../index.php?error-statementfailed");
			exit();
		}
		$resultCheck;
		if ($statement->rowCount() > 0) {
			$resultCheck = false;
		} else {
			$resultCheck = true;
		}
		return $resultCheck;
	}
	protected function setUser($username, $password, $email) {
		$statement = $this->connect()->prepare('INSERT INTO users (username, password, email) VALUES (?, ?, ?);');

		$hashPassword = password_hash($password, PASSWORD_DEFAULT);
		if (!$statement->execute(array($username, $hashPassword, $email))) {
			$statement = null;
			header("location: ../index.php?error-statementfailed");
			exit();
		}
		$statement = null;
	}
}