<?php
    $pageTitle = "Állat hozzáadása";
    ob_start();
?> 

<section class="u-clearfix u-section-1" id="block-1">
    <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-form u-form-1">
            <form id="signInForm" action="./api/allat_feltoltes.php" method="POST" enctype="multipart/form-data" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" style="padding: 10px;">
                <div class="u-form-email u-form-group">
                    <label for="allat_neve" class="u-label">Név</label>
                    <input type="text" id="allat_neve" name="allat_neve" class="u-input u-input-rectangle" />
                </div>
                <div class="u-form-email u-form-group">
                    <label for="kep" class="u-label">Kép</label>
                    <input type="file" id="kep" name="kep" class="u-input u-input-rectangle" />
                </div>
                <div class="u-form-email u-form-group">
                    <label for="allat_szarmazasi_hely" class="u-label">Származási Hely</label>
                    <input type="text" id="allat_szarmazasi_hely" name="allat_szarmazasi_hely" class="u-input u-input-rectangle" />
                </div>
                <div class="u-form-email u-form-group">
                    <label for="osztaly" class="u-label">Főosztály</label>
                    <input type="text" id="osztaly" name="osztaly" class="u-input u-input-rectangle" />
                </div>
                <div class="u-form-email u-form-group">
                    <label for="torzs" class="u-label">Törzs</label>
                    <input type="text" id="torzs" name="torzs" class="u-input u-input-rectangle" />
                </div>
                <div class="u-form-email u-form-group">
                    <label for="atlag_eletkor" class="u-label">Átlag életkor</label>
                    <input type="text" id="atlag_eletkor" name="atlag_eletkor" class="u-input u-input-rectangle" />
                </div>
                <div class="u-form-email u-form-group">
                    <label for="atlag_suly" class="u-label">Átlag Súly</label>
                    <input type="text" id="atlag_suly" name="atlag_suly" class="u-input u-input-rectangle" />
                </div>
                <div class="u-form-email u-form-group">
                    <label for="atlag_meret" class="u-label">Átlag Méret</label>
                    <input type="text" id="atlag_meret" name="atlag_meret" class="u-input u-input-rectangle" />
                </div>
                <div class="u-form-email u-form-group">
                    <label for="leiras" class="u-label">Leiras</label>
                    <textarea rows="50" cols="100" id="leiras" name="leiras" class="u-input u-input-rectangle"></textarea>
                </div>
                <div class="u-form-email u-form-group">
                    <input type="hidden" id="szerkeszto_id" name="szerkeszto_id">
                    <script>
                        function getCookie(name) {
                            return document.cookie.split('; ').find(row => row.startsWith(name + '='))?.split('=')[1] || '';
                        }
                        document.getElementById('szerkeszto_id').value = decodeURIComponent(getCookie('user_id'));
                    </script>
                </div>
                <div class="u-align-left u-form-group u-form-submit">
                    <button type="submit" class="u-btn u-btn-submit u-button-style">Feltöltés</button>
                </div>
            </form>
        </div>
    </div>
</section> 

<?php
    $content = ob_get_clean();

    require "./views/layout.php";
?>
