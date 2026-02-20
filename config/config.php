<?php
//connection with database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "cakebliss_db";


// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>