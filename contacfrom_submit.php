<?php include "db_pdo.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = htmlspecialchars($_POST["name"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST["message"]);

    // 2. Validate required fields
    if (empty($name) || empty($phone) || empty($email) || empty($message)) {
        die("Kaikki kentät ovat pakollisia!");
    }

    try {
        $pdo = new PDO("mysql:host=$palvelin;dbname=$tietokanta", $kayttajatunnus, $salasana);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES 'utf8';");

        }
    catch(PDOException $e)
        {
        echo "<p>Yhteys epäonnistui</p><p>" . $e->getMessage() . "</p>";
        }

    // 4. Check connection
    if ($conn->connect_error) {
        die("Yhteys epäonnistui: " . $conn->connect_error);
    }

    // 5. Prepare and execute SQL query
    $stmt = $conn->prepare("INSERT INTO koivu_yhtott (name, phone, email, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $phone, $email, $message);

    if ($stmt->execute()) {
        echo "Viesti lähetetty onnistuneesti!";
    } else {
        echo "Virhe tallennuksessa: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

