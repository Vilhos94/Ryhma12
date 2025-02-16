<?php
session_start();

if (!isset($_SESSION['kayttajanimi']) || !isset($_SESSION['rooli']) || $_SESSION['rooli'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = nl2br(htmlspecialchars($_POST["message"]));
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: info@osoite.fi" . "\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Viestisi on lähetetty!'); window.location.href='admin_yhteystiedot.php';</script>";
    } else {
        echo "<script>alert('Viestin lähetys epäonnistui.'); window.location.href='admin_yhteystiedot.php';</script>";
    }
}
?>
