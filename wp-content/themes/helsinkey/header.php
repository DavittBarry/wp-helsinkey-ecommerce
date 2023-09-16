<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="container mx-auto flex justify-between items-center">
        <div class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Helsinkey</a>
        </div>

        <nav class="main-navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
        </nav>

        <div class="account-navigation">
            <a href="<?php echo wp_login_url(); ?>">Kirjaudu</a> | 
            <a href="<?php echo wp_registration_url(); ?>">Rekisteröidy</a>
        </div>
    </div>
</header>
