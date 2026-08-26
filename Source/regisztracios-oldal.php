<?php
    $pageTitle = 'Regisztráció';
    ob_start();
?>

<link rel="stylesheet" href="./src/css/Sign-In.css" media="screen">

<section class="u-clearfix u-section-1" id="block-1">
    <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-form u-form-1">
            <h2>Regisztráció</h2>
            <form 
                id="registerForm" 
                action="./api/register.php" 
                method="POST" 
                class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" 
                style="padding: 10px;"
            >
                <div class="u-form-group">
                    <label for="username" class="u-label">Felhasználónév</label>
                    <input type="text" name="username" autocomplete="username" class="u-input u-input-rectangle" placeholder="Felhasználónév" required />
                </div>
                <div class="u-form-group">
                    <label for="email-7e13" class="u-label">Email cím</label>
                    <input type="email" name="email" autocomplete="email" class="u-input u-input-rectangle" placeholder="Email cím" required />
                </div>
                <div class="u-form-group">
                    <label for="password" class="u-label">Jelszó</label>
                    <input type="password" name="password" autocomplete="password" class="u-input u-input-rectangle" placeholder="Jelszó" required />
                </div>
                <div class="u-form-group">
                    <label for="confirm" class="u-label">Jelszó megerősítése</label>
                    <input type="password" name="confirm" autocomplete="confirm-password" class="u-input u-input-rectangle" placeholder="Jelszó megerősítése" required />
                </div>

                <div class="u-align-left u-form-group u-form-submit">
                    <button type="submit" class="u-btn u-btn-submit u-button-style">Regisztráció</button>
                </div>

                <p class="error" id="errorMsg"></p>
            </form>
        </div>
    </div>
</section>

<script>
    document.getElementById("registerForm").addEventListener("submit", function(e) {
        const pass = document.querySelector("input[name='password']").value;
        const confirm = document.querySelector("input[name='confirm']").value;
        const error = document.getElementById("errorMsg");

        if(pass !== confirm) {
            e.preventDefault();
            error.textContent = "A jelszavak nem egyeznek!";
        }
    });
</script>

<?php
    $content = ob_get_clean();

    require './views/layout.php';
?>
