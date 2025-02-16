<?php
session_start();

if (!isset($_SESSION['kayttajanimi']) || !isset($_SESSION['rooli']) || $_SESSION['rooli'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include 'db_pdo.php';
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

    <div class="container flex-grow-1">
        <h1 class="mt-5 mb-5">Sisällönhallinta</h1>
        <?php
        try {
            $stmt = $pdo->query("SELECT * FROM koivu_palvelut");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($results) {
                echo "<table class='table table-striped'>";
                echo "<thead class='table-dark'><tr><th>Tunniste ID</th><th>Otsikko</th><th>Teksti</th><th>Kuva</th><th>Actions</th></tr></thead>";
                echo "<tbody>";
                foreach ($results as $row) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['section_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['otsikko']) . "</td>";
                    echo "<td>" . htmlspecialchars(substr($row['teksti'], 0, 50)) . "...</td>";
                    $kuvaValue = ($row['kuva'] === null) ? '' : (string)$row['kuva'];
                    echo "<td>" . htmlspecialchars($kuvaValue) . "</td>";
                    echo "<td><a href='edit_palvelut.php?id=" . htmlspecialchars($row['id']) . "' class='btn btn-sm btn-primary'>Muokkaa</a></td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p>No content found.</p>";
            }
        } catch (PDOException $e) {
            echo "<p>Error fetching content: " . $e->getMessage() . "</p>";
        }
        ?>
                <a href="admin.php" class="btn btn-secondary mb-5">Takaisin</a>
    </div>
    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
