<?php
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);

    setcookie("user_id", "", time() - 3600, "/");
    setcookie("username", "", time() - 3600, "/");
    setcookie("email", "", time() - 3600, "/");
    setcookie("is_admin", "", time() - 3600, "/");

    echo '
        <script>
            setTimeout(function() {
                window.location.href = "/";
            }, 0);
        </script>
    ';
?>
