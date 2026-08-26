<?php

// declare(strict_types=1);

function render(string $view, array $data = []): void
{
    $viewPath = "./views/" . $view . ".php";

    extract($data);

    ob_start();
    require $viewPath;
    $content = ob_get_clean();

    require "./views/layout.php";
}
