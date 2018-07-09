<?php
$servername = "johnalexladra.com";
$username = "johnalexladra_johnalex";
$password = "johnalexladra_johnalex";
$dbname = "johnalexladra_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>