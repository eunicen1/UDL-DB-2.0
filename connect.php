<?php
$servername = "localhost";
$username = "udl";
$password = "G3kj/BoDY[dPy(cl";
$dbname = "searchDB";
$datatable = "search";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
