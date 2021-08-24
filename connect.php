<?php 
//$link = mysqli_connect("localhost", "event-booking", "hA0~ua58");
//mysqli_select_db($link,"event-booking");

$servername = "localhost";
$username = "event-booking";
$password = "";
$dbname = "event-booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
?>
