<?php
    $pageTitle = "Állat adatlap";
    ob_start();

    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);

    $host = "localhost:3306";
    $user = "rh69626_admin";
    $pass = "admin222!!";
    $db = "rh69626_allatok";

    try {
        $pdo = new PDO(
            "mysql:host=$host;dbname=$db;charset=utf8mb4",
            $user,
            $pass,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]
        );
    } catch (PDOException $e) {
        die("DB connection failed: " . $e->getMessage());
    }

    $allat_webnev = $_GET["id"] ?? null;

    $stmt = $pdo->prepare("
        SELECT
            webnev,
            nev,
            szarmazasi_hely,
            foosztaly,
            torzs,
            atlag_suly,
            atlag_eletkor,
            atlag_meret,
            leiras,
            kep,
            kep_mime,
            szerkeszto_id
        FROM allatok
        WHERE webnev = :allat_webnev
    ");

    $stmt->execute([
        "allat_webnev" => $allat_webnev,
    ]);

    $allat = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$allat) {
        http_response_code(404);
        die("Animal not found.");
    }
?>
<section class="u-align-center u-clearfix u-section-1" id="block-2">
    <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
        <div class="u-container-style u-expanded-width u-post-details u-post-details-1">
            <div class="u-container-layout u-valign-middle u-container-layout-1">
                <img 
                    class="u-blog-control u-expanded-width u-image u-image-default u-image-1" 
                    src="data:<?= $allat["kep_mime"] ?>;base64,<?= base64_encode($allat["kep"]) ?>"
                    alt="<?= htmlspecialchars($allat["nev"]) ?>"
                >
                <h2 class="u-blog-control u-text u-text-1"> <?= htmlspecialchars($allat["nev"]) ?></h2>
                <div>
                    <Table>
                        <tr>
                            <th>Származási Hely</th>
                            <td> <?= htmlspecialchars($allat["szarmazasi_hely"]) ?> </td>
                        </tr>
                        <tr>
                            <th>Főosztály</th>
                            <td> <?= htmlspecialchars($allat["foosztaly"]) ?> </td>
                        </tr>
                        <tr>
                            <th>Törzs</th>
                            <td> <?= htmlspecialchars($allat["torzs"]) ?> </td>
                        </tr>
                        <tr>
                            <th>Átlag életkor</th>
                            <td> <?= htmlspecialchars($allat["atlag_suly"]) ?> </td>
                        </tr>
                        <tr>
                            <th>Súly Átlag</th>
                            <td> <?= htmlspecialchars($allat["atlag_eletkor"]) ?> </td>
                        </tr>
                        <tr>
                            <th>Átlag méret</th>
                            <td> <?= htmlspecialchars($allat["atlag_meret"]) ?> </td>
                        </tr>
                    </Table>
                </div>
                <div class="u-align-justify u-blog-control u-post-content u-text u-text-2 fr-view">
                    <p> <?= htmlspecialchars($allat["leiras"]) ?> </p>
                </div>
            </div>
        </div>
    </div>
</section> 

<?php
    $content = ob_get_clean();

    require "./views/layout.php";
?>
