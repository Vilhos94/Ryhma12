<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$kayttajanimi = $_POST['kayttajanimi'];
	$salasana = $_POST['salasana'];

	$stmt = $conn->prepare("SELECT id, salasana, rooli FROM kayttajat WHERE kayttajanimi = ?");
	$stmt->bind_param("s", $kayttajanimi);
	$stmt->execute();
	$stmt->store_result();

	$msg = "";

	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $hashed_password, $rooli);
		$stmt->fetch();

		if (password_verify($salasana, $hashed_password)) {
			$_SESSION['kayttajanimi'] = $kayttajanimi;
			$_SESSION['rooli'] = $rooli;

			if ($rooli === 'admin') {
				header("Location: admin.php");
				exit();
			} else {
				$msg = "Sinulla ei ole oikeuksia päästä admin-paneeliin.";
			}
		} else {
			$msg = "Väärä käyttäjänimi tai salasana.";
		}
	} else {
		$msg = "Käyttäjää ei löydy.";
	}

	$stmt->close();
	$conn->close();
}
?>

<!DOCTYPE html>
<html lang="fi">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Insinööritoimisto Koivu Oy</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Roboto font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900" rel="stylesheet">

	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
	<link rel="manifest" href="site.webmanifest">

	<link rel="stylesheet" href="henri.css">
	<link rel="stylesheet" href="ville.css">
	<link rel="stylesheet" href="nico.css">
</head>

<body>

	<?php include 'header.php'; ?>

	<main class="container-lg pt-5 px-md-5 roboto">
		<p><?= $msg ?></p>
		<p><a href='login.php'>Takaisin</a></p>
	</main>
</body>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>