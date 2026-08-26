<?php
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);

    $host = "localhost:3306";
    $user = "rh69626_admin";
    $pass = "admin222!!";
    $db = "rh69626_allatok";

    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    $allat_neve = $_POST["allat_neve"];

    $webnev = trim($allat_neve);
    $webnev = iconv("UTF-8", "ASCII//TRANSLIT", $webnev);
    $webnev = strtolower($webnev);
    $webnev = preg_replace("/\s+/", "-", $webnev); // Any whitespace -> single dash
    $webnev = preg_replace("/[^a-z0-9-]/", "", $webnev); // Remove other characters

    $szarmazasi_hely = $_POST["allat_szarmazasi_hely"];
    $foosztaly = $_POST["osztaly"];
    $torzs = $_POST["torzs"];
    $atlag_eletkor = $_POST["atlag_eletkor"];
    $atlag_suly = $_POST["atlag_suly"];
    $atlag_meret = $_POST["atlag_meret"];
    $leiras = $_POST["leiras"];
    $szerkeszto_id = $_POST["szerkeszto_id"];

    $kep = $_FILES["kep"];

    if (!isset($_FILES["kep"]) || $_FILES["kep"]["error"] !== UPLOAD_ERR_OK) {
        exit("Kép feltöltése sikertelen!");
    }

    $mime_tipus = mime_content_type($kep["tmp_name"]);

    $engedelyezett_tipus = ["image/jpeg", "image/png", "image/webp"];

    if (!in_array($mime_tipus, $engedelyezett_tipus, true)) {
        exit("Csak a JPEG, PNG és WebP kép fájlok engedélyezettek.");
    }

    $kep_adat = file_get_contents($kep["tmp_name"]);

    if ($kep_adat === false) {
        exit("Nem sikerült feltölteni a képet.");
    }

    $stmt = $pdo->prepare(
        'INSERT INTO allatok (webnev, nev, szarmazasi_hely, foosztaly, torzs, atlag_suly, atlag_eletkor, leiras, kep, kep_mime, atlag_meret, szerkeszto_id)
        VALUES (:webnev, :nev, :szarmazasi_hely, :foosztaly, :torzs, :atlag_suly, :atlag_eletkor, :leiras, :kep, :kep_mime, :atlag_meret, :szerkeszto_id)'
    );

    $stmt->bindValue(":webnev", $webnev);
    $stmt->bindValue(":nev", $allat_neve);
    $stmt->bindValue(":szarmazasi_hely", $szarmazasi_hely);
    $stmt->bindValue(":foosztaly", $foosztaly);
    $stmt->bindValue(":torzs", $torzs);
    $stmt->bindValue(":atlag_suly", $atlag_suly);
    $stmt->bindValue(":atlag_eletkor", $atlag_eletkor);
    $stmt->bindValue(":leiras", $leiras);
    $stmt->bindValue(":atlag_meret", $atlag_meret);
    $stmt->bindValue(":szerkeszto_id", $szerkeszto_id);
    $stmt->bindValue(":kep_mime", $mime_tipus);
    $stmt->bindValue(":kep", $kep_adat, PDO::PARAM_LOB);

    if ($stmt->execute()) {
        echo "Sikeres Feltöltés!";
    } else {
        echo "Hiba történt!";
    }

    echo '
            <script>
                    window.location.href = "/";
            </script>
            ';

?>