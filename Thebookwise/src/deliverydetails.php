<?php
	require_once 'includes/dbh.php';

if(isset($_POST["save1"])){
	$fullName = $_POST["cname"];
	$telNumber = $_POST["cmobile"];
	$address = $_POST["caddress"];
	$province = $_POST["cpro"];
	$city1 = $_POST["ccity"];
	$area = $_POST["carea"];
 $total = $_GET["value"];

$sql = "INSERT INTO delivery_details1(full_name, mobile_num, address, province, city, area)
VALUES ('$fullName', '$telNumber', '$address', '$province', '$city1', '$area')";

if($conn->query($sql)) {
  echo '<script> alert("Inserted successfully"); window.location.href = "home.php"</script>';
} 
else {
  echo "Error: " . $conn->error;
}
}
$conn->close();
?>