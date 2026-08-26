<?php
    $pageTitle = "Állatok listája";
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

    $stmt = $pdo->query(
        "SELECT webnev, nev, szarmazasi_hely, foosztaly, torzs, atlag_suly, atlag_eletkor, leiras, kep, kep_mime, atlag_meret, szerkeszto_id FROM allatok ORDER BY webnev"
    );

    $allatok = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<section class="u-clearfix u-container-align-center u-palette-5-base u-section-1" id="block-1">
    <div class="u-clearfix u-sheet u-sheet-1">
        <img 
            class="u-image u-image-default u-image-1" 
            src="src/images/b677671301af5d72681758afd82aef321c9ff57a4472173a3696104d5d85cb27f73095cd94c2f39a622eae5edfe8e1d76202026b6be0270bf210c5_1280.jpg" 
            alt="" 
            data-image-width="1280" 
            data-image-height="851"
        />
    </div>
</section>
<section class="u-clearfix u-container-align-center u-palette-5-base u-section-2" id="block-3" style="padding-bottom: 20px;">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div>
            <div class="u-repeater u-repeater-1"> 
                <?php foreach ($allatok as $allat): ?> 
                    <div class="u-blog-post u-container-style u-repeater-item u-white u-repeater-item-1">
                        <div class="u-container-layout u-similar-container u-valign-top-xl u-container-layout-1">
                            <img 
                                class="u-blog-control u-expanded-width u-image u-image-default u-image-1" 
                                src="data:<?= $allat["kep_mime"] ?>;base64, <?= base64_encode($allat["kep"]) ?>"
                                alt="<?= htmlspecialchars($allat["nev"]) ?>"
                            >
                            <h4 class="u-blog-control u-text u-text-1">
                                <a class="u-post-header-link" href="blog/vörös-róka.html">
                                    <?= htmlspecialchars($allat["nev"]) ?>
                                </a>
                            </h4>
                            <div class="u-blog-control u-post-content u-text u-text-2 fr-view">
                                <?= htmlspecialchars(
                                    mb_strlen($allat["leiras"]) > 150
                                        ? mb_substr($allat["leiras"], 0, 150) . "..."
                                        : $allat["leiras"]
                                ) ?> 
                            </div>
                            <a 
                                href="allat-info.php?id=<?= htmlspecialchars($allat["webnev"]) ?>"
                                class="u-blog-control u-border-2 u-border-active-palette-1-dark-1 u-border-hover-palette-1-dark-1 u-border-no-left u-border-no-right u-border-no-top u-border-palette-1-base u-btn u-btn-rectangle u-button-style u-none u-btn-1"
                            >Olvass Tovább</a>
                        </div>
                    </div>
                <?php endforeach; ?> 
            </div>
        </div>
    </div>
</section> 

<?php
    $content = ob_get_clean();

    require "./views/layout.php";
?>
