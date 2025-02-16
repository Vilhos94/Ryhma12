<?php 
session_start();

if (!isset($_SESSION['kayttajanimi']) || !isset($_SESSION['rooli']) || $_SESSION['rooli'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include "db_pdo.php";

try {
    $sql = "SELECT id, nimi, puhnum, email, viesti, submitted_at FROM koivu_yhtott ORDER BY submitted_at DESC";
    $stmt = $pdo->query($sql);
    $messages = $stmt->fetchAll();

} catch (PDOException $e) {
    die("Tietokantavirhe: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Saapuneet viestit | Insinööritoimisto Koivu Oy</title>
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

<body>
    <?php include './header_admin.php'; ?>

    <div class="d-flex flex-column min-vh-100">
        <div class="container mt-5 mb-5 flex-grow-1">
            <h2 class="mb-4">Saapuneet Viestit</h2>

            <table class='table table-striped'>
                <thead class="table-dark">
                    <tr>
                        <th>Nimi</th>
                        <th>Puhelin</th>
                        <th>Sähköposti</th>
                        <th>Viesti</th>
                        <th>Päivämäärä</th>
                        <th>Toiminnot</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages as $msg): ?>
                    <tr>
                        <td><?= htmlspecialchars($msg["nimi"]) ?></td>
                        <td><?= htmlspecialchars($msg["puhnum"]) ?></td>
                        <td><?= htmlspecialchars($msg["email"]) ?></td>
                        <td><?= nl2br(htmlspecialchars($msg["viesti"])) ?></td>
                        <td><?= htmlspecialchars($msg["submitted_at"]) ?></td>
                        <td>
                            <a href="reply.php?email=<?= urlencode($msg['email']) ?>&nimi=<?= urlencode($msg['nimi']) ?>" class="btn btn-primary btn-sm">Vastaa</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="admin.php" class="btn btn-secondary mb-5">Takaisin</a>
        </div>

    <?php include 'footer.php'; ?>
    </div>
</body>


</html>
