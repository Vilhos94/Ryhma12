<?php
$servername = "localhost";
$username = "trtkm24a_12"; 
$password = "BZBjxQsp"; 
$database = "wp_trtkm24a_12";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Yhteys epäonnistui: " . $conn->connect_error);
}
?>
