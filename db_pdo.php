<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$servername = "localhost";
$username = "trtkm24a_12";
$password = "BZBjxQsp";
$database = "wp_trtkm24a_12";

try {
	$pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "<p>Yhteys epäonnistui</p><p>" . $e->getMessage() . "</p>";
	// vaihtoehto 2
	//file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
}
?>