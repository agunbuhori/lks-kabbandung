<?php

class AuthController extends Controller
{
	public function doLogin()
	{
		$credentials = [$_POST['username'], $_POST['password']];

		$checkUsername = $this->prepare("SELECT id, username, password, level FROM users WHERE username = :username");
		$checkUsername->execute([":username" => $credentials[0]]);
		$checkUsername = $checkUsername->fetchAll();

		if (count($checkUsername) > 0) {
			if (password_verify($credentials[1], $checkUsername[0]->password)) {
				$_SESSION['id'] = $checkUsername[0]->id;
				$_SESSION['user'] = $checkUsername[0]->username;
				$_SESSION['level'] = $checkUsername[0]->level;
				if (isset($_SESSION['status'])) {
					unset($_SESSION['status']);
				}
				header('location:../admin/reservation');
			} else {
				$_SESSION['status'] = 0;
				header('location:../auth/login');
			}
		} else {
			$_SESSION['status'] = 0;
			header('location:../auth/login');
		}

	}

	public function logout()
	{
		unset($_SESSION['user'], $_SESSION['level'], $_SESSION['name']);

		header('location:'.$_SERVER['HTTP_REFERER']);
	}
}