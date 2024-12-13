<?php
// Database configuration
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "crud";

// Create a connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Optional: Uncomment to verify connection
// echo "Connected successfully";
?>
