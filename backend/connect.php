<?php
$servername = "localhost";
$username = "demo";
$password = "demo123";
$dbname = "evoke_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}
?>