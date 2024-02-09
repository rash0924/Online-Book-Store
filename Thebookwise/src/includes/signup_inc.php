<?php

	if(isset($_POST["Submit"]))
	{
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$email = $_POST["email"];
		$pwd = $_POST["pwd"];
		$pwdrepeat = $_POST["pwdrepeat"];
	
		require_once 'dbh.php';
		require_once 'functions.php';
		
		$emptyInput = emptyInputSignup($fname, $lname, $email, $pwd, $pwdrepeat);
		$invalidEmail = invalidEmail($email);
		$pwdMatch = pwdMatch($pwd, $pwdrepeat);
		$uidExists = uidExists($conn, $email);
		
		if($emptyInput !== false)
		{
			header('Location:../signup.php?error=emptyinput');
			exit();
		}
		if($invalidEmail !== false)
		{
			header('Location:../signup.php?error=invalidemail');
			exit();
		}
		if($pwdMatch !== false)
		{
			header('Location:../signup.php?error=passworddontmatch');
			exit();
		}
		if($uidExists !== false)
		{
			header('Location:../signup.php?error=emailtaken');
			exit();
		}
		
		createUser($conn, $fname, $lname, $email, $pwd);

	}
	
	else
	{
		header('Location:../home.html');
		exit();
	}

?>