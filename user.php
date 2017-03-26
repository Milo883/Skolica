<?php
	
	session_start();
	include("functions.php");
	
	if (!isset($_SESSION['loggedIn'])){
		$_SESSION['loggedIn'] = false ;
	}
	
	if(!isLoggedIn()) {
		header('Location: /Milo/index.php?msg=noPermissions');
	}
		
?>