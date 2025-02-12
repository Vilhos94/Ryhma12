<?php
require("db_pdo.php");
?>

<!DOCTYPE html>
<html lang="fi">
<html lang="fi">

</html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Referenssit | Insinööritoimisto Koivu Oy</title>
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
						<li class="nav-item</li>">
							<a class="nav-link" href="suunnittelupalvelut.html">Suunnittelupalvelut</a>
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
	<main class="container-lg py-5 px-md-5">
		<h2 class="mb-4">Referenssit</h2>

		<?php
		$sql = "SELECT * FROM koivu_referenssit";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$references = $stmt->fetchAll();

		$referencesCount = count($references, 0);


		foreach ($references as $key => $reference) {
			?>
			<section>
				<div class="row">
					<div class="col-md roboto">
						<h3><?= $reference["otsikko"] ?></h3>
						<p><?= $reference["teksti"] ?></p>
					</div>
					<div class="col-md">
						<img src="<?= $reference["kuva"] ?>" class="img-fluid" alt="referenssikuva">
					</div>
				</div>
				<?php if ($key < $referencesCount - 1) {
					echo "<hr>";
				} ?>
			</section><?php }
		?>
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