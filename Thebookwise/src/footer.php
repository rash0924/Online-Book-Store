
<footer class="footer">

	<img src="images/the2.png">
	<p class="fabout">Best online book store <br>Choose any book easily<br>contact us for more</p>
	
	<div class="footer-left">
		<p class="footer-links">
				  <a href="contactus.php">Contact Us</a>
				  
				  <a href="abc.php">Terms and Conditions</a>
				
	<?php
		if(isset($_SESSION["username"]))
		{
			echo '<a href="feedback1.php">Feedback</a>';
		}
		else if(isset($_SESSION["usernames"]))
		{
			echo '<a href="feedback1.php">Feedback</a>';
		}
		else
		{
			echo '<a href="login.php">Feedback</a>';
		}
	?>	
				  
				  
				   <a href="delivery_info.php">Delivery Information</a>
		 </p>  
		
	</div>
	
	<div class="sicons">
		<a href="https://www.google.com/url?sa=t&source=web&rct=j&url=https://twitter.com/login&ved=2ahUKEwiGy-qwurb_AhUva2wGHaVJBb0QFnoECBIQAQ&usg=AOvVaw3swNPrVfKaBGiX8TGfSpkN"><img src="images/twitter.png"></a>
		<a href="https://www.google.com/url?sa=t&source=web&rct=j&url=https://web.whatsapp.com/login&ved=2ahUKEwjgnbieurb_AhV4TmwGHU-dCLoQFnoECBkQAQ&usg=AOvVaw1w6n5V1aeVQP7RspDFHf5X"><img src="images/whatsapp.png"></a>
		<a href="https://www.facebook.com/profile.php?id=100093298143667&mibextid=ZbWKwL"><img src="images/facebook.png"></a>
		<a href="https://www.google.com/url?sa=t&source=web&rct=j&url=https://www.instagram.com/accounts/login/&ved=2ahUKEwjzvO3Qt7b_AhUKcWwGHTcrDPgQFnoECAQQAQ&usg=AOvVaw0BRCgcMCVNSSLcNcVjPzsz"><img src="images/instagram.png"></a>
	</div>
	
<p class="footer-company-name">© 2023 Book Wise (Pvt) Ltd. All Rights Received.</p>
</footer>
<script src="js/bookstorejs.js"></script>
</body>
</html>