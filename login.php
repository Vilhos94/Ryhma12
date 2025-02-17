<?php
session_start();
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
		<div class="container text-center">
			<h2>Admin kirjautuminen</h2>
			<form action="process_login.php" method="post">
				<div class="mb-3">
					<label for="kayttajanimi" class="form-label">Käyttäjänimi:</label>
					<input type="text" class="form-control" name="kayttajanimi" required>
				</div>
				<div class="mb-3">
					<label for="salasana" class="form-label">Salasana:</label>
					<input type="password" class="form-control" name="salasana" required>
				</div>
				<button type="submit" class="btn btn-primary">Kirjaudu sisään</button>
			</form>
		</div>
	</main>
</body>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>