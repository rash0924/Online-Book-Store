<?php
	include_once 'header.php';
?>

	<div>
	<form class="forms" action="includes/signup_inc.php" method="POST" onsubmit="return checkPassword()">
		 <fieldset>
			  <legend>User Registration</legend><br>
			  <label for="fname">First Name</label><br><br>
			  <input type="text" id="fname" name="fname" placeholder="Enter First Name" required><br><br><br>
			  <label for="lname">Last Name</label><br><br>
			  <input type="text" id="lname" name="lname" placeholder="Enter Last Name" required><br><br><br>
			  <label for="email">Email</label><br><br>
			  <input type="email" id="email" placeholder="Enter E-mail" name="email" required><br><br><br>
			  <label for="pwd">Password</label><br><br>
			  <input type="password" id="pwd" placeholder="Enter Password" name="pwd"><br><br><br>
			  <label for="cnfrmpwd">Confirm Password</label><br><br>
			  <input type="password" id="cnfrmpwd" placeholder="Re-Enter Password" name="pwdrepeat" ><br><br>

		  <br/><button type="submit" class="signupbtn" name="Submit" >Sign Up</button>
		 </fieldset>
	</form>
	</div>
	<?php
		if(isset($_GET["error"]))
		{
			if($_GET["error"] == "emptyinput")
			{
				echo '<div class="error">Incomplete Field Available</div>';
			}
			else if($_GET["error"] == "invalidemail")
			{
				echo '<div class="error">Invalid E-Mail</div>';
			}
			else if($_GET["error"] == "passworddontmatch")
			{
				echo '<div class="error">Password Don\'t Match</div>';
			}
			else if($_GET["error"] == "emailtaken")
			{
				echo '<div class="error">Entered E-Mail Is Already Taken</div>';
			}
		}
	?>

<?php
	include_once 'footer.php';
?>