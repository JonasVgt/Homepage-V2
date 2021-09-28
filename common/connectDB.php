<?php
$servername = "db";
$username = "web";
$password = "df7NLbGZ7hvMqcu4";
$dbname = "Website";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

function fetch($conn, $query){
  $res = $conn->query($query);
  return ($res);
}


?>
