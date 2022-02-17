<?php
namespace Classes;

class SignupController extends Signup
{
	private $username;
	private $password;
	private $password2;
	private $email;
	public function __construct($username, $password, $password2, $email) {
		$this->username = $username;
		$this->password = $password;
		$this->password2 = $password2;
		$this->email = $email;
	}
	public function signupUser() {
		if ($this->emptyInput() == false) {
			header("location: ../index.php?error-emptyInput");
			exit;
		}
		if ($this->wrongUsername() == false) {
			header("location: ../index.php?error-username");
			exit;
		}
		if ($this->wrongEmail() == false) {
			header("location: ../index.php?error-email");
			exit;
		}
		if ($this->passwordMatch() == false) {
			header("location: ../index.php?error-passwordmatch");
			exit;
		}
		if ($this->usernameTaken() == false) {
			header("location: ../index.php?error-useroremailtaken");
			exit;
		}
		$this->setUser($this->username, $this->password, $this->email);
	}
	private function emptyInput(): bool
	{
		if (empty($this->username) || empty($this->password) || empty($this->password2) || empty($this->email)) {
			$result = false;
		} else {
			$result = true;
		}
		return $result;
	}

	private function wrongUsername(): bool
	{
		if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
			$result = false;
		} else {
			$result = true;
		}
		return $result;
	}

	private function wrongEmail(): bool
	{
		if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
			$result = false;
		} else {
			$result = true;
		}
		return $result;
	}

	private function passwordMatch(): bool
	{
		if ($this->password !== $this->password2) {
			$result = false;
		} else {
			$result = true;
		}
		return $result;
	}

	private function usernameTaken(): bool
	{
		if ($this->checkUser($this->username, $this->email)) {
			$result = false;
		} else {
			$result = true;
		}
		return $result;
	}
}