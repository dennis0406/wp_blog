<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/styles/app.css" />
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <?php wp_head(); ?>
</head>

<body class="switch__dark-mode" <?php body_class(); ?>>
    <div class="container">
        <header class="header">
            <ion-icon onclick="display_menu()" id="btn_menu" class="header__icon--left header__icon" name="menu-outline"></ion-icon>
            <?php display_menu('primary-menu', 'header__menu') ?>
            <?php display_logo(); ?>
            <div class="header__icon--right header__icon">
                <ion-icon name="search-outline"></ion-icon>
                <ion-icon name="bag-outline"></ion-icon>
                <span id="switch__icon">
                    <ion-icon name="moon-outline" onclick="dark_mode()"></ion-icon>
                </span>
            </div>
        </header>
        <?php wp_body_open(); ?>
        