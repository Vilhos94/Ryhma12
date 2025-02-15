<?php
if (isset($_GET['email']) && isset($_GET['nimi'])) {
    $email = urldecode($_GET['email']);
    $nimi = urldecode($_GET['nimi']);
} else {
    die("Virhe: Ei sähköpostiosoitetta.");
}
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vastaa Viestiin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Vastaa käyttäjälle: <?= htmlspecialchars($nimi) ?></h2>

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
                <textarea class="form-control" name="message" rows="5" placeholder="Kirjoita viesti..." required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Lähetä vastaus</button>
            <a href="yhteydenotto_view.php" class="btn btn-secondary">Peruuta</a>
        </form>
    </div>
</body>
</html>