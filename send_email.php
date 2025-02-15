<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = nl2br(htmlspecialchars($_POST["message"]));
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: info@osoite.fi" . "\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Viestisi on lähetetty!'); window.location.href='yhteydenotto_view.php';</script>";
    } else {
        echo "<script>alert('Viestin lähetys epäonnistui.'); window.location.href='yhteydenotto_view.php';</script>";
    }
}
?>
