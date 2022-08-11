<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Ecommerce</title>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/styles/app.css"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open();?>
    <button onclick="dark_mode()">dark</button>
