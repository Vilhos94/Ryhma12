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
	<!-- Header ja Navigointipalkki -->

	<?php include 'header.php'; ?>

	<main class="container-lg pt-5 px-md-5">
		<section class="row align-items-center">
			<!-- Kuvan paikka vasemmalla -->
			<figure class="col-md-6 text-center">
				<img src="images/koivuengineering.webp" alt="koivuengineering" class="img-fluid rounded">
				<figcaption class="image-caption mt-2">Rakennusinsinööri Koivu</figcaption>
			</figure>
			<!-- Oikealla tekstit -->
			<article class="col-md-6">
				<header>
					<h2 class="main-heading">Yrityksestä lyhyesti</h2>
					<h3 class="sub-heading">Henkilökuva</h3>
				</header>
				<p class="body-text">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. In bibendum euismod purus. Vivamus congue
					tortor non dui maximus sollicitudin.
					Mauris luctus luctus neque, eu tempus neque interdum quis testing.
				</p>
			</article>
		</section>
	</main>

	<?php include 'footer.php'; ?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>