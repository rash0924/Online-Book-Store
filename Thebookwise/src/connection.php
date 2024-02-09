<?php


$conn = new mysqli('localhost','root','','thebookwise_login');

if ($conn) {
	//echo "Connection successfull";
}else{
	die(mysql_errno($conn));
}

?>