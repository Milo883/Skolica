<?php
	//logOut();
	//populateStorage();
	//die();

	function logOut () {
		unset($_SESSION['loggedIn']);
	}

	function isLoggedIn() {
		
		if ($_SESSION['loggedIn']) {
			return true;
		}
		return false;
	}
	function searchUser($keyword) {
		$users = getUsers();
		foreach($users as $user){
			if ($keyword === $user->username) {
				return true;
			}
		}
		
		return false;
	}
	function logIn($username, $password) {
		$users = getUsers();
		foreach($users as $user){
			if (authoriseUser($username, $password, $user)) {
				$_SESSION['user'] = $username;
				$_SESSION['loggedIn'] = true;
			}
		}
	}
	
	function getUsers() {
		return json_decode(file_get_contents('storage.dat'));
	}
	
	function authoriseUser($username, $password, $user){
		if ($user->username === $username && $user->password === $password) {
			return true;
		}
		return false;
	}
	
	function populateStorage() {
		$users = array(
			['username' => 'admin', 'password' => 'test'],
			['username' => 'milo', 'password' => 'milo']
		);
		
		file_put_contents('storage.dat', json_encode($users));
	}
?>