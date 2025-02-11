<?php
session_start();
include "db.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kayttajanimi = $_POST['kayttajanimi'];
    $salasana = $_POST['salasana'];

    $stmt = $conn->prepare("SELECT id, salasana, rooli FROM kayttajat WHERE kayttajanimi = ?");
    $stmt->bind_param("s", $kayttajanimi);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password, $rooli);
        $stmt->fetch();

        if (password_verify($salasana, $hashed_password)) {
            $_SESSION['kayttajanimi'] = $kayttajanimi;
            $_SESSION['rooli'] = $rooli;

            if ($rooli === 'admin') {
                header("Location: admin.php"); 
                exit();
            } else {
                echo "Sinulla ei ole oikeuksia päästä admin-paneeliin.";
            }
        } else {
            echo "Väärä käyttäjänimi tai salasana.";
        }
    } else {
        echo "Käyttäjää ei löydy.";
    }
    $stmt->close();
    $conn->close();
}
?>
