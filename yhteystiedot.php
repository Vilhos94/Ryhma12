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
	<header class="hero-header">
		<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
			<div class="container-fluid">
				<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
					data-bs-target=".navbarToggle">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-end navbarToggle">
					<ul class="navbar-nav">
						<li class="nav-item"><a class="nav-link" href="index.php">Etusivu</a></li>
						<li class="nav-item"><a class="nav-link" href="index.php#yritys">Yritys</a></li>
						<li class="nav-item">
							<a class="nav-link" href="suunnittelupalvelut.php">Suunnittelupalvelut</a>
						</li>
						<li class="nav-item"><a class="nav-link" href="referenssit.php">Referenssit</a></li>
						<li class="nav-item"><a class="nav-link" href="yhteystiedot.php">Yhteystiedot</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="overlay">
			<div class="container text-center navbarToggle show">
				<h1 class="fw-bold text-white">Insinööritoimisto Koivu Oy</h1>
				<p class="text-light">Talosuunnittelupalvelua</p>
			</div>
		</div>
	</header>
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
	<footer>
		<div class="container-md py-3 roboto">
			<div class="row">
				<div class="col-sm-4">
					<div class="footer-column-wrapper">
						<span class="text-uppercase roboto-500">
							Insinööritoimisto Koivu Oy
						</span>
						<hr>
						<p>Hassuosoite 3 B, 33456 Kaupunki<br>
							<a href="#">Rekisteriseloite</a>
						</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="footer-column-wrapper">
						<span class="text-uppercase roboto-500">
							<a href="suunnittelupalvelut.php" class="no-underline">Palvelut</a>
						</span>
						<hr>
						<p><a href="suunnittelupalvelut.php">ARK rakennussuunnittelu<br>
								RAK rakennessuunnittelu<br>
								ELE elementtisuunnittelu<br>
								ENE energiasuunnittelu</a></p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="footer-column-wrapper">
						<span class="text-uppercase roboto-500">
							<a href="yhteystiedot.php" class="no-underline">Ota yhteyttä</a>
						</span>
						<hr>
						<p>
							045 2341543<br>
							<a href="mailto:info@osoite.fi">info@osoite.fi</a><br>
							<a href="yhteystiedot.php">Yhteydenottolomake<br></a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid px-0 py-2 copyright roboto">
			<a href="index.php" class="no-underline"><span>© 2025 Insinööritoimisto Koivu Oy</span></a>
		</div>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>