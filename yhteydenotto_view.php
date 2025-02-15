<?php include "db_pdo.php";

try {
    // Fetch all records
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
    <title>Saapuneet Viestit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Saapuneet Viestit</h2>

        <table class="table table-bordered">
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

        <a href="admin.php" class="btn btn-secondary">Takaisin</a>
    </div>
</body>
</html>
