<?php
    include "db_pdo.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $nimi = htmlspecialchars($_POST["name"]);
        $puhnum = htmlspecialchars($_POST["phone"]);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $viesti = htmlspecialchars($_POST["message"]);

    
        if (empty($nimi) || empty($puhnum) || empty($email) || empty($viesti)) {
            die("Kaikki kentät ovat pakollisia!");
    }

    
        $sql = "INSERT INTO koivu_yhtott (nimi, puhnum, email, viesti) VALUES (:nimi, :puhnum, :email, :viesti)";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":nimi" => $nimi,
            ":puhnum" => $puhnum,
            ":email" => $email,
            ":viesti" => $viesti
        ]);

        echo "Viesti lähetetty onnistuneesti!";

    } catch (PDOException $e) {
        echo "Virhe tallennuksessa: " . $e->getMessage();
    }
}
?>

