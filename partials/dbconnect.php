<?php
// Script for connect to database.
$servername = "localhost";
$username = "root";
$password = "";
$database = "sillicon";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection Failed");
}

?>