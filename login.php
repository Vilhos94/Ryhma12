<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin kirjautuminen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="container text-center">
        <h2>Admin kirjautuminen</h2>
        <form action="process_login.php" method="post">
            <div class="mb-3">
                <label for="kayttajanimi" class="form-label">Käyttäjänimi:</label>
                <input type="text" class="form-control" name="kayttajanimi" required>
            </div>
            <div class="mb-3">
                <label for="salasana" class="form-label">Salasana:</label>
                <input type="password" class="form-control" name="salasana" required>
            </div>
            <button type="submit" class="btn btn-primary">Kirjaudu sisään</button>
        </form>
    </div>
</body>
</html>
