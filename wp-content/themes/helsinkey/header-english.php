<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <script 
        src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" 
        defer
    ></script>
    <style>
        .lang-item {
            display: flex;
            align-items: center;
        }

        /* Customize the flag image */
        .lang-item img {
            vertical-align: middle;  /* Align with the middle of the line */
        }
        @media (min-width: 1024px) {
            .header-menu-container .rounded {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body <?php body_class('bg-background text-text'); ?>>

<header class="bg-gray-900 shadow-header-shadow">
    <div class="container mx-auto flex flex-wrap items-center justify-between py-4">
        
        <div class="hidden md:flex items-center w-full justify-between flex-col md:flex-row">
            
            <a href="<?php echo get_permalink(267); ?>" 
            class="flex items-center m-2 bg-gray-900 rounded p-1 hover:bg-gray-800 transition ease-in-out duration-200">
                <img src="/logo.png" alt="Logo" style="height: 60px; width: 60px;">
                <div class="text-lg md:text-2xl font-semibold">
                    <span class="text">Helsinkey</span>
                </div>
            </a>

            <nav class="flex items-center mb-4 md:mb-0 ml-auto">
                <?php 
                wp_nav_menu(
                    [
                        'theme_location' => 'header-menu',
                        'container_class' => 'header-menu-container',
                        'menu_class' => 'flex',
                        'link_before' => '<div class="rounded hover:bg-hover-blue  text-base transition ease-in-out duration-200">',
                        'link_after' => '</div>'
                    ]
                ); 
                ?>
            </nav>

            <div class="flex flex-col text-base md:text-lg items-center ml-auto">
                <?php if (is_user_logged_in()): 
                    $current_user = wp_get_current_user();
                ?>
                    <a href="<?php echo get_permalink(326); ?>" class="bg-gray-800 rounded p-1 w-full text-center hover:bg-hover-blue transition ease-in-out duration-200">
                        Hello, <?php echo $current_user->display_name; ?>!
                    </a>
                    <div class="border-t border-gray-400 w-full my-1"></div>
                    <a href="<?php echo wp_logout_url(get_permalink(267)); ?>" class="bg-gray-800 rounded p-1 w-full text-center hover:bg-hover-blue transition ease-in-out duration-200">
                        Log out
                    </a>
                <?php else: ?>
                    <a href="<?php echo get_permalink(328); ?>" class="bg-gray-800 rounded p-1 w-full text-center hover:bg-hover-blue transition ease-in-out duration-200">Log in</a>
                    <div class="border-t border-gray-400 w-full my-1"></div>
                    <a href="<?php echo get_permalink(330); ?>" class="bg-gray-800 rounded p-1 w-full text-center hover:bg-hover-blue transition ease-in-out duration-200">Register</a>
                <?php endif; ?>
                
                <div class="border-t border-gray-400 w-full my-1"></div>
                <a href="<?php echo get_permalink(333); ?>" class="bg-gray-800 rounded p-1 w-full text-center hover:bg-hover-blue transition ease-in-out duration-200">
                    Shopping Cart
                </a>
            </div>
        </div>

        <div x-data="{ open: false }" class="md:hidden flex items-center justify-between w-full relative pr-4 pl-4 mb-1.5">
            
            <a href="<?php echo get_permalink(267); ?>">
                <img src="/logo.png" alt="Logo" style="height: 60px; width: 60px;">
            </a>
            
            <div class="flex-grow text-4xl font-bold text-center">
                <a href="<?php echo get_permalink(267); ?>" class="text">Helsinkey</a>
            </div>
            
            <div class="w-10 text-right">
                <button @click="open = !open" class="p-2">
                    <div x-show="!open" style="font-size: 30px;">☰</div>
                    <div x-show="open" style="font-size: 30px;">✖</div>
                </button>
            </div>
            
            <nav x-show="open" x-cloak 
                class="absolute w-full top-[5.1rem] left-0 z-50 flex flex-col space-y-2 bg-gray-800 text-2xl">
                <?php 
                wp_nav_menu(
                    [
                        'theme_location' => 'header-menu',
                        'container_class' => 'header-menu-container',
                        'menu_class' => 'flex flex-col space-y-2 p-4 text-2xl justify-center items-center w-full',
                        'link_before' => '<div class="rounded p-1 hover:bg-hover-blue text-2xl transition ease-in-out duration-200">',
                        'link_after' => '</div>'
                    ]
                ); 
                ?>
                <?php if (is_user_logged_in()): 
                    $current_user = wp_get_current_user();
                ?>
                    <div class="flex justify-center items-center text-2xl p-4 w-full">
                        <a href="<?php echo get_permalink(326); ?>" class="flex-1 bg-gray-700 rounded p-1 text-center hover:bg-hover-blue transition ease-in-out duration-200">
                            Hello, <?php echo $current_user->display_name; ?>!
                        </a>
                        <div class="border-l border-gray-400 h-6 mx-2"></div>
                        <a href="<?php echo wp_logout_url(get_permalink(267)); ?>" class="flex-1 bg-gray-700 rounded p-1 text-center hover:bg-hover-blue transition ease-in-out duration-200">
                            Log out
                        </a>
                    </div>
                <?php else: ?>
                    <div class="flex justify-center items-center text-2xl p-4 w-full">
                        <a href="<?php echo get_permalink(328); ?>" class="flex-1 bg-gray-700 rounded p-1 text-center hover:bg-hover-blue transition ease-in-out duration-200">Log in</a>
                        <div class="border-l border-gray-400 h-6 mx-2"></div>
                        <a href="<?php echo get_permalink(330); ?>" class="flex-1 bg-gray-700 rounded p-1 text-center hover:bg-hover-blue transition ease-in-out duration-200">Register</a>
                    </div>
                <?php endif; ?>
                
                <div class="flex justify-center items-center text-2xl p-4 w-full">
                    <a href="<?php echo get_permalink(333); ?>" class="flex-1 bg-gray-700 rounded p-1 text-center hover:bg-hover-blue transition ease-in-out duration-200">
                        Shopping Cart
                    </a>
                </div>
            </nav>
        </div>
    </div>
</header>
</body>
</html>
