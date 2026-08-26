<?php
  $isLoggedIn = isset($_COOKIE['user_id']);
?>

<header class="u-clearfix u-header u-palette-3-dark-2 u-header" id="header">
    <div class="u-clearfix u-sheet u-valign-bottom-xl u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
        <a href="#" class="u-image u-logo u-image-1" data-image-width="150" data-image-height="121">
            <img src="src/images/H8F8L0rfW85PasFag9Hln1qm5leEjfwB9JAKJgHMdYqdLzu6EyA7JGXoyW171S6lPHQPYvLCSxABZNcKZErpmy2vuEgWIipEvxROVrMbw.jpeg" class="u-logo-image u-logo-image-1">
        </a>
        <p class="u-text u-text-default u-text-1">Állatok fórum</p>
        <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1" role="navigation" aria-label="Menu navigation">
            <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
                <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-hamburger-link u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#" tabindex="-1" aria-label="Open menu" aria-controls="45de">
                    <svg class="u-svg-link" viewBox="0 0 24 24"><use xlink:href="#menu-hamburger"></use></svg>
                    <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect></g></svg>
                </a>
            </div>
            <div class="u-custom-menu u-nav-container">
                <ul class="u-nav u-unstyled u-nav-1" role="menubar">
                    <li role="none" class="u-nav-item">
                        <a role="menuitem" class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base u-nav-link-2" href="./index.php">Főoldal</a>
                    </li>
                    <li role="none" class="u-nav-item">
                        <a role="menuitem" class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base u-nav-link-2" href="./allatok-lista-oldal.php">Állatokról</a>
                    </li>
                    <?php if ($isLoggedIn): ?>
                        <li role="none" class="u-nav-item">
                            <a role="menuitem" class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base u-nav-link-2" href="./allat-hozzaadasa.php">Állatok hozzáadása</a>
                        </li>
                        <li role="none" class="u-nav-item">
                            <a role="menuitem" class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base u-nav-link-2" href="./api/sign-out.php">Kijelentkezés</a>
                        </li>
                    <?php endif; ?>
                    <?php if (!$isLoggedIn): ?>
                        <li role="none" class="u-nav-item">
                            <a role="menuitem" class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base u-nav-link-2" href="./bejelentkezes-oldal.php">Bejelentkezés</a>
                        </li>
                        <li role="none" class="u-nav-item">
                            <a role="menuitem" class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base u-nav-link-2" href="./regisztracios-oldal.php">Regisztráció</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="u-custom-menu u-nav-container-collapse" id="45de" role="region" aria-label="Menu panel">
                <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                    <div class="u-inner-container-layout u-sidenav-overflow">
                        <div class="u-menu-close" tabindex="-1" aria-label="Close menu">
                            
                        </div>
                        <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2" role="menubar">
                            <li role="none" class="u-nav-item">
                                <a role="menuitem" class="u-button-style u-nav-link" href="./index.php">Főoldal</a>
                            </li>
                            <li role="none" class="u-nav-item">
                                <a role="menuitem" class="u-button-style u-nav-link" href="./allatok-lista-oldal.php">Állatokról</a>
                            </li>
                            <?php if ($isLoggedIn): ?>
                                <li role="none" class="u-nav-item">
                                    <a role="menuitem" class="u-button-style u-nav-link" href="./allat-hozzaadasa.php">Állatok hozzáadása</a>
                                </li>
                                <li role="none" class="u-nav-item">
                                    <a role="menuitem" class="u-button-style u-nav-link" href="./api/sign-out.php">Kijelentkezés</a>
                                </li>
                            <?php endif; ?>
                            <?php if (!$isLoggedIn): ?>
                                <li role="none" class="u-nav-item">
                                    <a role="menuitem" class="u-button-style u-nav-link" href="./bejelentkezes-oldal.php">Bejelentkezés</a>
                                </li>
                                <li role="none" class="u-nav-item">
                                    <a role="menuitem" class="u-button-style u-nav-link" href="./regisztracios-oldal.php">Regisztráció</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
            </div>
        </nav>
    </div>
</header>