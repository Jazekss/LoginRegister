<?php
namespace Classes;

class Signin extends Database
{
	protected function getUser($username, $password)
	{
		$statement = $this->connect()->prepare("SELECT password FROM users WHERE usersname = ? OR email = ?;");
		if (!$statement->execute(array($username, $password))) {
			$statement = null;
			header("location: ../index.php?error=statementfailed");
			exit;
		}
		if ($statement->rowCount() == 0) {
			$statement = null;
			header("location: ../index.php?error=usernotfound");
		}
		$hashedPassword = $statement->fetchAll(PDO::FETCH_ASSOC);
		$checkPassword = password_verify($password, $hashedPassword[0]["password"]);
		if ($checkPassword == false) {
			$statement = null;
			header("location: ../index.php?error=wrongpassword");
		} else {
			$statement = $this->connect()->prepare("SELECT password FROM users WHERE usersname = ? OR email = ? AND password = ?;");
			if (!$statement->execute(array($username, $username, $password))) {
				$statement = null;
				header("location: ../index.php?error=statementfailed");
				exit;
			}
			$user = $statement->fetchAll(PDO::FETCH_ASSOC);
			session_start();
			$_SESSION["id"] = $user[0]["id"];
			$_SESSION["id"] = $user[0]["username"];
		}
		$statement = null;
	}
}