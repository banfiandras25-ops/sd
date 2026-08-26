<?php
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);

    $host = "localhost:3306";
    $user = "rh69626_admin";
    $pass = "admin222!!";
    $db = "rh69626_allatok";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Hiba: " . $conn->connect_error);
    }

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare(
        "SELECT id FROM felhasznalok WHERE emailcim = ? OR felhasznalonev = ?"
    );
    $stmt->bind_param("ss", $email, $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Ez a felhasználó már létezik!";
        exit();
    }

    $stmt = $conn->prepare(
        "INSERT INTO felhasznalok (felhasznalonev, emailcim, jelszo) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        echo "Sikeres regisztráció!";
    } else {
        echo "Hiba történt!";
    }

    $stmt->close();
    $conn->close();

    echo '
    <script>
        setTimeout(function() {
            window.location.href = "/";
        }, 3000);
    </script>
    ';
?>
