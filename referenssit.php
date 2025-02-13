<?php
require("db_pdo.php");
?>

<!DOCTYPE html>
<html lang="fi">

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

	<?php include 'header.php'; ?>

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

	<?php include 'footer.php'; ?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>