<?php

	if(isset($_POST["submit"]))
	{
		$username = $_POST["mail"];
		$pwd = $_POST["pwd"];
		
		require_once 'dbh.php';
		require_once 'functions.php';
		
		if(emptyInputLogin($username, $pwd) !== false)
		{
			header('Location:../login.php?error=emptyinput');
			exit();
		}
		LoginUser($conn, $username, $pwd);
	}
	
	else
	{
		header('Location:../login.php');
		exit();
	}

?>