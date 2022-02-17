<?php
namespace Classes;


class Database
{
	protected function connect()
	{
		try {
			$dbUsername = "root";
			$dbPassword = "";
			$dbHandler = new \PDO("mysql:host=localhost;dbname=homeworkloginregister", $dbUsername, $dbPassword);
			return $dbHandler;
		} catch (PDOException $e) {
			print "Error: " . $e->getMessage() . "<br>";
			die();
		}
	}

}