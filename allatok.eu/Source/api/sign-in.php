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

    $email = $_POST["email"];
    $password = $_POST["password"];

    /*
        Find user by email
    */
    $stmt = $conn->prepare("
        SELECT id, felhasznalonev, emailcim, jelszo, is_admin
        FROM felhasznalok
        WHERE emailcim = ?
    ");

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        /*
            Plain text password check
        */
        if ($password === $user["jelszo"]) {
            // COOKIES (30 days)
            setcookie("user_id", $user["id"], time() + 86400 * 30, "/");

            setcookie(
                "username",
                $user["felhasznalonev"],
                time() + 86400 * 30,
                "/"
            );

            setcookie("email", $user["emailcim"], time() + 86400 * 30, "/");

            setcookie("is_admin", $user["is_admin"], time() + 86400 * 30, "/");

            echo "Sikeres bejelentkezés!";

            echo '
            <script>
                setTimeout(function() {
                    window.location.href = "/";
                }, 0);
            </script>
            ';
        } else {
            echo "Hibás jelszó!";
        }
    } else {
        echo "Nincs ilyen email cím!";
    }

    $stmt->close();
    $conn->close();

?>
