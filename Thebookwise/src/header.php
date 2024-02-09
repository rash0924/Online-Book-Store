<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>The BookWise</title>
	<link rel="stylesheet" href="style.css">
</head>


<body>

	<center>
	<header>
		<h5>The BookWise Online Book Store</h5>
	</header>
	</center>

	<div class="div1">
		<img src="images/the1.png">
	</div>
	
	
<section>

	<div class="div2">
		<a href="myprofile.php"><img src="images/profile.png"></a><br><br>
		<?php
		if(isset($_SESSION["username"]))
		{
			echo '<button class="sgn"><a href="myprofile.php">Hi '.$_SESSION["username"].' !</a></button>';
		}
		else if(isset($_SESSION["usernames"]))
		{
			echo '<button class="sgn"><a href="myprofile.php">Hi '.$_SESSION["usernames"].' !</a></button>';
		}
		else
		{
			echo '<button class="lgn"><a href="login.php"><span>Login</a></span></button>';
			echo '<button class="sgn"><a href="signup.php"><span>Sign In</a></span></button>';
		}
	?>			
	</div>

	<div class="div3">
	
			<div class="cart"><button><?php
		if(isset($_SESSION["username"]))
		{
			echo '<a href="checkout.php"><img src="images/scart.png"></a>';
		}
		else if(isset($_SESSION["usernames"]))
		{
			echo '<a href="checkout.php"><img src="images/scart.png"></a>';
		}
		else
		{
			echo '<a href="login.php"><img src="images/scart.png"></a>';
		}
	?></button>
				
			</div>
			
			<div class="search">
		<form method="GET" action="search.php">
			<button type="submit"><img src="images/search.png"></button>
			<input type="text" name="search_query" placeholder="Search books here...">
		</form>
</div>

	
			<div class="menu">
				<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="Catagories.php">Category</a></li>
				<li><a href="paymentinfo.php">Payment Info</a></li>
				</ul>
			</div>
	</div>
	
</section>

