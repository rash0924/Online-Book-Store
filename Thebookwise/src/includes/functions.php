 <?php
 
	function emptyInputSignup($fname, $lname, $email, $pwd, $pwdrepeat)
	{
		$result;
		if(empty($fname) || empty($lname) || empty($email) || empty($pwd) || empty($pwdrepeat))
		{
			$result = true;
		}
		else
		{
			$result = false;
		}
		return $result;
	}
	function invalidEmail($email)
	{
		$result;
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$result = true;
		}
		else
		{
			$result = false;
		}
		return $result;
	}
	function pwdMatch($pwd, $pwdrepeat)
	{
		$result;
		if($pwd != $pwdrepeat)
		{
			$result = true;
		}
		else
		{
			$result = false;
		}
		return $result;
	}
	function uidExists($conn, $email)
	{
		$sql = "SELECT * FROM users WHERE email = ?;";
		$stmt = mysqli_stmt_init($conn);
		
		if(!mysqli_stmt_prepare($stmt, $sql))
		{
			header('Location:../signup.php?error=stmtfailed');
			exit();
		}
		mysqli_stmt_bind_param($stmt, "s", $email);
		mysqli_stmt_execute($stmt);
		$resultData = mysqli_stmt_get_result($stmt);
		
		if($row = mysqli_fetch_assoc($resultData))
		{
			return $row;
		}
		else
		{
			return false;
		}
		
		mysqli_stmt_close($stmt);
	}
	function createUser($conn, $fname, $lname, $email, $pwd)
	{
		$sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (?,?,?,?);";
		$stmt = mysqli_stmt_init($conn);
		
		if(!mysqli_stmt_prepare($stmt, $sql))
		{
			header('Location:../signup.php?error=stmtfailed');
			exit();
		}
		$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
		mysqli_stmt_bind_param($stmt, "ssss", $fname, $lname, $email, $hashedpwd);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		session_start();
		$_SESSION["usernames"] = $fname;
		header('Location:../home.php');
		exit();
	}
	function emptyInputLogin($username, $pwd)
	{
		$result;
		if(empty($username) || empty($pwd))
		{
			$result = true;
		}
		else
		{
			$result = false;
		}
		return $result;
	}
	function LoginUser($conn, $username, $pwd)
	{
		$uidExists = uidExists($conn, $username);
		if($uidExists === false)
		{
			header('Location:../login.php?error=wronglogin1');
			exit();
		}
		$pwdHashed = $uidExists["password"];
		$checkpwd = password_verify($pwd, $pwdHashed);
		
		if($checkpwd === false)
		{
			header('Location:../login.php?error=wronglogin2');
			exit();
		}
		else if($checkpwd === true)
		{
			session_start();
			$_SESSION["usersid"] =  $uidExists["userid"];
			$_SESSION["usersemail"] = $uidExists["email"];
			$_SESSION["username"] = $uidExists["first_name"];
			header('Location:../home.php');
			exit();
		}
	}
 ?>