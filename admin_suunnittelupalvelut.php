<?php
session_start();

if (!isset($_SESSION['kayttajanimi']) || !isset($_SESSION['rooli']) || $_SESSION['rooli'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include 'db_pdo.php'; // Include database connection
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Manage Content</h1>
    <?php
    try {
        $stmt = $pdo->query("SELECT * FROM koivu_palvelut");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($results) {
            echo "<table class='table table-striped'>";
            echo "<thead><tr><th>ID</th><th>Section ID</th><th>Otsikko</th><th>Teksti</th><th>Kuva</th><th>Actions</th></tr></thead>";
            echo "<tbody>";
            foreach ($results as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['section_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['otsikko']) . "</td>";
                echo "<td>" . htmlspecialchars(substr($row['teksti'], 0, 50)) . "...</td>"; // Display a snippet
                $kuvaValue = ($row['kuva'] === null) ? '' : (string)$row['kuva'];
                echo "<td>" . htmlspecialchars($kuvaValue) . "</td>";
                echo "<td><a href='edit_palvelut.php?id=" . htmlspecialchars($row['id']) . "' class='btn btn-sm btn-warning'>Edit</a></td>";
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
            <a href="admin.php" class="btn btn-secondary">Takaisin</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>