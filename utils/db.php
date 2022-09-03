<?php 

// connect ot database
$servername = "localhost:3306";
$username = "root";

// Create connection
$conn = new mysqli($servername, $username, "", "Enistic");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

