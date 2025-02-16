<?php
if (isset($_GET['email']) && isset($_GET['nimi'])) {
    $email = urldecode($_GET['email']);
    $nimi = urldecode($_GET['nimi']);
} else {
    die("Virhe: Ei sähköpostiosoitetta.");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Suunnittelupalvelut | Insinööritoimisto Koivu Oy</title>
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

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="d-flex flex-column min-vh-100">
<?php include './header_admin.php'; ?>
    <div class="container mt-5 flex-grow-1 mb-5">
        <h2 class="mb-5">Vastaa käyttäjälle: <?= htmlspecialchars($nimi) ?></h2>

        <form action="send_email.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Vastaanottaja</label>
                <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($email) ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Aihe</label>
                <input type="text" class="form-control" name="subject" placeholder="Vastauksesi aihe" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Viesti</label>
                <textarea class="form-control" name="message" rows="10" placeholder="Kirjoita viesti..." required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Lähetä vastaus</button>
            <a href="admin_yhteystiedot.php" class="btn btn-secondary">Peruuta</a>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
