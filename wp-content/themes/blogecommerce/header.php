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
        <header class="header switch__dark-mode">
            <ion-icon onclick="display_menu()" id="btn_menu" class="header__icon--left header__icon" name="menu-outline"></ion-icon>
            <?php display_menu('primary-menu', 'header__menu') ?>
            <?php display_logo('header__logo'); ?>
            <div class="header__icon--right header__icon">
                <ion-icon onclick="searchBtn()" name="search-outline"></ion-icon>
                <a href="/cart" data-cart="<?php echo get_cart_quantity(); ?>" class="header__icon--right__cart"><ion-icon name="bag-outline"></ion-icon></a>
                <span id="switch__icon">
                    <ion-icon name="moon-outline" onclick="dark_mode()" title="Turn on dark mode"></ion-icon>
                </span>
            </div>
            <form action="<?php echo home_url(); ?>" method="GET" class="search--global" id="search_global" role="search">
                <div class="search--global__group__input">
                    <ion-icon class="search--global__group__input__icon" name="search-outline"></ion-icon>
                    <input type="text" placeholder="Search..." name="s" value="<?php echo get_search_query(); ?>" class="search--global__group__input__field">
                </div>
                <input type="submit" class="search--global__button" value="Search"/>
            </form>
        </header>

        <?php wp_body_open(); ?>