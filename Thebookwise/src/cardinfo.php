<?php
	include_once 'header.php';
?>

	<hr class="line1">
<div>
<form method = "POST" class="formcar"action="cardinfo1.php" autocomplete="off">
 <fieldset>
  <legend>Card Information</legend><br>
  <div class="divid3">
  <label for="cardnu">CARD NUMBER</label><br><br>
  <input type="text" id="cardnu" name="fname" placeholder="Enter Card Number" pattern="[0-9]+" required><br><br><br>
  <label for="cardna">CARDHOLDER'S NAME</label><br><br>
  <input type="text" name="cardna" placeholder="Enter Card Holder's Name" required><br><br><br></div>
  <div class="divid4">
  <label for="exdate">EXPIRATION DATE</label><br><br>
  <input type="month" name="exdate" required><br><br><br>
  <label for="cvv">CVV</label><br><br>
  <input type="text" id="cvv" name = "cv" pattern="[0-9]{3}" placeholder="Enter CVV" required><br><br><br>
  
  </div>
 </fieldset>
	<div class="conpay">
<h2><button type="submit" name="confirm">CONFIRM PAY</button></h2></div>

</form>
</div>

<?php
	include_once "footer.php";
?>