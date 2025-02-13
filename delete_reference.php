<?php
session_start();
include "db_pdo.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!isset($_SESSION["rooli"]) || $_SESSION["rooli"] != 'admin') {
		http_response_code(403); // 403 = Forbidden
		die("403: Forbidden");
	}

	// sanitize and validate
	$id = isset($_POST['id']) ? filter_var($_POST['id'], FILTER_VALIDATE_INT) : null;

	if (!$id) {
		http_response_code(500);
		die("500: Internal Server Error");
	}

	var_dump($id);

	$sql = "DELETE FROM koivu_referenssit WHERE ID = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['id' => $id]);

	if ($stmt->rowCount() == 1) {
		http_response_code(200);
		die(json_encode($response));
	} else {
		http_response_code(400);
		die("400: No rows updated");
	}
}
?>