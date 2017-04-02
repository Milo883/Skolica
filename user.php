<?php
	
	session_start();
	include("functions.php");
	
	if (!isset($_SESSION['loggedIn'])) { 
		$_SESSION['loggedIn'] = false ;
	}
	
	if(!isLoggedIn()) {
		header('Location: /Skolica/index.php?msg=noPermissions');
	}
	if (isset($_GET['search'])){
		$keyword = $_GET['search'];
		
		if (searchUser($keyword)) {
			echo 'korisnik sa username-om: ' . $keyword . ' je pronadjen';
		} else {
			echo 'korisnik sa username-om: ' . $keyword . ' nije pronadjen';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User</title>
</head>
<body>
<form action="">
	<input type="text" name="search" placeholder="Pretraga">
		<input type="submit" value="Log In">

</form> 

</body>
</html>