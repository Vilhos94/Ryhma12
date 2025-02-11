<?php
session_start();
if (!isset($_SESSION['kayttajanimi']) || $_SESSION['rooli'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Admin Paneeli</title>
</head>
<body>
    <h2>Tervetuloa, Admin!</h2>
    <p><a href="logout.php">Kirjaudu ulos</a></p>
</body>
</html>
