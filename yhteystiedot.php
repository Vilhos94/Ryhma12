<!DOCTYPE html>
<html lang="fi">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Yhteystiedot | Insinööritoimisto Koivu Oy</title>
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

<body class="yhteytiedot-page">
	<!-- Header ja Navigointipalkki -->

	<?php include 'header.php'; ?>

	<main class="container-lg px-md-5">
		<section>
			<div class="container">
				<div class="row mt-5">
					<div class="col-12 col-md-6 mb-5">
						<div class="position-relative d-inline-block">
							<img src="images/headshot.webp" alt="headshot" class="img-fluid">
							<p class="position-absolute bottom-0 start-0 text-white bg-dark p-2">
								Supreme Leader: Matti Koivu
							</p>
						</div>
						<p class="mt-4">Puhelin:<br> 045 2341543</p>
						<p>Sähköposti:<br> <a href="mailto:info@osoite.fi">info@osoite.fi</a></p>
						<p>Postiosoite:<br> Hassuosoite 3 B, 33456 Kaupunki</p>
						<p>Y-tunnus: 1234567-8</p>
					</div>

					<div class="col-12 col-md-6 mb-5">
						<div class="card shadow-lg p-4">
							<h3 class="text-center mb-4">Ota yhteyttä</h3>
							<form action="submit.php" method="POST">
								<div class="mb-3">
									<label for="name" class="form-label">Nimi</label>
									<input type="text" class="form-control" id="name" name="name"
										placeholder="Etunimi Sukunimi" required>
								</div>
								<div class="mb-3">
									<label for="phone" class="form-label">Puhelinnumero</label>
									<input type="tel" class="form-control" id="phone" name="phone"
										placeholder="045 2341543" required>
								</div>
								<div class="mb-3">
									<label for="email" class="form-label">Sähköposti</label>
									<input type="email" class="form-control" id="email" name="email"
										placeholder="esimerkki@email.com" required>
								</div>
								<div class="mb-3">
									<label for="message" class="form-label">Viesti</label>
									<textarea class="form-control" id="message" name="message" rows="4"
										placeholder="Kirjoita viesti tähän..." required></textarea>
								</div>
								<button type="submit" class="btn btn-primary w-100">Lähetä</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

	<?php include 'footer.php'; ?>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>