<?php

//Database connection


// $servername = "151.10.0.71";
// $username = "localdb";
// $password = "El!t3@m55";
// $database = "des";
// $port = "3306";
$servername = "137.105.128.253";
$username = "tech";
$password = "Tac4MTwtDmtP";
$database = "eliteprototype";
$port = "6033";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>