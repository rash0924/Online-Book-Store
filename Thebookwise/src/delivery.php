<?php
	include_once 'header.php';
?>
	<hr class="line1">
<div>
<form method = "POST" class="formd" action="deliverydetails.php" autocomplete="off">
 <fieldset>
  <legend>Delivery Details</legend><br>
  <div class="divid1">
  <label for="fname">Full Name</label><br><br>
  <input type="text" id="fname" name="cname" placeholder="Enter Full Name" required><br><br><br>
  <label for="mobile">Mobile Number</label><br><br>
  <input type="phone" name="cmobile" placeholder="+94xxxxxxxxxx" pattern="[0-9]{10}" required><br><br><br>
  <label for="address">Address</label><br><br>
  <input type="text" id="address" name="caddress" placeholder="Enter Address" required><br><br><br></div>
  <div class="divid2">
  <label for="pro">Province</label><br><br>
  <select name="cpro" id="pro">
  <option></option>
  <option  value="west">Western Province</option>
  <option  value="noth">Northern Province</option>
  <option value="south">Southern Province </option>
  <option value="nw">North Western Province</option>
  <option value="nc">North Central Province </option>
  <option value="uva">Uva Province</option>
  <option value="sabara">Sabaragamuwa Province</option>
  <option value="cent">Central Province</option>
  <option value="east">Eastern Province</option></select><br><br><br>
  <label for="city">City</label><br><br>
  <input type="city" id="city" name="ccity" placeholder="Enter City" required><br><br><br>
  <label for="area">Area</label><br><br>
  <input type="text" id="area" name = "carea" placeholder="Enter Area" required><br><br><br>
  </div>
 </fieldset>
	<div class="conpay1">
	<h2><button type = "submit" name="save1">SAVE</button></h2></div>
</form>
</div>

<?php
	include_once "footer.php";
?>