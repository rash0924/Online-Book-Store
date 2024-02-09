<?php
	include "includes/dbh.php";
	
	
	if(isset($_POST["feedback"])){
	$desc1 = $_POST["feedback1"];
	
	
	$sql = "INSERT INTO feedback(description) values('$desc1')";
	
	
	if($conn->query($sql)){

		echo '<script> alert("Inserted successfully")</script>';
		
	
	}
	else
	{
		echo "Error:". $conn -> error;
	}
	}
	
	?>	
	
<?php
    include_once 'header.php';
?>

	<hr class="line1">
<div class="feedback"><h2><b><u>Give Us Your Feedback</u></b></h2>
<form method = "POST" action="feedback1.php"><textarea id="feedback" name="feedback1" placeholder="Type Here......." required></textarea>
<button type="submit" name="feedback">SUBMIT</button></form></div>

<hr class="line1">
<div class="underfb"><h2><b>Customer Feedbacks</b></h2><br>

<?php
	$sql = "SELECT description FROM feedback";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // Display the selected data
	  while ($row = $result->fetch_assoc()) {
		// Output the data
		echo '<ul style="margin-left:20%; color: #80ff80;"><li><p style= "color: #80ff80; font-size:20px; font-famliy:Verdana;">'. $row["description"] . "</li></ul><br><br>";
	  }
	} else {
	  echo "No data found.";
	}

	
	$conn->close();
	
?>
</div>



<?php
    include_once 'footer.php';
?>
