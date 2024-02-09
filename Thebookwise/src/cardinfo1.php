<?php
	require_once 'includes/dbh.php';

	if(isset($_POST["confirm"])){
	$cardno = $_POST["fname"];
	$cardname = $_POST["cardna"];
	$expirydate = $_POST["exdate"];
	$cvv = $_POST["cv"];
	
	
	$sql = "INSERT INTO card_info1(cardnum, cardname, expirydate, cvv) values('$cardno','$cardname','$expirydate','$cvv')";
	
	
	if($conn->query($sql)){
		echo '<script> alert("Inserted successfully"); window.location.href = "delivery.php"</script>';
	}
	else
	{
		echo "Error:". $conn -> error;
	}
	}
	
	
	$conn->close();
	
?>