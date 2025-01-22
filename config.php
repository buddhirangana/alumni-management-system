<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "aasict_db";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("<script>alert('Connection failed: " . mysqli_connect_error() . "');</script>");
}

//echo "<script>alert('Connection successful.');</script>";
?>