<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(''); ?></title>
    <?php wp_head()?>
</head>
<body>
<div class="site-container">
    <div class="site-pusher">
        <header>
            <a href="https://www.aqua-plaisir.fr/" class="logo-header-desktop">
                <img class="logo-default-header" src="../wp-content/themes/aquaplaisir/assets/img/logo-aquaplaisir.png">
            </a>
            <div class="container-menus">
                <?php
                    wp_nav_menu(['theme_location' => 'header']);
                    wp_nav_menu(['theme_location' => 'header-secondary']);
                ?>
            </div>
            <div class="container-logo-mobile">
                <a class="logo-menu-mobile" id="header-icon">
                    <img class="menu-mobile" href="#" src="../wp-content/themes/aquaplaisir/assets/icons/icon-menu-mobile.svg">
                </a>
            </div>

                <?php
                    wp_nav_menu(['theme_location' => 'header-mobile'])
                ?>

        </header>
        <div class="site-content">