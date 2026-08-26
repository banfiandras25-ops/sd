<?php
    $pageTitle = 'Bejelentkezés';
    ob_start();
?>

<link rel="stylesheet" href="./src/css/Sign-In.css" media="screen">

<section class="u-clearfix u-section-1" id="block-1">
    <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-form u-form-1">
            <form 
                id="signInForm"
                action="./api/sign-in.php"
                method="POST" 
                class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form u-form-custom-backend" 
                style="padding: 10px;"
            >
                <div class="u-form-email u-form-group">
                    <label for="email" class="u-label">Email</label>
                    <input type="email" placeholder="Írd be az email címed" id="email" name="email" autocomplete="email" class="u-input u-input-rectangle" />
                </div>
                <div class="u-form-group u-form-name">
                    <label for="name" class="u-label">Jelszó</label>
                    <input type="password" placeholder="Írd be a jelszavad" id="name" name="password" autocomplete="password" class="u-input u-input-rectangle" />
                </div>
                <div class="u-align-left u-form-group u-form-submit">
                    <button type="submit" class="u-btn u-btn-submit u-button-style">Belépés</button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php

$content = ob_get_clean();

require './views/layout.php';
?>
