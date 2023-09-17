<!DOCTYPE html>
<html lang="fi">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>
<body <?php body_class('bg-background text-text'); ?>>

<header class="bg-helsinkey-blue shadow-header-shadow">
    <div class="container mx-auto flex flex-wrap items-center justify-between py-4">
        <div class="text-lg md:text-2xl font-semibold flex-grow">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="text">Helsinkey</a>
        </div>

        <!-- Desktop & Tablet Menu -->
        <nav class="hidden md:flex space-x-4 flex-grow">
            <?php wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'container_class' => 'header-menu-container',
                'menu_class' => 'flex space-x-4'
            )); ?>
        </nav>

        <!-- Login/Register for Desktop & Tablet -->
        <div class="hidden md:flex text-base md:text-lg">
            <a href="<?php echo wp_login_url(); ?>" class="px-3">Kirjaudu</a> |
            <a href="<?php echo wp_registration_url(); ?>" class="px-3">Rekisteröidy</a>
        </div>

        <!-- Mobile View -->
        <div x-data="{ open: false }" class="md:hidden flex items-center flex-grow justify-between relative">

        <!-- Mobile Hamburger Menu -->
        <button @click="open = !open" class="ml-auto p-2">
            <div x-show="!open" class="text-2xl">☰</div>
            <div x-show="open" class="text-2xl">✖</div>
        </button>
        
    <!-- Mobile Menu -->
    <nav x-show="open" x-cloak class="absolute w-full top-16 left-0 z-50 flex flex-col space-y-2 bg-helsinkey-blue">
        <?php wp_nav_menu(array(
            'theme_location' => 'header-menu',
            'container_class' => 'header-menu-container',
            'menu_class' => 'flex flex-col space-y-2 p-4'
        )); ?>
        <div class="text text-lg p-4">
            <a href="<?php echo wp_login_url(); ?>" class="px-3">Kirjaudu</a> |
            <a href="<?php echo wp_registration_url(); ?>" class="px-3">Rekisteröidy</a>
        </div>
    </nav>
</div>

    </div>
</header>
</body>
</html>
