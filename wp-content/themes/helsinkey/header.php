<!DOCTYPE html>
<html lang="fi">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>
<body <?php body_class('bg-background text-text'); ?>>

<header class="bg-gray-900 shadow-header-shadow">
    <div class="container mx-auto flex flex-wrap items-center justify-between py-4">

        <!-- Desktop & Tablet View -->
        <div class="hidden 850px:flex items-center w-full justify-between flex-col md:flex-row">
            
            <!-- Logo Section -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center m-1 bg-gray-900 rounded p-1 hover:bg-hover-blue transition ease-in-out duration-200">
                <img src="/logo.png" alt="Logo" style="height: 60px; width: 60px;">
                <div class="text-lg md:text-2xl font-semibold">
                    <span class="text">Helsinkey</span>
                </div>
            </a>

            <!-- Navigation Menu -->
            <nav class="flex space-x-4 items-center mb-4 md:mb-0">
                <?php wp_nav_menu(array(
                    'theme_location' => 'header-menu',
                    'container_class' => 'header-menu-container',
                    'menu_class' => 'flex space-x-4',
                    'link_before' => '<div class="rounded p-1 hover:bg-hover-blue transition ease-in-out duration-200">',
                    'link_after' => '</div>'
                )); ?>
            </nav>

            <!-- Login/Register Buttons -->
            <div class="flex flex-col text-base md:text-lg items-center">
                <a href="<?php echo wp_login_url(); ?>" class="bg-gray-800 rounded p-1 w-full text-center hover:bg-hover-blue transition ease-in-out duration-200">Kirjaudu</a>
                <div class="border-t border-gray-400 w-full my-1"></div>
                <a href="<?php echo wp_registration_url(); ?>" class="bg-gray-800 rounded p-1 w-full text-center hover:bg-hover-blue transition ease-in-out duration-200">Rekisteröidy</a>
            </div>
        </div>
</div>

        <!-- Mobile View -->
        <div x-data="{ open: false }" class="850px:hidden flex items-center justify-between w-full relative pr-4 pl-4">
            <!-- Mobile Logo -->
            <img src="/logo.png" alt="Logo" style="height: 60px; width: 60px;">
            <!-- Mobile Text -->
            <div class="flex-grow text-4xl font-bold text-center">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="text">Helsinkey</a>
            </div>
            <!-- Mobile Hamburger Menu -->
            <div class="w-10 text-right">
                <button @click="open = !open" class="p-2">
                    <div x-show="!open" style="font-size: 30px;">☰</div>
                    <div x-show="open" style="font-size: 30px;">✖</div>
                </button>
            </div>
            <!-- Mobile Menu -->
            <nav x-show="open" x-cloak class="absolute w-full top-16 left-0 z-50 flex flex-col space-y-2 bg-helsinkey-blue text-2xl">
                <?php wp_nav_menu(array(
                    'theme_location' => 'header-menu',
                    'container_class' => 'header-menu-container',
                    'menu_class' => 'flex flex-col space-y-2 p-4 text-2xl'
                )); ?>
                <div class="text text-2xl p-4">
                    <a href="<?php echo wp_login_url(); ?>" class="px-3">Kirjaudu</a>
                    <a href="<?php echo wp_registration_url(); ?>" class="px-3">Rekisteröidy</a>
                </div>
            </nav>
        </div>
    </div>
</header>
</body>
</html>
