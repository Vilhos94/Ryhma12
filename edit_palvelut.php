<?php
session_start();

if (!isset($_SESSION['kayttajanimi']) || !isset($_SESSION['rooli']) || $_SESSION['rooli'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include 'db_pdo.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    die("ID not provided.");
}

try {
    $stmt = $pdo->prepare("SELECT * FROM koivu_palvelut WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        die("Content not found.");
    }
} catch (PDOException $e) {
    die("Error fetching content: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $otsikko = $_POST["otsikko"];
    $teksti = $_POST["teksti"];
    $kuva = $_POST["kuva"];


    $otsikko = htmlspecialchars(trim($otsikko));
    $teksti = trim($teksti);
    $teksti = str_replace(["\r\n", "\r"], "\n", $teksti);
    $kuva = empty(trim($kuva)) ? null : htmlspecialchars(trim($kuva));

    try {
        $sql = "UPDATE koivu_palvelut SET otsikko = :otsikko, teksti = :teksti, kuva = :kuva WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':otsikko', $otsikko, PDO::PARAM_STR);
        $stmt->bindParam(':teksti', $teksti, PDO::PARAM_STR);
        $stmt->bindParam(':kuva', $kuva, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: admin_suunnittelupalvelut.php");
        exit();

    } catch (PDOException $e) {
        echo "<p style='color: red;'>Error updating content: " . $e->getMessage() . "</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Content</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Muokkaa Sisältöä</h1>
    <form method="post">
        <div class="mb-3">
            <label for="otsikko" class="form-label">Otsikko:</label>
            <input type="text" class="form-control" id="otsikko" name="otsikko" value="<?php echo htmlspecialchars($row['otsikko']); ?>">
        </div>
        <div class="mb-3">
            <label for="teksti" class="form-label">Teksti:</label>
            <textarea class="form-control" id="teksti" name="teksti" rows="4"><?php echo htmlspecialchars($row['teksti']); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="kuva" class="form-label">Kuva URL (Ei Pakollinen):</label>
            <input type="text" class="form-control" id="kuva" name="kuva" value="<?php  $kuvaValue = ($row['kuva'] === null) ? '' : (string)$row['kuva']; echo htmlspecialchars($kuvaValue); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Päivitä</button>
        <a href="admin_suunnittelupalvelut.php" class="btn btn-secondary">Peruuta</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
