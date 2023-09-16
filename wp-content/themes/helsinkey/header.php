<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="bg-helsinkey-blue text-white shadow-header-shadow">
    <div class="container mx-auto flex justify-between items-center py-4">
        <div class="text-2xl font-semibold">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-white">Helsinkey</a>
        </div>

        <nav>
            <?php wp_nav_menu( array(
                'theme_location' => 'header-menu',
                'container_class' => 'header-menu-container flex',
                'menu_class' => 'flex space-x-4',
                'walker' => new Tailwind_Navwalker()
            )); ?>
        </nav>

        <div >
            <a href="<?php echo wp_login_url(); ?>" class="text-sm px-3">Kirjaudu</a> | 
            <a href="<?php echo wp_registration_url(); ?>" class="text-sm px-3">Rekisteröidy</a>
        </div>
    </div>
</header>
