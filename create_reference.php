<?php
session_start();
include "db_pdo.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!isset($_SESSION["rooli"]) || $_SESSION["rooli"] != 'admin') {
		http_response_code(403); // 403 = Forbidden
		die("403: Forbidden");
	}

	// sanitize and validate
	$otsikko = isset($_POST['otsikko']) ? htmlspecialchars($_POST['otsikko']) : null;
	$teksti = isset($_POST['teksti']) ? htmlspecialchars($_POST['teksti']) : null;
	$kuva = isset($_POST['kuva']) ? filter_var(trim($_POST['kuva']), FILTER_SANITIZE_URL) : null;

	if (!$otsikko || !$teksti || !$kuva) {
		http_response_code(500);
		die("500: Internal Server Error");
	}

	$sql = "INSERT INTO koivu_referenssit (otsikko, teksti, kuva) VALUES (:otsikko, :teksti, :kuva)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['otsikko' => $otsikko, 'teksti' => $teksti, 'kuva' => $kuva]);

	if ($stmt->rowCount() == 1) {
		http_response_code(200);
		$response = [$id, $otsikko, $teksti, $kuva];
		die(json_encode($response));
	} else {
		http_response_code(400);
		die("400: No rows updated");
	}
}
?>